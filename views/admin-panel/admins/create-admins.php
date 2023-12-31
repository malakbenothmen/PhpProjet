<?php require "../layouts/header.php" ; 
require "../../../models/admin.php";
require "../../../controllers/adminController.php";


   if (!isset($_SESSION['adminname']))
    {
      header("location: ". ADMINURL."/admins/login-admins.php");
    }

    if(isset($_POST['submit']))
    { 
    if(empty($_POST['email']) || empty($_POST['adminname']) || empty($_POST['password'])){
        echo "<script>alert('one or more inputs are empty')</script>";
    }
    else
    {
        $email=$_POST['email'];
        $adminname =$_POST['adminname'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $admin= new Admin($adminname,$email,$password);
        $actr=new adminController();
        $insert = $actr->insert($admin);
        
        header("location: admins.php");
        exit();
    }
    }



?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="adminname" id="form2Example1" class="form-control" placeholder="username" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>

               
            
                
              


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

      <?php require "../layouts/footer.php" ; ?>