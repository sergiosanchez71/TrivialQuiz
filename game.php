<!DOCTYPE HTML>
<head>
	<?php

	include("admin/controller/conexion.php");

	if (isset($_GET['id'])) {
		$idQuestionnaire = $_GET['id'];
	} else {
		header("Location: index.php");
	}

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
			min-width: 800px;
			max-width: 800px;
			min-height: 600px;
			max-height: 600px;
		}

		.questions{
			display: none;
		}

		#siguiente{
			display: none;
			float: left;
			transition: 1s;
		}

		#siguiente{
			display: none;
			float: left;
		}

		#divFinal{
			display: none;
		}

		.namePreguntasResp{
			transition: background 1s;
		}

		label .namePreguntasResp{			
			width: 800px;
		}

		@media (max-width: 1700px){

			#titleCuestionario{
				display: block;
			}

		}

		@media (max-width: 900px){
			#questions, #idQuestion{
				min-width: 600px;
				max-width: 600px;
				min-height: 400px;
				max-height: 400px;
			}

			label .namePreguntasResp{			
				width: 600px;
			}

			input{
				min-width: 100%;
			}

			.gameButtons{
				margin-left: 38px;
			}

		}

		@media (max-width: 700px){
			#questions, #idQuestion{
				min-width: 400px;
				max-width: 400px;
			}

			label .namePreguntasResp{			
				width: 400px;
			}

		}

		@media (max-width: 470px){
			#questions, #idQuestion{
				min-width: 350px;
				max-width: 350px;
			}

			label .namePreguntasResp{			
				width: 350px;
			}

		}

		@media (max-width: 400px){
			#questions, #idQuestion{
				min-width: 300px;
				max-width: 100%;
			}

			label .namePreguntasResp{			
				width: 300px;
			}
		}
	}


</style>

</head>
<body class="is-preload">

	<!-- Header -->
	<header id="header">
		<div class="content">

			<form id="nameForm">
				<h1>Introduce tu nombre</h1>
				<input type="text" id="nameGame" onkeypress="pulsar(event)">
				<input style="margin-top: 10px;" type="button" id="buttonName" value="Jugar">
			</form>

			<form id="questions" class="questions">
				<h1 id="titleCuestionario">Juego</h1>
				<p id="question"></p>
				<input type="text" id="idQuestion">
				<input type="radio" name="success" id="r1" value="0" checked />
				<label for="r1"> <input type="text" class="namePreguntasResp" id="namePreguntasResp1" readonly></label><br>

				<input type="radio" name="success" id="r2" value="1" />
				<label for="r2"> <input type="text" class="namePreguntasResp" id="namePreguntasResp2" readonly></label><br>

				<input type="radio" name="success" id="r3" value="2" />
				<label for="r3"> <input type="text" class="namePreguntasResp" id="namePreguntasResp3" readonly></label><br>

				<input type="radio" name="success" id="r4" value="3" />
				<label for="r4"> <input type="text" class="namePreguntasResp" id="namePreguntasResp4" readonly></label><br>

				<input class="gameButtons" type="button" id="responder" value="Responder">
				<input class="gameButtons" type="button" id="siguiente" value="Siguiente">

			</form>

			<div class="questions">
				<p id="restantes"></p>
			</div>

			<div id="divFinal">
				<p id="puntos"></p>
			</div>
			
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">

		var player = null;
		var respondida = false;
		var puntos = 0;
		var questions = [];
		var preguntastotales = 0;

		$(document).ready(function(){
			playQuestions(<?php echo $idQuestionnaire; ?>);
		});

		function pulsar(e) {
			if (e.keyCode === 13 && !e.shiftKey) {
				e.preventDefault();
				enterGame();
			}
		}

		function enterGame(){

			if ($("#nameGame").val() != "") {
				player = $("#nameGame").val();
				$("#nameForm").hide();
				$(".questions").css("display","block");
			} else {
				swal("Alerta","No puedes dejar el nombre vacío","error");
			}
		}

		$("#buttonName").click(function(){
			enterGame();
		});

		$("#responder").click(function(){
			var respuesta = $('input[name=success]:checked', '#questions').val();
			comprobarRespuesta(respuesta, $("#idQuestion").val());
		});

		$("#siguiente").click(function(){
			if (questions.length > 0) {
				searchInfoFromQuestion(questions[0]);
				$("#responder").css("display","block");
				$("#siguiente").css("display","none");
				respondida = false;
				$(".namePreguntasResp").css("background","none");
			} else {
				$("#divFinal").css("display","block");
				$(".questions").css("display","none");
				//addToRanking(player, cuestionario); POR AQUI
				$("#puntos").text("Has obtenido "+puntos+" puntos");
			}
		});


		function playQuestions(id){
			searchQuestionsFromQuestionnaire(id); 
		}

		function addToRanking(seleccionado, id){ 
			var parametros = {
				"action": "searchInfoFromQuestion",
				"id": id
			};

			$.ajax({
				url: "admin/controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta && !respondida) {
						var resp = JSON.parse(respuesta);
						var respSeleccionada = parseInt(seleccionado)+1;
						var respCorrecta = parseInt(resp.success)+1;
						if (seleccionado == resp.success) {
							$("#namePreguntasResp"+respSeleccionada).css("background","green");
							respondida = true;
							puntos++;
						} else {
							$("#namePreguntasResp"+respSeleccionada).css("background","red");
							$("#namePreguntasResp"+respCorrecta).css("background","green");
							respondida = true;
						}
						$("#responder").css("display","none");
						if (questions.length < 1) {
							$("#siguiente").val("Finalizar");	
						}
						$("#siguiente").css("display","block");	
						
					} 
				},
				error: function (xhr, status) {
                            console.log("Error al buscar las respuestas de la pregunta: "+xhr+status); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function comprobarRespuesta(seleccionado, id){ 
			var parametros = {
				"action": "searchInfoFromQuestion",
				"id": id
			};

			$.ajax({
				url: "admin/controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta && !respondida) {
						var resp = JSON.parse(respuesta);
						var respSeleccionada = parseInt(seleccionado)+1;
						var respCorrecta = parseInt(resp.success)+1;
						if (seleccionado == resp.success) {
							$("#namePreguntasResp"+respSeleccionada).css("background","green");
							respondida = true;
							puntos++;
						} else {
							$("#namePreguntasResp"+respSeleccionada).css("background","red");
							$("#namePreguntasResp"+respCorrecta).css("background","green");
							respondida = true;
						}
						$("#responder").css("display","none");
						if (questions.length < 1) {
							$("#siguiente").val("Finalizar");	
						}
						$("#siguiente").css("display","block");	
						
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
						console.log(respuesta);
						$("#titleCuestionario").val(id);
						for (var i = resp.length - 1; i >= 0; i--) {
							questions.push(resp[i]);
						}
						searchInfoFromQuestion(questions[0]);
						preguntastotales = resp.length;
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
						$("#idQuestion").val(resp.id);
						$("#question").text(resp.name);
						
						for (var i = 1; i <= 4; i++) {
							$("#playReplies").val();
							$("#namePreguntasResp"+i).val(resp.replies[i-1]);
						}
						questions.shift();
						$("#restantes").text(preguntastotales-questions.length+"/"+preguntastotales+" restantes");
						
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