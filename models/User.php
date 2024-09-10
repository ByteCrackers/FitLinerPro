<?php
require_once '../config.php';

class User {
    private $conn;
    private $lastError;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function login($email, $password) {
        $user = $this->getUserByEmail($email);
        
        if ($user) {
            if ($user['status'] === 'Inactive') {
                $this->lastError = "Your account is inactive. Please contact support.";
                return false;
            }
            
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role']; 
                return true;
            } else {
                $this->lastError = "Invalid password";
            }
        } else {
            $this->lastError = "User not found";
        }
        
        return false;
    }
    
    

    public function register(
        $email, $password, $firstName, $lastName, $nameWithInitials, $sex, $maritalStatus, $address, 
        $birthday, $age, $height, $weight, $about, $exerciseLocation, $participatedInSports, $currentlyDoingSports, $exerciseDuration
    ) {
        // Check if email already exists
        if ($this->getUserByEmail($email)) {
            $this->lastError = "Email already exists";
            return false;
        }
    
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = "user";
        $status = "Inactive";
    
        // Convert arrays to JSON
        $exerciseLocationJson = json_encode($exerciseLocation);
        $participatedInSportsJson = json_encode($participatedInSports);
        $currentlyDoingSportsJson = json_encode($currentlyDoingSports);
    
        // Begin transaction
        $this->conn->begin_transaction();
    
        try {
            // Insert into users table
            $stmt = $this->conn->prepare("INSERT INTO users (name, email, password, role, status) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . $this->conn->error);
            }
            $stmt->bind_param("sssss", $firstName, $email, $hashedPassword, $role, $status);
            if (!$stmt->execute()) {
                throw new Exception("Failed to insert user into users table: " . $stmt->error);
            }
    
            // Get the last inserted user ID
            $userId = $this->conn->insert_id;
    
            // Insert into membership_registration table
            $stmt = $this->conn->prepare("
                INSERT INTO membership_registration 
                (id, first_name, last_name, name_with_initials, sex, marital_status, address, birthday, age, height, weight, about, exercise_location, participated_in_sports, currently_doing_sports, exercise_duration)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . $this->conn->error);
            }
    
            // Match the number of types and variables
            $stmt->bind_param(
                "isssssssssssssss",
                $userId, 
                $firstName, 
                $lastName, 
                $nameWithInitials, 
                $sex, 
                $maritalStatus, 
                $address, 
                $birthday, 
                $age, 
                $height, 
                $weight, 
                $about, 
                $exerciseLocationJson, 
                $participatedInSportsJson, 
                $currentlyDoingSportsJson, 
                $exerciseDuration
            );
    
            if (!$stmt->execute()) {
                throw new Exception("Failed to insert user details into membership_registration table: " . $stmt->error);
            }
    
            // Insert into payment table with status as 'Due'
            $stmt = $this->conn->prepare("INSERT INTO payment (id, status) VALUES (?, 'Due')");
            if (!$stmt) {
                throw new Exception("Failed to prepare statement for payment table: " . $this->conn->error);
            }
            $stmt->bind_param("i", $userId);
            if (!$stmt->execute()) {
                throw new Exception("Failed to insert into payment table: " . $stmt->error);
            }
    
            // Insert into attendance table with attendance as 0
            $stmt = $this->conn->prepare("INSERT INTO attendance (user_id, attendance) VALUES (?, 0)");
            if (!$stmt) {
                throw new Exception("Failed to prepare statement for attendance table: " . $this->conn->error);
            }
            $stmt->bind_param("i", $userId);
            if (!$stmt->execute()) {
                throw new Exception("Failed to insert into attendance table: " . $stmt->error);
            }
    
            // Commit transaction
            $this->conn->commit();
            return true;
    
        } catch (Exception $e) {
            // Rollback transaction in case of error
            $this->conn->rollback();
            $this->lastError = $e->getMessage();
            return false;
        }
    }
    
    
    
    
    

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function getLastError() {
        return $this->lastError;
    }
}
?>
