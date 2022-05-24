<!DOCTYPE HTML>
<head>

	<script type="text/javascript">
		$(function () {
			$('#login').on('click', function () {
				$.ajax({
					url: 'ajax/loginProccess.php',
					data: {
						name: $("#name").val(),
						password: $("#password").val()
					},
					dataType : 'json'
					success: alert('hi')
				});
			});
		});
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

	<!-- Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/jquery.scrolly.min.js"></script>
	<script src="../assets/js/browser.min.js"></script>
	<script src="../assets/js/breakpoints.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/js/main.js"></script>

</body>
</html>