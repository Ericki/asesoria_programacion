
<?php 
$v1 = $_GET['variable1'];
require('conexion.php');
$sql = "UPDATE `temario` SET `estatus` = 'aceptado' WHERE `temario`.`direccion_doc` = :DOC";	
	$resultado=$base->prepare($sql);
	$resultado->bindValue(":DOC", $v1);
$resultado->execute();



	header("Location:SuperTemario.php");

				?>