<?php require "../layouts/header.php" ; 
require "../../../controllers/adminController.php";


       if (isset($_SESSION['adminname']))
        {header("location: ". ADMINURL."");
            
        }



        if (isset($_POST['submit']))
        {
        if(empty($_POST['email']) || empty($_POST['password'])){
        echo "<script>('one or more inputs are empty')</script>";
        }
        else
        {  
        $email=$_POST['email'];
        $password = $_POST['password'];

        $actr=new AdminController();

        $fetch=$actr->getAdminByEmail($email);

        if($fetch)
        {
            if (password_verify($password,$fetch['password']))
            {
                $_SESSION['adminname']= $fetch['adminname'];
                $_SESSION['email']= $fetch['email'];
                $_SESSION['admin_id']= $fetch['id'];
                header("location: ".ADMINURL."");
                //echo "<script>alert('LOGED IN')</script>";
            }else{
                echo "<script>alert('password is wrong')</script>";
            }
        } else {
            echo "<script> alert('email is wrong')</script>";
        }
        }
        

        }




?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
 
     <?php require "../layouts/footer.php" ; ?>