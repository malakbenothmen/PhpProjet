<?php
class Genre {
    private $name;

    // Constructeur
    public function __construct($name = "") {
        $this->name = $name;
    }

    // Getter pour $name
    public function getName() {
        return $this->name;
    }

    // Setter pour $name
    public function setName($name) {
        $this->name = $name;
    }
}
?>
