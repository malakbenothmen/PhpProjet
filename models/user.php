<?php
class User {
    private $username, $email, $password;

    // Constructeur
    public function __construct($username = "", $email = "", $password = "") {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    // Getter pour $username
    public function getUsername() {
        return $this->username;
    }

    // Setter pour $username
    public function setUsername($username) {
        $this->username = $username;
    }

    // Getter pour $email
    public function getEmail() {
        return $this->email;
    }

    // Setter pour $email
    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter pour $password
    public function getPassword() {
        return $this->password;
    }

    // Setter pour $password
    public function setPassword($password) {
        $this->password = $password;
    }
}
?>