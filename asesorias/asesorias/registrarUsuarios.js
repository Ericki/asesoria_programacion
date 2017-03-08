$( document ).ready(function()
{

	var mensaje = $("#mensaje");


	$("form.formulario").submit(function(event){
		var formData = new FormData($(this)[0]);

			$.ajax({
				url:"guardaDatosUsuario.php",
				method:"POST",
				//Definimos la URL del archivo al cual vamos a enviar los datos
		//Definimos el tipo de datos que vamos a enviar y recibir
		dataType: "multipart/form-data",
		//Definimos la información que vamos a enviar
		data: formData,
		//Deshabilitamos el caché
		cache: false,
		//No especificamos el contentType
		contentType: false,
		//No permitimos que los datos pasen como un objeto
		processData: false
				}).done(function(msg){	
						
		mensaje.html("hol");
			mensaje.html(msg);	 		
				
			});
	});
});




