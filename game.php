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
			playQuestions(<?php echo $idQuestionnaire; ?>);
		});


		function playQuestions(id){
			searchQuestionsFromQuestionnaire(id); 
		}

		function searchQuestionsFromQuestionnaire(id){
			var parametros = {
				"action": "searchQuestionsFromQuestionnaire",
				"id": id
			};

			$.ajax({
				url: "admin/controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						var resp = JSON.parse(respuesta);
						console.log(resp);
					} 
				},
				error: function (xhr, status) {
                            console.log("Error al buscar las respuestas de la pregunta: "+xhr+status); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function searchInfoFromQuestion(id){
			var parametros = {
				"action": "searchInfoFromQuestion",
				"id": id
			};

			$.ajax({
				url: "admin/controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						var resp = JSON.parse(respuesta);
						console.log(resp);
						/*
						$("#newNameModificarPreguntasForm").val(resp.name);
						$("#categoryModificarPreguntasForm option[value="+resp.category+"]").attr("selected",true);
						for (var i = 1; i <= 4; i++) {
							if (i-1 == resp.success) {
								$("#radioModifPreguntasResp"+i).prop("checked", true);
							}
							$("#nameModifPreguntasResp"+i).val(resp.replies[i-1]);
						}
						*/
					} 
				},
				error: function (xhr, status) {
                            console.log("Error al buscar las respuestas de la pregunta: "+xhr+status); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}


	</script>

</body>
</html>