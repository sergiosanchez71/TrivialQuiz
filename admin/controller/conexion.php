<?php

$servername = "localhost";
$username = "u196455503_admin";
$password = "=e8Gl[oA6p";
$database = "u196455503_TrivialQuiz";

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

return $mysqli;

?>
