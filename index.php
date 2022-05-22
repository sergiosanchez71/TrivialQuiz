<!DOCTYPE html>
<html>
<head>
	<?php

	$mysqli = new mysqli("localhost", "u196455503_admin", "=e8Gl[oA6p", "u196455503_TrivialQuiz");

	if ($mysqli->connect_errno) {
	    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	echo $mysqli->host_info . "\n";

	$sql = 'SELECT id FROM questionnaires WHERE id = 1';
	$resultado = mysql_query($sql, $enlace);

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
		<option>Cuestionario 1 </option>
	</select>
	<button>Jugar</button>	
	</form>


</body>
</html>