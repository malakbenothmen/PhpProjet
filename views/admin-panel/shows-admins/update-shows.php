
<?php require "../layouts/header.php" ; 

 require "../../../controllers/showController.php";





    if (isset($_POST['submit_edit'])) {
        if ( empty($_POST['titleE']) || empty($_POST['descriptionE'])
            || empty($_POST['genreE']) || empty($_POST['typeE']) || empty($_POST['statusE'])
            || empty($_POST['studiosE']) || empty($_POST['num_availableE']) || empty($_POST['num_totalE'])
            || empty($_POST['date_airedE']) || empty($_POST['durationE']) || empty($_POST['qualityE'])
        ) {
            echo "<script>alert('one or more inputs are empty ')</script>";
        } else {
            $id = $_POST['idE'];
            $title = $_POST['titleE'];
            $description = $_POST['descriptionE'];
            $genre = $_POST['genreE'];
            $type = $_POST['typeE'];
            $status = $_POST['statusE'];
            $studios = $_POST['studiosE'];
            $data_aired = $_POST['date_airedE'];
            $num_available = $_POST['num_availableE'];
            $num_total = $_POST['num_totalE'];
            $duration = $_POST['durationE'];
            $quality = $_POST['qualityE'];

            $showctr=new ShowController();
            $showctr->update($id, $title, $description, $genre, $type, $status, $studios, $data_aired, $num_available, $num_total, $duration, $quality);



            header("location: show-shows.php");
            exit();
        }
    }

?>