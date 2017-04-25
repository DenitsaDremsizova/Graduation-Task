<?php

class PhotoDAO {

    private $db;
    
    const GET_ALL_PHOTOS_OF_USER_SQL = "SELECT p.id, p.author_id, p.date_time, ph.file, ph.profile_pic, ph.cover_pic "
            . "FROM posts p JOIN photos ph ON p.id = ph.id "
            . "WHERE p.author_id = ? AND p.type = 'photos' ORDER BY p.date_time DESC";
    
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
    
}