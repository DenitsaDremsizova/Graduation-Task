<!DOCTYPE html>
<html lang="en">
    <?php include_once 'header.php'; ?>

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
                                    <h3><?= $timelineName ?></h3>
                                    <p class="text-muted"><?=$timelineAddress?></p>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <ul class="list-inline profile-menu">
                                      <li><a href="TimelineController.php" class="active">Timeline</a></li>
					                  <li><a href="AboutController.php">About</a></li>
					                  <li><a href="GalleryController.php">Gallery</a></li>
					                  <li><a href="VideosController.php">Videos</a></li>
					                  <li><a href="Timeline-friendsController.php">Friends</a></li>
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
                            <h4><?= $timelineName ?></h4>
                            <p class="text-muted"><?=$timelineAddress?>r</p>
                        </div>
                        <div class="mobile-menu">
                            <ul class="list-inline">
                                      <li><a href="TimelineController.php" class="active">Timeline</a></li>
					                  <li><a href="AboutController.php" >About</a></li>
					                  <li><a href="GalleryController.php">Gallery</a></li>
					                  <li><a href="VideosController.php">Videos</a></li>
					                  <li><a href="FriendsController.php">Friends</a></li>
                            </ul>
                            <button class="btn-primary">Add Friend</button>
                        </div>
                    </div><!--Timeline Menu for Small Screens End-->

                </div>
                <div id="page-contents">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">

                            
                            <!-- Upload Forms
                           ================================================= -->                
                            <?php
                            createUploadForm("photo", $userId, $timelineId);
                            createUploadForm("video", $userId, $timelineId);
                            ?> 

                            <!-- Post Create Box
                            ================================================= -->
                            <div class="create-post">
                                <div class="row">
                                    <div class="col-md-7 col-sm-7">
                                        <div class="form-group">                                                       

                                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-md" />
                                            <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish" required></textarea>
                                            <input type="hidden" value="<?php echo $userId; ?>" id="authorId"/>
                                            <input type="hidden" value="<?php echo $timelineId; ?>" id="timelineId"/>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <div class="tools">
                                            <ul class="publishing-tools list-inline">
<!--                                                <li><a href="#"><i class="ion-compose"></i></a></li>-->
                                                <li><a href="#" ><i class="ion-images" id="add-photo-btn" title="Upload Picture"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-videocam" id="add-video-btn" title="Upload Video"></i></a></li>
                                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
<!--                                                <li><a href="#"><i class="ion-map"></i></a></li>-->
                                            </ul>
                                            <button class="btn btn-primary pull-right" onclick="addNewPost()">Publish</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Post Create Box End-->
                            
                            <!-- Error Message
                            ================================================= -->
                            <div id="tl-error-msg-box">
                                <?php echo $errorMsg ?>
                            </div>


                            <!-- Post Content
                            ================================================= -->
                            <div id="new-post"></div>
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
                                    <a href=""><img src="../view/images/logo-black.png" alt="" class="footer-logo" /></a>
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

                <script src="../view/js/jquery-3.1.1.min.js"></script>
                <script src="../view/js/bootstrap.min.js"></script>
                <script src="../view/js/jquery.sticky-kit.min.js"></script>
                <script src="../view/js/jquery.scrollbar.min.js"></script>
                <script src="../view/js/script.js"></script>
                <script src="../assets/js/posts.js" type="text/javascript"></script>
                <script src="../assets/js/timeline-modal-form.js" type="text/javascript"></script>                

                </body>
                </html>
