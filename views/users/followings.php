<?php require "../includes/header.php";
require "../../controllers/followingController.php";




    if (!isset($_SESSION['username']))
        {header("location: ". APPURL."");
            
        }

    $user_id=$_SESSION['user_id'];
    $followctr=new FollowingController(); 
   $allFollowings=$followctr->getFollowingListByUser($user_id);

?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="<?php echo APPURL ; ?>/index.php"><i class="fa fa-home"></i> Home</a>

                        <span>Followings</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Followings</h4>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="row">
                        <?php if (count($allFollowings)>0) : ?>
                                    <?php foreach($allFollowings as $show) : ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="<?php echo APPURL ; ?>/img/hero/<?php echo $show->image; ?>">
                                                <div class="ep"><?php echo $show->num_available; ?> / <?php echo $show->num_total; ?></div>
                                                <div class="comment"><i class="fa fa-comments"></i> 11</div>

                                            </div>
                                            <div class="product__item__text">
                                                <ul>
                                                    <li><?php echo $show->genre; ?></li>
                                                    <li><?php echo $show->type; ?></li>
                                                </ul>
                                                <h5><a href="./anime-details.php?id=<?php echo $show->id; ?>"><?php echo $show->title; ?></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p class="text-white">No shows in this genre just yet </p>
                            <?php endif; ?>
                    </div>
                   
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                        </div>
                    <!-- </div>
                </div>         -->
    </div>
   
</div>
</div>
</div>
</div>
</section>
<!-- Product Section End -->

<?php require "../includes/footer.php";?>