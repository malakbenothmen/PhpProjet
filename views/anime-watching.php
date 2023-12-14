<?php require "includes/header.php";
require "../controllers/showController.php";
require "../controllers/episodeController.php";
require "../models/comments.php";
require "../controllers/commentController.php";

        if(isset($_GET['id']) || isset($_GET['ep'])){


            $id=$_GET['id'];
            $ep=$_GET['ep'];

            $epctr = new EpisodeController();
            $allEpisodes=$epctr->oneShowEpisodes($id);

            $singleEpisode=$epctr->oneShowOneEp($id,$ep);

    
            $showctr=new ShowController();
            $singleShow=$showctr->getShowById($id);


            //comments

            $cmntctr = new CommentController();
            $allComments = $cmntctr->getCommentsByShow($id);

            //insert comments
        if (isset($_POST['inserting_comments']))
        {
            if(empty($_POST['comment']) )
                {echo "<script>alert('comment is  empty');</script>";}
        else {

            $mycomment=$_POST['comment'];
            $show_id=$_POST['show_id'];
            $user_id=$_SESSION['user_id'];
            $user_name=$_SESSION['username'];

            $com= new Comment($user_name,$show_id,$user_id,$mycomment);
            $cmntctr->insertComment($com);

            header("location: anime-watching.php?id=".$id."&ep=".$ep."");
        }
        }
        }



?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="<?php echo APPURL ;?>/index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="<?php echo APPURL ;?>/categories.php?name=<?php echo $singleShow->genre; ?> ">Categories</a>
                        <a href="#"><?php echo $singleShow->genre; ?> </a>
                        <span><?php echo $singleShow->title; ?> </span>
                        <?php if($singleEpisode!=null) : ?>
                        <span>EP <?php echo $singleEpisode->name; ?> </span>
                        <?php endif ; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <video id="player" playsinline controls data-poster="<?php echo APPURL ; ?>/videos/<?php echo $singleEpisode->thumbnail ; ?>">
                            <source src="<?php echo APPURL ; ?>/videos/<?php echo $singleEpisode->video ; ?>" type="video/mp4" />
                            <!-- Captions are optional -->
                            <!--<track kind="captions" label="English captions" src="#" srclang="en" default />-->
                        </video>
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>List Episodes</h5>
                        </div>
                        <?php if($singleEpisode!=null) : ?>
                        <?php foreach($allEpisodes as $episode) : ?>
                            <a href="<?php echo APPURL;?>/anime-watching.php?id=<?php echo $episode->show_id; ?>&ep=<?php echo $episode->name; ?>">Ep <?php echo $episode->name ; ?></a>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <p>no episodes yet </p>

                        <?php endif ; ?>
                    </div>
                </div>
            </div>


                        <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Comments</h5>
                        </div>
                       <!-- <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="img/anime/review-1.jpg" alt="">
                            </div>-->
                            <?php foreach($allComments as $comment) : ?>
                            <div class="anime__review__item__text">
                                <h6><?php echo $comment->user_name; ?> - <span><?php echo $comment->created_at; ?></span></h6>
                                <p><?php echo $comment->comment; ?></p>
                            </div>
                            <?php endforeach ; ?>
                        </div>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form method="POST" action="<?php echo APPURL ; ?>/anime-watching.php?id=<?php echo $id; ?>&ep=<?php echo $ep; ?>">
                                <textarea name="comment" placeholder="Your Comment"></textarea>
                                <input type="hidden" name="show_id" value="<?php echo $id;?>">
                                <button name="inserting_comments" type="submit"><i class="fa fa-location-arrow"></i> Comment</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
    <?php require "includes/footer.php";?>