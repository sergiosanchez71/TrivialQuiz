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

		if ($username == 'admin') {
			echo "BIEN";
		}
/*
		$users_sql = "SELECT * FROM users";
		$users = $mysqli->query($users_sql);

		if ($users) {
			echo $username.''.$password;
			foreach ($users as $user) {
				if ($username == $user['name']){
					$hash = $user['password'];
					if (Password::verify($password, $hash)) {
						echo 'Contraseña correcta!\n';
					} else {
						echo "Contraseña incorrecta!\n";
					}

				} else {
					echo "";
				}
			}
		}*/
		break;

		default:
			// code...
		break;
	}





?>