<?php
class Register extends Action {
	
	const CHECK_USER_ALRADY_EXIST_SQL = "SELECT email, id FROM users WHERE email = ?;";
	const REGISTER_NEW_TIMELINE_SQL = "INSERT into timelines VALUES (null,'users',?);";
	const REGISTER_NEW_USER_SQL = "INSERT into users VALUES (?,?,?,?,?,?,?,?);";
	const GET_ALL_COUNTRIES = "SELECT * FROM countries;";
	
	public function checkUserExist() {
		$result = $this->exec ( self::CHECK_USER_ALRADY_EXIST_SQL, array (
				$this->user->email
		) );
		
		if (count ( $result ) !== 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function do() {
		// insert new row in timeline db
		$date = date ( "Y-m-d H:i:s" );
		$bindParams = array (
				$date
		);
		$this->exec ( self::REGISTER_NEW_TIMELINE_SQL, $bindParams, false );
		
		// get last insert id in timeline
		$timelineId = $this->db->lastInsertId ();
		$date = $this->user->year . "-" . $this->user->month . "-" . $this->user->day;
		
		// insert new row in users db
		$userBindParams = array (
				$timelineId,
				$this->user->firstName,
				$this->user->lastName,
				$this->user->email,
				$this->user->password,
				$this->user->gender,
				$date,
				null
		);
		
		$this->exec ( self::REGISTER_NEW_USER_SQL, $userBindParams, false );
		$this->user->setId($this->getLastInsertId());
		$this->logUser();
	}
}
?>