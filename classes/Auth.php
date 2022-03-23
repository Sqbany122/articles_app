<?php 

class Auth extends MySQL {
    
    public function __construct() {
        parent::__construct();
    }

    public function login($username, $password) {

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

    }
}