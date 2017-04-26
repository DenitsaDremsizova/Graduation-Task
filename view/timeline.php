<!DOCTYPE html>
<html lang="en">
    <?php include_once 'header.php'; ?>

        <div class="container">
            <input type="hidden" name="getId" id="getId" value="<?= $getId ?>">

            <!-- Timeline
            ================================================= -->
            <div class="timeline">
                <div class="timeline-cover">

                    <!--Timeline Menu for Large Screens-->
                    <div class="timeline-nav-bar hidden-sm hidden-xs">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile-info">
                                    <div id="profile-photo-large-scr">
                                        <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
                                    </div>
                                    <h3><?= $timelineName ?></h3>
                                    <p class="text-muted"><?=$timelineAddress?></p>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <ul class="list-inline profile-menu">
                                    <li><a href="TimelineController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" class="active">Timeline</a></li>
                                    <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" > About</a></li>
                                    <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Gallery</a></li>
                                    <li><a href="VideosController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Videos</a></li>
                                   <li><a href="Timeline-friendsController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Friends  <?php if (!empty($getId)) {
                  					if($_SESSION['userId'] === $getId) {  ?><span style="color:red"><?php if($userFriendsRequests[0]['count']>0) { echo $userFriendsRequests[0]['count']; ?></span><?php }}}?></a></li>
                                </ul>
                               <ul class="follow-me list-inline">
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
                            <h4><?= $timelineName ?></h4>
                            <p class="text-muted"><?=$timelineAddress?></p>
                        </div>
                        <div class="mobile-menu">
                            <ul class="list-inline">
                                <li><a href="TimelineController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" class="active">Timeline</a></li>
                                <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" > About</a></li>
                                <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Gallery</a></li>
                                <li><a href="VideosController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Videos</a></li>
                                <li><a href="Timeline-friendsController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Friends  <?php if (!empty($getId)) {
                 			 	if($_SESSION['userId'] === $getId) {  ?><span style="color:red"><?php if($userFriendsRequests[0]['count']>0) { echo $userFriendsRequests[0]['count']; ?></span><?php }}}?></a></li>
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

                            
                            <!-- Upload Forms
                           ================================================= -->                
                            <?php
                            createUploadForm("photo", $userId, $getId);
                            createUploadForm("video", $userId, $getId);
                            createUploadForm("video-link", $userId, $getId);
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
                                            <input type="hidden" value="<?php echo $getId; ?>" id="getId"/>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <div class="tools">
                                            <ul class="publishing-tools list-inline">
<!--                                                <li><a href="#"><i class="ion-compose"></i></a></li>-->
                                                <li><a href="#" ><i class="ion-images" id="add-photo-btn" title="Upload Picture"></i></a></li>
                                                <li><a href="#"><i class="ion-ios-videocam" id="add-video-btn" title="Upload Video"></i></a></li>
                                                <li><a href="#"><i class="ion-social-youtube-outline" id="add-video-link-btn" title="Upload Video Link"></i></a></li>
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
                <?php include_once 'footer.php';?>

                 <!-- ================================================= -->

                <script src="../view/js/jquery-3.1.1.min.js"></script>
                <script src="../view/js/bootstrap.min.js"></script>
                <script src="../view/js/jquery.sticky-kit.min.js"></script>
                <script src="../view/js/jquery.scrollbar.min.js"></script>
                <script src="../view/js/script.js"></script>
                <script src="../assets/js/posts.js" type="text/javascript"></script>
                <script src="../assets/js/timeline-modal-form.js" type="text/javascript"></script>
                <script src="../assets/js/profile-pic.js" type="text/javascript"></script>
				<script src="../assets/js/friends.js" type="text/javascript"></script>
                </body>
                </html>
