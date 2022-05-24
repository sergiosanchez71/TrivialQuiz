<!DOCTYPE HTML>
<head>
	<?php

		include("conexion.php");

		//$sql = "INSERT INTO questionnaires('1','Cuestionario 2','10',NULL)";
		$questionnaires_sql = "SELECT * FROM questionnaires";
		$questionnaires = $mysqli->query($questionnaires_sql);


	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivial Quiz</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

	<style type="text/css">
		button{
			margin-top: 30px;
			width: 100%;
		}
	</style>

</head>
<body class="is-preload">

	<!-- Header -->
	<header id="header">
		<div class="content">

			<h1>Bienvenido a Trivial Quiz</h1>
			<form>
				<p>¿A qué cuestionario te gustaría enfrentarte?</p>
				<select>
					<option>
						<?php

						if ($questionnaires) {
							foreach ($questionnaires as $questionary) {
								echo $questionary['name'];
							}
						}

						?>
					</option>
				</select>
				<button class="button primary icon solid fa-comments-question">Jugar</button>	
			</form>
			
		</div>
		<div class="image phone"><div class="inner"><img src="img/quiz2.png" alt="" /></div></div>
	</header>

	<!-- Footer -->
	<footer id="footer">
		<ul class="icons">
			<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
			<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
		</ul>
		<p class="copyright">&copy; Sergio Sánchez Álvarez.</p>
	</footer>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>
</html>