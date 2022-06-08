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
					if (Password::verify($password, $user['password'])) {
						echo 'login true';
						session_start();
						$_SESSION['admin'] = true;
					} else {
						echo "Contraseña incorrecta!";
					}

				} 
			}
		}
	break;
	case 'createCuestionary':
		$name = $_REQUEST['name'];
		$questions = $_REQUEST['questions'];
		$category = $_REQUEST['category'];
		$createCuestionary_sql = "INSERT INTO questionnaires('name', 'questions', 'category') VALUES ('$name','$questions','$category')";
		$mysqli->exec($categories_sql);
		
		echo "Cuestionario creado correctamente";
		
	
	break;
	default:
			// code...
	break;
}





?>