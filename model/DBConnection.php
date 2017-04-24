<?php

// define ( 'DB_HOST', 'localhost' );
// define ( 'DB_NAME', 'gettogether' );
// define ( 'DB_USER', 'root' );
// define ( 'DB_PASS', '' );

define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'j7cheers_gettogether' );
define ( 'DB_USER', 'j7cheers_root' );
define ( 'DB_PASS', 'C2Fn?_FHT=,)' );


class DBConnection {
	private static $db = null;
	
	public static function getDb() {
		if (self::$db === null) {
			try {
				self::$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
				self::$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			}
			catch (PDOException $e) {
				$_SESSION['error'] = 'Something went wrong, please try again later!';
				header('Location: HomeController.php');
			}
		}
		
		return self::$db;
	}
}
?>