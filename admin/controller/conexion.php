<?php

require '../../conf/define.php';

try{
    $servername = SERVERNAME;
    $username = USER;
    $password = PASS;
    $database = DATABASE;
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

return $mysqli;

?>
