<?php
session_start ();
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

if (isset ( $_POST ['submit'] )) {
	if ($_POST ['firstname']) {
		$_SESSION ['firstname'] = $_POST ['firstname'];
	}
	if ($_POST ['lastname']) {
		$_SESSION ['lastname'] = $_POST ['lastname'];
	}
	if ($_POST ['Email']) {
		$_SESSION ['Email'] = $_POST ['Email'];
	}
	if ($_POST ['year']) {
		$_SESSION ['year'] = $_POST ['year'];
	}
	if ($_POST ['day']) {
		$_SESSION ['day'] = $_POST ['day'];
	}
	if ($_POST ['month']) {
		$_SESSION ['month'] = $_POST ['month'];
	}
	if ($_POST ['country']) {
		$_SESSION ['country'] = $_POST ['country'];
	}
	if ($_POST ['city']) {
		$_SESSION ['city'] = $_POST ['city'];
	}
	
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
		
		$userObject->do();
		header ( 'Location:AboutController.php' );die();
	} catch ( Exception $e ) {
		$_SESSION ['error'] = $e->getMessage ();
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
?>