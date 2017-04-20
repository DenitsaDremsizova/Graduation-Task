<?php
session_start();
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
if (isset($_POST['submit'])) {

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

         if($userObject->checkUserExist()) {

         	throw new RegisterException("This user already exist",null,null);
         } else {
         	$userObject->save();
         }
	}
	catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
		header('Location:HomeController.php');
	}
	header('Location:HomeController.php');
}

if($_SERVER['REQUEST_METHOD'] == "GET") {

}
?>