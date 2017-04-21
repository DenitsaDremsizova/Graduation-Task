<?php
class LoginDAO {
	private $db;
	private $user;
	private $password;
	const CHECK_EMAIL_PASSWORD = "SELECT email, id FROM users WHERE email = ? and password= ?;";
	const CHECK_EMAIL_EXIST = "SELECT email, id FROM users WHERE email = ?;";
	public function __construct(Login $user) {
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
	private function checkEmailExist() {
		$result = $this->exec ( self::CHECK_EMAIL_EXIST, array (
				$this->user->email
		) );
		
		if (count ( $result ) === 0) {
			throw new LoginException("This email does not exist!");
		} 
	}
	public function checkEmailAndPassword() {
		$this->checkEmailExist();
		$result = $this->exec ( self::CHECK_EMAIL_PASSWORD, array (
				$this->user->email,
				$this->user->password
		) );
		
		if (count ( $result ) === 0) {
			throw new LoginException("Email or password is incorrect!");
		} 
	}
}
?>