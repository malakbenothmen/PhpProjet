<?php require "../layouts/header.php" ; 
require "../../../controllers/genreController.php";
 



    if (isset($_GET['id']))
    {

    $id=$_GET['id'];


    $GenreCtr = new GenreController();
    $GenreCtr->deleteGenre($id);

    header("location: show-genres.php");


    }

?>