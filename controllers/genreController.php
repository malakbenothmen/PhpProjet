<?php
require_once(__DIR__ . '/../models/genre.php');
require_once(__DIR__ . '/../database/config/config.php');
class GenreController extends Connexion{
function __construct() {
parent::__construct();
}

function insert(Genre $g){

    $query="insert into genres (name)values(?)";
    $res=$this->conn->prepare($query);

    $aryy =array($g->getName()) ;
    //var_dump($aryy);
    return $res->execute($aryy);

}

/*function getGenreByName($name){
$query="SELECT * FROM genres WHERE name = ? ";
$res = $this->conn->prepare($query);
$res->execute(array($name));
$array= $res->fetch(PDO:: FETCH_ASSOC);
return $array;
}*/


function listeGenre()
{
$query="SELECT * FROM genres";
$res = $this->conn->query($query);
$res->execute();
$array= $res->fetchAll(PDO:: FETCH_OBJ);
return $array;

}


function deleteGenre($id)
{
    $query = "DELETE FROM genres WHERE id= ? ";
    $res=$this->conn->prepare($query);
    return $res->execute(array($id));

}
function countGenres()
{
    $query="SELECT COUNT(*) AS genres_count FROM genres";
    $res = $this->conn->prepare($query);
    $res->execute();
    $array= $res->fetch(PDO:: FETCH_OBJ);
    return $array;
   
}





}

