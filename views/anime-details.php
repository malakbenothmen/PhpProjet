
<?php require "includes/header.php";
require "../models/comments.php";
require "../models/following.php";
require "../models/view.php";
require "../controllers/showController.php";
require "../controllers/commentController.php";
require "../controllers/followingController.php";
require "../controllers/viewController.php";

    if (!isset($_SESSION['username']))
    {
        echo "<script>alert('you should logIn before !! ');
        window.location.href = '" . APPURL . "';</script>";
        
        
    }

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];

        $showsctr=new ShowController();
        $commentsctr=new CommentController();
        $followctr=new FollowingController();
        $viewctr = new ViewController();
        
        $singleShow = $viewctr->viewsByShow($id);


    //you might like ..
     $allForYouShows= $showsctr->listeForYouShows();
    //comments
    $allComments = $commentsctr->getCommentsByShow($id);

    //following

    if(isset($_POST['submit']))
    {
        $show_id=$_POST['show_id'];
        $user_id=$_POST['user_id'];

       $follow= new Following($show_id, $user_id);
       $followctr->insertFollow($follow);

       echo "<script>alert('you followed the show');</script>";

       header("location: anime-details.php?id=".$id);
        
        
    }
    //checking if user followed a show
    
    $checkFollowing = $followctr->checkFollowUser($id,$_SESSION['user_id']);

    //insert comments
    if (isset($_POST['inserting_comments']))
    {
        if(empty($_POST['comment']) )
            {echo "<script>alert('comment is  empty');</script>";}
    else {

        $mycomment=$_POST['comment'];
        $show_id=$id;
        $user_id=$_SESSION['user_id'];
        $user_name=$_SESSION['username'];

        $com= new Comment($user_name,$show_id,$user_id,$mycomment);
        $commentsctr->insertComment($com);

        //echo "<script>alert('comment add');</script>";
        header("location: anime-details.php?id=".$id);
    }
    }


    //checking if user viewed this page or not 
    $checkView = $viewctr->checkUserView($id,$_SESSION['user_id']);
    
    if ($checkView->rowCount() == 0) {

        $view= new View($id,$_SESSION['user_id']);
        $viewctr->insertView($view);
 
    }
    


    }



?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./anime-details.php?id=<?php echo $singleShow->id ;?>">Details</a>
                        <span><?php echo $singleShow->title ;?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="img/hero/<?php echo $singleShow->image ; ?>">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i><?php echo $singleShow->count_views; ?></div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?php echo $singleShow->title ; ?></h3>
                            </div>
                           
                            <p><?php echo $singleShow->description; ?></p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> <?php echo $singleShow->type ; ?></li>
                                            <li><span>Studios:</span> <?php echo $singleShow->studios ; ?></li>
                                            <li><span>Date aired:</span><?php echo $singleShow->date_aired ; ?></li>
                                            <li><span>Status:</span> <?php echo $singleShow->status ; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Genre:</span> <?php echo $singleShow->genre ; ?></li>

                                            <li><span>Duration:</span> <?php echo $singleShow->duration ; ?></li>
                                            <li><span>Quality:</span><?php echo $singleShow->quality ; ?></li>
                                            <li><span>Views:</span> <?php echo $singleShow->count_views ; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                            <form method="POST" action="anime-details.php?id=<?php echo $id ; ?>" >
                                    <input type="hidden" value="<?php echo $id ; ?>" name="show_id">
                                    <input type="hidden" value="<?php echo $_SESSION['user_id'] ; ?>" name="user_id">
                                            <?php if($checkFollowing) : ?>
                                                <button name="submit" type="submit"  class="follow-btn" disabaled><i class="fa fa-heart-o"></i> Followed</button>
                                            <?php else : ?>   
                                            
                                                <button name="submit" type="submit"  class="follow-btn"><i class="fa fa-heart-o"></i> Follow</button>
                                            <?php endif ; ?>
                                            <a href="anime-watching.php?id=<?php echo $id; ?>&ep=1" class="watch-btn"><span>Watch Now</span> <i
                                            class="fa fa-angle-right"></i></a>
                                        
                                </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Reviews</h5>
                            </div>
                            <?php foreach($allComments as $comment) : ?> 
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="img/anime/review-1.jpg" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6><?php echo $comment->user_name ;?>- <span><?php echo $comment->created_at ;?></span></h6>
                                    <p><?php echo $comment->comment;?></p>
                                </div>
                            </div>
                            <?php endforeach ; ?>
                           
                        </div>
                        <div class="anime__details__form">
                            <div class="section-title">
                                <h5>Your Comment</h5>
                            </div>
                            <form method="POST" action="<?php echo APPURL ; ?>/anime-details.php?id=<?php echo $id; ?>">
                                <textarea name="comment" placeholder="Your Comment"></textarea>
                                <button name="inserting_comments" type="submit"><i class="fa fa-location-arrow"></i> Comment</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="anime__details__sidebar">
                            <div class="section-title">
                                <h5>you might like...</h5>
                            </div>
                            <?php foreach($allForYouShows as $allForYouShow) : ?>
                                    <div class="product__sidebar__view__item set-bg" data-setbg="img/hero/<?php echo $allForYouShow->image ; ?>">
                                        <div class="ep"><?php echo $allForYouShow->num_available ; ?> / <?php echo $allForYouShow->num_total ; ?></div>
                                        <div class="view"><i class="fa fa-eye"></i> <?php echo $allForYouShow->count_views ; ?></div>
                                        <h5><a href="anime-details.php?id=<?php echo $allForYouShow->id ; ?>"><?php echo $allForYouShow->title ; ?></a></h5>
                                    </div>
                            <?php endforeach; ?>
                    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anime Section End -->

        <?php require "includes/footer.php";?>