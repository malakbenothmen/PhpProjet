<?php 
    ob_start();
    session_start();
    
    define("APPURL", "http://localhost/malak/mini-projet/MVC-anime/views");



    require_once(__DIR__ . '/../../controllers/genreController.php');


    $actr=new GenreController(); 
    $allCategories=$actr->listeGenre();

   

 ?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="<?php echo APPURL; ?>">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="<?php echo APPURL; ?>">Homepage</a></li>
                                <li><a href="#">Categories <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">

                                        <?php foreach($allCategories as $category): ?>
                                            <li><a href="<?php echo APPURL ; ?>/categories.php?name=<?php echo $category->name ; ?>"><?php echo $category->name ; ?></a></li> 
                                        <?php endforeach; ?>

                        
                                    </ul>
                   
                                </li>
                               <?php if(isset($_SESSION['username'])) : ?>
                                     <li><a href="#"><?php echo $_SESSION['username']; ?><span class="arrow_carrot-down"></span></a>
                                     <ul class="dropdown">
                                         <li><a href="<?php echo APPURL; ?>/users/followings.php">Followings List</a></li> 
                                        <li><a href="<?php echo APPURL; ?>/auth/logout.php">logout</a></li>
                                     </ul>

                               </li>
                               <?php endif; ?>
                             <?php if(!isset($_SESSION['username'])) :?>
                                <li><a href="<?php echo APPURL; ?>/auth/login.php"><span class="icon_profile"></span> Log IN</a></li>
                            <?php endif; ?>
                    
                                
                            </ul>

                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                    <form action="<?php echo APPURL ; ?>/search.php" method="POST" class="d-flex" role="search">
                        <input name="keyword" style="margin-left: -150px;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button name="submit" style=" margin-left:4px; background-color: red ; outline : none ;" class="btn btn-outline text-white" type="submit">Search</button>
                    </form>

                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
