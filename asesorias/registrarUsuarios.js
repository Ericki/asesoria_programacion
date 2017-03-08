$( document ).ready(function()
{

	var mensaje = $("#mensaje");
//Guardamos el controlador del div con ID mensaje en una variable
//$("#mensaje").hide();
//$("#mensaje").html("hola");

$("#datos").on("submit", function(e){
	//Evitamos que se envíe por defecto
	e.preventDefault();
	//Creamos un FormData con los datos del mismo formulario
	var formData = new FormData(document.getElementById("datos"));

	//Llamamos a la función AJAX de jQuery
	$.ajax({
		//Definimos la URL del archivo al cual vamos a enviar los datos
		url: "guardaDatosUsuario.php",
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
	}).done(function(echo){
	var dataDecodificados = JSON.parse(echo);
	if (dataDecodificados.estatus == 1) {
		  		    window.location.href = "login.html";
		  		}
		  		 else  {
		  		 	mensaje.html(dataDecodificados.mensaje);
		  		 	}
		
		mensaje.slideDown(500);
	});
});
});
