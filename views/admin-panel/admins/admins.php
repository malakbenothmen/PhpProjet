<?php require "../layouts/header.php" ; 
require "../../../controllers/adminController.php";


    if (!isset($_SESSION['adminname']))
    {header("location: ". ADMINURL."/admins/login-admins.php");
        
    }


      $actr=new AdminController();

      $allAdmins=$actr->listerAdmin();


 


?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">AdminName</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allAdmins as $admin) : ?>
                  <tr>
                    <th scope="row"><?php echo $admin->id ; ?></th>
                    <td><?php echo $admin->adminname ; ?></td>
                    <td><?php echo $admin->email ; ?></td>
                  </tr>
                  <?php endforeach ; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



      <?php require "../layouts/footer.php" ; ?>