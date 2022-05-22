<!DOCTYPE html>
<html>
<head>
	<?php

	$mysqli = new mysqli("localhost", "u196455503_admin", "=e8Gl[oA6p", "u196455503_TrivialQuiz");

	if ($mysqli->connect_errno) {
	    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	echo $mysqli->host_info . "\n";

	//$sql = "INSERT INTO questionnaires('1','Cuestionario 2','10',NULL)";
	$questionnaires_sql = "SELECT * FROM questionnaires";
	$questionnaires = $mysqli->query($questionnaires_sql);


	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivial Quiz</title>
</head>
<body>

	<h1>Bienvenido a Trivial Quiz</h1>
	<form>
	<p>¿A qué cuestionario te gustaría enfrentarte?</p>
	<select>
		<option>
			<?php

				if ($questionnaires) {
					foreach ($questionnaires as $questionary) {
						echo $questionary['name'];
					}
				}

			?>
		</option>
	</select>
	<button>Jugar</button>	
	</form>


</body>
</html>