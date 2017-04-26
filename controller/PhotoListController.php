<?php
try {
function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    
    $getId = (isset($_GET['id'])) ? $_GET['id'] : $userId;
    
    $dao = new PhotoDAO();
    
    if ($_SERVER ['REQUEST_METHOD'] === 'GET') {        
        // list all photos
        echo json_encode($dao->listAllPhotos($getId));
    } elseif ($_SERVER ['REQUEST_METHOD'] === 'POST') {
        $data = json_decode($_POST['data']);
        $newProfPicId = $data->id;
        $dao->updateProfilePic($userId, $newProfPicId);
        $newProfilePicture = $dao->getProfilePic($userId);
    }
}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
?>