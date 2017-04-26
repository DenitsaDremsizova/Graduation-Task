<?php

class FriendDAO {
	
	private $db;
	
	const ADD_NEW_FRIEND_SQL = 'INSERT INTO friendships VALUES(?,?,?)';
	const GET_ALL_FRIENDS_SQL = 'SELECT u. id, u.first_name, u.last_name,c.country,ua.city, u.email, u.gender, u.date_of_birth, u.personal_info
             FROM friendships f LEFT JOIN users u ON IF(f.user_id= ?, f.friend_id = u.id, f.user_id = u.id)
             JOIN user_address ua ON (u.id=ua.user_id)
             JOIN countries c ON (ua.country_id = c.id)
             WHERE f.user_id = ? OR f.friend_id = ? ORDER BY u.first_name;';
	const GET_ONE_FRIEND_SQL = "SELECT u.id, u.first_name, u.last_name, ua.city, c.country "
			. "FROM users u LEFT JOIN user_address ua ON u.id = ua.user_id LEFT JOIN countries c ON ua.country_id = c.id "
					. "WHERE u.id=?;";
	const CHECK_IF_IN_FRIENDS_LIST_SQL = "SELECT * FROM friendships WHERE (user_id = ? && friend_id = ?) OR (user_id = ? && friend_id = ?);";
	const GET_USERS_BY_EMAIL = 'SELECT u. id, u.first_name, u.last_name,c.country,ua.city, u.email, u.gender, u.date_of_birth, u.personal_info
          	  FROM users u
             JOIN user_address ua ON (u.id=ua.user_id)
             JOIN countries c ON (ua.country_id = c.id)
			WHERE u.email LIKE ? ORDER BY u.first_name;';
	const GET_USER_FRIEND_REQUESTS = 'SELECT u. id, u.first_name, u.last_name,c.country,ua.city, u.email, u.gender, u.date_of_birth, u.personal_info
             FROM users u JOIN friend_requests f ON (f.sender_id = u.id) JOIN user_address ua ON (u.id = ua.user_id)
             JOIN countries c ON (ua.country_id = c.id)
             WHERE f.reciever_id = ?;';
	const CHECK_IF_IN_FRIENDS_REQUEST_LIST_SQL = "SELECT u. id, u.first_name, u.last_name,c.country,ua.city, u.email, u.gender, u.date_of_birth, u.personal_info
             FROM users u JOIN friend_requests f ON (f.sender_id = u.id) JOIN user_address ua ON (u.id = ua.user_id)
             JOIN countries c ON (ua.country_id = c.id) 
             WHERE (f.reciever_id = ? AND f.sender_id = ?) OR (f.reciever_id = ? AND f.sender_id = ?);";
	const SEND_FRIEND_REQUEST_SQL = 'INSERT INTO friend_requests VALUES (?,?);';
					
					
					public function __construct() {
						$this->db = DBConnection::getDb();
					}
					public function getUsersByEmail($email) {
						$pstmt = $this->db->prepare(self::GET_USERS_BY_EMAIL);
						$pstmt->execute(array($email));
						
						$friends = $pstmt->fetchAll(PDO::FETCH_ASSOC);
						$result = array();
						
						foreach ($friends as $friend) {
							$result[] = new Friend($friend['id'], $friend['first_name'], $friend['last_name'],
									$friend['country'],$friend['city'],$friend['email'], $friend['gender'], $friend['date_of_birth'], $friend['personal_info']);
						}
						
						return $result;
					}
					
					public function listAllFriends($userId) {
						$pstmt = $this->db->prepare(self::GET_ALL_FRIENDS_SQL);
						$pstmt->execute(array($userId, $userId, $userId));
						
						$friends = $pstmt->fetchAll(PDO::FETCH_ASSOC);
						$result = array();
						
						foreach ($friends as $friend) {
							$result[] = new Friend($friend['id'], $friend['first_name'], $friend['last_name'],
									$friend['country'],$friend['city'],$friend['email'], $friend['gender'], $friend['date_of_birth'], $friend['personal_info']);
						}
						
						return $result;
					}
					
					public function getOneFriend($friendId) {
						$pstmt = $this->db->prepare(self::GET_ONE_FRIEND_SQL);
						$pstmt->execute(array($friendId));
						
						$friends = $pstmt->fetchAll(PDO::FETCH_ASSOC);
						$result = array();
						$friend = new Friend($friendId, $friends[0]['first_name'], $friends[0]['last_name'], $friends[0]['country'], $friends[0]['city']);
						return $friend;
					}
					
					public function checkIfInFriendsList($userId, $friendId) {
						$pstmt = $this->db->prepare(self::CHECK_IF_IN_FRIENDS_LIST_SQL);
						$pstmt->execute(array($userId, $friendId, $friendId, $userId));
						
						$friends = $pstmt->fetchAll(PDO::FETCH_ASSOC);
						
						if (count($friends) > 0) {
							return true;
						}
						return false;
					}
					public function listUserFriendRequests($userId) {
						$pstmt = $this->db->prepare(self::GET_USER_FRIEND_REQUESTS);
						$pstmt->execute(array($userId));
						
						$friends = $pstmt->fetchAll(PDO::FETCH_ASSOC);
						$result = array();
						
						foreach ($friends as $friend) {
							$result[] = new Friend($friend['id'], $friend['first_name'], $friend['last_name'],
									$friend['country'],$friend['city'],$friend['email'], $friend['gender'], $friend['date_of_birth'], $friend['personal_info']);
						}
						
						return $result;
					}
					
					public function checkIfInFriendRequestList($userId,$friendId) {
						$pstmt = $this->db->prepare(self::CHECK_IF_IN_FRIENDS_REQUEST_LIST_SQL);
						$pstmt->execute(array($userId, $friendId,$friendId,$userId));
						
						$friends = $pstmt->fetchAll(PDO::FETCH_ASSOC);
						
						if (count($friends) > 0) {
							return true;
						}
						return false;
					}
					public function deleteFriend ($userId,$id) {
						$sql = 'DELETE FROM friendships WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?) ;';
						$pstmt = $this->db->prepare ( $sql );
						$bindParams = array($userId,$id,$id,$userId);
						$pstmt->execute ( $bindParams );
					}
					public function sendFriendRequest ($userId,$friendId) {
						$sql = SELF::SEND_FRIEND_REQUEST_SQL;
						$pstmt = $this->db->prepare ( $sql );
						$bindParams = array($userId,$friendId);
						$pstmt->execute ( $bindParams );
					}
					
					public function deleteFriendRequest ($senderId,$recieverid) {
						$sql = 'DELETE FROM friend_requests WHERE sender_id = ? AND reciever_id = ? ;';
						$pstmt = $this->db->prepare ( $sql );
						$bindParams = array($senderId,$recieverid);
						$pstmt->execute ( $bindParams );
					}
					
					public function acceptFriendRequest ($userId,$friendId,$date) {
						$sql = SELF::ADD_NEW_FRIEND_SQL;
						$pstmt = $this->db->prepare ( $sql );
						$bindParams = array($userId,$friendId,$date);
						$pstmt->execute ( $bindParams );
					}
					
					public function addNewFriend ($senderId,$recieverid,$userId,$friendId,$date) {
						try {
							$this->db->beginTransaction();
							$this->deleteFriendRequest($senderId, $recieverid);
							$this->acceptFriendRequest($userId, $friendId, $date);
							$this->db->commit();
						}
						catch (Exception $e) {
							echo $e->getMessage();
							$this->db->rollBack();
						}
					}
}

?>