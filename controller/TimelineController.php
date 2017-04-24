<?php

function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (!isset($_SESSION['userId'])) {
    header('Location:../view/index-register.php', true, 302);
} else {
    $userId = $_SESSION['userId'];
    $_SESSION['timelineId'] = $_SESSION['userId'];
    $errorMsg = (isset($_SESSION['error-msg'])) ? $_SESSION['error-msg'] : null;

    if (isset($_GET['timelineId'])) {
        $_SESSION['timelineId'] = $_GET['timelineId'];
    }
    $timelineId = $_SESSION['timelineId'];
    $userName = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
    
    $dao = new FriendDAO();
    $timeline = $dao->getOneFriend($timelineId);
    $timelineName = $timeline->firstName . " " . $timeline->lastName;
    $timelineAddress = $timeline->city . ", " . $timeline->country;
    
    //create html form for uploading:
    function createUploadForm($uploadType, $userId, $timelineId) {
        if ($uploadType === 'photo')
            $acceptParam = 'img';
        if ($uploadType === 'video')
            $acceptParam = 'video';

        $uploadFormHtml = "<div id='" . $uploadType . "-form' class='hidden-form'>"
                . "<form enctype='multipart/form-data' action='../controller/PostsController.php' method='post' class='hidden-form-content'>"
                . "<span class='close-" . $uploadType . "-form'>&times;</span>"
                . "<fieldset class='input-field'>"
                . "<input type='hidden' name='MAX_FILE_SIZE' value='100000000'>"
                . "<label for='uploaded-" . $uploadType . "' class='form-label'> Select " . $uploadType . " to upload: </label></br>"
                . "<input type='file' accept='" . $acceptParam . "/*' name='uploaded-" . $uploadType . "' id='uploaded-" . $uploadType . "' class='inputfile' required>"
                . "</br></fieldset>"
                . "<fieldset class='input-field'>"
                . "<textarea name='uploaded-" . $uploadType . "-text' id='uploaded" . $uploadType . "text' cols='30' rows='2' "
                . "class='form-control' placeholder='Say something about your " . $uploadType . "...'></textarea>"
                . "<input type='hidden' value='" . $userId . "' id='uploaded-" . $uploadType . "-authorId' name='uploaded-" . $uploadType . "-authorId'/>"
                . "<input type='hidden' value='" . $timelineId . "' id='uploaded-" . $uploadType . "-timelineId' name='uploaded-" . $uploadType . "-timelineId'/>"
                . "</fieldset></br>"
                . "<input type='submit' name='upload-" . $uploadType . "' value='Upload' class='btn-primary' id='upload-" . $uploadType . "-btn'>"
                . "</form></div>";

        echo $uploadFormHtml;                
    }
    
    //TO DO: if not mine or friend's timeline show limited info
    include '../view/timeline.php';
}
?>
