<?php
try {
function __autoload($className) {
    require_once "../model/" . $className . '.php';
}

session_start();

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    if(isset($_GET['id'])) {
        $getId = $_GET['id'];
    } else {
        $getId = $userId;
    }

    $dao = new PostDAO();

    if ($_SERVER ['REQUEST_METHOD'] === 'POST') {

        //validate if user is allowed to post on timeline:
        if ($userId !== $getId) {
            $daoFriend = new FriendDAO;
            if (!($daoFriend->checkIfInFriendsList($userId, $getId))) {
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
                $getId = $_POST['uploaded-photo-getId'];
                $type = 'photos';
                $text = htmlentities(trim($_POST['uploaded-photo-text']));
            } elseif ($fileType === 'video') {
                $uploadedFileName = $_FILES['uploaded-video']['tmp_name'];
                $fileOriginalName = $_FILES['uploaded-video']['name'];
                $requiredMIMEtype = 'video';
                $authorId = $_POST['uploaded-video-authorId'];
                $getId = $_POST['uploaded-video-getId'];
                $type = 'uploaded_videos';
                $text = htmlentities(trim($_POST['uploaded-video-text']));
            }

            try {
                if ($uploadedFileName !== "" && $uploadedFileName !== null) {

                    //get file extension:
                    $fileOriginalName = explode(".", $fileOriginalName);
                    $extension = end($fileOriginalName);

                    //validate MIME type:
                    $mimeType = explode("/", mime_content_type($uploadedFileName))[0];

                    if ($mimeType === $requiredMIMEtype) {

                        //send data to PostDAO.php to add post to DB:

                        $newPost = new Post($authorId, $getId, $type, $text);
                        $newPost->extension = $extension;
                        $newDAO = new PostDAO();
                        $newDAO->addPost($newPost);

                        //upload file to server:

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
                header('Location:./TimelineController.php?getId=' . $getId, true, 302);
            }
        }

        //upload file:    
        if (isset($_POST['upload-photo'])) {
            uploadFile('photo');
        } elseif (isset($_POST['upload-video'])) {
            uploadFile('video');
        
        //upload video link:    
        } elseif (isset($_POST['upload-video-link'])) {
            $authorId = $_POST['uploaded-video-link-authorId'];
            $getId = $_POST['uploaded-video-link-getId'];
            $type = 'video_posts';
            $text = htmlentities(trim($_POST['uploaded-video-link-text']));
            $link = htmlentities(trim($_POST['uploaded-video-link']));
            
            if ($link !== "" && $link !== null) {
                if (substr($link, 0, 24) === 'https://www.youtube.com/' || substr($link, 0, 22) === 'https://www.vbox7.com/') {
                    $newPost = new Post($authorId, $getId, $type, $text);
                    $newPost->link = $link;
                    $newDAO = new PostDAO();
                    $newDAO->addPost($newPost);
                } else {
                    throw new Exception("Unsupported video link provider. <br/>Please note that GetTogether supports only YouTube and Vbox7 video links.");
                }
            } else {
                throw new Exception("You haven't added a link.");
            }
            header('Location:./TimelineController.php?getId=' . $getId, true, 302); //to remove after refactoring
        // add new text post
        } else {
            $textPost = json_decode($_POST['data']);

            $newPost = new Post($textPost->authorId, $textPost->getId, $textPost->type, htmlentities(trim($textPost->text)));
            $dao->addPost($newPost);
        }
    } elseif ($_SERVER ['REQUEST_METHOD'] === 'GET') {
        unset($_SESSION['error-msg']);
        // list all contacts
        echo json_encode($dao->listAllPosts($getId));
    }
} else {
    http_response_code(401);
    echo '{"error": "not logged in"}';
}
} catch (PDOException $e) {
	$_SESSION['error'] = 'Something went wrong, please try again later!';
	header ( 'Location:DBerrorController.php' );die();
}
?>
