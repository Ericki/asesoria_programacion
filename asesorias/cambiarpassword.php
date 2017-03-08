<?php
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$idusuario = $_POST['idusuario'];
$token = $_POST['token'];
 
if( $password1 != "" && $password2 != "" && $idusuario != "" && $token != "" ){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Restablecer </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
 
  <body>
    <div class="container" role="main">
      <div class="col-md-2"></div>
      <div class="col-md-8">
<?php
   require('conexion.php');
   $sql = " SELECT * FROM tblreseteopass WHERE token = :t";
   $resultado = $base->prepare($sql);
   $resultado->bindValue(":t", $token);
   $resultado -> execute();
   $registro = $resultado->fetch();
   $row=$resultado->rowCount();
   $band2=0;

   if( $row > 0 ){
      if( sha1( $registro['id_usuario'] == $idusuario) ){ 
         if( $password1 == $password2 ){
            if(strlen($password1) < 6){?>
              <p class="alert alert-danger">La clave debe tener al menos 6 caracteres</p>
            <?php  
              $band2 = 1;
            }elseif(strlen($password1) > 16){?>
              <p class="alert alert-danger">La clave no puede tener más de 16 caracteres</p>
            <?php 
             $band2 = 2;
            }elseif (!preg_match_all('/[a-z]/',$password1)){?>
              <p class="alert alert-danger">La clave debe tener al menos una letra minúscula</p>
            <?php
              $band2 = 3;
            }elseif (!preg_match_all('/[A-Z]/',$password1)){?>
              <p class="alert alert-danger">La clave debe tener al menos una letra mayúscula</p>
            <?php
              $band2 = 4;
            }elseif (!preg_match_all('/[0-9]/',$password1)){?>
              <p class="alert alert-danger">La clave debe tener al menos un caracter numérico</p>
            <?php  
              $band2 = 5;
            }

            if ($band2 == 0){
              $sql = "UPDATE usuarios SET password = :p WHERE id_usuario = :i ";
              $result = $base->prepare($sql);
              $result->bindValue(":p",sha1($password1));
              $result->bindValue(":i",$registro['id_usuario']);
              $result -> execute();
            if($result){
              $sql = "DELETE FROM tblreseteopass WHERE token = :t;";
              $resultado = $base->prepare($sql);
              $resultado->bindValue(":t", $token);
              $resultado -> execute();
?>
               <p class="alert alert-info"> La contraseña se actualizó con exito. </p>
<?php              
                //header('Location:index.html');

            }
          }
            else{
?>
              <p class="alert alert-danger"> Ocurrió un error al actualizar la contraseña, intentalo más tarde </p>
<?php
              //header('Location:restablecer.php');  
            }
         }else{
?>
           <p class="alert alert-danger"> Las contraseñas no coinciden </p>
<?php
          //header('Location:restablecer.php');
         }
      }
      else{
?>
        <p class="alert alert-danger"> El token no es válido </p>
<?php
      //header('Location:index.html');
      }
   }
   else{
?>
      <p class="alert alert-danger"> El token no es válido </p>
<?php
      //header('Location:index.html');
   }
?>
</div>
<div class="col-md-2"></div>
</div> <!-- /container -->
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
else{
   //header('Location:index.html');
}
?>