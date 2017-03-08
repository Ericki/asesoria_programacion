<?php
session_start();
    if (!isset($_SESSION['usuario']) ) {
    header("Location:index.php");
}else{
    if ($_SESSION['tipo_usuario']!='Administrador'and $_SESSION['tipo_usuario']!='Asesor'and $_SESSION['tipo_usuario']!='Alumno Asesor') {
    header("Location:redireccion.php");
 }else{
    if ($_SESSION['estado']!= 'Alta')  {
    header("Location:espera.php");
 }
}
}
$id=$_SESSION['id'];
require('conexion.php');

$target_dir = "upload/";
$carpeta=$target_dir;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

$documento= $carpeta . basename($_FILES['DOC']['name']);
$ruta=$documento;
$descripcion= $_POST['descripcion'];
$uploadOk = 1;
$documentoFileType = pathinfo($documento,PATHINFO_EXTENSION);

//$nombre_doc=$_FILES['DOC']['name'];

$nombre_doc=str_replace($documentoFileType,"",$_FILES['DOC']['name'],$apPatCont);
$Invalidos = array("'","+","%","(",")","()",";","/","?","¿","<",">","&","^","~","%");

$descripcion = str_replace($Invalidos,"",$descripcion,$apPatCont);

// Check if file already exists
if (file_exists($documento)) {
    $errors[]="Lo sentimos, archivo ya existe.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES['DOC']['size'] > 2024288) {
    $errors[]= "Lo sentimos, el archivo es demasiado grande.  Tamaño máximo admitido: 0.5 MB";
    $uploadOk = 0;
}
 
 if(($documentoFileType =="exe" )|| ($documentoFileType== "com") ||($documentoFileType == "js")||($documentoFileType == "bat") ) {
    $errors[]= "Lo sentimos, ese tipo de archivo no esta permitido";
   $uploadOk = 0;
 }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $errors[]= "Lo sentimos, tu archivo no fue subido.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["DOC"]["tmp_name"], $documento)) {
	   
 $sql = "INSERT INTO `temario` (`id_documento`, `direccion_doc`, `id_asesor`, `descripcion`, `estatus`, `nombre_doc`) VALUES (NULL, '$ruta', '$id', '$descripcion', 'espera', '$nombre_doc');";  
  if ($base->query($sql)) {
          $messages[]= "El Archivo ha sido subido correctamente.";
        }else {
       $errors[]= "Lo sentimos, hubo un error subiendo el archivo.";
    }
    } else {
       $errors[]= "Lo sentimos, hubo un error subiendo el archivo.";
    }
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