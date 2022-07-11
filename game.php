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

		h1{
			text-align: center;
		}

		#nameForm{
			padding-top: 50px;
		}

		#questions, #idQuestion{
			text-align: left;
			display: none;
		}


	</style>

</head>
<body class="is-preload">

	<!-- Header -->
	<header id="header">
		<div class="content">

			<form id="nameForm">
				<h1>Introduce tu nombre</h1>
				<input type="text" id="nameGame">
				<input style="margin-top: 10px;" type="button" id="buttonName" value="Jugar">
			</form>

			<form id="questions">
				<h1 id="titleCuestionario">Juego</h1>
				<p id="question"></p>
				<input type="text" id="idQuestion">
				<input type="radio" name="success" id="r1" value="0" checked />
				<label for="r1"> <input type="text" id="namePreguntasResp1" readonly></label><br>

				<input type="radio" name="success" id="r2" value="1" />
				<label for="r2"> <input type="text" id="namePreguntasResp2" readonly></label><br>

				<input type="radio" name="success" id="r3" value="2" />
				<label for="r3"> <input type="text" id="namePreguntasResp3" readonly></label><br>

				<input type="radio" name="success" id="r4" value="3" />
				<label for="r4"> <input type="text" id="namePreguntasResp4" readonly></label><br>

				<input type="button" id="responder" value="Responder">

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

		var player = null;

		$(document).ready(function(){
			playQuestions(<?php echo $idQuestionnaire; ?>);
		});

		$("#buttonName").click(function(){
			if ($("#nameGame").val() != "") {
				player = $("#nameGame").val();
				$("#nameForm").hide();
				$("#questions").css("display","block");
			}
		});

		$("#responder").click(function(){
			var respuesta = $('input[name=success]:checked', '#questions').val();
			comprobarRespuesta(respuesta, $("#idQuestion").val());
		});


		function playQuestions(id){
			searchQuestionsFromQuestionnaire(id); 
		}

		function comprobarRespuesta(respuesta, id){ //SEGUIR POR AQUI
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
						$("#question").text(resp.name);
						
						//$("#newNameModificarPreguntasForm").val(resp.name);
						//$("#categoryModificarPreguntasForm option[value="+resp.category+"]").attr("selected",true);
						for (var i = 1; i <= 4; i++) {
							/*if (i-1 == resp.success) {
								$("#radioModifPreguntasResp"+i).prop("checked", true);
							}*/
							$("#playReplies").val();
							$("#namePreguntasResp"+i).val(resp.replies[i-1]);
						}
						
					} 
				},
				error: function (xhr, status) {
                            console.log("Error al buscar las respuestas de la pregunta: "+xhr+status); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
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
						$("#titleCuestionario").val(id);
						for (var i = 0; i < resp.length; i++) {
							searchInfoFromQuestion(resp[i]);
						}
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
						$("#idQuestion").val(resp.id);
						$("#question").text(resp.name);
						
						//$("#newNameModificarPreguntasForm").val(resp.name);
						//$("#categoryModificarPreguntasForm option[value="+resp.category+"]").attr("selected",true);
						for (var i = 1; i <= 4; i++) {
							/*if (i-1 == resp.success) {
								$("#radioModifPreguntasResp"+i).prop("checked", true);
							}*/
							$("#playReplies").val()
							$("#namePreguntasResp"+i).val(resp.replies[i-1]);
						}
						
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