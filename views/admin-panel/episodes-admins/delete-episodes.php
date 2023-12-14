<?php require "../layouts/header.php" ;
require "../../../controllers/episodeController.php";



if (isset($_GET['id']))
{

    $id=$_GET['id'];

    $epsctr=new EpisodeController(); 
    $$getEp=$epsctr->getEpisodeById($id);
    $thumbnailPath = "videos/" . $getEp->thumbnail;
    
    if (file_exists($thumbnailPath)) {
        unlink($thumbnailPath); 
    }

    $videopath = "videos/" . $getEp->video;
    if (file_exists($$videopath)) {
        unlink($videopath); 
    }

    $epsctr->deleteEpisode($id);

    header("location: show-episodes.php");


}

?>