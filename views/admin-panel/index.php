<?php
require "layouts/header.php";
require "../../controllers/showController.php";
require "../../controllers/genreController.php";
require "../../controllers/episodeController.php";
require "../../controllers/adminController.php";


     
    if (!isset($_SESSION['adminname']))
     {header("location: ". ADMINURL."/admins/login-admins.php");
         
     }
      //shows
      
      $showsctr=new ShowController(); 
      $allShows=$showsctr->countShows();

      //episodes

      $episodesctr=new EpisodeController(); 
      $allEpisodes=$episodesctr->countEpisodes();

      //genres

      $actr=new GenreController(); 
      $allGenre=$actr->countGenres();

      //admins

      $adminctr=new AdminController();
      $allAdmins=$adminctr->countAdmins();
   
?>


            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Shows</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of shows: <?php echo $allShows->shows_count; ?>  </p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Episodes</h5>
              
              <p class="card-text">number of episodes:<?php echo $allEpisodes->episodes_count; ?> </p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Genres</h5>
              
              <p class="card-text">number of genres:  <?php echo $allGenre->genres_count; ?> </p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins:  <?php echo $allAdmins->admins_count; ?> </p>
              
            </div>
          </div>
        </div>
      </div>
   
            
<?php require "layouts/footer.php" ; ?>