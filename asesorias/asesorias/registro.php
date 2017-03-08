<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./main.css" />

<title>Asesorias en linea de programacion upiiz</title>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="registrarUsuarios.js"></script>
</head>
<body>	
<div class="contenedorformularios " style="height: 120%; " >

</div>

	<div class="subcontenedorformularios  " style="height: 115%;"> 

	<form enctype="multipart/form-data" id="datos" class="formulario" method="post">
   <br> 
         <label class="tituloformulario" >Registro</label><br>  <br> 
                <!--<input class="cajasformularios" id="nombre" name="nombre" type="text" placeholder="Nombre / s" required/  style="height: 5%;"><br>  <br> -->
                <input class="cajasformularios" id="nombre" name="nombre" type="text" placeholder="Nombre / s"   style="height: 5%;" required/><br>  <br> 
                <input class="cajasformularios" id="Apellidopaterno" name="Apellidopaterno" type="text" placeholder="Apellido paterno"  style="height: 5%;" required/><br>  <br> 
                <input class="cajasformularios" id="Apellidomaterno" name="Apellidomaterno" type="text" placeholder="Apellido  materno  " style="height: 5%;" required/><br>  <br> 
                <select class="cajasformularios" id="Tipousuario" name="Tipousuario" type="text" placeholder="Tipo de usuario"  style="height: 5%;" required/>
                    <option selected>Tipo de usuario</option>
                    <option>Asesor</option>
                    <option>Asesorado</option>
                    <option>Alumno Asesor</option>
                </select><br>  <br> 
                <input class="cajasformularios" id="Usuario" name="Usuario" type="text" placeholder="Usuario"  style="height: 5%;" required/><br>  <br> 
                 <input class="cajasformularios" id="E-mail" name="E-mail" type="text" placeholder="E-mail"  style="height: 5%;" required/><br>  <br> 

                <input class="cajasformularios" id="Contra" name="Contra" type="password" placeholder="Contraseña"  style="height: 5%;" required/><br>  <br>    
                <input class="cajasformularios" id="Contra1" name="Contra1" type="password" placeholder="Repetir Contraseña"  style="height: 5%;" required/><br>  <br> <br> 
                 <input class="cajasformularios" id="imagen" name="imagen" type="file" placeholder="subir"  style="height: 5%;" required/><br>  <br>
           <input id="campo3" name="registrarse" type="submit" value="Registrarse" style="height: 7%;" required/ /><br>  <br> <br>  <br>  

</form>
</div>
<div class="encavezado">

	<div class="subencavezado">
	<div id="mensaje" style="border:1px solid #CCC; padding:10px;"></div>
</div>
<img class="logo" src="./imagenes/logo.png" alt="Logo IPN-UPIIZ">
</div>
</body>
</html>