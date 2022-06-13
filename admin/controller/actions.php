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

	$servername = "localhost";
	$username = "u196455503_admin";
	$password = "=e8Gl[oA6p";
	$database = "u196455503_TrivialQuiz";

	$mysqli2 = new mysqli($servername, $username, $password, $database);

		$id = $_REQUEST['id'];
		$category_sql = "SELECT category FROM questionnaires WHERE id='$id'";
		$category = $mysqli2->query($category_sql);

		if ($category) {
			echo $category;
		} 


		break;


	default:
			// code...
	break;
}





?>