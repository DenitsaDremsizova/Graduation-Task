<!DOCTYPE html>
<html lang="en">
<?php 
		include_once 'header.php';
	?>

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
                  <h4>
                  <?php
                  if(!((empty($userData[0]['first_name'])) && ((empty([0]['last_name']))))) {
	                  	echo $userData[0]['first_name'] . " " . $userData[0]['last_name'];
		              echo "</h4>";
		              echo "<p>"  . 'Age: <strong>' . $age . "</strong></p>";
		              if(!empty($userAddress[0]['country']) && !empty($userAddress[0]['country'])) {
		             	 echo "<p>Country: <strong>"  . $userAddress[0]['country']. "</strong></br> " . 
		             	 "City: <strong>" . $userAddress[0]['city']. "</strong></p>";
		              }
                  }
                  ?>
                  
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                   <li><a href="TimelineController.php">Timeline</a></li>
                  <li><a href="AboutController.php" >About</a></li>
                  <li><a href="GalleryController.php">Gallery</a></li>
                  <li><a href="VideosController.php">Videos</a></li>
                  <li><a href="Timeline-friendsController.php"class="<?php if(empty($search)) { echo 'active'; }?>">Friends</a></li>
                  <li><a onmouseover="this.style.cursor='pointer'" onclick="this.className = 'active',reloadRequestTable()">Friends Requests <span style="color:red"><?php echo $userFriendsRequests[0]['count']; ?></span></a></li>
                </ul>
                <ul class="follow-me list-inline">
                  <li><?php if(!empty($userFollowers)) {
                  	echo $userFollowers[0]['count'];
                  }?> Friends</li>
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
                 <li><a href="TimelineController.php">Timeline</a></li>
                  <li><a href="AboutController.php">About</a></li>
                  <li><a href="GalleryController.php">Gallery</a></li>
                  <li><a href="VideosController.php">Videos</a></li>
                  <li><a href="Timeline-friendsController.php" class="<?php if(empty($search)) { echo 'active'; }?>" >Friends</a></li>
              </ul>
              <button class="btn-primary">Add Friend</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- Friend List
              ================================================= -->
              <div class="friend-list">
                <div class="row" id="friends-request-table">                                  
                  <!-- data derived from friends.js -->
                                        
                </div>
              </div>   
              <div class="friend-list">
                <div class="row" id="friends-table">                                  
                  <!-- data derived from friends.js -->
                                        
                </div>
              </div>            
            </div>
            
            <!-- Side Article -->
            <div class="col-md-2 static">
              <div id="sticky-sidebar">               
                  </div>
                  <div class="live-activity">          
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

    <!-- Scripts
    ================================================= -->
    <script src="../view/js/jquery-3.1.1.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/js/jquery.sticky-kit.min.js"></script>
    <script src="../view/js/jquery.scrollbar.min.js"></script>
    <script src="../view/js/script.js"></script>
    
    <script src="../assets/js/friends.js"></script>
    <script src="../assets/js/search.js"></script>
  </body>
</html>
