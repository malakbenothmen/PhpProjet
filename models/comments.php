<?php

class Comment {
    private $user_name, $show_id, $user_id, $comment;

    // Constructor
    public function __construct($user_name = "", $show_id = 0, $user_id = 0, $comment = "") {
        $this->user_name = $user_name;
        $this->show_id = $show_id;
        $this->user_id = $user_id;
        $this->comment = $comment;
    }

    // Getter for $user_name
    public function getUserName() {
        return $this->user_name;
    }

    // Setter for $user_name
    public function setUserName($user_name) {
        $this->user_name = $user_name;
    }

    // Getter for $show_id
    public function getShowId() {
        return $this->show_id;
    }

    // Setter for $show_id
    public function setShowId($show_id) {
        $this->show_id = $show_id;
    }

    // Getter for $user_id
    public function getUserId() {
        return $this->user_id;
    }

    // Setter for $user_id
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    // Getter for $comment
    public function getComment() {
        return $this->comment;
    }

    // Setter for $comment
    public function setComment($comment) {
        $this->comment = $comment;
    }
}

?>
