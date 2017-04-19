<?php
class FriendDAO {
	private $db;
	
	const ADD_NEW_FRIEND_SQL = 'INSERT INTO friendships VALUES(?,?,?)';
	const GET_ALL_FRIENDS_SQL = 'SELECT u. id, u.first_name, u.last_name, u.email, u.gender, u.date_of_birth, u.personal_info '
                . 'FROM friendships f LEFT JOIN users u ON IF(f.user_id= ?, f.friend_id = u.id, f.user_id = u.id) '
                . 'WHERE f.user_id = ? OR f.friend_id = ? ORDER BY first_name';
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
	
	public function listAllFriends($userId) {
		$pstmt = $this->db->prepare(self::GET_ALL_FRIENDS_SQL);
		$pstmt->execute(array($userId, $userId, $userId));
		
		$friends = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		$result = array();
		                
		foreach ($friends as $friend) {
			$result[] = new Friend($friend['first_name'], $friend['last_name'], $friend['email'], $friend['id'], $friend['gender'], $friend['date_of_birth'], $friend['personal_info']);
//                        echo $friend['first_name'] . "<br/>";
//                        echo $friend['last_name'] . "<br/>";
//                        echo $friend['email'] . "<br/>";
//                        echo $friend['id'] . "<br/>";
//                        echo $friend['gender'] . "<br/>";
//                        echo $friend['date_of_birth'] . "<br/>";
//                        echo $friend['personal_info'] . "<br/>";

		}
		
		return $result;
	}
}

?>