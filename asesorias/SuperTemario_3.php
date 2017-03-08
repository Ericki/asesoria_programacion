<?php 
require('conexion.php');
header("Content-Type: text/html;charset=utf-8");
session_start();
$sql1 = 'SELECT * FROM `usuarios` WHERE `usuarios`.`id_usuario`=:des';
  $resultado1=$base->prepare($sql1);
    $resultado1->bindValue(":des",$_SESSION['id']);
    $resultado1->execute();
    $nombre1= $resultado1->fetch();

if ($nombre1['tipo_usuario']=="Asesor") {
  $sql = 'SELECT * FROM usuarios INNER JOIN temario WHERE( usuarios.id_usuario = temario.id_asesor)and (usuarios.tipo_usuario != "Administrador") and (temario.estatus = "espera")';
}else{
  $sql = 'SELECT * FROM `temario` WHERE `temario`.`estatus` = "espera"';
}

$result =$base->query($sql);

    // Extract the values from $result
    $rows = $result->fetchAll();

 $a=1; 
   
foreach ($rows as $row) {  
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
   <button id="todos" name="todos" type="submit" value="todos" onclick="descriocion('.$row['id_documento'].')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal";>descripcion</button>
      <br/>
   </div> 
   <a href=\''.$row['direccion_doc'].'\' title=\''.$row['nombre_doc'].'\' style="color:#000000;">
   <div class="col-md-10 " style=" word-wrap: break-word;">
      <div class="col-md-12 "> <h4>'.$row['nombre_doc'].'</h4></div>
     <h6> Subido por :   '.$nombre['nombre'].' '.$nombre['apellido_paterno'].' '.$nombre['apellido_materno'].'</h6> </div>
       </a>';
     if ($row['estatus']=="espera") {
                echo '<button id="todos" name="todos" type="submit" value="todos"  onclick ="location=\'aceptar.php?variable1='.$row['direccion_doc'].'\'" class="btn btn-primary btn-sm" ;>Aceptar documento</button>';
               }

        echo ' <button id="todos" name="todos" type="submit" value="todos" onclick = "location=\'borrar.php?variable1='.$row['direccion_doc'].'\'"class="btn btn-primary btn-sm" ;>Borrar</button>
        <button id="todos" name="todos" type="submit" value="todos" onclick="editar('.$row['id_documento'].')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal";>Editar descripcion</button>
  </div>';


} else{
  $a=1;
     echo '<div class="container-fluid fondo1 bordes" style="margin:2px " >
   <div class="col-md-2 fondo2 text-center bordes " style=" font-size: 80%;">
   <h3><span  style="color:#0A1248;" class="glyphicon glyphicon-book"></span></h3><br/>
   <button id="todos" name="todos" type="submit" value="todos" onclick="descriocion('.$row['id_documento'].')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" ;>descripcion</button>
      <br/>
   </div> 
   <a href=\''.$row['direccion_doc'].'\' title=\''.$row['nombre_doc'].'\' style="color:#000000;">
   <div class="col-md-10 " style=" word-wrap: break-word;">
      <div class="col-md-12 "> <h4>'.$row['nombre_doc'].'</h4></div>
     <h6> Subido por :   '.$nombre['nombre'].' '.$nombre['apellido_paterno'].' '.$nombre['apellido_materno'].'</h6> </div>
       </a>';
     if ($row['estatus']=="espera") {
                echo '<button id="todos" name="todos" type="submit" value="todos"  onclick ="location=\'aceptar.php?variable1='.$row['direccion_doc'].'\'" class="btn btn-primary btn-sm" ;>Aceptar documento</button>';
               }

        echo ' <button id="todos" name="todos" type="submit" value="todos" onclick = "location=\'borrar.php?variable1='.$row['direccion_doc'].'\'"class="btn btn-primary btn-sm" ;>Borrar</button>
        <button id="todos" name="todos" type="submit" value="todos" onclick="editar('.$row['id_documento'].')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal";>Editar descripcion</button>
  </div>';

}
  
    }

 ?>

