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
                  <h3></h3>
                  <p class="text-muted">
                  <?php
                  if(!((empty($userData[0]['first_name'])) && ((empty([0]['last_name']))))) {
	                  	echo $userData[0]['first_name'] . " " . $userData[0]['last_name'];
	                  }
                  ?>
                  </p>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="timeline.php">Timeline</a></li>
                  <li><a href="timeline-about.php" class="active">	About</a></li>
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
                <li><a href="timline.php">Timeline</a></li>
                <li><a href="timeline-about.php" class="active">About</a></li>
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

              <!-- About
              ================================================= -->
              <div class="about-profile">
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>
                  <p>
                  	<?php 
                  	if(!empty($userData[0]['personal_info'])) {
                  		echo $userData[0]['personal_info'];
                  	}
                  	?>
                  </p>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
                   <div class="organization">
                <?php 
                if(!empty($userWorkExperience)) {
                	
                	$count = count($userWorkExperience);
                	if($count > 3){$count = 3;}
                	for($index=0;$index<$count;$index++) {
                		
                ?> 
                    <img src="../view/images/work.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5><?= $userWorkExperience[$index]['company']?></h5>
                      <p><?= $userWorkExperience[$index]['position']?> <span class="text-grey"><?php echo "<br/>" . "start date" .  $userWorkExperience[$index]['start_date'] . "<br/>"																									. "  end date  " . $userWorkExperience[$index]['end_date']?></span></p>
                    </div>
                <?php 
                	}
                }
                ?>
                </div>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-heart-outline icon-in-title"></i>Interests</h4>
                  <ul class="interests list-inline">
                  	<?php 
                  	foreach ($userInterests as $userInterest => $value) {
                  		echo "<li id='" . $value['interest'] . "' onclick='deleteInterest(this.id)'>" . $value['interest'];
                  	?>
                  	<img alt="Delete Interest" src="../view/images/delete-button.png" style="height:15px; width:15px;"  onmouseover="this.style.cursor='pointer'"/>
                  	</li>
                  	<?php
                  	}
                  	?>
                  </ul>
                  <textarea name="" id="addInterest"  rows="1" maxlength="90"></textarea>
                   <img alt="Add Interest" src="../view/images/add-button.png" style="height:15px; width:15px;" onclick="addInterest()" onmouseover="this.style.cursor='pointer'")"/>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-chatbubble-outline icon-in-title"></i>Language</h4>
                    <ul id="languages" >
                    <?php 
                    foreach ($userLanguages as $userLanguage) {
                    	echo "<li id='" . $userLanguage['user_id'] . "#" .$userLanguage['lang_id'] . "' onclick='deleteLanguage(this.id)'>" . $userLanguage['language'];
                    ?>
                    
                     <img alt="Delete Language" src="../view/images/delete-button.png" style="height:15px; width:15px;" onmouseover="this.style.cursor='pointer'")"/></li>
                     <?php 
                    }
                     ?>
                     </ul>
                      <select id='addLang'>
                      <option value="0" disabled selected>Add Language</option>
                      <?php foreach ($allLangs as &$lData) : ?>
                      	  <option value="<?= $lData['id']; ?>"><?= $lData['language']; ?></option>
                      <?php endforeach; ?>
                      </select>
                         <img alt="Add Language" src="../view/images/add-button.png" style="height:15px; width:15px;" onclick="addLang()" onmouseover="this.style.cursor='pointer'")"/></li>
                </div>
              </div>
            </div>
            <div class="col-md-2 static">
              <div id="sticky-sidebar">
                <h4 class="grey">Sarah's activity</h4>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                    <p class="text-muted">5 mins ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                    <p class="text-muted">an hour ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                    <p class="text-muted">4 hours ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                    <p class="text-muted">a day ago</p>
                  </div>
                </div>
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
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <!-- Scripts
    ================================================= -->

    <script src="../view/js/jquery-3.1.1.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/js/jquery.sticky-kit.min.js"></script>
    <script src="../view/js/jquery.scrollbar.min.js"></script>
    <script src="../view/js/script.js"></script>
    <script src="../assets/js/about.js"></script>
    
  </body>
</html>
