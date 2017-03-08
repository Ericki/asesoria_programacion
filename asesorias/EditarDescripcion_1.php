<?php
$id= $_POST['id'];
$descripcion= $_POST['descri'];
require('conexion.php');
 $sql = "UPDATE `temario` SET `descripcion` = '$descripcion' WHERE `temario`.`id_documento` = $id;";  
  

  if ($base->query($sql)) {
          $messages[]= "Se edito correctamente";
        }else {
       $errors[]= "Lo sentimos, hubo un Error";
    }
    
 





if (isset($errors)){
	?>
	<div class="alert alert-danger alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Error!</strong> 
	  <?php
	  foreach ($errors as $error){
		  echo"<p>$error</p>";
	  }
	  ?>
	</div>
	<?php
}
 
if (isset($messages)){
	?>
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Aviso!</strong> 
	  <?php
	  foreach ($messages as $message){
		  echo"<p>$message</p>";
	  }
	  ?>
	</div>
	<?php
}

?>