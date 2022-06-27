<!DOCTYPE HTML>
<head>
	<?php

	include("admin/controller/conexion.php");

	$idQuestionnaire = $_GET['id'];

	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivial Quiz</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

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

			<h1>Juego</h1>
			<input type="text" id="idQuestionnaire" value="<?php echo $idQuestionnaire ?>">
			<form id="questions">
				<p>Pregunta 1</p>
				<select id="playQuestions">
				</select>
			</form>
			
		</div>
	</header>

	<!-- Footer -->
	<footer id="footer">
		<ul class="icons">
			<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
			<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
		</ul>
		<p class="copyright">&copy; Sergio Sánchez Álvarez.</p>
		<p><a href="admin/login.php">¿Eres administrador?</a></p>
	</footer>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			playQuestions(<?php ; ?>);
		});


		function playQuestions(id){
			alert(id);
		}


	</script>

</body>
</html>