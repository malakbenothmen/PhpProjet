<?php require "../layouts/header.php" ;
require "../../../models/show.php";
require "../../../controllers/showController.php";
require "../../../controllers/genreController.php";

    if (!isset($_SESSION['adminname']))
    {
      header("location: ". ADMINURL."/admins/login-admins.php");
    }
    $actr=new GenreController(); 
    $genres=$actr->listeGenre();

    if(isset($_POST['submit']))
    { 
    if(empty($_POST['title']) || empty($_POST['description']) 
    || empty($_POST['genre']) || empty($_POST['type']) || empty($_POST['status'])
    || empty($_POST['studios']) || empty($_POST['num_available']) || empty($_POST['num_total'])
    || empty($_POST['data_aired']) || empty($_POST['duration']) || empty($_POST['quality'])){
        echo "<script>alert('one or more inputs are empty')</script>";
    }
    else
    {
        $title=$_POST['title'];
        $description =$_POST['description'];
        $genre=$_POST['genre'];
        $type =$_POST['type'];
        $status =$_POST['status'];
        $studios =$_POST['studios'];
        $data_aired =$_POST['data_aired'];
        $num_available =$_POST['num_available'];
        $num_total =$_POST['num_total'];
        $duration =$_POST['duration'];
        $quality =$_POST['quality'];
        $image =$_FILES['image']['name'];

        $dir="img/" . basename($image);


        $show= new Show($title, $image, $description,$type,
        $studios,$data_aired,$status,$genre,$duration,
        $quality,$num_available,$num_total,);
        
        $actr=new ShowController();
        $actr->insertShow($show);
        
        if(move_uploaded_file($_FILES['image']['tmp_name'], $dir))
       {
                
        header("location: show-shows.php");
        exit();
       }

    }
    }






?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Shows</h5>
          <form method="POST" action="create-shows.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                    <input type="file" name="image" id="form2Example1" class="form-control"  />
                   
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-outline mb-4 mt-4">

                    <select name="type" class="form-select  form-control" aria-label="Default select example">
                      <option selected>Choose Type</option>
                      <option value="Tv Series">Tv Series</option>
                      <option value="Movie">Movie</option>
                    </select>
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="studios" id="form2Example1" class="form-control" placeholder="studios" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="data_aired" id="form2Example1" class="form-control" placeholder="date_aired" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="status" id="form2Example1" class="form-control" placeholder="status" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">

                <select name="genre" class="form-select form-control" aria-label="Default select example">
                    <option selected>Choose Genre</option>  
                    <?php foreach($genres as $genre) : ?>
                        <option value="<?php echo $genre->name ?>"><?php echo $genre->name ?></option>
                    <?php endforeach; ?>
                </select>

                </div>
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="duration" id="form2Example1" class="form-control" placeholder="duration" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="quality" id="form2Example1" class="form-control" placeholder="quality" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="num_available" id="form2Example1" class="form-control" placeholder="num_available" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="num_total" id="form2Example1" class="form-control" placeholder="num_total" />
                   
                </div>
              

                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>


      <?php require "../layouts/footer.php" ; ?>