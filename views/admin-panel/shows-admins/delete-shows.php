<?php require "../layouts/header.php" ; 
require "../../../controllers/showController.php";


if (isset($_GET['id']))
{

    $id=$_GET['id'];


    $showsctr=new ShowController(); 
    $Show=$showsctr->getShowById($id);

    $imagePath = "img/" . $Show->image;
    if (file_exists($imagePath)) {
        unlink($imagePath); 
    }

    $showsctr->deleteShow($id);

    header("location: show-shows.php");


}

?>