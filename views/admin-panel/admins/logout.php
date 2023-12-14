<?php 
     

     session_start();
     session_unset();
     session_destroy();
     ob_end_flush(); 
     header("Location: http://localhost/malak/mini-projet/MVC-anime/views/admin-panel/admins/login-admins.php");
?>