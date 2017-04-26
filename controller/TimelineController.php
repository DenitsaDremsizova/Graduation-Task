<?php
$controller = 'controller';
try {
function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (!isset($_SESSION['userId'])) {
    header('Location:../view/index-register.php', true, 302);
} else {
    $userId = $_SESSION['userId'];
    $errorMsg = (isset($_SESSION['error-msg'])) ? $_SESSION['error-msg'] : null;

    if (isset($_GET['id'])) {
        $getId = $_GET['id'];
    } else {
        $getId = $userId;
    }
    
    $userName = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
    $userFriendsRequests = DbHelper::getInstance()->countUserRequests($_SESSION['userId']);
    $dao = new FriendDAO();
    $timeline = $dao->getOneFriend($getId);
    $timelineName = $timeline->firstName . " " . $timeline->lastName;
    $timelineAddress = $timeline->city . ", " . $timeline->country;
    
    //create html form for uploading:
    function createUploadForm($uploadType, $userId, $getId) {
        
        if ($uploadType === 'photo' || $uploadType === 'video') {
            $acceptParam = ($uploadType === 'photo') ? 'img' : 'video';
            $formType = "enctype='multipart/form-data'";
            $fileSizeLimit = "<input type='hidden' name='MAX_FILE_SIZE' value='100000000'>";
            $inputFieldLabel = "Select " . $uploadType . " to upload: ";
            $inputField = "<input type='file' accept='" . $acceptParam . "/*' name='uploaded-" . $uploadType . "' id='uploaded-" . $uploadType . "' class='inputfile' required>";
        } elseif ($uploadType === 'video-link') {
            $formType = "";
            $fileSizeLimit = "";
            $inputField = "<input type='text' name='uploaded-" . $uploadType . "' id='uploaded-" . $uploadType . "' class='inputfile' required><br/>";
            $inputFieldLabel = "Upload video link: ";
            
        }

        $uploadFormHtml = "<div id='" . $uploadType . "-form' class='hidden-form'>"
                . "<form " . $formType . " action='../controller/PostsController.php' method='post' class='hidden-form-content'>"
                . "<span class='close-" . $uploadType . "-form'>&times;</span>"
                . "<fieldset class='input-field'>"
                . $fileSizeLimit
                . "<label for='uploaded-" . $uploadType . "' class='form-label'>" . $inputFieldLabel . "</label></br>"
                . $inputField
                . "</br></fieldset>"
                . "<fieldset class='input-field'>"
                . "<textarea name='uploaded-" . $uploadType . "-text' id='uploaded" . $uploadType . "text' cols='30' rows='2' "
                . "class='form-control' placeholder='Say something about your " . $uploadType . "...'></textarea>"
                . "<input type='hidden' value='" . $userId . "' id='uploaded-" . $uploadType . "-authorId' name='uploaded-" . $uploadType . "-authorId'/>"
                . "<input type='hidden' value='" . $getId . "' id='uploaded-" . $uploadType . "-getId' name='uploaded-" . $uploadType . "-getId'/>"
                . "</fieldset></br>"
                . "<input type='submit' name='upload-" . $uploadType . "' value='Upload' class='btn-primary' id='upload-" . $uploadType . "-btn'>"
                . "</form></div>";

        echo $uploadFormHtml;                
    }
    
    //TO DO: if not mine or friend's timeline show limited info
    include '../view/timeline.php';
}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
?>