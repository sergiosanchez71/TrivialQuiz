<?php

require '../../../conf/define.php';

$servername = SERVERNAME;
$username = USER;
$password = PASS;
$database = DATABASE;

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

return $mysqli;

?>
