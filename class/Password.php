<?php

class Password {
	const SALT = 'EstoEsUnSalt';
	public static function hash($password) { //Generate password
		return hash('sha512', self::SALT . $password);
	}
	public static function verify($password, $hash) { //Verify password
		return ($hash == self::hash($password));
	}
}

?>