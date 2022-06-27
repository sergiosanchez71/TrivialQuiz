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
	case 'searchPlayQuestionnaire':
		//$sql = "SELECT id, name FROM questionnaires WHERE questions=(SELECT SUM(QU.id) FROM questions as QU, questionnaires as Q WHERE Q.category=QU.category)";
		$sql = "SELECT * FROM questionnaires";
		//$sql = SELECT SUM(QU.id) FROM questions as QU, questionnaires as Q WHERE Q.category=QU.category;

		$questionnairesArray = array();
		$result = mysqli_query($mysqli, $sql);

		while($row = mysqli_fetch_assoc($result)){
			$valid = false;
			$preguntas = $row['preguntas'];
			$sql2 = "SELECT sum(id) as value_sum FROM questions WHERE category=$row['category']";
			$result2 = mysqli_query($mysqli, $sql2);

			while($row = mysqli_fetch_assoc($result2)){
				if ($row['value_sum'] == $preguntas){
					$valid = true; //
				}
			}

			if($valid){
			    $questionnaire = array(
			    	"id" => $row['id'],
			    	"name" => $row["name"]
			    );

			    array_push($questionnairesArray, $questionnaire);
			}
		}

		echo json_encode($questionnairesArray);


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

		$sql = "INSERT INTO questions VALUES (null, '$name', null,'$success','$category')";

		mysqli_query($mysqli, $sql);

		//Habría que crear las respuestas también en su respectiva tabla

		$idQuestionSQL = "SELECT MAX(id) as id FROM questions";

		$result = mysqli_query($mysqli, $idQuestionSQL);  
		while($row = mysqli_fetch_assoc($result)){
			if ($row) {
		    	$idQuestion = $row['id'];
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
		//}//

		$repliesId = array($replyId4-3,$replyId4-2,$replyId4-1,$replyId4);

		$repliesString = implode(',', $repliesId);

		//$sql = "INSERT INTO questions VALUES ('$idQuestion', '$name', '$repliesString','$success','$category')";

		$sql = "UPDATE questions SET replies='$repliesString' WHERE id='$idQuestion'";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Pregunta creada correctamente";
		}

	break;
	case 'searchInfoFromQuestion':
		$id = $_REQUEST['id'];
		$idRepliesSQL = "SELECT replies FROM questions WHERE id='$id'";

		$result = mysqli_query($mysqli, $idRepliesSQL);  

		while($row = mysqli_fetch_assoc($result)){
				if ($row) {
			    	$repliesString = $row['replies'];
				} 
			}

		$replies = explode(',', $repliesString);

		for ($i=0; $i < 4 ; $i++) { 
			$sql = "SELECT name FROM replies WHERE id='$replies[$i]'";
			$result = mysqli_query($mysqli, $sql);
			while($row = mysqli_fetch_assoc($result)){
				if ($row) {
			    	$repliesNames[$i] = $row['name'];
				} 
			}
		}

		$sql = "SELECT name, success, category FROM questions WHERE id='$id'";

		$result = mysqli_query($mysqli, $sql);

		while($row = mysqli_fetch_assoc($result)){
				if ($row) {
			    	$name = $row['name'];
			    	$success = $row['success'];
			    	$category = $row['category'];
				} 
			} 

		$questionInfo = new stdClass();
		$questionInfo = array(
			"name" => $name,
			"replies" => $repliesNames,
			"success" => $success,
			"category" => $category,
			"idReplies" => $repliesString
		);


		echo json_encode($questionInfo);

	break;

	case "modifyQuestion":
		$id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		$category = $_REQUEST['category'];
		$reply1 = $_REQUEST['reply1'];
		$reply2 = $_REQUEST['reply2'];
		$reply3 = $_REQUEST['reply3'];
		$reply4 = $_REQUEST['reply4'];
		$success = $_REQUEST['success'];


		$idRepliesSQL = "SELECT replies FROM questions WHERE id='$id'";

		$result = mysqli_query($mysqli, $idRepliesSQL);  

		while($row = mysqli_fetch_assoc($result)){
				if ($row) {
			    	$repliesString = $row['replies'];
				} 
			}

		$idReplies = explode(',', $repliesString);

		$replies = array($reply1, $reply2, $reply3, $reply4);

		for ($i=0; $i < 4 ; $i++) { 
			$sql = "UPDATE replies SET name='$replies[$i]' WHERE id='$idReplies[$i]'";
			mysqli_query($mysqli, $sql);
		}

		$sql = "UPDATE questions SET name='$name', category='$category', success='$success' WHERE id='$id'";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Pregunta modificada correctamente";
		}
	break;

	case "deleteQuestion":
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM questions WHERE id='$id'";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Pregunta eliminada correctamente";
		}
	break;

	case "createCategory":
		$name = $_REQUEST['name'];
		$sql = "INSERT INTO categories VALUES (null, '$name')";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Categoría creada correctamente";
		}
	break;

	case "searchInfoFromCategory":

		$id = $_REQUEST['id'];
		$idRepliesSQL = "SELECT name FROM categories WHERE id='$id'";

		$result = mysqli_query($mysqli, $idRepliesSQL);  

		while($row = mysqli_fetch_assoc($result)){
				if ($row) {
			    	$name = $row['name'];
				} 
			}

		echo json_encode($name);
	break;

	case "modifyCategory":
		$id = $_REQUEST['id'];
		$name = $_REQUEST['name'];

		$sql = "UPDATE categories SET name='$name' WHERE id='$id'";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Categoría modificada correctamente";
		}

	break;

	case "deleteCategory":
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM categories WHERE id='$id'";

		if (mysqli_query($mysqli, $sql)) {
		     echo "Categoría eliminada correctamente";
		}
	break;

	default:
			// cod
	break;
}





?>