<?php
$mysqli = new mysqli("localhost", "u196455503_admin", "=e8Gl[oA6p", "u196455503_TrivialQuiz");

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>
