<script type="text/javascript">

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
			createQuestion($("#nameBorrarCuestionariosForm").val());
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
				"question": question 
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
				"question": question 
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

		function searchQuestionnaire(id){
			var parametros = {
				"action": "searchQuestionnaire",
				"id": id
			};

			$.ajax({
				url: "controller/actions.php",
				data: parametros,
				success: function (respuesta) { 
					console.log(respuesta);
					if (respuesta) {
						var resp = JSON.parse(respuesta);
						$("#newNameModificarCuestionariosForm").val(resp[0].questionnaire);
						$("#modificarCuestionarioCategoriaActual").html(resp[0].name);
						$("#questionModificarCuestionariosForm").val(resp[0].question);
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