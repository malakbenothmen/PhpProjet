<?php require "includes/header.php";

require "../controllers/showController.php";


    $showsctr=new ShowController(); 

    $allShows =$showsctr->SlideShows();
   //TRanding shows
    $allTrendingShows = $showsctr->TrandShows();

    //Adventure shows
    $allAdventureShows = $showsctr->getShowsByGenre('Adventure');
    //AdRecentlyAdded shows
 
    $allRecentlyAddShows = $showsctr->RecentShows();
    //Action shows

    $allActionShows=$showsctr->getShowsByGenre('Action');

    //ForYou shows
    $allForYouShows= $showsctr->listeForYouShows();


?>


    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <?php foreach ($allShows as $show) : ?>
                <div class="hero__items set-bg" data-setbg="img/live/<?php echo $show->image ; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label"><?php echo $show->genre; ?></div>
                                <h2><?php echo $show->title ; ?></h2>
                                <p><?php echo $show->description; ?></p>
                                <a href="anime-watching.php?id=<?php echo $show->id; ?>&ep=1"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           <?php foreach($allTrendingShows as $trendingShow) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/hero/<?php echo $trendingShow->image ; ?>">
                                        <div class="ep"><?php echo $trendingShow->num_available ; ?> / <?php echo $trendingShow->num_total ; ?></div>
                                        <div class="view"><i class="fa fa-eye"></i> <?php echo $trendingShow->count_views ; ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo $trendingShow->genre ; ?></li>
                                            <li><?php echo $trendingShow->type ; ?></li>
                                        </ul>
                                        <h5><a href="anime-details.php?id=<?php echo $trendingShow->id ; ?>"><?php echo $trendingShow->title ; ?></a></h5>
                                    </div>
                                </div>
                            </div>
                             <?php endforeach; ?>


                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Adventure Shows</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="<?php echo APPURL ; ?>/categories.php?name=Adventure" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach($allAdventureShows as $adventureShow) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/hero/<?php echo $adventureShow->image ; ?>">
                                        <div class="ep"><?php echo $adventureShow->num_available ; ?> / <?php echo $adventureShow->num_total ; ?></div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i><?php echo $adventureShow->count_views ; ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo $adventureShow->genre ; ?></li>
                                            <li><?php echo $adventureShow->type ; ?></li>
                                        </ul>
                                        <h5><a href="anime-details.php?id=<?php echo $adventureShow->id ; ?>"><?php echo $adventureShow->title ; ?></a></h5>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Recently Added Shows</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php foreach($allRecentlyAddShows as $recentlyAddShow) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/hero/<?php echo $recentlyAddShow->image ; ?>">
                                        <div class="ep"><?php echo $recentlyAddShow->num_available ; ?> / <?php echo $recentlyAddShow->num_total ; ?></div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> <?php echo $recentlyAddShow->count_views ; ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo $recentlyAddShow->genre ; ?></li>
                                            <li><?php echo $recentlyAddShow->type ; ?></li>
                                        </ul>
                                        <h5><a href="anime-details.php?id=<?php echo $recentlyAddShow->id; ?>"><?php echo $recentlyAddShow->title ; ?></a></h5>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="live__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Live Action</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="<?php echo APPURL ; ?>/categories.php?name=Action" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach($allActionShows as $actionShow) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/hero/<?php echo $actionShow->image ; ?>">
                                        <div class="ep"><?php echo $actionShow->num_available ; ?> / <?php echo $actionShow->num_total ; ?></div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> <?php echo $actionShow->count_views ; ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo $actionShow->genre ; ?></li>
                                            <li><?php echo $actionShow->type ; ?></li>
                                        </ul>
                                        <h5><a href="anime-details.php?id=<?php echo $actionShow->id ; ?>"><?php echo $actionShow->title ; ?></a></h5>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
         
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
        </div>
    </div>
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>For You</h5>
        </div>
        <?php foreach($allForYouShows as $foryouShow) : ?>
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img style="width: 90px; height: 120px" src="img/hero/<?php echo $foryouShow->image; ?>" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li><?php echo $foryouShow->genre; ?></li>
                    <li><?php echo $foryouShow->type; ?></li>
                </ul>
                <h5><a href="#"><?php echo $foryouShow->title; ?></a></h5>
                <span><i class="fa fa-eye"></i> <?php echo $foryouShow->count_views; ?> Viewes</span>
            </div>
        </div>
        <?php endforeach; ?>

        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
<!-- Product Section End -->

<?php require "includes/footer.php";?>