<?php
class Login extends Action {
	
	const CHECK_EMAIL_PASSWORD = "SELECT email, id FROM users WHERE email = ? and password= ?;";
	const CHECK_EMAIL_EXIST = "SELECT email, id FROM users WHERE email = ?;";
	const RESET_PASSWORD = "UPDATE users SET password = ? WHERE email = ?;";
	public function doIt() {
	
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
		$result = $this->exec ( Action::GET_DATA_LOGGED_USER, array (
				$this->user->email,
				$this->user->password
		) );
		
		return $result;
	}
	public function sendNewPassowrd ($email,$password) {
		$subject = 'Reset password';
		$message = 'Your new password = ' . $password; 
		
		$headers = "From: 'delqnkolevv@gmail.com'" . "\r\n" .
				"CC: hyperniki@abv.bg"; /*extra header*/
		
		$to = $email;
		$subject = "Reset password";
		$txt = 'Your new password is ' . $password; 
		$headers = "From: getTogether@abv.bg" . "\r\n" .
				"CC: delyankolevv@gmail.com";
		
		if(mail($to,$subject,$txt,$headers)) {
			echo "mail send successfully";
		}
	}
	
	public function checkEmailExist ($email) {
		$result = $this->exec ( self::CHECK_EMAIL_EXIST, array (
				$email
		) );

		return $result;
	}
	
	public function ResetPassowrd ($email,$password) {
		$sql = "UPDATE users SET password = ? WHERE email = ?;";
		$hashPassword = hash('sha256',$password);
		$pstmt = $this->db->prepare ( $sql );
		$bindParams = array($hashPassword,$email);
		$result = $pstmt->execute ( $bindParams );
		return $result;
	}
	
}

?>