<?php

class FriendDAO {

    private $db;

    const ADD_NEW_FRIEND_SQL = 'INSERT INTO friendships VALUES(?,?,?)';
    const GET_ALL_FRIENDS_SQL = 'SELECT u. id, u.first_name, u.last_name, u.email, u.gender, u.date_of_birth, u.personal_info '
            . 'FROM friendships f LEFT JOIN users u ON IF(f.user_id= ?, f.friend_id = u.id, f.user_id = u.id) '
            . 'WHERE f.user_id = ? OR f.friend_id = ? ORDER BY first_name';
    const GET_ONE_FRIEND_SQL = "SELECT u.id, u.first_name, u.last_name, ua.city, c.country "
            . "FROM users u LEFT JOIN user_address ua ON u.id = ua.user_id LEFT JOIN countries c ON ua.country_id = c.id "
            . "WHERE u.id=?;";
    const CHECK_IF_IN_FRIENDS_LIST_SQL = "SELECT * FROM friendships WHERE (user_id = ? && friend_id = ?) OR (user_id = ? && friend_id = ?);";

    public function __construct() {
        $this->db = DBConnection::getDb();
    }

    public function listAllFriends($userId) {
        $pstmt = $this->db->prepare(self::GET_ALL_FRIENDS_SQL);
        $pstmt->execute(array($userId, $userId, $userId));

        $friends = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        $result = array();

        foreach ($friends as $friend) {
            $result[] = new Friend($friend['id'], $friend['first_name'], $friend['last_name'], 
                    $friend['email'], $friend['gender'], $friend['date_of_birth'], $friend['personal_info']);
        }

        return $result;
    }
    
    public function getOneFriend($friendId) {
        $pstmt = $this->db->prepare(self::GET_ONE_FRIEND_SQL);
        $pstmt->execute(array($friendId));
        
        $friends = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        $result = array();
        var_dump($friends);
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

}

?>