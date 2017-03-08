
<?php 
$v1 = $_GET['variable1'];
require('conexion.php');
$sql = "DELETE FROM `temario` WHERE `temario`.`direccion_doc` = :DOC";	
	$resultado=$base->prepare($sql);
	$resultado->bindValue(":DOC", $v1);
$resultado->execute();


if(file_exists($v1)) 
{ 
if(unlink($v1)) 
	header("Location:SuperTemario.php");} 
else 
print "Este archivo no existe"; 
				?>