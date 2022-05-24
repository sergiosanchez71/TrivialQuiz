<!DOCTYPE HTML>
<head>
	<?php

	include("../conexion.php");

	class Password {
		/*const SALT = 'EstoEsUnSalt';
		public static function hash($password) { //Generate password
			return hash('sha512', self::SALT . $password);
		}*/
		public static function verify($password, $hash) { //Verify password
			return ($hash == self::hash($password));
		}
	}

	function login(){


		$users_sql = "SELECT * FROM users";
		$users = $mysqli->query($users_sql);

		if ($users) {
			foreach ($users as $user) {
				if ($_GET['name'] == $user['name']){
					$hash = $user['password'];
					if (Password::verify($_GET['password'], $hash)) {
						echo 'Contraseña correcta!\n';
					} else {
						echo "Contraseña incorrecta!\n";
					}

				}
			}
		}

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
					<a onclick="login()" class="button primary icon solid fa-comments-question">Loguearme</a>
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