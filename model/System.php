<?php
class System {
	private $db;
	const GET_ALL_COUNTRIES = "SELECT * FROM countries;";
	
	public function __construct () {
		$this->db = DBConnection::getDb ();
	}
	
	protected function exec($sql, array $bindParams = array()) {
		$pstmt = $this->db->prepare ( $sql );
		$pstmt->execute ( $bindParams );
		return $pstmt->fetchAll ( PDO::FETCH_ASSOC );
	}
	
	public function getAllCountries(){
		return $this->exec(self::GET_ALL_COUNTRIES);
	}
}