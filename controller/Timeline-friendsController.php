<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();
$_SESSION ['userid'] = 1; //to be deleted;

if (!isset ($_SESSION ['userid'] )) {
    header('Location:../view/index-register.php', true, 302);
} else {
	$userId = $_SESSION ['userid'];
	
        include '../view/timeline-friends.php';
}

?>

