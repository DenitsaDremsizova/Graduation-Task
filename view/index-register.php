<?php 
if(empty($homeController)) {
	header('Location:../controller/HomeController.php');die();
}
?>
<!DOCTYPE html>
<html lang="en">
	<?php 
		include_once 'header.php';
	?>
    
    <!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
    	<div class="container wrapper">
        <div class="row">
        	<div class="col-sm-5">
            <div class="intro-texts">
            	<h1 class="text-white">Welcome to Get Together!!</h1>
            	<p> <br /> <br /></p>
            </div>
          </div>
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
                  <li><a href="#login" data-toggle="tab">Login</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                <div class="tab-pane active" id="register">
                  <h3>Register Now !!!</h3>
                  <p class="text-muted">Be cool and join today. Meet millions</p>
                  
                  <!--Register Form-->
                  <form name="registration_form" id='registration_form' class="form-inline" method="post" action="../controller/RegisterController.php">
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="firstname" class="sr-only">First Name</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="firstname"
                         title="Enter first name" placeholder="First name" 
                         value="<?php if (!empty($_SESSION['firstname'])){
									echo $_SESSION['firstname'];}?>" onblur="checkNameCharacters(this.value,this.id)" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="lastname" class="sr-only">Last Name</label>
                        <input id="lastname" class="form-control input-group-lg" type="text" name="lastname"
                         title="Enter last name" placeholder="Last name" 
                         value="<?php if (!empty($_SESSION['lastname'])){
									echo $_SESSION['lastname']; } ?>" onblur="checkNameCharacters(this.value,this.id)" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Your Email"
								value="<?php if (!empty($_SESSION['Email'])){
									echo $_SESSION['Email']; } ?>" onblur="checkEmail(this.value)"/>

                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" class="form-control input-group-lg" type="password" name="password" 
                        title="Enter password" placeholder="Password" onblur="checkPasswordCharacters(this.value,this.id)"/>
                      </div>
                    </div>
                    <div class="row">
                      <p class="birth"><strong>Date of Birth</strong></p>
                      <div class="form-group col-sm-3 col-xs-6">
                        <label for="month" class="sr-only"></label>
                        <select class="form-control" id="day" name="day">
                          <option value="Day" disabled selected >Day</option>
                          <?php 
                          $selectDay = '';
                          for($index=1;31>=$index;$index++) {
                          	if(!empty($_SESSION['day'])){
	                          	if($index == $_SESSION['day']){
	                          		$selectDay = 'selected';
	                          	}
                         	 }
                          	echo '<option ' . $selectDay . '>' . $index . '</option>';
                          	$selectDay= '';
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-sm-3 col-xs-6">
                        <label for="month" class="sr-only"></label>
                        <select class="form-control" id="month" name="month">
                          <option value="month" disabled selected>Month</option>
                          <?php
                          $selectMonth = '';
                          $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec',);
                          for ($index=0;$index < count($months);$index++) {
                          	$numberOfMonth = $index+1;
                          	if(!empty($_SESSION['month']) && ($numberOfMonth == $_SESSION['month'])) {
                          		$selectMonth = 'selected';
                          	}
                          	echo '<option ' . $selectMonth . ' value="' . $numberOfMonth . '">' . $months[$index] . '</option>';
                          	$selectMonth = '';
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">
                        <label for="year" class="sr-only"></label>
                        <select class="form-control" id="year" name="year">
                          <option value="year" disabled selected >Year</option>
                            <?php 
                              $year = date("Y");
                              $selectYear = '';
	                          for($index=$year-100;$year>=$index;$index++) {
	                          	if(!empty($_SESSION['year'])){
		                          	if($index == $_SESSION['year']){
		                          		$selectYear = 'selected';           
		                          	}
	                          	}
	                          	echo '<option ' . $selectYear . '>' . $index . '</option>';
	                          	$selectYear = '';
	                          }
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group gender">
                      <label class="radio-inline">
                        <input type="radio" name="gender" checked value="M">Male
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="F">Female
                      </label>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="city" class="sr-only">First Name</label>
                        <input id="city" class="form-control input-group-lg reg_name" type="text" name="city"
                         title="Enter city" placeholder="Your city" onblur="checkCityCharacters(this.value,this.id)"
                          value="<?php if (!empty($_SESSION['city'])){
									echo $_SESSION['city']; } ?>"/>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="country" class="sr-only"></label>
                        <select class="form-control" id="country" name="country">
                          <option value="country" disabled selected>Country</option>
                        <?php 
                			foreach ($countries as $country) {
                				$selectCountry = '';
                				if(!empty($_SESSION['country']) && ($country['country'] == $_SESSION['country'])) {
	                					$selectCountry = 'selected';
	                				}
                         		echo '<option ' . $selectCountry .  ' value="' . $country['id'] . '">' . $country['country'] . '</option>';
                         		
                         	}
                          ?>
                        </select>
                       
                      </div>
                      <div id="error" style="color:red">
                       <?php 
                       	if(!empty($_SESSION['error'])) {
                       		echo $_SESSION['error'];
                       	}
                       ?>
                       </div>
                    </div>
                      <button class="btn btn-primary" id="submit" name="submit" value="submit">Register Now</button>
                  </form>
                  <p><a href="#login" data-toggle="tab">Already have an account?</a></p>
                </div><!--Registration Form Contents Ends-->
                
                <!--Login-->
                <div class="tab-pane" id="login">
                  <h3>Login</h3>
                  <p class="text-muted">Log into your account</p>
                  
                  <!--Login Form-->
                  <form name="Login_form" id='Login_form'>
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input id="my-email" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>
                    <div id="loginError" style="color:red">
               
                    </div>
                  </form>
                  <button class="btn btn-primary" name="submit" id = "loginSubmit" onclick="logIn()">Login Now</button>
                  <p id="menu" onclick="toggleMenu()"><a href="#login" data-toggle="tab">Forgot your password?</a></p>
						<ul id="menu-box" style="display: none">
						  <input id="newPassEmail"class="form-control input-group-lg" type="text" placeholder="Enter your email!"/>
						  <button class="btn btn-primary" name="submit" id = "newPasswordButton" onclick="sendNewPassword()">Send new password</button>
						</ul>
						<div id="newPasswordError" style="color:red">
            
                       </div>
                  <div id="loginError" style="color:red"></div>
                  
                  <!--Login Form Ends--> 
         
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-6">
          
            <!--Social Icons-->
            <ul class="list-inline social-icons">
              <li><a href="https://www.facebook.com/"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="https://twitter.com/"><i class="icon ion-social-twitter"></i></a></li>
              <li><a href="https://plus.google.com/"><i class="icon ion-social-googleplus"></i></a></li>
              <li><a href="https://www.pinterest.com/"><i class="icon ion-social-pinterest"></i></a></li>
              <li><a href="https://www.linkedin.com/"><i class="icon ion-social-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <!-- Scripts
    ================================================= -->
    <script src="../view/js/jquery-3.1.1.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/js/jquery.appear.min.js"></script>
	<script src="../view/js/jquery.incremental-counter.js"></script>
    <script src="../view/js/script.js"></script>
    <script src="../assets/js/registerValidation.js"></script>
    <script src="../assets/js/login.js"></script>
	</body>
</html>
<?php 
$_SESSION['error'] ='';
?>
