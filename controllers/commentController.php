<?php
require_once(__DIR__ . '/../models/comments.php');
require_once(__DIR__ . '/../database/config/config.php');
class CommentController extends Connexion{
function __construct() {
parent::__construct();
}



function getCommentsByShow($id){
    $query="SELECT * FROM comments WHERE show_id = ? ";
    $res = $this->conn->prepare($query);
    $res->execute(array($id));
    $array= $res->fetchAll(PDO:: FETCH_OBJ);
    return $array;
}

public function insertComment(Comment $c) {
    $insert = $this->conn->prepare("INSERT INTO comments (comment, show_id, user_id, user_name)
    VALUES (:comment, :show_id, :user_id, :user_name)");
    $insert->execute([
        ":comment" => $c->getComment(),
        ":show_id" => $c->getShowId(),
        ":user_id" => $c->getUserId(),
        ":user_name" => $c->getUserName(),
    ]);
}

function countCommentsByShow($id)
{
    $query="SELECT COUNT(*) AS nb_comments FROM comments WHERE show_id = ? ";
    $res = $this->conn->prepare($query);
    $res->execute(array($id));
    $array= $res->fetch(PDO:: FETCH_OBJ);
    return $array;
   
}



}