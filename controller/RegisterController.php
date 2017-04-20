<?php
session_start();
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

if (isset($_POST['submit'])) {
	if ($_POST['firstname']) { $_SESSION['firstname'] = $_POST['firstname'];}
	if ($_POST['lastname']) { $_SESSION['lastname'] = $_POST['lastname'];}
	if ($_POST['Email']) { $_SESSION['Email'] = $_POST['Email'];}
	if ($_POST['year']) { $_SESSION['year'] = $_POST['year'];}
	if ($_POST['day']) { $_SESSION['day'] = $_POST['day'];}
	if ($_POST['month']) { $_SESSION['month'] = $_POST['month'];}
	if ($_POST['country']) { $_SESSION['country'] = $_POST['country'];}
	if ($_POST['city']) { $_SESSION['city'] = $_POST['city'];}
	
	try {
		 $id = null;
		 $firstName = $_POST['firstname'];
		 $lastName = $_POST['lastname'];
		 $email = $_POST['Email'];
		 $password = $_POST['password'];
		 $day = $_POST['day'];
		 $month = $_POST['month'];
		 $year = $_POST['year'];
		 $gender = $_POST['gender'];
		 $bornCity = $_POST['city'];
		 $country = $_POST['country'];

         $RegisterUser = new Register($firstName,$lastName,$email,$password,$day,$month,$year,$gender,$bornCity,$country,null);

         $userObject = new RegisterDAO($RegisterUser);

         $userObject->checkUserExist();
		 $userObject->save();
         
	}
	catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
		header('Location:HomeController.php');
	}
	header('Location:HomeController.php');
}

if(($_SERVER['REQUEST_METHOD'] == "GET") && (!empty($_GET['email']))) {
	$email = $_GET['email'];
	try{
	$TestUser = new Register('TestFirstName','TestLastName',$email,'TestPassword123','02','08','1991','M','Stara Zagora','Bulgaria',null);
	$TestUser->setEmail($email);
	$userObject = new RegisterDAO($TestUser);
	$userObject->checkUserExist();
		
	}catch (Exception $e) {
		echo $e->getMessage();
	}
}
?>