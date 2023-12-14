<?php require "../layouts/header.php" ; 
require "../../../models/genre.php";
require "../../../controllers/genreController.php";


        if (!isset($_SESSION['adminname']))
        {
          header("location: ". ADMINURL."/admins/login-admins.php");
        }

        if(isset($_POST['submit']))
        { 
        if(empty($_POST['name']) ){
            echo "<script>alert('input is empty')</script>";
        }
        else
        {
            $name=$_POST['name'];
            
            $genre= new Genre($name);
            $actr=new GenreController();
            $insert = $actr->insert($genre);
            
            header("location: show-genres.php");
            exit();
        }
        }



?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Genres</h5>
          <form method="POST" action="create-genres.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
              
          
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php" ; ?>