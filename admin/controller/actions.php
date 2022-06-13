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
		$sql = "INSERT INTO questionnaires VALUES (null, '$name','$questions','$category')";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Cuestionario creado correctamente";
		}
		
	
	break;
	case 'searchCategoryQuestionnaire':
		$id = $_REQUEST['id'];
		$query = "SELECT category from questionnaires where id='$id'";
		$category = $mysqli->query($query);
		if ($category) {
			echo $category;
		}


	default:
			// code...
	break;
}





?>