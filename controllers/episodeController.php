<?php
require_once(__DIR__ . '/../models/episode.php');
require_once(__DIR__ . '/../database/config/config.php');
class EpisodeController extends Connexion{
function __construct() {
parent::__construct();
}


function countEpisodes()
{
    $query="SELECT COUNT(*) AS episodes_count FROM episodes";
    $res = $this->conn->prepare($query);
    $res->execute();
    $array= $res->fetch(PDO:: FETCH_OBJ);
    return $array;
   
}
public function insertEpisode(Episode $ep) {
    $name = $ep->getName();
    $video = $ep->getVideo();
    $thumbnail = $ep->getThumbnail();
    $show_id = $ep->getShowId();

    $insert = $this->conn->prepare("INSERT INTO episodes (name, video, thumbnail, show_id)
                                    VALUES (:name, :video, :thumbnail, :show_id)");
    $insert->execute([
        ":name" => $name,
        ":video" => $video,
        ":thumbnail" => $thumbnail,
        ":show_id" => $show_id,
    ]);
}



    function listeEpisodes()
    {
    $query="SELECT * FROM episodes";
    $res = $this->conn->query($query);
    $res->execute();
    $array= $res->fetchAll(PDO:: FETCH_OBJ);
    return $array;

    }

    function getEpisodeById($id){
        $query="SELECT * FROM episodes WHERE id = ? ";
        $res = $this->conn->prepare($query);
        $res->execute(array($id));
        $array= $res->fetch(PDO:: FETCH_OBJ);
        return $array;
    }

    function deleteEpisode($id)
    {
        $query = "DELETE FROM episodes WHERE id= ? ";
        $res=$this->conn->prepare($query);
        return $res->execute(array($id));
    
    }



    function oneShowEpisodes($show_id)
    {
        $query="SELECT * FROM episodes WHERE show_id = ? ";
        $res = $this->conn->prepare($query);
        $res->execute(array($show_id));
        $array= $res->fetchAll(PDO:: FETCH_OBJ);
        return $array;

    }

    function oneShowOneEp($show_id,$ep)
    {
        $query="SELECT * FROM episodes WHERE show_id = ?  AND name= ?";
        $res = $this->conn->prepare($query);
        $res->execute(array($show_id,$ep));
        $array= $res->fetch(PDO:: FETCH_OBJ);
        return $array;

    }




}