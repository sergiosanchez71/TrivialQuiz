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


	$questionnaires_sql = "SELECT * FROM questionnaires";
	$questionnaires = $mysqli->query($questionnaires_sql);


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


			<h1>Administrador de Trivial Quiz</h1>

			<div id="gestiones">				
				<form>
					<p>¿Qué acción quiere hacer?</p>
					<a id="buttonCuestionaries" class="button primary icon solid fa-comments-question">Gestionar cuestionarios</a>	
					<a id="buttonQuestion" class="button primary icon solid fa-comments-question">Gestionar preguntas</a>	
					<a id="buttonCategory" class="button primary icon solid fa-comments-question">Gestionar categorías</a>
					<a href="login.php" class="button primary icon solid fa-comments-question">Salir</a>
				</form>

			</div>

			<div id="gestionarCuestionarios">

				<form id="gestionarCuestionariosForm" style="display: none;">
					<p>Gestionar cuestionarios</p>
					<a id="buttonCreateCuest" class="button primary icon solid fa-comments-question">Crear cuestionario</a>	
					<a id="buttonModifyCuest" class="button primary icon solid fa-comments-question">Modificar cuestionario</a>
					<a id="buttonDeleteCuest" class="button primary icon solid fa-comments-question">Borrar cuestionario</a>	
					<a id="buttonBackCuestGestionForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="crearCuestionariosForm" style="display: none;">
					<p>Crear un nuevo cuestionario</p>
					<p>Nombre <input type="text" id="nameCrearCuestionariosForm"></p>
					<p>Categoría <select id="categoryCrearCuestionariosForm">
						<?php

						if ($categories) {
							foreach ($categories as $category) {
								$id = $category['id'];
								echo "<option value=$id>";
								echo $category['name'];
								echo "</option>";
							}
						}


						?>
					</select> </p>
					<p>Preguntas <input type="number" id="questionCrearCuestionariosForm" min="5" max="100"></p>
					<a id="createCuestionary" class="button primary icon solid fa-comments-question">Crear cuestionario</a>
					<a id="buttonBackCreateForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="modificarCuestionariosForm" style="display: none;">
					<p>Modifica un cuestionario</p>
					<p>Selecciona un cuestionario <select id="nameModificarCuestionariosForm">
						<?php

						if ($questionnaires) {
							foreach ($questionnaires as $questionnaire) {
								$id = $questionnaire['id'];
								echo "<option value=$id>";
								echo $questionnaire['name'];
								echo "</option>";
							}
						}


						?>
					</select></p>
					<p>Nuevo nombre <input type="text" id="newNameModificarCuestionariosForm"></p>
					<p>Categoría actual: <span id="modificarCuestionarioCategoriaActual"></span></p>
					<p>Nueva Categoría <select id="categoryModificarCuestionariosForm">
						<?php

						if ($categories) {
							foreach ($categories as $category) {
								$id = $category['id'];
								echo "<option value=$id>";
								echo $category['name'];
								echo "</option>";
							}
						}


						?>
					</select> </p>
					<p>Preguntas <input type="number" id="questionModificarCuestionariosForm" min="5" max="100"></p>
					<a id="modifyCuestionary" class="button primary icon solid fa-comments-question">Modificar cuestionario</a>
					<a id="buttonBackModifyForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="borrarCuestionariosForm" style="display: none;">
					<p>Borrar un cuestionario</p>
					<p>Selecciona un cuestionario <select id="nameBorrarCuestionariosForm">
						<?php

						if ($questionnaires) {
							foreach ($questionnaires as $questionnaire) {
								$id = $questionnaire['id'];
								echo "<option value=$id>";
								echo $questionnaire['name'];
								echo "</option>";
							}
						}


						?>
					</select></p>

					<a id="deleteCuestionary" class="button primary icon solid fa-comments-question">Borrar cuestionario</a>
					<a id="buttonBackDeleteForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>


			</div>

			<div id="gestionarPreguntas">

				<form id="gestionarPreguntasForm" style="display: none;">
					<p>Gestionar preguntas</p>
					<a id="buttonCreateQuestion" class="button primary icon solid fa-comments-question">Crear Pregunta</a>	
					<a id="buttonModifyQuestion" class="button primary icon solid fa-comments-question">Modificar Pregunta</a>
					<a id="buttonDeleteQuestion" class="button primary icon solid fa-comments-question">Borrar Pregunta</a>	
					<a id="buttonBackQuestionsGestionForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="crearPreguntasForm" style="display: none;">
					<p>Crear una nueva pregunta</p>
					<p>Pregunta <input type="text" id="nameCrearPreguntasForm"></p>
					<p>Categoría <select id="categoryCrearPreguntasForm">
						<?php

						if ($categories) {
							foreach ($categories as $category) {
								$id = $category['id'];
								if($id != 0){
									echo "<option value=$id>";
									echo $category['name'];
									echo "</option>";
								}
							}
						}


						?>
					</select> </p>
					<p>Respuestas:</p>
					<div>
						<input type="radio" name="success" id="r1" value="0" />
						<label for="r1"> <input type="text" id="nameCrearPreguntasResp1"></label>

						<input type="radio" name="success" id="r2" value="1" />
						<label for="r2"> <input type="text" id="nameCrearPreguntasResp2"></label>

						<input type="radio" name="success" id="r3" value="2" />
						<label for="r3"> <input type="text" id="nameCrearPreguntasResp3"></label>

						<input type="radio" name="success" id="r4" value="3" />
						<label for="r4"> <input type="text" id="nameCrearPreguntasResp4"></label>
					</div>

					<a id="createQuestion" class="button primary icon solid fa-comments-question">Crear pregunta</a>
					<a id="buttonBackCreateForm" class="button primary icon solid fa-comments-question">Volver</a>
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
	<script src="controller/admin.js"></script>


</body>
</html>