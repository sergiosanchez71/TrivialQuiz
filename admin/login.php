<!DOCTYPE HTML>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivial Quiz</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>

	<?php 

	session_start();
	if (isset($_SESSION['admin'])) {
		if ($_SESSION['admin'] == true) {
			$_SESSION['admin'] = false;
		} 
	}

	?>

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

			<div id="login">
				<h1>Login admin</h1>
				<form>
					Usuario <input type="text" id="username" onkeypress="pulsar(event)">
					Contraseña <input type="password" id="password" onkeypress="pulsar(event)">
					<a onclick="enter()" id="login" class="button primary icon solid fa-comments-question">Loguearme</a>
					<a href="../index.php" class="button icon solid fa-arrow-left">Volver</a>
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

		function enter(){
			var username = $("#username").val();
			var password = $("#password").val();
			var parametros = {
				"action": "enter",
                "username": username.toLowerCase(), //Guardamos el nombre sin diferenciar entre mayúsculas y minúsculas
                "password": password //Su contraseña
            };

            $.ajax({
            	url: "controller/actions.php",
            	data: parametros,
            success: function (respuesta) { //Devuelve el valor de operador
            	if (respuesta) {
            		console.log(respuesta);
            		location.href='index.php';
            	}
            },
            error: function (xhr, status) {
                            console.log("Error en el logueo"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
        }

		function pulsar(e) { //Al pulsar el botón de enter intentará acceder
			var tecla = (document.all) ? e.keyCode : e.which;
			if (tecla == 13)
				enter();
		}
	</script>

</body>
</html>