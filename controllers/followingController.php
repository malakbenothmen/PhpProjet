<?php
require_once(__DIR__ . '/../models/following.php');
require_once(__DIR__ . '/../database/config/config.php');
class FollowingController extends Connexion{
function __construct() {
parent::__construct();
}


    public function insertFollow(Following $f) {
        $follow = $this->conn->prepare("INSERT INTO followings (show_id, user_id)
        VALUES (:show_id, :user_id)");
        $follow->execute([
            ":show_id" => $f->getShowId(),
            ":user_id" => $f->getUserId(),
        ]);

    }   




    function getFollowingListByUser($id){

            $query= "SELECT shows.id AS id , shows.title AS title , shows.image AS image ,
            shows.type AS type , shows.genre AS genre , shows.num_available AS num_available , shows.num_total AS num_total,
            followings.user_id, followings.show_id FROM  shows INNER JOIN 
            followings ON  shows.id = followings.show_id 
            WHERE followings.user_id= ? ";
            $res = $this->conn->prepare($query);
            $res->execute(array($id));
            $array= $res->fetchAll(PDO:: FETCH_OBJ);
            return $array;
        }

    function checkFollowUser($id,$user_id)
     {  
        $query="SELECT * FROM followings WHERE show_id= ? AND user_id= ?";
        $res = $this->conn->prepare($query);
        $res->execute(array($id,$user_id));
        $array= $res->fetch(PDO:: FETCH_OBJ);
        return $array;
    }
    
    
    

    }