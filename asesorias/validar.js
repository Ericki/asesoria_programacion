$( document ).ready(function()
{
var mensaje = $("#mensaje");
//Guardamos el controlador del div con ID mensaje en una variable
$("#mensaje").hide();
$("#mensaje").html("hola");
//Cuando el formulario con ID acceso se envíe...
$("#acceso").on("submit", function(e){
	//Evitamos que se envíe por defecto
	e.preventDefault();
	//Creamos un FormData con los datos del mismo formulario
	var formData = new FormData(document.getElementById("acceso"));

	//Llamamos a la función AJAX de jQuery
	$.ajax({
		//Definimos la URL del archivo al cual vamos a enviar los datos
		url: "acceder.php",
		//Definimos el tipo de método de envío
		type: "POST",
		//Definimos el tipo de datos que vamos a enviar y recibir
		dataType: "HTML",
		//Definimos la información que vamos a enviar
		data: formData,
		//Deshabilitamos el caché
		cache: false,
		//No especificamos el contentType
		contentType: false,
		//No permitimos que los datos pasen como un objeto
		processData: false
	}).done(function(msg){	
		  		var dataDecodificados = JSON.parse(msg);
		  		
		  		if (dataDecodificados.estatus == 1) {
		  		    window.location.href = "inicioAdministrador.php";
		  		}
		  		 if (dataDecodificados.estatus == 2) {
		  		 	window.location.href = "inicioAsesor.php";
		  		}
		  		 if (dataDecodificados.estatus == 3) {
		  			window.location.href ="inicioAsesorado.php";
		  		}
		  		 if (dataDecodificados.estatus == 4) {
		  			window.location.href = "inicioAlumnoAsesor.php";
		  		}
		  		if (dataDecodificados.estatus == 5) {
		  			mensaje.html(dataDecodificados.mensaje);
			mensaje.slideDown(500);
		  		}
		  		if (dataDecodificados.estatus == 6) {
		  			mensaje.html(dataDecodificados.mensaje);
			mensaje.slideDown(500);
		  		}
		  		
				$("#Usuario").val("");
				$("#Contra").val("");
					
			});
});
});


