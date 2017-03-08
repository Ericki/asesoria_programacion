$( document ).ready(function()
{
	$("form.informacion").submit(function( event ) {
	//var formData = new FormData(document.getElementById("datos"));
	var formData = new FormData($(this)[0]);
			$.ajax({
				url:"validarLogin.php",
				method:"POST",
				data: formData,
			    cache: false,
            	contentType: false,
            	processData: false,
				}).done(function(msg){	
		  		var dataDecodificados = JSON.parse(msg);
		  		if (dataDecodificados.estatus == 1) {
		  		    window.location.href = "inicio.php";
		  		}
		  		 if (dataDecodificados.estatus == 2) {
		  		 	window.location.href = "inicio.php";
		  		}
		  		 if (dataDecodificados.estatus == 3) {
		  			window.location.href = "inicio.php";
		  		}
		  		 if (dataDecodificados.estatus == 4) {
		  			window.location.href = "inicio.php";
		  		}
		  		if (dataDecodificados.estatus == 5) {
		  			window.location.href = "index.php";
		  			//alert(dataDecodificados.mensaje);
		  			$("#mensaje").html(dataDecodificados.mensaje);
		  		}
		  		if (dataDecodificados.estatus == 6) {
		  			window.location.href = "index.php";
		  		}
		  		
				$("#Usuario").val("");
				$("#Contra").val("");
					
			});
	});
});



