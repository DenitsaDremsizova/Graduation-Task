<?php
class Register extends Action {
	
	const CHECK_USER_ALRADY_EXIST_SQL = "SELECT email, id FROM users WHERE email = ?;";
	const REGISTER_NEW_USER_SQL = "INSERT into users VALUES (?,?,?,?,?,?,?,?);";
	const GET_ALL_COUNTRIES = "SELECT * FROM countries;";
	const GET_DATA_LOGGED_USER = 'SELECT id,first_name,last_name,gender,date_of_birth,personal_info from users WHERE email = ? AND password = ?;';
	
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
		
		$date = $this->user->year . "-" . $this->user->month . "-" . $this->user->day;
		// insert new row in users db
		$userBindParams = array (
				null,
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
		$this->logUser(self::getLoggedUserData());
	}
	public function getLoggedUserData() {
		$result = $this->exec ( self::GET_DATA_LOGGED_USER, array (
				$this->user->email,
				$this->user->password
		) );
		
		return $result;
	}
}
?>