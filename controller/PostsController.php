<?php

function __autoload($className) {
	require_once "../model/" . $className . '.php';
}

session_start();
$_SESSION ['userId'] = 1; //to be deleted


if (isset ($_SESSION ['userId']) && isset ($_SESSION ['timelineId'] )) {
	$timelineId = $_SESSION ['timelineId'];
	
	$dao = new PostDAO();
        
        if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
            //check for uploaded picture
            if(isset($_POST['upload-photo'])) {
                if(isset($_FILES['uploaded-photo'])) {
                    //get file extension:
                    $uploadedPicName = $_FILES['uploaded-photo']['tmp_name'];
                    $picOriginalName = $_FILES['uploaded-photo']['name'];
                    $picOriginalName = explode(".", $picOriginalName);
                    $extension = end($picOriginalName);
                    
                    //send data to PostDAO.php to add post to DB:
                    $authorId = $_POST['uploaded-photo-authorId'];
                    $timelineId = $_POST['uploaded-photo-timelineId'];
                    $type = "photos";
                    $text = htmlentities(trim($_POST['uploaded-photo-text']));
                    $newPost = new Post($authorId, $timelineId, $type, $text);
                    $newPost->extension = $extension;
                    $dao->addPost($newPost);
                    
                    //upload photo to server: OKOK
                    try {
                    if(isset($_SESSION['fileName'])) {
                        if (is_uploaded_file($uploadedPicName)) {
                            if (move_uploaded_file($uploadedPicName, $_SESSION['fileName'])) {
                                
                            } else {
                                //TO DO: delete post from DB
                                throw new Exception('moving file failed');
                            }
                        } else {
                            //TO DO: delete post from DB
                            throw new Exception('uploading file failed');
                        }
                    } 
                } catch (Exception $e) {
                    $_SESSION['error-msg'] = $e->getMessage();
                } finally {
                    //go to timeline:
                    header('Location:./TimelineController.php?timelineId=' . $timelineId, true, 302);
                }
                } //else: error msg - missing file
            } else {
            // add new text post
            $textPost = json_decode ($_POST['data']);

            $newPost = new Post($textPost->authorId, $textPost->timelineId, $textPost->type, htmlentities(trim($textPost->text)));		
            $dao->addPost($newPost);
            }
	} elseif ($_SERVER ['REQUEST_METHOD'] === 'GET') {
            // list all contacts
            echo json_encode($dao->listAllPosts($timelineId));
        }
} else {
	http_response_code(401);
	echo '{"error": "not logged in"}';
}

?>
