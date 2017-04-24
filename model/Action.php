<?php
abstract class Action {
	const GET_DATA_LOGGED_USER = 'SELECT u.id,u.first_name,u.last_name,u.gender,u.date_of_birth,u.personal_info,c.country,ua.city FROM users u
	JOIN user_address ua ON (ua.user_id = u.id) JOIN countries c ON (ua.country_id = c.id)
	WHERE u.email = ? AND u.password = ?;';
	protected $db;
	protected $user;
	
	abstract public function doIt();
	
	public function __construct (User $user) {
		$this->db = DBConnection::getDb ();
		$this->user = $user;
	}
	
	protected function exec($sql, array $bindParams = array(), $return = true) {
		$pstmt = $this->db->prepare ( $sql );
		$pstmt->execute ( $bindParams );
		if ($return) {
			return $pstmt->fetchAll ( PDO::FETCH_ASSOC );
		}
	}
	
	protected function logUser($data) {
		$_SESSION['userId'] = $data[0]['id'];
		$_SESSION['first_name'] = $data[0]['first_name'];
		$_SESSION['last_name'] = $data[0]['last_name'];
		$_SESSION['date_of_birth'] = $data[0]['date_of_birth'];
		$_SESSION['country'] = $data[0]['country'];
		$_SESSION['city'] = $data[0]['city'];
	}
	
	protected function getLastInsertId (){
		return $this->db->lastInsertId();
	}
	
}