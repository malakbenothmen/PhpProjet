<?php
class Admin {
    private $adminname, $email, $password;

    // Constructeur
    public function __construct($adminname = "", $email = "", $password = "") {
        $this->adminname = $adminname;
        $this->email = $email;
        $this->password = $password;
    }

    // Getter pour $adminname
    public function getAdminname() {
        return $this->adminname;
    }

    // Setter pour $adminname
    public function setAdminname($adminname) {
        $this->adminname = $adminname;
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
