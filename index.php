<!DOCTYPE HTML>
<head>
	<?php

	include("admin/controller/conexion.php");

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

			<h1>Bienvenido a Trivial Quiz</h1>
			<form>
				<p>¿A qué cuestionario te gustaría enfrentarte?</p>
				<select id="playQuestionnaires">
				</select>
				<a id="buttonPlay" class="button primary icon solid fa-comments-question">Jugar</a>	
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
			searchPlayQuestionnaire();
		});

		$("#buttonPlay").click(function(){
			jugar($("#playQuestionnaires").val());
		});

		function searchPlayQuestionnaire(){
			var parametros = {
				"action": "searchPlayQuestionnaire"
			};

			$.ajax({
				url: "admin/controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						var resp = JSON.parse(respuesta);
						for (var i = 0; i < resp.length; i++) {
						$("#playQuestionnaires").append("<option value="+resp[i].id+">"+resp[i].name+"</option>");
						}
					} 
				},
				error: function (xhr, status) {
                            console.log("Error al buscar los cuestionarios jugables: "+xhr+status); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function jugar(id){
			alert(id);
			document.location.href=game.php; //
		}

	</script>

</body>
</html>