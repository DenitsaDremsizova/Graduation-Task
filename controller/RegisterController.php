<?php
$controller = 'controller';
try {
session_start ();
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

if (isset ( $_POST ['submit'] )) {
	function checkEmptyField($field) {
		if(empty($_POST [$field])) { $_POST [$field] = '';} else {$_SESSION [$field] = $_POST [$field];}
	}
	checkEmptyField('Email');
	checkEmptyField('firstname');
	checkEmptyField('lastname');
	checkEmptyField('day');
	checkEmptyField('month');
	checkEmptyField('year');
	checkEmptyField('gender');
	checkEmptyField('city');
	checkEmptyField('country');

	try {
		$params = array(
		'id' => null,
		'firstName' => $_POST ['firstname'],
		'lastName' => $_POST ['lastname'],
		'day' => $_POST ['day'],
		'month' => $_POST ['month'],
		'year' => $_POST ['year'],
		'gender' => $_POST ['gender'],
		'bornCity' => $_POST ['city'],
		'country' => $_POST ['country']
		);
		
		$RegisterUser = new User ( $_POST ['Email'], $_POST ['password'],$params );

		$userObject = new Register ( $RegisterUser );

		if ($userObject->checkUserExist ()) {
			throw new RegisterException ( "This user already exist!" );
		}
		
		$userObject->doIt();
		$userData = $userObject->getLoggedUserData();
	// mk dir for uploading
		$mkdirId = '../uploads/' . $userData[0]['id'];
		$mkdirVideo = $mkdirId . '/videos';
		$mkdirPhotos = $mkdirId . '/photos';
		
		mkdir($mkdirId);
		mkdir($mkdirVideo);
		mkdir($mkdirPhotos);
		
		header ( 'Location:AboutController.php' );die();
	} catch ( Exception $e ) {
		$_SESSION ['error'] = $e->getMessage ();
		header ( 'Location:HomeController.php' );die();
	}
}

if (($_SERVER ['REQUEST_METHOD'] === "POST") && (! empty (file_get_contents('php://input')))) {
	$email = file_get_contents('php://input');
	try {
		$TestUser = new User ($email);
		
		$userObject = new Register ( $TestUser );
		if ($userObject->checkUserExist ()) {
			throw new RegisterException ( "This user already exist!" );
		}
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}
}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
?>