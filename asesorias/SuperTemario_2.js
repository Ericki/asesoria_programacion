function descriocion(descri)
{  
    var mensaje =$("#des");
    var formData= descri;
        var parametros = {
                "descri" : descri      
        };
        $.ajax({
                data:  parametros,
                url:   'descripcion.php',
                type:  'post',

        }).done(function(msg){  
            mensaje.html(msg);    
           }).fail( function( jqXHR, textStatus, errorThrown ) {
    mensaje.html("Estamos teniendo problemas");
});
}
function editar(ids)
{  
    var mensaje =$("#des");
        var parametros = {
                "id" : ids          
        };
        $.ajax({
                data:  parametros,
                url:   'EditarDescripcion.php',
                type:  'post',

        }).done(function(msg){  
            mensaje.html(msg);    
           }).fail( function( jqXHR, textStatus, errorThrown ) {
    mensaje.html("Estamos teniendo problemas");
});
}
function editar1(id)
{ 
    var descri = document.Edit.descripcion.value;
   
    var mensaje =$("#des");
        var parametros = {
                "descri" : descri,
                "id": id
        };
        $.ajax({
                data:  parametros,
                url:   'EditarDescripcion_1.php',
                type:  'post',

        }).done(function(msg){  
             alert("todo esta bien");
             alert(msg);
           $(".upload-msg").html(data);
            window.setTimeout(function() {
            $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            }); }, 5000);   
           })
}