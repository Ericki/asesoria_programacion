<?php 
require('conexion.php');
function generarLinkTemporal($idusuario, $username){
  require('conexion.php');
   // Se genera una cadena para validar el cambio de contraseña
   $cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
   $token = sha1($cadena);
   $usuario = sha1($idusuario);
   // Se inserta el registro en la tabla tblreseteopass
    $sql2   = "SELECT * FROM tblreseteopass WHERE username =:usuario";
    $resultado=$base->prepare($sql2);
    $resultado->bindValue(":usuario", $username);
    $resultado->execute();
    $resul2=$resultado->rowCount();

    if ($resul2==0) {
    $sql = "INSERT INTO tblreseteopass (id_usuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW());";
   $resultado = $base->prepare($sql);
   $resultado -> execute();
   if($resultado){
      // Se devuelve el link que se enviara al usuario
      $enlace ='localhost:8081/Asesoriasenlinea/restablecer.php?id_usuario='.$usuario.'&token='.$token.'';
      //$enlace = $_SERVER["SERVER_NAME"].'/Asesoriasenlinea/prueba.php?idusuario='.sha1($idusuario).'&token='.$token;
      return $enlace;
   }
   }
   else
      return FALSE;
}
 
function enviarEmail( $email, $link ){
   $mensaje = '<html>
     <head>
        <title>Restablece tu contraseña</title>
     </head>
     <body>
       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu contraseña</strong><br>
         <a href="'.$link.'"> Restablecer contraseña </a>
       </p>
     </body>
    </html>';
 
   $cabeceras = 'MIME-Version: 1.0' . "\r\n";
   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $cabeceras .= 'From: Asesoriasenlinea <admin@gmail.com>' . "\r\n";
   // Se envia el correo al usuario
   mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
}


$email = $_POST['email'];
 
$respuesta = new stdClass();
 
if( $email != "" ){
   $sql = "SELECT * FROM usuarios WHERE correo = '$email' ";
   $resultado = $base->query($sql);
   if($resultado->rowCount() > 0){
      $usuario = $resultado->fetch();
         $respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
      $linkTemporal = generarLinkTemporal( $usuario['id_usuario'], $usuario['usuario'] );
      if($linkTemporal){
        enviarEmail( $email, $linkTemporal );
        $respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
      }
}
   else
      $respuesta->mensaje = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
}
else
   $respuesta->mensaje= "Debes introducir el email de la cuenta";
 echo json_encode( $respuesta );

?>