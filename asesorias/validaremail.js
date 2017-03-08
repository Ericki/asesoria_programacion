$( document ).ready(function()
{
var msj = $("#mensaje");
//Cuando el formulario con ID acceso se envíe...
$("#frmRestablecer").on("submit", function(e){
  //Evitamos que se envíe por defecto
  e.preventDefault();
  //Creamos un FormData con los datos del mismo formulario
  var formData = new FormData(document.getElementById("frmRestablecer"));

  //Llamamos a la función AJAX de jQuery
  $.ajax({
    //Definimos la URL del archivo al cual vamos a enviar los datos
    url: "validaremail.php",
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
  }).done(function(respuesta){ 
  //// alert(respuesta); 
        //// msj.html(respuesta);
    var dataDecodificados = JSON.parse(respuesta);
msj.html(dataDecodificados.mensaje);
        $("#email").val('');          
      });
});
});














/*$(document).ready(function(){
    //$("#frmRestablecer").submit(function(event){
    $("#frmRestablecer").on("submit", function(e){
      event.preventDefault();
      $.ajax({
        url:'validaremail.php',
        type:'post',
        dataType:'json',
        data:$("#frmRestablecer").serializeArray()
      }).done(function(respuesta){
        alert(respusta);
        $("#mensaje").html(respuesta.mensaje);
        $("#email").val('');
      });
    });
  });*/