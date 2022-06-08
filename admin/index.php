<!DOCTYPE HTML>
<head>
	<?php

	include("controller/conexion.php");

	session_start();
	if (!$_SESSION['admin']) {
		header('Location: http://sergiosanchez.site/projects/trivialquiz/admin/login.php');
	}


	$categories_sql = "SELECT * FROM categories";
	$categories = $mysqli->query($categories_sql);


	$mysqli -> close();
	

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

			<div id="gestiones">
				
				<h1>Administrador de Trivial Quiz</h1>
				<form>
					<p>¿Qué acción quiere hacer?</p>
					<a class="button primary icon solid fa-comments-question">Gestionar cuestionarios</a>	
					<a class="button primary icon solid fa-comments-question">Gestionar preguntas</a>	
					<a id="buttonCategory" class="button primary icon solid fa-comments-question">Gestionar categorías</a>
					<a href="login.php" class="button primary icon solid fa-comments-question">Salir</a>
				</form>

			</div>

			<div id="gestionarCuestionarios" style="display: none;">

				<h1>Administrador de Trivial Quiz</h1>
				<form id="gestionarCuestionariosForm">
					<p>Gestionar cuestionarios</p>
					<a class="button primary icon solid fa-comments-question">Crear cuestionario</a>	
					<a class="button primary icon solid fa-comments-question">Modificar cuestionario</a>
					<a class="button primary icon solid fa-comments-question">Borrar cuestionario</a>	
					<a class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="crearCuestionariosForm">
					<p>Nombre <input type="text" name="nameCrearCuestionariosForm"></p>
					<p>Categoría <select>
						<option>
							<?php
							
							if ($categories) {
								foreach ($categories as $category) {
									echo $category['name'];
								}
							}
							

							?>
						</option>
					</select> </p>
					<p>Preguntas <input type="number" name="questionsCrearCuestionariosForm"></p>
					<a class="button primary icon solid fa-comments-question">Crear cuestionario</a>
					<a class="button primary icon solid fa-comments-question">Volver</a>
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
	<script type="text/javascript">
		$("#buttonCategory").onclick(function(){
			alert('hi');
		});
		/*
		$(function()
		{
			$('#video').mouseover(function()
			{
				$('#numero').css("font-size", "62.5px");
			});

			$('#video').mouseout(function()
			{
				$('#numero').css("font-size", "50px");
			});
		});
		*/
	</script>

</body>
</html>