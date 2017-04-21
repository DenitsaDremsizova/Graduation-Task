<?php
class LoginException extends Exception {
	public function __construct($message = null, $code = null, $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}

?>


