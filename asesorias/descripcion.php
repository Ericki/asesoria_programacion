<?php  
require('conexion.php');
$descripcion= $_POST['descri'];

	$sql = 'SELECT * FROM `temario` WHERE `id_documento`=:des';
	$resultado=$base->prepare($sql);
    $resultado->bindValue(":des", $descripcion);
    $resultado->execute();
    $descri= $resultado->fetch();
echo '<h6>'.$descri['descripcion'].'</h6>';

?>

