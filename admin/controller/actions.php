<?php

include("conexion.php");

include '../../class/Password.php';

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
				if (Password::verify($password,  $user['password'])) {
					$_SESSION['admin'] = true;
				} else {
					echo "Contraseña incorrecta!";
				}

			} 
		}
	}
	break;

	default:
			// code...
	break;
}





?>