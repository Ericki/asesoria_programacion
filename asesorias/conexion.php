<?php
//$host = 'localhost';
//$usuario = 'root'; 
//$pass = '';
try {
	$base = new PDO('mysql:host=localhost; dbname=u892458092_aseso','root','');
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$base->exec("set names utf8");
	}catch (Exception $e) {
	die('Error'.$e->getMessage());
	echo" Línea de error".$e->getLine();
}


//$link=mysql_connect($host, $usuario, $pass)or die("¡Imposible conectar!");
//mysql_select_db("baseasesorias", $link)or die("Ups!, no se encuentra la BD");
 

?>
