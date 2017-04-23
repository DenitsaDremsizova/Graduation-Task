<?php
class Login extends Action {
	
	const CHECK_EMAIL_PASSWORD = "SELECT email, id FROM users WHERE email = ? and password= ?;";
	const CHECK_EMAIL_EXIST = "SELECT email, id FROM users WHERE email = ?;";
	const GET_DATA_LOGGED_USER = 'SELECT u.id,u.first_name,u.last_name,u.gender,u.date_of_birth,u.personal_info,c.country,ua.city FROM users u
	JOIN user_address ua ON (ua.user_id = u.id) JOIN countries c ON (ua.country_id = c.id)
	WHERE u.email = ? AND u.password = ?;';

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
		$result = $this->exec ( self::GET_DATA_LOGGED_USER, array (
				$this->user->email,
				$this->user->password
		) );
		
		return $result;
	}
}

?>