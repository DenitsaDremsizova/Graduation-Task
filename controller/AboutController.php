<?php
session_start ();
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

$userId = '';
$id='';
if(!empty($_SESSION['userId'])) {
	$userId = $_SESSION['userId'];
}

if(empty($_GET['id'])) {
	$id = $userId;
}else {
	$id = $_GET['id'];
}
if (empty($id)) {
	header('Location:HomeController.php');die();
}

$userData = DbHelper::getInstance()->getUserData($id);
$userWorkExperience = DbHelper::getInstance()->getWorkExperience($id);
$userLanguages = DbHelper::getInstance()->getUserLanguages($id);
$allLangs = DbHelper::getInstance()->getAllNotAddedByUserLanguagess($id);
$userInterests = DbHelper::getInstance()->getUserInterests($id);
$userAddress = DbHelper::getInstance()->getUserAddress($id);

$age = floor((time() - strtotime($userData[0]['date_of_birth'])) / 31556926);

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
		}
		
	}
	

	
	if($_SERVER ['REQUEST_METHOD'] === 'GET'){
		include_once '../view/timeline-about.php';
	}

