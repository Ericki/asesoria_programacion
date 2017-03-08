
    var seconds = 1; // el tiempo en que se refresca
    var divid = "tem"; // el div que quieres actualizar!
    var url = "SuperTemario_2.php"; // el archivo que ira en el div


    function refreshdiv(){

        
        var xmlHttp;
        try{
            xmlHttp=new XMLHttpRequest(); 
        }
        catch (e){
            try{
                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
            }
            catch (e){
                try{
                    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e){
                    alert("Tu explorador no soporta AJAX.");
                    return false;
                }
            }
        }

        
        var timestamp = parseInt(new Date().getTime().toString().substring(0, 10));
        var nocacheurl = url+"?t="+timestamp;

    

        xmlHttp.onreadystatechange=function(){
            if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
                document.getElementById(divid).innerHTML=xmlHttp.responseText;
                setTimeout('refreshdiv()',seconds*1000);
            }
        }
        xmlHttp.open("GET",nocacheurl,true);
        xmlHttp.send(null);
    } 
window.onload = function(){
refreshdiv();  }
function todos()
{  url = "SuperTemario_1.php"; // el archivo que ira en el div
  
}
function aceptados()
{  url = "SuperTemario_2.php"; // el archivo que ira en el div
  
}
function espera()
{  url = "SuperTemario_3.php"; // el archivo que ira en el div
  
}
function esperaalumno()
{  url = "SuperTemario_4.php"; // el archivo que ira en el div
  
}

  