<?php
require_once(__DIR__ . '/../models/view.php');
require_once(__DIR__ . '/../database/config/config.php');
class ViewController extends Connexion{
function __construct() {
parent::__construct();
}

    public function insertView(View $v) {
        $insertView = $this->conn->prepare("INSERT INTO views (show_id, user_id) VALUES (:show_id, :user_id)");
        $insertView->execute([
            ":show_id" => $v->getShowId(),
            ":user_id" => $v->getUserId(),
        ]);
    }


    function checkUserView($id,$user_id)
    {  
        $query="SELECT * FROM views WHERE show_id=? AND user_id=?";
        $res = $this->conn->prepare($query);
        $res->execute(array($id,$user_id));
        return $res;
    }



    public function viewsByShow($id) {
        $showQuery = $this->conn->prepare("
            SELECT shows.id AS id, shows.image AS image, 
                shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title,
                shows.genre AS genre, shows.type AS type, shows.status AS status, shows.data_aired AS date_aired,
                shows.studios as studios, shows.description as description, shows.duration AS duration,
                shows.quality AS quality,
                COUNT(views.show_id) AS count_views  
            FROM shows 
            LEFT JOIN views ON shows.id = views.show_id 
   
            WHERE shows.id = :id 
            GROUP BY shows.id
        ");
        $showQuery->execute([':id' => $id]);
        $singleShow = $showQuery->fetch(PDO::FETCH_OBJ);
        if ($singleShow !== false) {
            return $singleShow;
        } else {
        
            return null; 
        }
    }
    



}






