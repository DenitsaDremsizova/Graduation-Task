<?php
abstract class Action implements JsonSerializable{
	protected $db;
	protected $user;
	
	abstract public function do ();
	
	public function jsonSerialize() {
		return get_object_vars($this);
	}
	
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
	
	protected function logUser() {
		$_SESSION['userInfo'] = $this->jsonSerialize();
	}
	
	protected function getLastInsertId (){
		return $this->db->lastInsertId();
	}
	
}