<!DOCTYPE html>
<html lang="en">
		<?php 
		include_once 'header.php';
	?>
    

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <input type="hidden" name="getId" id="getId" value="<?= $getId ?>">
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
                  <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" class="active">	About</a></li>
                  <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Gallery</a></li>
                  <li><a href="VideosController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Videos</a></li>
                  <li><a href="Timeline-friendsController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Friends  <?php if (!empty($getId)) {
                  	if($_SESSION['userId'] === $getId) {  ?><span style="color:red"><?php if($userFriendsRequests[0]['count']>0) { echo $userFriendsRequests[0]['count']; ?></span><?php }}}?></a></li>
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
              <h4>  <?php
                  if(!((empty($userData[0]['first_name'])) && ((empty([0]['last_name']))))) {
	                  	echo $userData[0]['first_name'] . " " . $userData[0]['last_name'];
	                  }
                  ?>
              </h4>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                 <li><a href="TimelineController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Timeline</a></li>
                  <li><a href="AboutController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>" class="active">	About</a></li>
                  <li><a href="GalleryController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Gallery</a></li>
                  <li><a href="VideosController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Videos</a></li>
                 <li><a href="Timeline-friendsController.php<?php if(!empty($getId)) { echo '?id=' . $getId;} ?>">Friends  <?php if (!empty($getId)) {
                  	if($_SESSION['userId'] === $getId) {  ?><span style="color:red"><?php if($userFriendsRequests[0]['count']>0) { echo $userFriendsRequests[0]['count']; ?></span><?php }}}?></a></li>
              </ul>
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">

              <!-- About
              ================================================= -->
              <?php if($id === $userId) {?>
              <div class="about-profile">
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Change Password</h4>
                  <input type="password" id="newPassword" placeholder ="Enter your new passwords" />
                  <img alt="Change Password" id="new" src="../view/images/change-button.png" style="height:23px; width:23px;"  onmouseover="this.style.cursor='pointer'" onclick="changePassword(<?=$userData[0]['id']?>)" />
              	  <div id="changePasswordError" style="color:red"><?php if(!empty($_SESSION['changePasswordError'])) { echo $_SESSION['changePasswordError']; }?></div>
              	   <div id="changePasswordSuccess" style="color:green"><?php if(!empty($_SESSION['changePasswordSuccess'])) { echo $_SESSION['changePasswordSuccess']; }?></div>
              	 </div>
               </div>
              <?php }?>
              <div class="about-profile">
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>
                      
                  	<?php 
	                  	if(!empty($userData[0]['personal_info'])) {
	                  		echo  "<p>" . $userData[0]['personal_info'];
	                  		if($id === $userId) {
                  	?>
                	<img alt="Delete info" src="../view/images/delete-button.png" style="height:15px; width:15px;"  onmouseover="this.style.cursor='pointer'" onclick="deleteInfo(<?=$userData[0]['id']?>)" /></p>
                	
                	<?php 
                  	}
	                  	}
                	?>
                	<?php if($id === $userId) {?>
                	<textarea name="" id="userInfo"  rows="1" maxlength="90"></textarea>
                   	<img alt="Add Interest" src="../view/images/edit-button.png" style="height:15px; width:15px;" onclick="editInfo(<?=$userData[0]['id']?>)" onmouseover="this.style.cursor='pointer'"/>
                	<?php }?>
               <div id="personalError" style="color:red"><?php if(!empty($_SESSION['personalError'])) { echo $_SESSION['personalError']; }?></div>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Work Experiences</h4>
                   <div class="organization">
                    <div class="work">
                    
                    	<?php if($id === $userId) { ?>
                     <img src="../view/images/work.png" alt="work" class="pull-left img-org" />
                    <div class="work-info">
                      <h5><input type="text" id="company" placeholder ="Company" /></h5>
                      <p><input type="text" id="position" placeholder ="Position" style="height:1.7em"/><br/>
                      	<span class="text-grey"><input type="text" id="startDate" placeholder = "Start day (Year-month-day)"style="height:1.7em" /><br/>
                      		<input type="text"  id="endDate" placeholder = "End day (Year-month-day)" style="height:1.7em"/>
                      	</span>
                      </p>
                      <img src="../view/images/add-work.png" alt="Add work experience" style="height:20px; width:20px;" id="<?= $id; ?>" onmouseover="this.style.cursor='pointer'" onclick='addExperience(this.id)'/>
                    </div>
                    </div>
                    
                <?php 
                	}
                if(!empty($userWorkExperience)) {
                	
                	$count = count($userWorkExperience);
                	if($count > 3){$count = 3;}
                	for($index=0;$index<$count;$index++) {
                		
                ?> 
                    <img src="../view/images/work.png" alt="" class="pull-left img-org" />
                    <div class="work-info">
                      <h5><?= $userWorkExperience[$index]['company']?>
                      	<?php if($id === $userId) { ?>
	                      <img alt="Delete Work" id = "<?= $userWorkExperience[$index]['user_id'] . "#" .$userWorkExperience[$index]['company'] . "#" . $userWorkExperience[$index]['position'];?>" onclick='deleteWorkExperience(this.id)' 
	                      src="../view/images/delete-button.png" style="height:15px; width:15px;"  onmouseover="this.style.cursor='pointer'"/>
	                     <?php } ?>
                      </h5>
                      <?php 
                      if($userWorkExperience[$index]['start_date'] === '0000-00-00') { $userWorkExperience[$index]['start_date'] = '';}
                      if($userWorkExperience[$index]['end_date'] === '0000-00-00') { $userWorkExperience[$index]['end_date'] = '';}
                      ?>
                      <p>Position: <?= $userWorkExperience[$index]['position']?><span class="text-grey"><?php echo "<br/>" . "start date: " .  $userWorkExperience[$index]['start_date'] . "<br/>" . "end date:  " . $userWorkExperience[$index]['end_date']?></span></p>
                    </div>
                <?php 
                	}
                }
                ?>
                <div id="workError" style="color:red"><?php if(!empty($_SESSION['workError'])) { echo $_SESSION['workError']; }?></div>
                </div>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-heart-outline icon-in-title"></i>Interests</h4>
                  <ul class="interests list-inline">
                  	<?php 
                  	foreach ($userInterests as $userInterest => $value) {
						echo "<li>" . $value['interest'];
					if($id === $userId) {
                  	?>
                  	<img alt="Delete Interest" id = "<?=  $value['user_id'] . '#' . $value['interest'] ?>" onclick='deleteInterest(this.id)' src="../view/images/delete-button.png" style="height:15px; width:15px;"  onmouseover="this.style.cursor='pointer'"/>
                  	</li>
                  	<?php
                  	}
                  	}
                  	?>
                  </ul>
                  <?php if($id === $userId) {?>
                  <textarea name="" id="addInterest"  rows="1" maxlength="90"></textarea>
                   <img alt="Add Interest" src="../view/images/add-button.png" id="<?=$userData[0]['id'];?>"style="height:15px; width:15px;" onclick="addInterest(this.id)" onmouseover="this.style.cursor='pointer'")"/>
                  <?php }?>
                 
     			 <div id="interestsError" style="color:red"> <?php if(!empty($_SESSION['interestsError'])) { echo $_SESSION['interestsError']; }?></div>
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-chatbubble-outline icon-in-title"></i>Language</h4>
                    <ul id="languages" >
                    <?php 
                    foreach ($userLanguages as $userLanguage) {
                    	echo "<li>" . $userLanguage['language'];
                    	if($id === $userId) {
                    ?>
                    
                     <img alt="Delete Language" id = "<?php echo $userLanguage['user_id'] . "#" .$userLanguage['lang_id']; ?>" onclick='deleteLanguage(this.id)' src="../view/images/delete-button.png" style="height:15px; width:15px;" onmouseover="this.style.cursor='pointer'")"/></li>
                     <?php 
                    }
                    }
                     ?>
                     </ul>
                     <?php if($id === $userId) { ?>
                      <select id='addLang'>
                      <option value="0" disabled selected>Add Language</option>
                      <?php foreach ($allLangs as &$lData) : ?>
                      	  <option value="<?= $lData['id']; ?>"><?= $lData['language']; ?></option>
                      <?php endforeach; ?>
                      </select>
                         <img alt="Add Language" src="../view/images/add-button.png" id="<?=$userData[0]['id'];?>" style="height:15px; width:15px;" onclick="addLang(this.id)" onmouseover="this.style.cursor='pointer'")"/></li>
                	  <?php }?>
                	                <div id="languagesError" style="color:red"><?php if(!empty($_SESSION['languagesError'])) { echo $_SESSION['languagesError']; }?></div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>


    <!-- Footer
    ================================================= -->
    <?php include_once 'footer.php';?>
    
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
    <script src="../assets/js/profile-pic.js" type="text/javascript"></script>
    
  </body>
</html>
<?php 
$_SESSION['personalError'] = '';
$_SESSION['workError'] = '';
$_SESSION['languagesError'] = '';
$_SESSION['interestsError'] = '';
$_SESSION['changePasswordError'] = '';
$_SESSION['changePasswordSuccess'] = '';

?>