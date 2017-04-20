<?php
class RegisterException extends Exception {
	public function __construct($message = null, $code = null, $previous = null) {
		var_dump($message);
		parent::__construct($message, $code, $previous);
	}
}

?>


