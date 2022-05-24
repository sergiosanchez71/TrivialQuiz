<!DOCTYPE HTML>
<head>
	

	<!-- Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/jquery.scrolly.min.js"></script>
	<script src="../assets/js/browser.min.js"></script>
	<script src="../assets/js/breakpoints.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/js/main.js"></script>

	<script type="text/javascript">

		$(document).ready(function () {
			//$("#login").click(function(){
				alert('hola');
			//});
		});

		/*enter(){
			$.ajax({
				url: "controller/actions.php",
				data: parametros,
            success: function (respuesta) { //Devuelve el valor de operador
            	if (respuesta) {
                                if (respuesta == 1) { //Si el valor de operador es 1 entramos en la vista de operador
                                	window.location.replace("vista/vistaOperador.php");
                                } else if (respuesta == 0) { //Si el valor de operador es 0 entramos en la vista de usuario
                                	window.location.replace("vista/vistaUsuario.php");
                                } else { //En el caso que la respuesta sea distinta deberá ser porque ha surjido algún error
                                	alert(respuesta);
                                }
                            }
                        },
                        error: function (xhr, status) {
                            alert("Error en el logueo"); //El mensaje que se muestra en el caso de que haya un error en la consulta
                        },
                        type: "POST",
                        dataType: "text"
                    });
                }*/

		function pulsar(e) { //Al pulsar el botón de enter intentará acceder
			var tecla = (document.all) ? e.keyCode : e.which;
			if (tecla == 13)
				enter();
		}
	</script>

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

			<div id="login">
				<h1>Login admin</h1>
				<form>
					Usuario <input type="text" id="user">
					Contraseña <input type="password" id="password">
					<a id="login" class="button primary icon solid fa-comments-question">Loguearme</a>
					<a href="../index.php" class="button icon solid fa-arrow-left">Volver</a>
				</form>
			</div>

		</div>
	</header>

	<!-- Footer -->
	<footer id="footer">
		<p class="copyright">&copy; Sergio Sánchez Álvarez.</p>
	</footer>

</body>
</html>