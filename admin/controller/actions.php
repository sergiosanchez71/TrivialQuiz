<?php

include("conexion.php");


class Password {
		/*const SALT = 'EstoEsUnSalt';
		public static function hash($password) { //Generate password
			return hash('sha512', self::SALT . $password);
		}*/
		public static function verify($password, $hash) { //Verify password
			return ($hash == self::hash($password));
		}
	}

	$action = $_REQUEST['action'];

	switch ($action) {
		case 'enter':

		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];

		$users_sql = "SELECT * FROM users";
		$users = $mysqli->query($users_sql);

		if ($users) {
			foreach ($users as $user) {
				if ($username == $user['name']){
					/*if (Password::verify($password,  $user['password'])) {
						echo 'Contraseña correcta!\n';
					} else {
						echo "Contraseña incorrecta!\n";
					}*/
					echo "BIEMN";

				} else {
					echo "";
				}
			}
		}
		break;

		default:
			// code...
		break;
	}





?>