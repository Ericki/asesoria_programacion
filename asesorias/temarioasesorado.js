$( document ).ready(function()
{

$("#datosT").on("submit", function(e){
  //Evitamos que se envíe por defecto
  e.preventDefault();
  //Creamos un FormData con los datos del mismo formulario
var doc = document.getElementById("DOC").files;
if(doc.length!=0){
if (doc[0].size > 8388608  ) {
document.getElementById("datosT").reset();
var a='<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error el documento es demacido grande!</strong>'
            
            $(".upload-msg").html(a);
            window.setTimeout(function() {
            $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            }); }, 5000);
}else {
  var nom = doc[0].name;

if (nom.length > 200  ) {
  document.getElementById("datosT").reset();
var a='<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error el nombre del documento demaciado grande!</strong>'
            
            $(".upload-msg").html(a);
            window.setTimeout(function() {
            $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            }); }, 5000);


}else{

  var formData = new FormData(document.getElementById("datosT"));

    $.ajax({

          url: "upload.php",        
          type: "POST",            
          data: formData,        
          contentType: false,      
          cache: false,            
          processData:false,      
          success: function(data)  
          {
            document.getElementById("datosT").reset();

            $(".upload-msg").html(data);
            window.setTimeout(function() {
            $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            }); }, 5000);
 
          }
        });

}

  }


}


 
       
    
});
});

  