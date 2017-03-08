<?php 
require('conexion.php');
header("Content-Type: text/html;charset=utf-8");
$sql = 'SELECT * FROM `temario` WHERE `temario`.`estatus` = :DOC';
    $result=$base->prepare($sql);
	$result->bindValue(":DOC","aceptado");
		$result->execute();
    $rows = $result->fetchAll();
     $a= 1;
foreach ($rows as $row) {
      
 // $a= rand ( 1 , 4 );
 
$sql = 'SELECT * FROM `usuarios` WHERE `usuarios`.`id_usuario`=:des';
  $resultado=$base->prepare($sql);
    $resultado->bindValue(":des",$row['id_asesor']);
    $resultado->execute();
    $nombre= $resultado->fetch();
   
if ($a==1) {
  
   $a=2;
   echo '<div class="container-fluid fondo3 bordes" style="margin:2px " >
   <div class="col-md-2 fondo4 text-center bordes " style=" font-size: 80%;">
   <h3><span  style="color:#0A1248;" class="glyphicon glyphicon-book"></span></h3><br/>
   <button id="todos" name="todos" type="submit" value="todos" onclick="descriocion('.$row['id_documento'].')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" ;>descripcion</button>
      <br/>
   </div> 
   <a href=\''.$row['direccion_doc'].'\' title=\''.$row['nombre_doc'].'\' style="color:#000000;">
   <div class="col-md-10 " style=" word-wrap: break-word;">
      <div   class="col-md-12 "> <h4>'.$row['nombre_doc'].'</h4></div>
     <h6> Subido por :   '.$nombre['nombre'].' '.$nombre['apellido_paterno'].' '.$nombre['apellido_materno'].'</h6> </div>
       </a>';
      echo '</div>';


} else{
  $a=1;
     echo '<div class="container-fluid fondo1 bordes" style="margin:2px " >
   <div class="col-md-2 fondo2 text-center bordes " style=" font-size: 80%;">
   <h3><span  style="color:#0A1248;" class="glyphicon glyphicon-book"></span></h3><br/>
   <button id="todos" name="todos" type="submit" value="todos" onclick="descriocion('.$row['id_documento'].')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal";>descripcion</button>
      <br/>
   </div> 
   <a href=\''.$row['direccion_doc'].'\' title=\''.$row['nombre_doc'].'\' style="color:#000000;">
   <div class="col-md-10 " style=" word-wrap: break-word;">
      <div class="col-md-12 "> <h4>'.$row['nombre_doc'].'</h4></div>
     <h6> Subido por :   '.$nombre['nombre'].' '.$nombre['apellido_paterno'].' '.$nombre['apellido_materno'].'</h6> </div>
       </a>';echo ' </div>';

}

}
 ?>

