<?php require "../layouts/header.php" ; 
require "../../../controllers/genreController.php";
require "../../../controllers/showController.php";



      if (!isset($_SESSION['adminname'])) {
          header("location: " . ADMINURL . "/admins/login-admins.php");
      }

      $actr=new GenreController(); 
      $allGenres=$actr->listeGenre();

      if (isset($_GET['id'])) {
          $id = $_GET['id'];

          $showsctr=new ShowController(); 
          $EditShow=$showsctr->getShowById($id);

      }
        

?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Shows</h5>
          <form method="POST" action="update-shows.php" enctype="multipart/form-data">
               
               <div class="form-outline mb-4 mt-4">
                  <input type="hidden" name="idE" value="<?php echo $id ;?>" id="form2Example1" class="form-control" placeholder="title" />
       
                </div>
                <div class="form-outline mb-4 mt-4">
                 <label for="exampleFormControlTextarea1">Title</label>
                  <input type="text" name="titleE" value="<?php echo $EditShow->title ;?>" id="form2Example1" class="form-control" placeholder="title" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">Image</label>
                    <input type="input" name="imageE" value="<?php echo $EditShow->image ;?>" id="form2Example1" class="form-control"  disabled />  
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control"  name="descriptionE" id="exampleFormControlTextarea1" rows="3"><?php echo $EditShow->description ;?></textarea>
                </div>
                <div class="form-outline mb-4 mt-4">
                    <label>Type</label>

                    <select name="typeE"  class="form-select  form-control" aria-label="Default select example">
                      <option value="<?php echo $EditShow->type ;?>" selected><?php echo $EditShow->type ;?></option>
                      <option value="Tv Series">Tv Series</option>
                      <option value="Movie">Movie</option>
                    </select>
                </div>
                <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">studios</label>
                  <input type="text" name="studiosE" value="<?php echo $EditShow->studios ;?>" id="form2Example1" class="form-control" placeholder="studios" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">date_aired</label>
                    <input type="text" name="date_airedE" value="<?php echo $EditShow->data_aired ;?>" id="form2Example1" class="form-control" placeholder="date_aired" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">status</label>
                    <input type="text" name="statusE" value="<?php echo $EditShow->status ;?>" id="form2Example1" class="form-control" placeholder="status" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">Genre</label>

                <select name="genreE" class="form-select form-control" aria-label="Default select example">
                    <?php foreach ($allGenres as $genre) : ?>
                        <option value="<?php echo $genre->name; ?>" <?php if ($EditShow->genre == $genre->name) echo 'selected'; ?>>
                            <?php echo $genre->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">duration</label>
                    <input type="text" name="durationE" value="<?php echo $EditShow->duration ;?>" id="form2Example1" class="form-control" placeholder="duration" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">Quality</label>
                    <input type="text" name="qualityE" value="<?php echo $EditShow->quality ;?>" id="form2Example1" class="form-control" placeholder="quality" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">Num_available</label>
                    <input type="text" name="num_availableE" value="<?php echo $EditShow->num_available ;?>" id="form2Example1" class="form-control" placeholder="num_available" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                <label for="exampleFormControlTextarea1">Num_Total</label>
                    <input type="text" name="num_totalE" value="<?php echo $EditShow->num_total ;?>" id="form2Example1" class="form-control" placeholder="num_total" />
                   
                </div>
              

                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit_edit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>


      <?php require "../layouts/footer.php" ; ?>