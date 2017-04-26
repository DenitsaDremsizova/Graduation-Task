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
                   <li><a href="TimelineController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" >Timeline</a></li>
                   <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" > About</a></li>
                   <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" class="active">Gallery</a></li>
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
                <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" > About</a></li>
                <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" class="active">Gallery</a></li>
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
    <?php include_once 'footer.php';?>

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


