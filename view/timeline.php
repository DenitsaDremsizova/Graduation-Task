<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="This is social network html5 template available in themeforest......" />
        <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
        <meta name="robots" content="index, follow" />
        <title>My Timeline | This is My Coolest Profile</title>

        <!-- Stylesheets
        ================================================= -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/ionicons.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link href="css/emoji.css" rel="stylesheet">

        <!--Favicon-->
        <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
    </head>
    <body>

        <!-- Header
        ================================================= -->
        <header id="header">
            <nav class="navbar navbar-default navbar-fixed-top menu">
                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index-register.php"><img src="images/logo.png" alt="logo" /></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right main-menu">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span><img src="images/down-arrow.png" alt="" /></span></a>
                                <ul class="dropdown-menu newsfeed-home">
                                    <li><a href="index.php">Landing Page 1</a></li>
                                    <li><a href="index-register.php">Landing Page 2</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Newsfeed <span><img src="images/down-arrow.png" alt="" /></span></a>
                                <ul class="dropdown-menu newsfeed-home">
                                    <li><a href="newsfeed.php">Newsfeed</a></li>
                                    <li><a href="newsfeed-people-nearby.php">Poeple Nearly</a></li>
                                    <li><a href="newsfeed-friends.php">My friends</a></li>
                                    <li><a href="newsfeed-messages.php">Chatroom</a></li>
                                    <li><a href="newsfeed-images.php">Images</a></li>
                                    <li><a href="newsfeed-videos.php">Videos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Timeline <span><img src="images/down-arrow.png" alt="" /></span></a>
                                <ul class="dropdown-menu login">
                                    <li><a href="timeline.php">Timeline</a></li>
                                    <li><a href="timeline-about.php">Timeline About</a></li>
                                    <li><a href="timeline-album.php">Timeline Album</a></li>
                                    <li><a href="timeline-friends.php">Timeline Friends</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Pages <span><img src="images/down-arrow.png" alt="" /></span></a>
                                <ul class="dropdown-menu page-list">
                                    <li><a href="index.php">Landing Page 1</a></li>
                                    <li><a href="index-register.php">Landing Page 2</a></li>
                                    <li><a href="newsfeed.php">Newsfeed</a></li>
                                    <li><a href="newsfeed-people-nearby.php">Poeple Nearly</a></li>
                                    <li><a href="newsfeed-friends.php">My friends</a></li>
                                    <li><a href="newsfeed-messages.php">Chatroom</a></li>
                                    <li><a href="newsfeed-images.php">Images</a></li>
                                    <li><a href="newsfeed-videos.php">Videos</a></li>
                                    <li><a href="timeline.php">Timeline</a></li>
                                    <li><a href="timeline-about.php">Timeline About</a></li>
                                    <li><a href="timeline-album.php">Timeline Album</a></li>
                                    <li><a href="timeline-friends.php">Timeline Friends</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="contact.php">Contact</a></li>
                        </ul>
                        <form class="navbar-form navbar-right hidden-sm">
                            <div class="form-group">
                                <i class="icon ion-android-search"></i>
                                <input type="text" class="form-control" placeholder="Search friends, photos, videos">
                            </div>
                        </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>
        <!--Header End-->

        <div class="container">

            <!-- Timeline
            ================================================= -->
            <div class="timeline">
                <div class="timeline-cover">

                    <!--Timeline Menu for Large Screens-->
                    <div class="timeline-nav-bar hidden-sm hidden-xs">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile-info">
                                    <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
                                    <h3>Sarah Cruiz</h3>
                                    <p class="text-muted">Creative Director</p>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <ul class="list-inline profile-menu">
                                    <li><a href="timeline.php" class="active">Timeline</a></li>
                                    <li><a href="timeline-about.php">About</a></li>
                                    <li><a href="timeline-album.php">Album</a></li>
                                    <li><a href="timeline-friends.php">Friends</a></li>
                                </ul>
                                <ul class="follow-me list-inline">
                                    <li>1,299 people following her</li>
                                    <li><button class="btn-primary">Add Friend</button></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--Timeline Menu for Large Screens End-->

                    <!--Timeline Menu for Small Screens-->
                    <div class="navbar-mobile hidden-lg hidden-md">
                        <div class="profile-info">
                            <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
                            <h4>Sarah Cruiz</h4>
                            <p class="text-muted">Creative Director</p>
                        </div>
                        <div class="mobile-menu">
                            <ul class="list-inline">
                                <li><a href="timline.php" class="active">Timeline</a></li>
                                <li><a href="timeline-about.php">About</a></li>
                                <li><a href="timeline-album.php">Album</a></li>
                                <li><a href="timeline-friends.php">Friends</a></li>
                            </ul>
                            <button class="btn-primary">Add Friend</button>
                        </div>
                    </div><!--Timeline Menu for Small Screens End-->

                </div>
                <div id="page-contents">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">

                            <!-- Post Create Box
                            ================================================= -->
                            <div class="create-post">
                                <div class="row">
                                    <div class="col-md-7 col-sm-7">
                                        <div class="form-group">
                                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-md" />
                                            <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <div class="tools">
                                            <ul class="publishing-tools list-inline">
                                                <li><a href="#"><i class="ion-compose"></i></a></li>
                                                <li><a href="#"><i class="ion-images"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                                                <li><a href="#"><i class="ion-map"></i></a></li>
                                            </ul>
                                            <button class="btn btn-primary pull-right">Publish</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Post Create Box End-->



                            <!-- Post Content
                            ================================================= -->
                            <div id="timeline-content">                               
                            </div>

                        </div>
                    </div>
                </div> 


                <!-- Footer
                ================================================= -->
                <footer id="footer">
                    <div class="container">
                        <div class="row">
                            <div class="footer-wrapper">
                                <div class="col-md-3 col-sm-3">
                                    <a href=""><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
                                    <ul class="list-inline social-icons">
                                        <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
                                        <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                                        <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <h6>For individuals</h6>
                                    <ul class="footer-links">
                                        <li><a href="">Signup</a></li>
                                        <li><a href="">login</a></li>
                                        <li><a href="">Explore</a></li>
                                        <li><a href="">Finder app</a></li>
                                        <li><a href="">Features</a></li>
                                        <li><a href="">Language settings</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <h6>For businesses</h6>
                                    <ul class="footer-links">
                                        <li><a href="">Business signup</a></li>
                                        <li><a href="">Business login</a></li>
                                        <li><a href="">Benefits</a></li>
                                        <li><a href="">Resources</a></li>
                                        <li><a href="">Advertise</a></li>
                                        <li><a href="">Setup</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <h6>About</h6>
                                    <ul class="footer-links">
                                        <li><a href="">About us</a></li>
                                        <li><a href="">Contact us</a></li>
                                        <li><a href="">Privacy Policy</a></li>
                                        <li><a href="">Terms</a></li>
                                        <li><a href="">Help</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <h6>Contact Us</h6>
                                    <ul class="contact">
                                        <li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
                                        <li><i class="icon ion-ios-email-outline"></i>info@thunder-team.com</li>
                                        <li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright">
                        <p>Thunder Team © 2016. All rights reserved</p>
                    </div>
                </footer>

<!--                preloader
                <div id="spinner-wrapper">
                    <div class="spinner"></div>
                </div>-->

                <!-- Scripts
                ================================================= -->
                <script src="js/jquery-3.1.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery.sticky-kit.min.js"></script>
                <script src="js/jquery.scrollbar.min.js"></script>
                <script src="js/script.js"></script>
                <script src="../assets/js/posts.js" type="text/javascript"></script>

                </body>
                </html>
