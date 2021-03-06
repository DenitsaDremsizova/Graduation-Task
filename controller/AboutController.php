<?php
$controller = 'controller';
try {
session_start ();
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

$userId = '';
$id='';
if(!empty($_SESSION['userId'])) {
	$userId = $_SESSION['userId'];
}else {
	header('Location:HomeController.php');die();
}

if(empty($_GET['id'])) {
	$id = $userId;
	$getId=$id;
}else {
	$id = $_GET['id'];
	$getId=$id;
}
if (empty($id)) {
	header('Location:HomeController.php');die();
}
$dao = new FriendDAO();
$checkIfInFriendsList = $dao->checkIfInFriendsList($userId,$getId);
$checkIfInFriendRequestList = $dao->checkIfInFriendRequestList($userId,$getId);


$userData = DbHelper::getInstance()->getUserData($id);
$userWorkExperience = DbHelper::getInstance()->getWorkExperience($id);
$userLanguages = DbHelper::getInstance()->getUserLanguages($id);
$allLangs = DbHelper::getInstance()->getAllNotAddedByUserLanguagess($id);
$userInterests = DbHelper::getInstance()->getUserInterests($id);
$userAddress = DbHelper::getInstance()->getUserAddress($id);
$userFollowers = DbHelper::getInstance()->countUserFollowers($id);
$age = floor((time() - strtotime($userData[0]['date_of_birth'])) / 31556926);
$userFriendsRequests = DbHelper::getInstance()->countUserRequests($_SESSION['userId']);
	//DELETE REQUESTS
	if($_SERVER ['REQUEST_METHOD'] === 'DELETE') {

		$content = file_get_contents('php://input');
		if(strpos($content, 'LangId') !== false) {
			$content = str_replace('LangId=', '', $content);
			$content = explode('#',$content);
			if($content[0] === $_SESSION['userId']) {
					DbHelper::getInstance()->deleteUserLanguage($content[0],$content[1]);	
			}
		}elseif(strpos($content, 'interest=') !== false){
			$content= str_replace('interest=', '', $content);
			$content = explode('#',$content);
			$content[1] = htmlentities(trim($content[1]));
			if($content[0] === $_SESSION['userId']) {
				DbHelper::getInstance()->deleteUserInterest($content[0], $content[1]);
			}
		}elseif(strpos($content, 'experience=') !== false){
			$content= str_replace('experience=', '', $content);
			$content = explode('#',$content);
			if($content[0] === $_SESSION['userId']) {
				DbHelper::getInstance()->deleteExperience($content[0], $content[1], $content[2]);
			}
		}
	}
	
	// POST REQUESTS
	if($_SERVER ['REQUEST_METHOD'] === 'POST') {
		$content= file_get_contents('php://input');

		if(strpos($content, 'addLang=') !== false){
			$content = str_replace('addLang=', '', $content);
			$content= explode('#',$content);
			$content[1] = htmlentities(trim($content[1]));
			if($content[0] === $_SESSION['userId']) {
				if(empty($content[1])) {
					$_SESSION['languagesError'] = "You have to choose language!";
				}else {
					DbHelper::getInstance()->addNewLanguage($content[0], $content[1]);
				}
			}
		}elseif(strpos($content, 'addInterest=') !== false){
				$content = str_replace('addInterest=', '', $content);
				$content= explode('#',$content);
				$content[1] = htmlentities(trim($content[1]));
				if($content[0] === $_SESSION['userId']) {
					if(strlen($content[1]) < 1){
						$_SESSION['interestsError'] = "Empty feild";
					}elseif(!preg_match("/^[a-zA-Z'-]+$/", $content[1])){
						$_SESSION['interestsError'] = "It must not contain numbers or special characters.";
					}else {
						DbHelper::getInstance()->addNewInterest($content[0], $content[1]);
					}
					
				}
		}elseif(strpos($content, 'info=') !== false) {
			$content= str_replace('info=', '', $content);
			$content = explode('#',$content);
			$content[1] = htmlentities(trim($content[1]));
			if($userId === $content[0]) {
					DbHelper::getInstance()->editUserInfo($content[1],$content[0]);
			}
		}elseif(strpos($content, 'experience=') !== false) {
			$content= str_replace('experience=', '', $content);
			$content = explode('#',$content);
			$content[1] = htmlentities(trim($content[1]));
			$content[2] = htmlentities(trim($content[2]));
			$content[3] = htmlentities(trim($content[3]));
			$content[4] = htmlentities(trim($content[4]));
			if($userId === $content[0]) {
				if((strlen($content[1]) < 1) || (strlen($content[2]) < 1)){
					$_SESSION['workError'] = "Empty feild";
				}else {
					DbHelper::getInstance()->addExperience($content[0],$content[1],$content[2], $content[3],$content[4]);
				}
				
			}
		}elseif(strpos($content, 'changePassword=') !== false){
			$content= str_replace('changePassword=', '', $content);
			$content = explode('#',$content);
			
			if($userId === $content[0]) {
				$error = false;
				
				if((strlen($content[1])) <= 8) {
					$_SESSION['changePasswordError'] = "Your Password Must Contain At Least 8 Characters!";
					$error = true;
				}elseif(!preg_match("#[0-9]+#",$content[1])) {
					$_SESSION['changePasswordError'] = "Your Password Must Contain At Least 1 Number!";
					$error = true;
				}
				if(!$error) {
					$content[1] = hash('sha256',$content[1]);
					DbHelper::getInstance()->changePassword($content[0], $content[1]);
					$_SESSION['changePasswordSuccess'] = "Your password has been changed successfully! ";
				}
			}
	}
	}
	

	
	if($_SERVER ['REQUEST_METHOD'] === 'GET'){
		include_once '../view/timeline-about.php';
	}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
