<?php
class DbHelper {
	private $db;
	private static $instance;
	const GET_USER_DATA_SQL = 'SELECT id,first_name,last_name,email,gender,date_of_birth,personal_info from users where id = ? ;';
	const GET_USER_WORK_EXPERIENCE = 'SELECT * FROM work_experience WHERE user_id = ? ORDER BY end_date desc limit 3 ;';
	const GET_USER_LANGUAGES = 'SELECT l.language,u.id as user_id,l.id as lang_id from users u join users_languages ul on (u.id = ul.user_id) join languages l on (ul.lang_id = l.id) where u.id = ? ';
	const GET_USER_INTERESTS = 'SELECT interest,user_id FROM interests WHERE user_id = ?;';
	const GET_USER_ADDRESS = 'SELECT c.country,ua.city FROM countries c JOIN user_address ua ON (c.id = ua.country_id) WHERE ua.user_id = ? ;';
	
	private function __construct (){
		$this->db = DBConnection::getDb();
	}
	public static function getInstance (){
		if (!self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}
	protected function exec($sql, array $bindParams = array()) {
		$pstmt = $this->db->prepare ( $sql );
		$pstmt->execute ( $bindParams );
		
		return $pstmt->fetchAll ( PDO::FETCH_ASSOC );
	}
	
	public function getUserData ($id) {
		return $this->exec(self::GET_USER_DATA_SQL,array($id));
	}
	public function getUserAddress($id) {
		return $this->exec(self::GET_USER_ADDRESS,array($id));
	}
	
	public function getUserLanguages ($id) {
		return $this->exec(self::GET_USER_LANGUAGES,array($id));
	}
	
	public function  getWorkExperience ($id) {
		return $this->exec(self::GET_USER_WORK_EXPERIENCE,array($id));
	}
	public function deleteUserLanguage ($userId,$langId) {
		$sql = 'DELETE from users_languages WHERE user_id = ? and lang_id = ?;';;
		$pstmt = $this->db->prepare ( $sql );
		$bindParams = array($userId,$langId);
		$pstmt->execute ( $bindParams );
	}
	
	public function getAllNotAddedByUserLanguagess($userId) {
		$sql = 'SELECT languages.* from languages where languages.id not in (select lang_id from users_languages where user_id = ?)';
		$bindParams = array($userId);
		
		return $this->exec($sql, $bindParams);
	}
	
	public function addNewLanguage($userId,$langId){
		$sql = 'INSERT INTO users_languages VALUES (?,?)';
		$pstmt = $this->db->prepare ( $sql );
		$bindParams = array($userId,$langId);
		$pstmt->execute ( $bindParams );
	
	}
	public function getUserInterests ($userId) {
		return $this->exec(self::GET_USER_INTERESTS,array($userId));
	}
	public function deleteUserInterest ($userId,$interest) {
		$sql = 'DELETE FROM interests WHERE user_id = ? AND interest = ?';
		$pstmt = $this->db->prepare ( $sql );
		$bindParams = array($userId,$interest);
		$pstmt->execute ( $bindParams );
	}
	public function editUserInfo ($persInfo,$userId) {
		$sql = 'UPDATE users SET personal_info = ? WHERE id= ?;';
		$pstmt = $this->db->prepare ( $sql );
		$bindParams = array($persInfo,$userId);
		$pstmt->execute ( $bindParams );
	}
	public function addNewInterest($userId,$interest){
		$sql = 'INSERT INTO interests VALUES (?,?)';
		$pstmt = $this->db->prepare ( $sql );
		$bindParams = array($interest,$userId);
		$pstmt->execute ( $bindParams );
		
	}
	
	public function deleteExperience($userId,$company,$position) {
		$sql = 'DELETE FROM work_experience WHERE user_id = ? and company = ? and position = ?;';
		$pstmt = $this->db->prepare ( $sql );
		$bindParams = array($userId,$company,$position);
		$pstmt->execute ( $bindParams );
	}
	
	public function addExperience($userId,$company,$position,$startDate="",$endDate="") {
		$sql = 'INSERT INTO work_experience VALUES (?,?,?,?,?) ;';
		$pstmt = $this->db->prepare ( $sql );
		$bindParams = array($userId,$company,$position,$startDate,$endDate);
		$pstmt->execute ( $bindParams );
	}
	public function changePassword($userId,$newPassword) {
		$sql = 'UPDATE users SET password = ? WHERE id= ?;';
		$pstmt = $this->db->prepare ( $sql );
		$bindParams = array($newPassword,$userId);
		$pstmt->execute ( $bindParams );
	}
	
}