<?php
class PostDAO {
	private $db;
	
//	const ADD_NEW_POST_SQL = 'INSERT INTO posts VALUES(?,?,?)';
	const GET_ALL_POSTS_SQL = "SELECT p.id, p.author_id, p.type, DATE_FORMAT(p.date_time,'Posted on %d-%b-%Y at %h:%i:%s') AS 'date_time', "
                . "p.timeline_id, tp.text AS 'tp-text', REPLACE(vp.link, 'watch?v=', 'embed/') AS 'link', "
                . "vp.text AS 'vp-text', uv.text AS 'uv-text', uv.file AS 'uv-file', ph.text AS 'ph-text', "
                . "ph.file AS 'ph-file', concat(u.first_name, ' ', u.last_name) AS 'author_name' "
                . "FROM posts p LEFT JOIN text_posts tp ON p.id = tp.id "
                . "LEFT JOIN video_posts vp ON p.id = vp.id "
                . "LEFT JOIN uploaded_videos uv ON p.id = uv.id "
                . "LEFT JOIN photos ph ON p.id = ph.id "
                . "LEFT JOIN users u ON p.author_id = u.id "
                . "WHERE p.timeline_id = ? ORDER BY p.date_time DESC";
        const GET_ALL_COMMENTS_OF_POST_SQL = "SELECT c.id AS 'comment_id', c.text, c.timestamp, c.commented_post_id, "
                . "concat(u.first_name, ' ', u.last_name) AS 'commentor_name' FROM comments c LEFT JOIN users u "
                . "ON c.author_id = u.id WHERE c.commented_post_id = ?";
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
                
		                
		foreach ($posts as $post) {
                        $pstmt2 = $this->db->prepare(self::GET_ALL_COMMENTS_OF_POST_SQL);
                        $pstmt2->execute(array($post['id']));
		
                        $post['comments'] = $pstmt2->fetchAll(PDO::FETCH_ASSOC);           
                    
                        if ($post['type'] === 'text_posts') {                            
                            $result[] = new Post($post['id'], $post['author_id'], $post['author_name'], $post['type'], $post['date_time'], $post["tp-text"], $post['comments']);
                        } else {
                            if ($post['type'] === 'video_posts') {
                                $source = $post['link'];
                            } elseif ($post['type'] === 'photos') {
                                $source = $post['ph-file'];
                            } elseif ($post['type'] === 'uploaded_videos') {
                                $source = $post['uv-file'];
                            }
                            $result[] = new MediaPost($post['id'], $post['author_id'], $post['author_name'], $post['type'], $post['date_time'], $post['uv-text'], $source, $post['comments']);
                        }
                                                                    
		}
		
		return $result;
	}
}

?>