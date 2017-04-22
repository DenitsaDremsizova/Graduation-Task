<?php
abstract class Action {
	protected $db;
	protected $user;
	
	abstract public function do ();
	
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
		$_SESSION['userEmail'] = $data[0]['email'];
		$_SESSION['userId'] = $data[0]['id'];
	}
	
	protected function getLastInsertId (){
		return $this->db->lastInsertId();
	}
	
}