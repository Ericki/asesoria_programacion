<?php
require('conexion.php');
header("Content-Type: text/html;charset=utf-8");
		
$respuesta = array();
if(!empty($_POST['Usuario' ]) && !empty($_POST['Contra']))
	{
		
	$sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND password=:password";
	$resultado=$base->prepare($sql);
	$usuario = htmlentities(addslashes($_POST['Usuario']));
	$password = htmlentities(addslashes(sha1($_POST['Contra'])));
	$resultado->bindValue(":usuario", $usuario);
	$resultado->bindValue(":password", $password);
	$resultado->execute();
	$registro = $resultado->fetch();
	$numero_registro=$resultado->rowCount();

	if ($registro) {
		session_start();
		$_SESSION['usuario'] = $usuario;
		$_SESSION['tipo_usuario'] =$registro['tipo_usuario'];

		if($registro['tipo_usuario'] == "Administrador"){
						$respuesta["estatus"] = 1;
						$respuesta['mensaje'] = "Admin";
		}elseif ($registro['tipo_usuario'] == "Asesor") {
						$respuesta["estatus"] = 2;
						$respuesta['mensaje'] = "Asesor";
		}elseif ($registro['tipo_usuario'] == "Asesorado") {
						$respuesta["estatus"] = 3;
						$respuesta['mensaje'] = "Asesorado";
		}elseif ($registro['tipo_usuario'] == "Alumno Asesor") {
						$respuesta["estatus"] = 4;
						$respuesta['mensaje'] = "Alumno Asesor";
		} 

	}else{
		$respuesta["estatus"] = 5;
		$respuesta['mensaje'] = "Usuario o Password incorrectos";
	}

}else{
	$respuesta["estatus"] = 7;
	$respuesta['mensaje'] = "Ingrese datos obligatorios";
	}

	echo json_encode($respuesta);
?>