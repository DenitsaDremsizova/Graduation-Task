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
        if ($userId !== $timelineId) {
            $daoFriend = new FriendDAO;
            if (!($daoFriend->checkIfInFriendsList($userId, $timelineId))) {
                throw new Exception('You are not alllowed to post on the timeline of people outside your friends list.');
            }
        }
        
        //delete prvious error message:
        unset($_SESSION['error-msg']);
        
        //check for uploaded picture
        if (isset($_POST['upload-photo'])) {
            try {
                if (isset($_FILES['uploaded-photo'])) {

                    //get file extension:
                    $uploadedPicName = $_FILES['uploaded-photo']['tmp_name'];
                    $picOriginalName = $_FILES['uploaded-photo']['name'];
                    $picOriginalName = explode(".", $picOriginalName);
                    $extension = end($picOriginalName);

                    //vallidate MIME type:
                    $mimeType = explode("/", mime_content_type($uploadedPicName))[0];

                    if ($mimeType === "image") {

                        //send data to PostDAO.php to add post to DB:
                        $authorId = $_POST['uploaded-photo-authorId'];
                        $timelineId = $_POST['uploaded-photo-timelineId'];
                        $type = "photos";
                        $text = htmlentities(trim($_POST['uploaded-photo-text']));
                        $newPost = new Post($authorId, $timelineId, $type, $text);
                        $newPost->extension = $extension;
                        $dao->addPost($newPost);

                        //upload photo to server:

                        if (isset($_SESSION['fileName'])) {
                            if (is_uploaded_file($uploadedPicName)) {
                                if (move_uploaded_file($uploadedPicName, $_SESSION['fileName'])) {
                                    
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
        } elseif (isset($_POST['upload-video'])) {
            try {
                if (isset($_FILES['uploaded-video'])) {

                    //get file extension:
                    $uploadedFileName = $_FILES['uploaded-video']['tmp_name'];
                    $fileOriginalName = $_FILES['uploaded-video']['name'];
                    $fileOriginalName = explode(".", $fileOriginalName);
                    $extension = end($fileOriginalName);

                    //vallidate MIME type:

                    $mimeType = explode("/", mime_content_type($uploadedFileName))[0];

                    if ($mimeType === "video") {

                        //send data to PostDAO.php to add post to DB:
                        $authorId = $_POST['uploaded-video-authorId'];
                        $timelineId = $_POST['uploaded-video-timelineId'];
                        $type = "uploaded_videos";
                        $text = htmlentities(trim($_POST['uploaded-video-text']));
                        $newPost = new Post($authorId, $timelineId, $type, $text);
                        $newPost->extension = $extension;
                        $dao->addPost($newPost);

                        //upload video to server:

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
