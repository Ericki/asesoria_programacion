<?php

if(isset($_POST["nombre"]))
{
	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$sexo = $_POST["sexo"];
	$grado = $_POST["grado"];



	$consulta = "INSERT INTO tblalumno (nombre, apellidos, sexo, grado)VALUES('$nombre','$apellidos','$sexo',$grado)";

	$conexion = new mysqli("localhost","root","","basedatos");

	$respuesta = new stdClass();

	if($conexion->query($consulta)){
		$respuesta->mensaje = "Se guardo correctamente";
	}
	else {
		$respuesta->mensaje = "Ocurrio un error";
	}
	echo json_encode($respuesta);

}

?>
