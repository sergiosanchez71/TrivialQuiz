<!DOCTYPE HTML>
<head>
	<?php

    include '../conf/define.php';
	include("controller/conexion.php");

	session_start();
	if (!$_SESSION['admin']) {
		header('Location: https://sergiosanchez.site/projects/trivialquiz/admin/login.php');
	}


	$categories_sql = "SELECT * FROM categories";
	$categories = $mysqli->query($categories_sql);


	$questions_sql = "SELECT * FROM questions";
	$questions = $mysqli->query($questions_sql);


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
								echo $id;
								echo "<option value=$id>";
								echo $category['name'];
								echo "</option>";
							}
						}


						?>
					</select> </p>
					<p>Preguntas <input type="text" id="questionCrearCuestionariosForm"></p>
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
					<p>Preguntas <input type="text" id="questionModificarCuestionariosForm"></p>
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
						<input type="radio" name="success" id="r1" value="0" checked />
						<label for="r1"> <input type="text" id="nameCrearPreguntasResp1"></label>

						<input type="radio" name="success" id="r2" value="1" />
						<label for="r2"> <input type="text" id="nameCrearPreguntasResp2"></label>

						<input type="radio" name="success" id="r3" value="2" />
						<label for="r3"> <input type="text" id="nameCrearPreguntasResp3"></label>

						<input type="radio" name="success" id="r4" value="3" />
						<label for="r4"> <input type="text" id="nameCrearPreguntasResp4"></label>
					</div>

					<a id="createQuestion" class="button primary icon solid fa-comments-question">Crear pregunta</a>
					<a id="buttonBackCreateQuestForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="modificarPreguntasForm" style="display: none;">
					<p>Modifica una pregunta</p>
					<p>Pregunta <select id="questionModificarPreguntasForm">
						<?php

						if ($questions) {
							foreach ($questions as $question) {
								$id = $question['id'];
								if($id != 0){
									echo "<option value=$id>";
									echo $question['name'];
									echo "</option>";
								}
							}
						}


						?>
					</select> </p>
					<p>Nuevo nombre <input type="text" id="newNameModificarPreguntasForm"></p>
					<p>Categoría <select id="categoryModificarPreguntasForm">
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
						<label for="r1"> <input type="text" id="nameModifPreguntasResp1"></label>

						<input type="radio" name="success" id="r2" value="1" />
						<label for="r2"> <input type="text" id="nameModifPreguntasResp2"></label>

						<input type="radio" name="success" id="r3" value="2" />
						<label for="r3"> <input type="text" id="nameModifPreguntasResp3"></label>

						<input type="radio" name="success" id="r4" value="3" />
						<label for="r4"> <input type="text" id="nameModifPreguntasResp4"></label>
					</div>

					<a id="modifyQuestion" class="button primary icon solid fa-comments-question">Modificar pregunta</a>
					<a id="buttonBackModifyQuestForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="borrarPreguntasForm" style="display: none;">
					<p>Borrar una pregunta</p>
					<p>Selecciona una pregunta <select id="nameBorrarPreguntasForm">
						<?php

						if ($questions) {
							foreach ($questions as $question) {
								$id = $question['id'];
								echo "<option value=$id>";
								echo $question['name'];
								echo "</option>";
							}
						}


						?>
					</select></p>

					<a id="deleteQuestionButton" class="button primary icon solid fa-comments-question">Borrar pregunta</a>
					<a id="buttonBackDeleteQuestionForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>
				
			</div>

			<div id="gestionarCategorias">
				<form id="gestionarCategoriasForm" style="display: none;">
					<p>Gestionar categorías</p>
					<a id="buttonCreateCategory" class="button primary icon solid fa-comments-question">Crear categoría</a>	
					<a id="buttonModifyCategory" class="button primary icon solid fa-comments-question">Modificar categoría</a>
					<a id="buttonDeleteCategory" class="button primary icon solid fa-comments-question">Borrar categoría</a>	
					<a id="buttonBackCategoryGestionForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="crearCategoriaForm" style="display: none;">
					<p>Crear una nueva categoría</p>
					<p>Nombre <input type="text" id="nameCrearCategoriaForm"></p>
					<a id="createCategory" class="button primary icon solid fa-comments-question">Crear categoría</a>
					<a id="buttonBackCreateCategoryForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="modificarCategoriasForm" style="display: none;">
					<p>Modificar categoría</p>
					<p>Categoría <select id="nameModificarCategoriasForm">
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
					<p>Nuevo nombre <input type="text" id="newNameModificarCategoriasForm"></p>
					<a id="modifyCategoryButton" class="button primary icon solid fa-comments-question">Modificar categoría</a>
					<a id="buttonBackModifyCategoryForm" class="button primary icon solid fa-comments-question">Volver</a>
				</form>

				<form id="borrarCategoriasForm" style="display: none;">
					<p>Borrar una categoría</p>
					<p>Categoría <select id="categoryBorrarCategoriasForm">
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

					<a id="deleteCategoryButton" class="button primary icon solid fa-comments-question">Borrar categoría</a>
					<a id="buttonBackDeleteCategoryForm" class="button primary icon solid fa-comments-question">Volver</a>
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">

		$('input').click(function(e) {
			e.stopPropagation();
		})

		$("#buttonCuestionaries").click(function(){
			$("#gestiones").css("display","none");
			$("#gestionarCuestionariosForm").css("display","block");
		});

		$("#buttonCreateCuest").click(function(){
			$("#gestionarCuestionariosForm").css("display","none");
			$("#crearCuestionariosForm").css("display","block");
		});

		$("#buttonBackCuestGestionForm").click(function(){
			$("#gestionarCuestionariosForm").css("display","none");
			$("#gestiones").css("display","block");
		});

		$("#buttonBackCreateForm").click(function(){
			$("#crearCuestionariosForm").css("display","none");
			$("#gestionarCuestionariosForm").css("display","block");
		});

		$("#createCuestionary").click(function(){
			createCuestionary($("#nameCrearCuestionariosForm").val(), $("#categoryCrearCuestionariosForm").val(), $("#questionCrearCuestionariosForm").val());
		});


		$("#buttonModifyCuest").click(function(){
			$("#gestionarCuestionariosForm").css("display","none");
			$("#modificarCuestionariosForm").css("display","block");
			searchQuestionnaire($("#nameModificarCuestionariosForm").val());

		});

		$("#nameModificarCuestionariosForm").change(function(){
			searchQuestionnaire($("#nameModificarCuestionariosForm").val());
		});

		$("#buttonBackModifyForm").click(function(){
			$("#modificarCuestionariosForm").css("display","none");
			$("#gestionarCuestionariosForm").css("display","block");
		});

		$("#modifyCuestionary").click(function(){
			modifyCuestionary($("#nameModificarCuestionariosForm").val(),$("#newNameModificarCuestionariosForm").val(), $("#categoryModificarCuestionariosForm").val(), $("#questionModificarCuestionariosForm").val());
		});

		$("#buttonDeleteCuest").click(function(){
			$("#gestionarCuestionariosForm").css("display","none");
			$("#borrarCuestionariosForm").css("display","block");
		});

		$("#buttonBackDeleteForm").click(function(){
			$("#borrarCuestionariosForm").css("display","none");
			$("#gestionarCuestionariosForm").css("display","block");
		});

		$("#deleteCuestionary").click(function(){
			deleteCuestionary($("#nameBorrarCuestionariosForm").val());
		});


		$("#buttonQuestion").click(function(){
			$("#gestiones").css("display","none");
			$("#gestionarPreguntasForm").css("display","block");
		});

		$("#buttonCreateQuestion").click(function(){
			$("#gestionarPreguntasForm").css("display","none");
			$("#crearPreguntasForm").css("display","block");
		});

		$("#createQuestion").click(function(){
			createQuestion($("#nameCrearPreguntasForm").val(), $("#categoryCrearPreguntasForm").val(), $("#nameCrearPreguntasResp1").val(), $("#nameCrearPreguntasResp2").val(), $("#nameCrearPreguntasResp3").val(), $("#nameCrearPreguntasResp4").val(), $('input[name=success]:checked', '#crearPreguntasForm').val());
		});

		$("#buttonBackCreateQuestForm").click(function(){
			$("#crearPreguntasForm").css("display","none");
			$("#gestionarPreguntasForm").css("display","block");
		});

		$("#buttonBackQuestionsGestionForm").click(function(){
			$("#gestionarPreguntasForm").css("display","none");
			$("#gestiones").css("display","block");
		});

		$("#buttonModifyQuestion").click(function(){
			$("#gestionarPreguntasForm").css("display","none");
			$("#modificarPreguntasForm").css("display","block");
			searchInfoFromQuestion($("#questionModificarPreguntasForm").val()); //Buscar respuestas dado el ID de la pregunta a modificar al cargar
		});

		$("#questionModificarPreguntasForm").change(function(){
			searchInfoFromQuestion($("#questionModificarPreguntasForm").val()); //Buscar respuestas dado el ID de la pregunta a modificar al cambiar
		});

		$("#modifyQuestion").click(function(){
			modifyQuestion($("#questionModificarPreguntasForm").val(), $("#newNameModificarPreguntasForm").val(), $("#categoryModificarPreguntasForm").val(), $("#nameModifPreguntasResp1").val(), $("#nameModifPreguntasResp2").val(), $("#nameModifPreguntasResp3").val(), $("#nameModifPreguntasResp4").val(), $('input[name=success]:checked', '#modificarPreguntasForm').val());
		});

		$("#buttonBackModifyQuestForm").click(function(){
			$("#modificarPreguntasForm").css("display","none");
			$("#gestionarPreguntasForm").css("display","block");
		});

		$("#buttonDeleteQuestion").click(function(){
			$("#gestionarPreguntasForm").css("display","none");
			$("#borrarPreguntasForm").css("display","block");
		});

		$("#deleteQuestionButton").click(function(){
			deleteQuestion($("#nameBorrarPreguntasForm").val());
		});

		$("#buttonBackDeleteQuestionForm").click(function(){
			$("#borrarPreguntasForm").css("display","none");
			$("#gestionarPreguntasForm").css("display","block");
		});

		$("#buttonCategory").click(function(){
			$("#gestiones").css("display","none");
			$("#gestionarCategoriasForm").css("display","block");			
		});

		$("#buttonCreateCategory").click(function(){
			$("#gestionarCategoriasForm").css("display","none");
			$("#crearCategoriaForm").css("display","block");			
		});

		$("#createCategory").click(function(){
			createCategory($("#nameCrearCategoriaForm").val());	
		});

		$("#buttonBackCreateCategoryForm").click(function(){
			$("#crearCategoriaForm").css("display","none");
			$("#gestionarCategoriasForm").css("display","block");
		});

		$("#buttonModifyCategory").click(function(){
			$("#gestionarCategoriasForm").css("display","none");
			$("#modificarCategoriasForm").css("display","block");
			searchInfoFromCategory($("#nameModificarCategoriasForm").val());
		});

		$("#nameModificarCategoriasForm").change(function(){
			searchInfoFromCategory($("#nameModificarCategoriasForm").val());
		});

		$("#modifyCategoryButton").click(function(){
			modifyCategory($("#nameModificarCategoriasForm").val(), $("#newNameModificarCategoriasForm").val());
		});

		$("#buttonBackModifyCategoryForm").click(function(){
			$("#modificarCategoriasForm").css("display","none");
			$("#gestionarCategoriasForm").css("display","block");
		});

		$("#buttonDeleteCategory").click(function(){
			$("#gestionarCategoriasForm").css("display","none");
			$("#borrarCategoriasForm").css("display","block");
		});

		$("#deleteCategoryButton").click(function(){
			swal("Alerta","¿Seguro que quieres borrar esta categoría?","confirm");
			deleteCategory($("#categoryBorrarCategoriasForm").val());
		});

		$("#buttonBackDeleteCategoryForm").click(function(){
			$("#borrarCategoriasForm").css("display","none");
			$("#gestionarCategoriasForm").css("display","block");
		});

		$("#buttonBackCategoryGestionForm").click(function(){
			$("#gestionarCategoriasForm").css("display","none");
			$("#gestiones").css("display","block");	
		});




		function createQuestion(name, category, reply1, reply2, reply3, reply4, successReply){

			var parametros = {
				"action": "createQuestion",
				"name": name,
				"category": category, 
				"reply1": reply1,
				"reply2": reply2,
				"reply3": reply3,
				"reply4": reply4,
				"success": successReply
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						//var resp = JSON.parse(respuesta);
						console.log(respuesta);
					}
				},
				error: function (xhr, status) {
                            console.log("Error al crear pregunta"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}



		function createCuestionary(name, category, question){

			if (question < 5) {
				question = 5;
			} else if (question > 100){
				question = 100;
			}

			var parametros = {
				"action": "createCuestionary",
				"name": name,
				"category": category, 
				"questions": question 
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						console.log(respuesta);
					}
				},
				error: function (xhr, status) {
                            console.log("Error en el logueo"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}


		function createCategory(name){

			var parametros = {
				"action": "createCategory",
				"name": name
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						console.log(respuesta);
					}
				},
				error: function (xhr, status) {
                            console.log("Error al crear categoría"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function modifyCuestionary(id, name, category, question){
			if (question < 5) {
				question = 5;
			} else if (question > 100){
				question = 100;
			}

			var parametros = {
				"action": "modifyCuestionary",
				"id": id,
				"name": name,
				"category": category, 
				"questions": question
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						console.log(respuesta);
					}
				},
				error: function (xhr, status) {
                            console.log("Error al modificar el cuestionario"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function modifyQuestion(id, name, category, reply1, reply2, reply3, reply4, successReply){

			var parametros = {
				"action": "modifyQuestion",
				"id": id,
				"name": name,
				"category": category, 
				"reply1": reply1,
				"reply2": reply2,
				"reply3": reply3,
				"reply4": reply4,
				"success": successReply
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						console.log(respuesta);
					}
				},
				error: function (xhr, status) {
                            console.log("Error al modificar la pregunta"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function modifyCategory(id, name){

			var parametros = {
				"action": "modifyCategory",
				"id": id,
				"name": name
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						console.log(respuesta);
					}
				},
				error: function (xhr, status) {
                            console.log("Error al modificar la categoría"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function deleteCuestionary(id){

			var parametros = {
				"action": "deleteCuestionary",
				"id": id
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						console.log(respuesta);
					}
				},
				error: function (xhr, status) {
                            console.log("Error al borrar el cuestionario"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function deleteQuestion(id){
			var parametros = {
				"action": "deleteQuestion",
				"id": id
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						console.log(respuesta);
					}
				},
				error: function (xhr, status) {
                            console.log("Error al borrar la pregunta"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function deleteCategory(id){
			console.log(id);
			var parametros = {
				"action": "deleteCategory",
				"id": id
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						console.log(respuesta);
					}
				},
				error: function (xhr, status) {
                            console.log("Error al borrar la categoría"); //El mensaje que se muestra en el caso de que haya un error en la consulta
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
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						var resp = JSON.parse(respuesta);
						$("#newNameModificarPreguntasForm").val(resp.name);
						$("#categoryModificarPreguntasForm option[value="+resp.category+"]").attr("selected",true);
						for (var i = 1; i <= 4; i++) {
							if (i-1 == resp.success) {
								$("#radioModifPreguntasResp"+i).prop("checked", true);
							}
							$("#nameModifPreguntasResp"+i).val(resp.replies[i-1]);
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

		function searchInfoFromCategory(id){
			var parametros = {
				"action": "searchInfoFromCategory",
				"id": id
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						var resp = JSON.parse(respuesta);
						$("#newNameModificarCategoriasForm").val(resp);
					} 
				},
				error: function (xhr, status) {
                            console.log("Error al buscar las respuestas de la pregunta: "+xhr+status); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}

		function searchQuestionnaire(id){
			var parametros = {
				"action": "searchQuestionnaire",
				"id": id
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					if (respuesta) {
						var resp = JSON.parse(respuesta);
						$("#newNameModificarCuestionariosForm").val(resp[0].questionnaire);
						$("#modificarCuestionarioCategoriaActual").html(resp[0].name);
						$("#questionModificarCuestionariosForm").val(resp[0].questions);
					} 
				},
				error: function (xhr, status) {
                            console.log("Error al mostrar el cuestionario: "+xhr+status); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
		}




	</script>

</body>
</html>