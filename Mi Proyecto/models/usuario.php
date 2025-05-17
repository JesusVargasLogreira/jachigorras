<?php
<?php
class User {
    private $conn;
    private $table_name = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO " . $this->table_name . " (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([$username, $email, $hashed_password]);
    }

    public function login($email, $password) {
        $query = "SELECT id, username, password FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        
        if($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if(password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}