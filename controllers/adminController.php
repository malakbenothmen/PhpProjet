<?php
require_once(__DIR__ . '/../models/admin.php');
require_once(__DIR__ . '/../database/config/config.php');
class AdminController extends Connexion{
function __construct() {
parent::__construct();
}

function insert(Admin $a){

        $query="insert into admins (adminname,email,password)values(?, ?, ?)";
        $res=$this->conn->prepare($query);

        $aryy =array($a->getAdminname(),$a->getEmail(),$a->getPassword()) ;
        //var_dump($aryy);
        return $res->execute($aryy);

}

function getAdminByEmail($email){
    $query="SELECT * FROM admins WHERE email = ? ";
    $res = $this->conn->prepare($query);
    $res->execute(array($email));
    $array= $res->fetch(PDO:: FETCH_ASSOC);
    return $array;
}


function listerAdmin()
{
    $query="SELECT * FROM admins";
    $res = $this->conn->query($query);
    $res->execute();
    $array= $res->fetchAll(PDO:: FETCH_OBJ);
    return $array;

}

function countAdmins()
{
    $query="SELECT COUNT(*) AS admins_count FROM admins";
    $res = $this->conn->prepare($query);
    $res->execute();
    $array= $res->fetch(PDO:: FETCH_OBJ);
    return $array;
   
}





}
?>