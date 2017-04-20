<?php
class RegisterDAO {
	private $db;
	private $user;
	const CHECK_USER_ALRADY_EXIST_SQL = "SELECT email, id FROM users WHERE email = ?;";
	const REGISTER_NEW_TIMELINE_SQL = "INSERT into timelines VALUES (null,'users',?);";
	const REGISTER_NEW_USER_SQL = "INSERT into users VALUES (?,?,?,?,?,?,?,?);";
	const GET_ALL_COUNTRIES = "SELECT * FROM countries;";
	public function __construct(Register $user) {
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
	public function checkUserExist() {
		$result = $this->exec ( self::CHECK_USER_ALRADY_EXIST_SQL, array (
				$this->user->email 
		) );
		
		if (count ( $result ) !== 0) {
			throw new RegisterException("This user already exist!");
		} else {
			return false;
		}
	}
	public function save() {
		$date = date ( "Y-m-d H:i:s" );
		
		$bindParams = array (
				$date 
		);
		$this->exec ( self::REGISTER_NEW_TIMELINE_SQL, $bindParams, false );
		$timelineId = $this->db->lastInsertId ();
		$date = $this->user->year . "-" . $this->user->month . "-" . $this->user->day;
		
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
	}
}
?>