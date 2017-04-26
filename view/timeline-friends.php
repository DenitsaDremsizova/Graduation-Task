<!DOCTYPE html>
<html lang="en">
<?php 
		include_once 'header.php';
	?>

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <input type="hidden" name="getId" id="getId" value="<?=$getId?>">
        <div class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                   <div id="profile-photo-large-scr"> 
                        <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
                   </div>
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
                   <li><a href="TimelineController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Timeline</a></li>
                  <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" >About</a></li>
                  <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Gallery</a></li>
                  <li><a href="VideosController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Videos</a></li>
                  <li><a href="Timeline-friendsController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>"class="<?php if(empty($search)) { echo 'active'; }?>">Friends</a></li>
                  <?php if ($userId === $getId){?>
                  <li><a onmouseover="this.style.cursor='pointer'" onclick="this.className = 'active',reloadRequestTable()">Friends Requests <span style="color:red"><?php echo $userFriendsRequests[0]['count']; ?></span></a></li>
                  <?php } ?>
                </ul>
                <ul class="follow-me list-inline">
                  <li><?php if(!empty($userFollowers)) {
                  	echo $userFollowers[0]['count'];
                  }?> Friends</li>
                  <?php 
                  if ($getId !== $userId) {
                  	if(!$checkIfInFriendRequestList && !$checkIfInFriendsList) {
                  ?>
                  <li><button class="btn-primary" onclick='sendFriendRequest(<?= $getId ?>)'>Add Friend</button></li>
        			<?php }
        			if($checkIfInFriendsList) {
        			?>
                   <li><button class="btn-primary" style="background-color:red" onclick='deleteFriend(<?= $getId; ?>)'>Delete Friend</button></li>
          			<?php }}
          			?>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
                <div id="profile-photo-small-scr">
                    <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
                </div>
              <h4> <?php
                  if(!((empty($userData[0]['first_name'])) && ((empty([0]['last_name']))))) {
	                  	echo $userData[0]['first_name'] . " " . $userData[0]['last_name'];
		              echo "</h4>";
		              }
                  ?>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                 <li><a href="TimelineController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Timeline</a></li>
                  <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">About</a></li>
                  <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Gallery</a></li>
                  <li><a href="VideosController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Videos</a></li>
                  <li><a href="Timeline-friendsController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" class="<?php if(empty($search)) { echo 'active'; }?>" >Friends</a></li>
             
               <?php 
                  if ($getId !== $userId) {
                  	if(!$checkIfInFriendRequestList && !$checkIfInFriendsList) {
                  ?>
                  <li><button class="btn-primary" onclick='sendFriendRequest(<?= $getId ?>)'>Add Friend</button></li>
        			<?php }
        			if($checkIfInFriendsList) {
        			?>
                   <li><button class="btn-primary" style="background-color:red" onclick='deleteFriend(<?= $getId ?>)'>Delete Friend</button></li>
          			<?php }}
          			?>
          			 </ul>
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
    <?php include_once 'footer.php';?>

    <!-- Scripts
    ================================================= -->
    <script src="../view/js/jquery-3.1.1.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/js/jquery.sticky-kit.min.js"></script>
    <script src="../view/js/jquery.scrollbar.min.js"></script>
    <script src="../view/js/script.js"></script>    
    <script src="../assets/js/friends.js"></script>
    <script src="../assets/js/search.js"></script>
    <script src="../assets/js/profile-pic.js" type="text/javascript"></script>
  </body>
</html>
