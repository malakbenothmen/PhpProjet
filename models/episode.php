<?php
class Episode {
    private $name, $show_id, $thumbnail, $video;

    // Constructor
    public function __construct($name = "", $show_id = "", $thumbnail = "", $video = "") {
        $this->name = $name;
        $this->show_id = $show_id;
        $this->thumbnail = $thumbnail;
        $this->video = $video;
    }

    // Getter for $name
    public function getName() {
        return $this->name;
    }

    // Setter for $name
    public function setName($name) {
        $this->name = $name;
    }

    // Getter for $show_id
    public function getShowId() {
        return $this->show_id;
    }

    // Setter for $show_id
    public function setShowId($show_id) {
        $this->show_id = $show_id;
    }

    // Getter for $thumbnail
    public function getThumbnail() {
        return $this->thumbnail;
    }

    // Setter for $thumbnail
    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }

    // Getter for $video
    public function getVideo() {
        return $this->video;
    }

    // Setter for $video
    public function setVideo($video) {
        $this->video = $video;
    }
}

