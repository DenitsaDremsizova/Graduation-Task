<?php

class PhotoDAO {

    public $db;
    
    const GET_ALL_PHOTOS_OF_USER_SQL = "SELECT p.id, p.author_id, p.date_time, ph.file, ph.profile_pic, ph.cover_pic "
            . "FROM posts p JOIN photos ph ON p.id = ph.id "
            . "WHERE p.author_id = ? AND p.type = 'photos' "
            . "ORDER BY p.date_time DESC";
    const GET_PHOTO_OWNER_SQL = "SELECT author_id FROM posts WHERE id = ?;";
    const UNSET_OLD_PROFILE_PIC_SQL = "UPDATE photos ph JOIN posts p ON ph.id = p.id "
            . "SET ph.profile_pic =  0 WHERE ph.profile_pic = 1 AND p.author_id = ?;";
    const SET_NEW_PROFILE_PIC_SQL = "UPDATE photos ph JOIN posts p ON ph.id = p.id "
            . "SET ph.profile_pic = 1 WHERE ph.id = ? AND p.author_id = ?;";
    const UNSET_OLD_COVER_PIC_SQL = "UPDATE photos ph JOIN posts p ON ph.id = p.id "
            . "SET ph.cover_pic =  0 WHERE ph.cover_pic = 1 AND p.author_id = ?;";
    const SET_NEW_COVER_PIC_SQL = "UPDATE photos ph JOIN posts p ON ph.id = p.id "
            . "SET ph.cover_pic = 1 WHERE ph.id = ? AND p.author_id = ?;";
    const GET_PROFILE_PIC_SQL = "SELECT p.id, p.author_id, p.date_time, ph.file, ph.profile_pic, ph.cover_pic "
            . "FROM posts p JOIN photos ph ON p.id = ph.id "
            . "WHERE p.author_id = ? AND ph.profile_pic = 1";
    const GET_COVER_PIC_SQL = "SELECT p.id, p.author_id, p.date_time, ph.file, ph.profile_pic, ph.cover_pic "
            . "FROM posts p JOIN photos ph ON p.id = ph.id "
            . "WHERE p.author_id = ? AND ph.cover_pic = 1";
    
    
    public function __construct() {
        $this->db = DBConnection::getDb();
    }
    
    public function listAllPhotos($userId) {
        $pstmt = $this->db->prepare(self::GET_ALL_PHOTOS_OF_USER_SQL);
        $pstmt->execute(array($userId));
        
        $photos = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        $result = array();
        $photoNum = 0;
        
        foreach ($photos as $photo) {
            
            $isProfilePic = ($photo['profile_pic'] == '1') ? true : false;
            $isCoverPic = ($photo['cover_pic'] == '1') ? true : false;
            $photoNum++;
            
            $result[] = new Photo($photo['author_id'], $photo['id'], $photo['date_time'], $photo['file'], $isProfilePic, $isCoverPic, $photoNum);
        }
        return $result;        
    }
    
    public function validatePhotoOwner($userId, $photoId) {
         $pstmt = $this->db->prepare(self::GET_PHOTO_OWNER_SQL);
         $pstmt->execute(array($photoId));
         $photoOwnerId = $pstmt->fetchColumn();
         
         if ($photoOwnerId == $userId) {
             return true;
         }         
         return false;
    }
    
    public function updateProfilePic($userId, $photoId) {
        if ($this->validatePhotoOwner($userId, $photoId)) {
            try {
                $this->db->beginTransaction();

                //unset old profile pic:
                $pstmt = $this->db->prepare(self::UNSET_OLD_PROFILE_PIC_SQL);
                $pstmt->execute(array($userId));

                //set new profile pic:
                $pstmt = $this->db->prepare(self::SET_NEW_PROFILE_PIC_SQL);
                $pstmt->execute(array($photoId, $userId));
                
                $this->db->commit();
            } catch (Exception $e) {
                $_SESSION['error-msg'] = $e->getMessage();
                $this->db->rollBack();
            }        
        } else {
            $_SESSION['error-msg'] = "Unallowed operation: <br/>picture belongs to another user.";
        }
    }
    
        public function updateCoverPic($userId, $photoId) {
        if ($this->validatePhotoOwner($userId, $photoId)) {
            try {
                $this->db->beginTransaction();

                //unset old profile pic:
                $pstmt = $this->db->prepare(self::UNSET_OLD_COVER_PIC_SQL);
                $pstmt->execute(array($userId));

                //set new profile pic:
                $pstmt = $this->db->prepare(self::SET_NEW_COVER_PIC_SQL);
                $pstmt->execute(array($photoId, $userId));
                
                $this->db->commit();
            } catch (Exception $e) {
                $_SESSION['error-msg'] = $e->getMessage();
                $this->db->rollBack();
            }        
        } else {
            $_SESSION['error-msg'] = "Unallowed operation: <br/>picture belongs to another user.";
        }
    }
    
    public function getProfilePic($userId) {
        $pstmt = $this->db->prepare(self::GET_PROFILE_PIC_SQL);
        $pstmt->execute(array($userId));
        $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(count($result) == 0) {
            $profPicArray = array("userId" => $userId, "id" => "x", "date_time" => "x", "file" => "../uploads/default.jpg");
        } else {
            $profPicArray = $result[0];
        }
        
        $profilePicture = new Photo($userId, $profPicArray['id'], $profPicArray['date_time'], $profPicArray['file']);
        
        return $profilePicture;
    }
    
    public function getCoverPic($userId) {
        $pstmt = $this->db->prepare(self::GET_COVER_PIC_SQL);
        $pstmt->execute(array($userId));
        $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(count($result) == 0) {
            $covPicArray = array("userId" => $userId, "id" => "x", "date_time" => "x", "file" => "../uploads/default.jpg");
        } else {
            $covPicArray = $result[0];
        }
        
        $coverPicture = new Photo($userId, $covPicArray['id'], $covPicArray['date_time'], $covPicArray['file']);
        
        return $coverPicture;
    }

}