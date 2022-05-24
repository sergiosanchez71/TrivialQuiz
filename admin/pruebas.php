
<?php
$password='micontraseña2';

$hash = password_hash('micontraseña', PASSWORD_DEFAULT, [15]);

if(password_verify($password, $hash)){
	echo "password correcto";
}

?>