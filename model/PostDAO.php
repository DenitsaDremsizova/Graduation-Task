<?php
class PostDAO {
	private $db;
	
//	const ADD_NEW_POST_SQL = 'INSERT INTO posts VALUES(?,?,?)';
	const GET_ALL_POSTS_SQL = "SELECT p.id, p.author_id, p.type, p.date_time, p.timeline_id, tp.text AS 'tp-text', "
                . "vp.link, vp.text AS 'vp-text', uv.text AS 'uv-text', uv.file AS 'uv-file', uv.album_id AS 'uv-album_id', "
                . "ph.text AS 'ph-text', ph.file AS 'ph-file', ph.album_id AS 'ph-album_id' FROM posts p LEFT JOIN text_posts tp "
                . "ON p.id = tp.id LEFT JOIN video_posts vp ON p.id = vp.id LEFT JOIN uploaded_videos uv ON p.id = uv.id "
                . "LEFT JOIN photos ph ON p.id = ph.id WHERE p.timeline_id = ? ORDER BY p.date_time DESC";
//      const DELETE_CONTACT_SQL = 'DELETE FROM contacts WHERE id = ? AND user_id = ?';
//      const UPDATE_CONTACT_SQL = 'UPDATE contacts SET phone = ?, email = ?, name=? WHERE user_id = ? AND id = ?';
	
	public function __construct() {
		$this->db = DBConnection::getDb();		
	}
	
//        public function addContact(Contact $contact) {
//		if ($contact->id === null) {
//			$pstmt = $this->db->prepare ( self::ADD_NEW_CONTACT_SQL );
//			$pstmt->execute ( array (
//					$contact->phone,
//					$contact->email,
//					$contact->name,
//					$contact->userId 
//			) );
//		} else {
//			$pstmt = $this->db->prepare ( self::UPDATE_CONTACT_SQL );
//			$pstmt->execute ( array (
//					$contact->phone,
//					$contact->email,
//					$contact->name,
//					$contact->userId,
//					$contact->id,
//			) );
//		}
//	}
//	
//        public function deleteContact($id, $userId) {
//		$pstmt = $this->db->prepare ( self::DELETE_CONTACT_SQL );
//		$pstmt->execute ( array (
//				$id,
//				$userId 
//		) );
//	}
	
	public function listAllPosts($timelineId) {
		$pstmt = $this->db->prepare(self::GET_ALL_POSTS_SQL);
		$pstmt->execute(array($timelineId));
		
		$posts = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		$result = array();
                
                //var_dump($posts);
		                
		foreach ($posts as $post) {
                        if ($post['type'] === 'text_posts') {                            
                            $result[] = new TextPost($post['id'], $post['author_id'], $post['type'], $post['date_time'], $post['tp-text']);
                        } elseif ($post['type'] === 'video_posts') {
                            $result[] = new VideoPost($post['id'], $post['author_id'], $post['type'], $post['date_time'], $post['vp-text'], $post['link']);
                        }
//                        } elseif ($post['type'] === 'uploaded_videos') {
//                            $result[] = new UploadedVideoPost();
//                        } elseif ($post['type'] === 'photos') {
//                            $result[] = new PhotoPost();
//                        }
		}
		
		return $result;
	}
}

?>