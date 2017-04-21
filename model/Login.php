<?php
class Login extends Action {
	
	const CHECK_EMAIL_PASSWORD = "SELECT email, id FROM users WHERE email = ? and password= ?;";
	const CHECK_EMAIL_EXIST = "SELECT email, id FROM users WHERE email = ?;";


	public function do() {
	
		$result = $this->exec ( self::CHECK_EMAIL_PASSWORD, array (
				$this->user->email,
				$this->user->password
		) );
		
		if (count ( $result ) === 0) {
			throw new LoginException("Email or password is incorrect!");
		}
		$this->logUser();
	}
}

?>