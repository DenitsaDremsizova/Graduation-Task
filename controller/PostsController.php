<?php

function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['timelineId'])) {
    $userId = $_SESSION['userId'];
    $timelineId = $_SESSION['timelineId'];

    $dao = new PostDAO();

    if ($_SERVER ['REQUEST_METHOD'] === 'POST') {

        //validate if user is allowed to post on timeline:
        if ($userId !== $timelineId) {
            $daoFriend = new FriendDAO;
            if (!($daoFriend->checkIfInFriendsList($userId, $timelineId))) {
                throw new Exception('You are not alllowed to post on the timeline of people outside your friends list.');
            }
        }

        //delete prvious error message:
        unset($_SESSION['error-msg']);
        
        function uploadFile($fileType) {
        
        if ($fileType === 'photo') {
            $uploadedFileName = $_FILES['uploaded-photo']['tmp_name'];
            $fileOriginalName = $_FILES['uploaded-photo']['name'];
            $requiredMIMEtype = 'image';
            $authorId = $_POST['uploaded-photo-authorId'];
            $timelineId = $_POST['uploaded-photo-timelineId'];
            $type = 'photos';
            $text = htmlentities(trim($_POST['uploaded-photo-text']));
        } elseif ($fileType === 'video') {
            $uploadedFileName = $_FILES['uploaded-video']['tmp_name'];
            $fileOriginalName = $_FILES['uploaded-video']['name'];
            $requiredMIMEtype = 'video';
            $authorId = $_POST['uploaded-video-authorId'];
            $timelineId = $_POST['uploaded-video-timelineId'];
            $type = 'uploaded_videos';
            $text = htmlentities(trim($_POST['uploaded-video-text']));
        }
        
        try {
            if ($uploadedFileName !== "" && $uploadedFileName !== null) {

                //get file extension:
                $fileOriginalName = explode(".", $fileOriginalName);
                $extension = end($fileOriginalName);
                
                //vallidate MIME type:
                $mimeType = explode("/", mime_content_type($uploadedFileName))[0];
                
                if ($mimeType === $requiredMIMEtype) {
                    
                    //send data to PostDAO.php to add post to DB:

                    $newPost = new Post($authorId, $timelineId, $type, $text);                    
                    $newPost->extension = $extension;
                    $newDAO = new PostDAO();
                    $newDAO->addPost($newPost);
                    
                    //upload photo to server:

                    if (isset($_SESSION['fileName'])) {
                        if (is_uploaded_file($uploadedFileName)) {
                            if (move_uploaded_file($uploadedFileName, $_SESSION['fileName'])) {
                                
                            } else {
                                //TO DO: delete post from DB
                                throw new Exception('Moving file failed');
                            }
                        } else {
                            //TO DO: delete post from DB
                            throw new Exception('Uploading file failed.');
                        }
                    }
                } else {
                    throw new Exception('Invalid file type!');
                }
            } else {
                throw new Exception('No file attached!');
            }
        } catch (Exception $e) {
            $_SESSION['error-msg'] = $e->getMessage();
        } finally {
            //go to timeline:
            header('Location:./TimelineController.php?timelineId=' . $timelineId, true, 302);
        }
    }

        //upload file:    
        if (isset($_POST['upload-photo'])) {
            uploadFile('photo');
        } elseif (isset($_POST['upload-video'])) {
            uploadFile('video');
        } else {
            // add new text post
            $textPost = json_decode($_POST['data']);

            $newPost = new Post($textPost->authorId, $textPost->timelineId, $textPost->type, htmlentities(trim($textPost->text)));
            $dao->addPost($newPost);
        }
    } elseif ($_SERVER ['REQUEST_METHOD'] === 'GET') {
        unset($_SESSION['error-msg']);
        // list all contacts
        echo json_encode($dao->listAllPosts($timelineId));
    }
} else {
    http_response_code(401);
    echo '{"error": "not logged in"}';
}
?>
