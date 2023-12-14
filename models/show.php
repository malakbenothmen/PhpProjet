<?php


class Show {
    private $id,$title,$image,$description,$type,$studios,
    $data_aired, $status,$genre, 
    $duration,$quality,$num_available,
    $num_total;
  

    // Constructeur
    public function __construct(
        $title,
        $image,
        $description,
        $type,
        $studios,
        $data_aired,
        $status,
        $genre,
        $duration,
        $quality,
        $num_available,
        $num_total,
       
    ) {
        $this->title = $title;
        $this->image = $image;
        $this->description = $description;
        $this->type = $type;
        $this->studios = $studios;
        $this->data_aired = $data_aired;
        $this->status = $status;
        $this->genre = $genre;
        $this->duration = $duration;
        $this->quality = $quality;
        $this->num_available = $num_available;
        $this->num_total = $num_total;
     
    }

    // Getters
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getType() {
        return $this->type;
    }

    public function getStudios() {
        return $this->studios;
    }

    public function getDataAired() {
        return $this->data_aired;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getQuality() {
        return $this->quality;
    }

    public function getNumAvailable() {
        return $this->num_available;
    }

    public function getNumTotal() {
        return $this->num_total;
    }

   //setters


   public function setId($id) {
    $this->id = $id;
   }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setStudios($studios) {
        $this->studios = $studios;
    }

    public function setDataAired($data_aired) {
        $this->data_aired = $data_aired;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
    }

    public function setQuality($quality) {
        $this->quality = $quality;
    }

    public function setNumAvailable($num_available) {
        $this->num_available = $num_available;
    }

    public function setNumTotal($num_total) {
        $this->num_total = $num_total;
    }






}


?>