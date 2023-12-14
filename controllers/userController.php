<?php
require_once(__DIR__ . '/../models/user.php');
require_once(__DIR__ . '/../database/config/config.php');
class UserController extends Connexion{
function __construct() {
parent::__construct();
}

function insert(User $u){

        $query="insert into users (username,email,password)values(?, ?, ?)";
        $res=$this->conn->prepare($query);

        $aryy =array($u->getUsername(),$u->getEmail(),$u->getPassword()) ;
        //var_dump($aryy);
        return $res->execute($aryy);

}

function getUserByEmail($email){
    $query="SELECT * FROM users WHERE email = ? ";
    $res = $this->conn->prepare($query);
    $res->execute(array($email));
    $array= $res->fetch(PDO:: FETCH_ASSOC);
    return $array;
}





}
?>