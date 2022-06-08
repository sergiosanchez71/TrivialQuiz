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


			<h1>Administrador de Trivial Quiz</h1>

			<div id="gestiones">				
				<form>
					<p>¿Qué acción quiere hacer?</p>
					<a id="buttonCuestionaries" class="button primary icon solid fa-comments-question">Gestionar cuestionarios</a>	
					<a id="buttonQuestions" class="button primary icon solid fa-comments-question">Gestionar preguntas</a>	
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
					<a id="buttonBackGestionForm" class="button primary icon solid fa-comments-question">Volver</a>
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
					<p>Preguntas <input type="number" name="questionsCrearCuestionariosForm"></p>
					<a id="createCuestionary" class="button primary icon solid fa-comments-question">Crear cuestionario</a>
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
	<script type="text/javascript">

		$("#buttonCuestionaries").click(function(){
			$("#gestiones").css("display","none");
			$("#gestionarCuestionariosForm").css("display","block");
		});

		$("#buttonCreateCuest").click(function(){
			$("#gestionarCuestionariosForm").css("display","none");
			$("#crearCuestionariosForm").css("display","block");
		});

		$("#buttonBackGestionForm").click(function(){
			$("#gestionarCuestionariosForm").css("display","none");
			$("#gestiones").css("display","block");
		});

		$("#buttonBackCreateForm").click(function(){
			$("#crearCuestionariosForm").css("display","none");
			$("#gestionarCuestionariosForm").css("display","block");
		});

		$("#createCuestionary").click(function(){
			createCuestionary($("#nameCrearCuestionariosForm").val(), $("#categoryCrearCuestionariosForm").val(), $("#questionsCrearCuestionariosForm").val());
		});

		function createCuestionary(name, category, questions){
			console.log(name);
			var parametros = {
				"action": "createCuestionary",
				"name": name,
                "category": category, //Guardamos el nombre sin diferenciar entre mayúsculas y minúsculas
                "questions": questions //Su contraseña
            };

            $.ajax({
            	url: "controller/actions.php",
            	data: parametros,
            success: function (respuesta) { //Devuelve el valor de operador
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



	</script>

</body>
</html>