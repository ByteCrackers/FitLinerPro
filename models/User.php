<?php
// Load PHPMailer classes
require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once '../config.php';

class User
{
    private $conn;
    private $lastError;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function login($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT user_id, password FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id']; // Set user session
                return true;
            } else {
                // Password does not match
                $_SESSION['error'] = 'Invalid credentials. Please try again.';
                return false;
            }
        }
        // No user found
        $_SESSION['error'] = 'Invalid email. Please try again.';
        return false;
    }




    public function register(
        $email,
        $password,
        $firstName,
        $lastName,
        $nameWithInitials,
        $sex,
        $maritalStatus,
        $address,
        $birthday,
        $contactNumber,
        $eContactNumber
    ) {
        // Check if email already exists
        if ($this->getUserByEmail($email)) {
            $this->lastError = "Email already exists";
            return false;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Begin transaction
        $this->conn->begin_transaction();

        try {
            // Generate new user_id
            $userId = $this->generateNewUserId();

            // Insert into user table
            $stmt = $this->conn->prepare("INSERT INTO user (user_id, fName, email, password, created_date) VALUES (?, ?, ?, ?, NOW())");
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . $this->conn->error);
            }
            $stmt->bind_param("isss", $userId, $firstName, $email, $hashedPassword);
            if (!$stmt->execute()) {
                throw new Exception("Failed to insert user into user table: " . $stmt->error);
            }

            // Insert into user_data table (add null values for not included fields)
            $stmt = $this->conn->prepare("
                INSERT INTO user_data (
                    user_id, fName, lName, Name_with_initials, sex, marital_status, address, 
                    contact_number, emergency_contact_number, birthday, height, weight, 
                    participated_for_sports, doing_any_physical_activities, how_long_exercise, 
                    where_exercise, reason_for_exercise
                ) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
            ");
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . $this->conn->error);
            }

            $stmt->bind_param(
                "isssssssss",
                $userId,
                $firstName,
                $lastName,
                $nameWithInitials,
                $sex,
                $maritalStatus,
                $address,
                $contactNumber,
                $eContactNumber,
                $birthday
            );

            if (!$stmt->execute()) {
                throw new Exception("Failed to insert user data into user_data table: " . $stmt->error);
            }

            // Commit transaction
            $this->conn->commit();

            // Send welcome email
            $emailStatus = $this->sendEmail($email, $email, $password, $userId);

            if ($emailStatus !== 'Message sent!') {
                // Handle email sending error if needed
                $this->lastError = $emailStatus; // Store the error
                return false;
            }

            return true;
        } catch (Exception $e) {
            // Rollback transaction in case of error
            $this->conn->rollback();
            $this->lastError = $e->getMessage();
            return false;
        }
    }

    function sendEmail($to, $user, $password, $id)
    {
        // Include SMTP configuration
        $smtpConfig = require '../services/smtp.php';

        $mail = new PHPMailer(true); // Pass true to enable exceptions

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = $smtpConfig['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $smtpConfig['username'];
            $mail->Password = $smtpConfig['password'];
            $mail->SMTPSecure = $smtpConfig['secure'] ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS; // Use STARTTLS for security
            $mail->Port = $smtpConfig['port'];

            // Email content
            $mail->setFrom($smtpConfig['username'], 'FitlinerPro');
            $mail->addAddress($to);
            $mail->Subject = 'Welcome to FitlinerPro';
            $mail->isHTML(true);

            $mail->Body = "
            <!DOCTYPE html>
            <html lang='en-US'>
              <head>
                <meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
                <title>New Account Email Template</title>
                <style type='text/css'>
                  .h1 { color: #1e1e2d; font-weight: 500; font-size: 32px; }
                  /* Add other styles here */
                </style>
              </head>
              <body>
                <h1>Your account has been created successfully.</h1>
                <p>Please use the following credentials to log in to the system:</p>
                <p>Login URL: https://flp.sathira.pw</p>
                <p><strong>ID:</strong> $id</p>
                <p><strong>Username:</strong> $user</p>
                <p><strong>Password:</strong> $password</p>
              </body>
            </html>";

            // Send the email
            $mail->send();
            return 'Message sent!';
        } catch (Exception $e) {
            return 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }



    /**
     * Generate a new user_id with the format 20000XXX
     * The starting ID will be 20000001, and it will increment sequentially.
     */
    private function generateNewUserId()
    {
        // Query to get the max user_id from the user table
        $result = $this->conn->query("SELECT MAX(user_id) AS max_id FROM user");
        $row = $result->fetch_assoc();

        // If no user exists, start from 20000001
        if ($row['max_id'] === null) {
            return 20000001;
        } else {
            // Increment the max_id by 1
            return $row['max_id'] + 1;
        }
    }

    public function isFirstLogin($userId)
    {
        // Initialize $count to avoid undefined variable issues
        $count = 0;

        // Prepare the SQL statement
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM payment WHERE user_id = ?");
        if ($stmt) {
            // Bind the userId parameter
            $stmt->bind_param("i", $userId);

            // Execute the statement
            if ($stmt->execute()) {
                // Bind the result to $count
                $stmt->bind_result($count);
                // Fetch the result
                $stmt->fetch();
            } else {
                // Log error: execution failed
                error_log("Execution failed: " . $stmt->error);
            }

            // Close the statement
            $stmt->close();
        } else {
            // Log error: preparation failed
            error_log("Preparation failed: " . $this->conn->error);
        }

        // Check if $count is zero (first login) or default initialization
        return $count == 0;
    }








    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function getLastError()
    {
        return $this->lastError;
    }
}
