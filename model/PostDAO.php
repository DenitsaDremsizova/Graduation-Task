<?php
class PostDAO {
	private $db;
	
	const ADD_NEW_POST_INTO_POSTS_SQL = 'INSERT INTO posts (author_id, type, timeline_id) VALUES(?,?,?);';
        const ADD_NEW_POST_INTO_TEXT_POSTS_SQL = 'INSERT INTO text_posts VALUES(?,?);';
        const GET_MAX_ID_FROM_POSTS_SQL = 'SELECT MAX(id) FROM posts;';
	const GET_ALL_POSTS_SQL = "SELECT p.id, p.author_id, p.type, p.timeline_id, DATE_FORMAT(p.date_time,'Posted on %d-%b-%Y at %h:%i:%s') AS 'date_time', "
                . "p.timeline_id, tp.text AS 'tp-text', REPLACE(vp.link, 'watch?v=', 'embed/') AS 'link', "
                . "vp.text AS 'vp-text', uv.text AS 'uv-text', uv.file AS 'uv-file', ph.text AS 'ph-text', "
                . "ph.file AS 'ph-file', concat(u.first_name, ' ', u.last_name) AS 'author_name' "
                . "FROM posts p LEFT JOIN text_posts tp ON p.id = tp.id "
                . "LEFT JOIN video_posts vp ON p.id = vp.id "
                . "LEFT JOIN uploaded_videos uv ON p.id = uv.id "
                . "LEFT JOIN photos ph ON p.id = ph.id "
                . "LEFT JOIN users u ON p.author_id = u.id "
                . "WHERE p.timeline_id = ? ORDER BY p.date_time DESC;";
        const GET_ALL_COMMENTS_OF_POST_SQL = "SELECT c.id AS 'comment_id', c.text, c.timestamp, c.commented_post_id, c.author_id,"
                . "concat(u.first_name, ' ', u.last_name) AS 'commentor_name' FROM comments c LEFT JOIN users u "
                . "ON c.author_id = u.id WHERE c.commented_post_id = ?";
//      const DELETE_CONTACT_SQL = 'DELETE FROM contacts WHERE id = ? AND user_id = ?';
//      const UPDATE_CONTACT_SQL = 'UPDATE contacts SET phone = ?, email = ?, name=? WHERE user_id = ? AND id = ?';
	
	public function __construct() {
		$this->db = DBConnection::getDb();		
	}
	
        public function addPost(Post $post) {
		//if ($contact->id === null) {
            if($post->type == "text_posts" && strlen($post->text) > 0) { //more validation to add: 1)is user logged?; 2)is user alllowed to post on timeline?
            try{
                        $this->db->beginTransaction();
			$pstmt = $this->db->prepare (self::ADD_NEW_POST_INTO_POSTS_SQL);
			$pstmt->execute (array(
					$post->authorId,
					$post->type,
                                        $post->timelineId)
                                );
                        $pstmt = $this->db->prepare (self::GET_MAX_ID_FROM_POSTS_SQL);
                        $pstmt->execute();
                        $maxId = $pstmt->fetchColumn() + 0;
                        $pstmt = $this->db->prepare (self::ADD_NEW_POST_INTO_TEXT_POSTS_SQL);
			$pstmt->execute (array ($maxId, $post->text));
                        $this->db->commit();
                } catch (Exception $e){
                    $this->db->rollBack();
                }
            }
        }
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
                            $result[] = new Post($post['author_id'], $post['timeline_id'], $post['type'], $post["tp-text"], 
                                    $post['date_time'], $post['author_name'], $post['id'], $post['comments']);
                        } else {
                            if ($post['type'] === 'video_posts') {
                                $source = $post['link'];
                                $text = $post['vp-text'];
                            } elseif ($post['type'] === 'photos') {
                                $source = $post['ph-file'];
                                $text = $post['ph-text'];
                            } elseif ($post['type'] === 'uploaded_videos') {
                                $source = $post['uv-file'];
                                $text = $post['uv-text'];
                            }
                            $result[] = new MediaPost($post['author_id'], $post['timeline_id'], $post['type'], $text, 
                                    $post['date_time'], $post['author_name'], $post['id'], $post['comments'], $source);
                        }
                                                                    
		}
		
		return $result;
	}
}

?>