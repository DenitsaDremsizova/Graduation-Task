<!DOCTYPE html>
<html lang="en">
    <?php include_once 'header.php'; ?>

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
          <input type="hidden" name="getId" id="getId" value="<?=$getId?>">
        <div class="timeline-cover" id="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                    <div id="profile-photo-large-scr">
                  <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo"/>
                    </div>
                  <h3>Sarah Cruiz</h3>
                  <p class="text-muted">Creative Director</p>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                   <li><a href="TimelineController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Timeline</a></li>
                   <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" class="active"> About</a></li>
                   <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Gallery</a></li>
                   <li><a href="VideosController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Videos</a></li>
                   <li><a href="Timeline-friendsController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Friends</a></li>
                </ul>
                <ul class="follow-me list-inline">
                  
                  <li></li>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
                <div id="profile-photo-small-scr">
              <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo"/>
                </div>
              <h4>Sarah Cruiz</h4>
              <p class="text-muted">Creative Director</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="TimelineController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Timeline</a></li>
                <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" class="active"> About</a></li>
                <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Gallery</a></li>
                <li><a href="VideosController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Videos</a></li>
                <li><a href="Timeline-friendsController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Friends</a></li>
              </ul>
              
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
               
                <p class="novclas" id="testId"></p>
              <!-- Photo Album
              ================================================= -->
              <ul class="album-photos" id="album-photos">
                
              </ul>
            </div>
            <div class="col-md-2 static">
              <div id="sticky-sidebar">
                
              </div>
            </div>
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
    
    <!--preloader-->
<!--    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>-->

    <!-- Scripts
    ================================================= -->
    <script src="../view/js/jquery-3.1.1.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/js/jquery.sticky-kit.min.js"></script>
    <script src="../view/js/jquery.scrollbar.min.js"></script>
    <script src="../view/js/script.js"></script>
    <script src="../assets/js/profile-pic.js" type="text/javascript"></script>
    <script src="../assets/js/gallery.js" type="text/javascript"></script>

  </body>
</html>

    Contact GitHub API Training Shop Blog About 

    © 2017 GitHub, Inc. Terms Privacy Security Status Help 

