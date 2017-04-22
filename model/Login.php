<?php
class Login extends Action {
	
	const CHECK_EMAIL_PASSWORD = "SELECT email, id FROM users WHERE email = ? and password= ?;";
	const CHECK_EMAIL_EXIST = "SELECT email, id FROM users WHERE email = ?;";
	const GET_DATA_LOGGED_USER = 'SELECT id,first_name,last_name,gender,date_of_birth,personal_info FROM users WHERE email = ? AND password = ?;';

	public function do() {
	
		$result = $this->exec ( self::CHECK_EMAIL_PASSWORD, array (
				$this->user->email,
				$this->user->password
		) );
		
		if (count ( $result ) === 0) {
			throw new LoginException("Email or password is incorrect!");
		}
		$this->logUser(self::getLoggedUserData());
	}
	
	public function getLoggedUserData() {
		$result = $this->exec ( self::CHECK_EMAIL_PASSWORD, array (
				$this->user->email,
				$this->user->password
		) );
		
		return $result;
	}
}

?>