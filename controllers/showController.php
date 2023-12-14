<?php
require_once(__DIR__ . '/../models/show.php');
require_once(__DIR__ . '/../database/config/config.php');
class ShowController extends Connexion{
function __construct() {
parent::__construct();
}

public function insertShow(Show $s) {
    $insert = $this->conn->prepare("INSERT INTO shows (title,image, description, type,studios,data_aired,status,genre,duration,quality,num_available,num_total)
    VALUES (:title, :image, :description, :type, :studios, :data_aired, :status, :genre, :duration, :quality, :num_available, :num_total)");
    $insert->execute([
        ":title" => $s->getTitle(),
        ":image" => $s->getImage(),
        ":description" => $s->getDescription(),
        ":type" => $s->getType(),
        ":studios" => $s->getStudios(),
        ":data_aired" => $s->getDataAired(),
        ":status" => $s->getStatus(),
        ":genre" => $s->getGenre(),
        ":duration" => $s->getDuration(),
        ":quality" => $s->getQuality(),
        ":num_available" => $s->getNumAvailable(),
        ":num_total" => $s->getNumTotal(),
    ]);

}


        function listeShows()
        {
        $query="SELECT * FROM shows";
        $res = $this->conn->query($query);
        $res->execute();
        $array= $res->fetchAll(PDO:: FETCH_OBJ);
        return $array;

        }



        function getShowById($id){
            $query="SELECT * FROM shows WHERE id = ? ";
            $res = $this->conn->prepare($query);
            $res->execute(array($id));
            $array= $res->fetch(PDO:: FETCH_OBJ);
            return $array;
        }

        function deleteShow($id)
        {
            $query = "DELETE FROM shows WHERE id= ? ";
            $res=$this->conn->prepare($query);
            return $res->execute(array($id));
        
        }



        public function update($id, $title, $description, $genre, $type, $status, $studios, $data_aired, $num_available, $num_total, $duration, $quality) {
            $updateShow = $this->conn->prepare("UPDATE shows SET 
                title=:title, description=:description, genre=:genre, type=:type, status=:status, 
                studios=:studios, data_aired=:data_aired, num_available=:num_available, 
                num_total=:num_total, duration=:duration, quality=:quality 
                WHERE id=:id");
    
            $updateShow->execute([
                ":title" => $title,
                ":description" => $description,
                ":genre" => $genre,
                ":type" => $type,
                ":status" => $status,
                ":studios" => $studios,
                ":data_aired" => $data_aired,
                ":num_available" => $num_available,
                ":num_total" => $num_total,
                ":duration" => $duration,
                ":quality" => $quality,
                ":id" => $id,
            ]);
        }
    

        function countShows()
        {
            $query="SELECT COUNT(*) AS shows_count FROM shows";
            $res = $this->conn->prepare($query);
            $res->execute();
            $array= $res->fetch(PDO:: FETCH_OBJ);
            return $array;
           
        }


        function searchShow($keyword)
        {
            $search = $this->conn->prepare("SELECT * FROM shows WHERE title LIKE :keyword OR genre LIKE :keyword");
            $search->execute([
                ':keyword' => '%' . $keyword . '%',
            ]);
            $allSearches = $search->fetchAll(PDO::FETCH_OBJ);
            return $allSearches;
        }
        


        function getShowsByGenre($name){
            $query="SELECT shows.id AS id, shows.image AS image, 
            shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title,
            shows.genre AS genre, shows.type AS type,
            COUNT(views.show_id) AS count_views 
            FROM shows 
            LEFT JOIN views ON shows.id = views.show_id
            WHERE shows.genre = ?
            GROUP BY shows.id 
            ORDER BY count_views DESC";
            $res = $this->conn->prepare($query);
            $res->execute(array($name));
            $array= $res->fetchAll(PDO:: FETCH_OBJ);
            return $array;
        }


        function listeForYouShows()
        {
        $query="SELECT shows.id AS id, shows.image AS image, 
        shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title,
        shows.genre AS genre , shows.type AS type ,
        COUNT(views.show_id) AS count_views FROM shows JOIN views ON  shows.id = views.show_id  GROUP BY (shows.id) ORDER BY views.show_id LIMIT 5 ";
        $res = $this->conn->query($query);
        $res->execute();
        $array= $res->fetchAll(PDO:: FETCH_OBJ);
        return $array;

        }
        function SlideShows()
        {
        $query="SELECT * FROM shows LIMIT 3";
        $res = $this->conn->query($query);
        $res->execute();
        $array= $res->fetchAll(PDO:: FETCH_OBJ);
        return $array;

        }


        function TrandShows()
        {
            $query = "SELECT shows.id AS id, shows.image AS image, 
                    shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title,
                    shows.genre AS genre, shows.type AS type,
                    COUNT(views.show_id) AS count_views 
                    FROM shows 
                    LEFT JOIN views ON shows.id = views.show_id 
                    GROUP BY shows.id 
                    ORDER BY count_views DESC";
        
            $res = $this->conn->query($query);
            $array = $res->fetchAll(PDO::FETCH_OBJ);
            
            return $array;
        }
        

        function RecentShows()
        {
            $query = "SELECT shows.id AS id, shows.image AS image, 
                      shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title,
                      shows.genre AS genre, shows.type AS type,
                      COUNT(views.show_id) AS count_views 
                      FROM shows 
                      LEFT JOIN views ON shows.id = views.show_id 
                      GROUP BY shows.id 
                      ORDER BY MAX(views.created_at) DESC"; 
            $res = $this->conn->query($query);
            $array = $res->fetchAll(PDO::FETCH_OBJ);
        
            return $array;
        }
        



}