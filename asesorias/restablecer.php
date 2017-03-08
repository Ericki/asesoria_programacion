<?php
require('conexion.php');
 
$token = $_GET['token'];
$idusuario = $_GET['id_usuario'];

$sql = "SELECT * FROM tblreseteopass WHERE token = :t";
$resultado = $base->prepare($sql);
$resultado->bindValue(":t", $token);
$resultado -> execute();
$registro = $resultado->fetch();
$row=$resultado->rowCount();
//echo " $row";
if($registro){
   if( sha1($registro['id_usuario']) == $idusuario ){
?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restablecer </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="card card-container">
            <form  action="cambiarpassword.php" method="post" class="form-signin" id="frmRestablecer">
                <input type="password" name="password1" id="password1" class="form-control" placeholder="Nueva contraseña"  required autofocus>
                <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirmar contraseña"  required autofocus>
                <input type="hidden" name="token" value="<?php echo $token ?>">
       			<input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                <button class="btn btn-lg btn-primary btn-block btn-signin" id="campo3" name="login" type="submit" value="Recuperar">Recuperar</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->

</body>

</html>
<?php
   }else{
     header('Location:index.html');
   }
 }else{
     header('Location:index.html'); 
 }
?>