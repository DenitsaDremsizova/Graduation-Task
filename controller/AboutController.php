<?php
session_start ();
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}


if(empty($_GET['id'])) {
	$id = $_SESSION['userId'];
}else {
	$id = $_GET['id'];
}

$userData = DbHelper::getInstance()->getUserData($id);
$userWorkExperience = DbHelper::getInstance()->getWorkExperience($id);
$userLanguages = DbHelper::getInstance()->getUserLanguages($id);
$allLangs = DbHelper::getInstance()->getAllNotAddedByUserLanguagess($id);
$userInterests = DbHelper::getInstance()->getUserInterests($id);
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
			DbHelper::getInstance()->deleteUserInterest($_SESSION['userId'], $content);
		}
	}
	if($_SERVER ['REQUEST_METHOD'] === 'POST') {
		$content= file_get_contents('php://input');
		if(strpos($content, 'addLang=') !== false){
			$content = str_replace('addLang=', '', $content);
			DbHelper::getInstance()->addNewLanguage($_SESSION['userId'], $content);
		}elseif(strpos($content, 'addInterest=') !== false){
				$content = str_replace('addInterest=', '', $content);
				DbHelper::getInstance()->addNewInterest($_SESSION['userId'], $content);
		}
		
	}
	
	
	if($_SERVER ['REQUEST_METHOD'] === 'GET'){
		include_once '../view/timeline-about.php';
	}

