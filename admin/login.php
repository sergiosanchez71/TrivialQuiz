<!DOCTYPE HTML>
<head>
	<?php

	include("../conexion.php");

	/*$hash = password_hash('micontraseña', PASSWORD_DEFAULT, [15]);
	echo $hash;

	if(password_verify("micontraseña", "$2y$10$uGfLgn6Znzuju3tCttgLtOnvC8D7zI825DqmnZN3h.rxOoSJ/c.HG")){
		echo "password correcto";
	}*/

	class Password {
		const SALT = 'EstoEsUnSalt';
		public static function hash($password) {
			return hash('sha512', self::SALT . $password);
		}
		public static function verify($password, $hash) {
			return ($hash == self::hash($password));
		}
	}

// Crear la contraseña:
	$hash = Password::hash('micontraseña');
	echo $hash;
// Comprobar la contraseña introducida
	if (Password::verify('micontraseña', $hash)) {
		echo 'Contraseña correcta!\n';
	} else {
		echo "Contraseña incorrecta!\n";
	}

	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivial Quiz</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>

	<style type="text/css">
		a{
			margin-top: 20px;
			width: 100%;
		}
	</style>

</head>
<body class="is-preload">

	<!-- Header -->
	<header id="header">
		<div class="content">

			<div id="login">
				<h1>Login admin</h1>
				<form>
					Usuario <input type="text" name="user">
					Contraseña <input type="password" name="password">
					<a class="button primary icon solid fa-comments-question">Loguearme</a>
					<a href="../index.php" class="button icon solid fa-arrow-left">Volver</a>
				</form>
			</div>
			
		</div>
	</header>

	<!-- Footer -->
	<footer id="footer">
		<p class="copyright">&copy; Sergio Sánchez Álvarez.</p>
	</footer>

	<!-- Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/jquery.scrolly.min.js"></script>
	<script src="../assets/js/browser.min.js"></script>
	<script src="../assets/js/breakpoints.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/js/main.js"></script>

</body>
</html>