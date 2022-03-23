<?php 

class Auth extends MySQL {
    
    public function __construct() {
        parent::__construct();
    }

    public function login($username, $password) {
        $result = $this->query("
            SELECT id, username, password, role
            FROM users
            WHERE username = '".$username."'
        ");

        if (empty($result)) {
            throw new Exception("Username doesn't exists in our database");
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION["logged_in"] = true;
                $_SESSION["id"] = $result['id'];
                $_SESSION["role"] = $result['role'];
                $_SESSION["username"] = $username;
                header("location: /articles_app/articles.php");
                exit;
            } else {
                throw new Exception("Password didn't match");
            }
        }
    }

    public function register($username, $password, $reapeat_password) {
        if ($password != $reapeat_password) {
            throw new Exception("Passwords didn't match!");
        }

        $result = $this->query("
            SELECT id
            FROM users
            WHERE username = '".$username."'
        ");

        if (!empty($result)) {
            throw new Exception("Username arleady exists");
        }

        try {
            $this->query("
                INSERT INTO users (username, password, created_at)
                VALUES ('".$username."', '".password_hash($password, PASSWORD_DEFAULT)."', NOW())
            ");
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function logout() {
        session_start();    
        $_SESSION = array();  
        session_destroy();  
        header("location: /articles_app/login.php");
        exit;
    }
}