<!DOCTYPE HTML>
<head>
	<?php

		include("../conexion.php");



	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivial Quiz</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>

	<style type="text/css">
		button{
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
					Contraseña <input type="text" name="password">
					<button class="button primary icon solid fa-comments-question">Loguearme</button>
					<a href="../index.php" class="button icon solid fa-arrow-left">Volver</a>
					<a href="../index.php" class="button icon solid fa-chevron-down scrolly">Learn More</a>
				</form>
			</div>

			<div id="gestiones" style="display: none;">
				
				<h1>Administrador de Trivial Quiz</h1>
				<form>
					<p>¿Qué acción quiere hacer?</p>
					<button class="button primary icon solid fa-comments-question">Gestionar cuestionarios</button>	
					<button class="button primary icon solid fa-comments-question">Gestionar preguntas</button>	
					<button class="button primary icon solid fa-comments-question">Gestionar categorías</button>
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