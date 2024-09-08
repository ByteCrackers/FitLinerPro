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
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                return true;
            } else {
                $this->lastError = "Invalid password";
            }
        } else {
            $this->lastError = "User not found";
        }
        
        return false;
    }

    public function register($name, $email, $password) {
        // Check if email already exists
        if ($this->getUserByEmail($email)) {
            $this->lastError = "Email already exists";
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            return true;
        } else {
            $this->lastError = "Registration failed: " . $stmt->error;
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