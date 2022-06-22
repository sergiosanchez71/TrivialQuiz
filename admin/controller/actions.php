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
	case 'searchQuestionnaire':
		$id = $_REQUEST['id'];
		$sql = "SELECT C.id, C.name, Q.name as questionnaire, Q.questions FROM questionnaires AS Q,categories AS C WHERE Q.id='$id' and Q.category=C.id";
		$result = mysqli_query($mysqli, $sql);   
		while($row = mysqli_fetch_assoc($result)){
			if ($row) {
		    	$test[] = $row;
			} 
			echo json_encode($test);
		}


	break;
	case 'modifyCuestionary':
		$id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		$questions = $_REQUEST['questions'];
		$category = $_REQUEST['category'];
		$sql = "UPDATE questionnaires SET name='$name', questions='$questions', category='$category' WHERE id='$id'";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Cuestionario modificado correctamente";
		}

	break;
	case 'deleteCuestionary':
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM questionnaires WHERE id='$id'";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Cuestionario eliminado correctamente";
		}

	break;
	case 'createQuestion':
		$name = $_REQUEST['name'];
		$category = $_REQUEST['category'];
		$replies = array($_REQUEST['reply1'], $_REQUEST['reply2'], $_REQUEST['reply3'], $_REQUEST['reply4']);
		$success = $_REQUEST['success'];

		//Habría que crear las respuestas también en su respectiva tabla

		$idQuestionSQL = "SELECT MAX(id) as id FROM questions";

		$result = mysqli_query($mysqli, $idQuestionSQL);  
		while($row = mysqli_fetch_assoc($result)){
			if ($row) {
		    	$idQuestion = $row['id']+1;
			} 
		}

		for ($i=0; $i < 4 ; $i++) { 
			$sql = "INSERT INTO replies VALUES (null,'$replies[$i]','$idQuestion')";
			mysqli_query($mysqli, $sql);
		}

		//for ($i=0; $i < 4; $i++) { 
			$sql = "SELECT MAX(id) as id FROM replies";
			$result = mysqli_query($mysqli, $sql);  
			while($row = mysqli_fetch_assoc($result)){
				if ($row) {
			    	$replyId4 = $row['id'];
				} 
			}
		//}

		$repliesId = array($replyId4-3,$replyId4-2,$replyId4-1,$replyId4);

		$repliesString = implode(' ', $repliesId);

		$sql = "INSERT INTO questions VALUES ('$idQuestion', '$name', '$repliesString','$success','$category')";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Pregunta creada correctamente";
		}

	break;
	case 'searchRepliesFromQuestion':
		$id = $_REQUEST['id'];
		$idRepliesSQL = "SELECT replies FROM questions where id=''";
	break;

	default:
			// code...
	break;
}





?>