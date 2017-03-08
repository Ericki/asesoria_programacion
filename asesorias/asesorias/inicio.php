<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="./main.css" />
<title>Asesorias en linea de programacion upiiz</title>
</head>
<body>	
<?php 
	session_start();
	if (!isset($_SESSION['usuario']) ) {
		header("Location:index.php");
	}
 ?>
<div class="encavezado">
	<div class="subencavezado">  
	</div>
	<img class="logo" src="./imagenes/logo.png" alt="Logo IPN-UPIIZ">
	 <label class="texto" >inicio</label>
	</div><br/><br>
	<div class="contenedorformularios">
	<p><h1>Bienvenidos</h1>
	<?php
	switch (variable) {
		case 'value':
			# code...
			break;
		
		default:
			# code...
			break;
	}
	if () {
	 	# code...
	 } 
		echo "Hola: ".$_SESSION['usuario']."<br/><br/>";
		echo "Usted es un: ".$_SESSION['tipo_usuario']."<br/><br/>";
	 ?>
	<a href="cerrarSesion.php">Cerrar sesión</a>
	 </div></p>
</body>
</html>