<?php
class Following {
    private $show_id;
    private $user_id;

    // Constructor
    public function __construct($show_id, $user_id) {
        $this->show_id = $show_id;
        $this->user_id = $user_id;
    }

    // Getter for show_id
    public function getShowId() {
        return $this->show_id;
    }

    // Setter for show_id
    public function setShowId($show_id) {
        $this->show_id = $show_id;
    }

    // Getter for user_id
    public function getUserId() {
        return $this->user_id;
    }

    // Setter for user_id
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
}
?>