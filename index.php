<!DOCTYPE HTML>
<!--
	Fractal by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Fractal by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
				<button class="button primary icon solid fa-play">Jugar</button>	
			</form>
			
		</div>
		<div class="image phone"><div class="inner"><img src="images/screen.jpg" alt="" /></div></div>
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