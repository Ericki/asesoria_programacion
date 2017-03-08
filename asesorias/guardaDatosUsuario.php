<?php
require('conexion.php');
//header("content-type: text/html;charset=utf-8");	

$respuesta = array();
if(!empty($_POST['Apellidopaterno']) && !empty($_FILES['imagen']['name']) && !empty($_POST['Apellidomaterno']) && !empty($_POST['Tipousuario']) && !empty($_POST['Usuario' ]) && !empty($_POST['E-mail']) && !empty($_POST['nombre']) && !empty($_POST['Contra']
	) && !empty($_POST['Contra1']))
	{
		$_apellido_pat  =$_POST['Apellidopaterno'];
		$_apellido_mat=$_POST['Apellidomaterno'];
		$_tipo_usuario=$_POST['Tipousuario'];
		$_usuario =$_POST['Usuario'];
		$_email=$_POST['E-mail'];
		$_nombre =$_POST['nombre'];		
		$_password=$_POST['Contra'];
		$_password2 =$_POST['Contra1'];

		$_imagen = $_FILES['imagen']['name'];
		$_imagen_size=$_FILES['imagen']['size'];
		$_imagen_error= $_FILES['imagen']['error'];
		$_imagen_tmp=$_FILES['imagen']['tmp_name'];
		$_imagen_type=$_FILES['imagen']['type'];
		$_imagenload= false;
		$band = 0;
		$band2 = 0;
		$consult=0;
		$Invalidos = array("'","+","%","(",")","()",";","/","?","¿","<",">","&","^","~","%");

		$ima= str_replace($Invalidos, "",$_imagen,$imaCont);
		$apellido_pat = str_replace($Invalidos, "",$_apellido_pat,$apPatCont);
		$apellido_mat = str_replace($Invalidos, "",$_apellido_mat,$apMatCont); 
		$tipo_usuario = str_replace($Invalidos, "",$_tipo_usuario,$tp);
		$usuario = str_replace($Invalidos, "",$_usuario,$u);
		$email = str_replace($Invalidos, "",$_email,$e);
		$nombre = str_replace($Invalidos, "",$_nombre,$n);
		$password = str_replace($Invalidos, "",$_password,$p);
		$password2 = str_replace($Invalidos, "",$_password2,$p2);
		$caracteresMalos=$imaCont+$apPatCont+$apMatCont+$u+$e+$n+$p+$p2+$tp;
		
		$guardar = false;

		function isEmail($email) {
			return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
		}

		if(!isEmail($email)) {
			$respuesta["estatus"] = 2;
			$respuesta['mensaje'] = 'El email no existe';
			$band=1;
		}

		if ($tipo_usuario=="Tipo de usuario") {
			$respuesta["estatus"] = 2;
			$respuesta['mensaje'] = 'Debe elejir un tipo de usuario';
			$band=9;
		}

		if(($password == $password2) ) {
			if(strlen($password) < 6){
				$respuesta["estatus"] = 2;
			  	$respuesta['mensaje'] = "La clave debe tener al menos 6 caracteres";
				$band2 = 1;
			}elseif(strlen($password) > 16){
				$respuesta["estatus"] = 2;
				$respuesta['mensaje'] = "La clave no puede tener más de 16 caracteres";
				$band2 = 2;
		    }elseif (!preg_match_all('/[a-z]/',$password)){
				$respuesta["estatus"] = 2;
				$respuesta['mensaje'] = "La clave debe tener al menos una letra minúscula";
				$band2 = 3;
			}elseif (!preg_match_all('/[A-Z]/',$password)){
				$respuesta["estatus"] = 2;
				$respuesta['mensaje'] = "La clave debe tener al menos una letra mayúscula";
				$band2 = 4;
		    }elseif (!preg_match_all('/[0-9]/',$password)){
				$respuesta["estatus"] = 2;
				$respuesta['mensaje'] = "La clave debe tener al menos un caracter numérico";
				$band2 = 5;
			}

			if ($band2 == 0){
				$sha1_pass = sha1($password);
				$guardar = true;
			}
		}else{
			$respuesta["estatus"] = 2;
			$respuesta['mensaje'] = "Las claves no coinciden";
		}

		//si no hay directorio, lo creamos
	   	if(!is_dir("imagenes/")){
	     	mkdir("imagenes/", 0777,true);
	   	}

		if ($_imagen_error>0) {
			$respuesta["estatus"] = 2;
			$respuesta['mensaje'] = "Problemas al cargar la imágen";
			$band=2;
		}
		 if ($_imagen_size>2000000){
		 	$respuesta["estatus"] = 2;
			$respuesta['mensaje'] = "Exedio el tamaño de imágen permitido";
			$band=3;
		}

		if (!(strpos($_imagen_type, "jpeg") || strpos($_imagen_type, "png") || strpos($_imagen_type, "jpg"))){
			 $tipo=false;
			 $respuesta["estatus"] = 2;
			 $respuesta['mensaje'] = "Sólo se permite jpeg,png o jpg";
			 $band=4;
		}

		if ($caracteresMalos != 0) {
			$respuesta["estatus"] = 2;
			$respuesta['mensaje'] = "Caracteres no válidos";
			$band=5;
		}

		$sql2   = "SELECT * FROM usuarios WHERE usuario =:usuario";
		$resultado=$base->prepare($sql2);
		$resultado->bindValue(":usuario", $usuario);
		$resultado->execute();
		$resul2=$resultado->rowCount();

		if ($resul2 == 0 && $band == 0 && $guardar == true) {
			$imag = date('Y-m-d').date('H-i-s').trim($ima);
			$imagen = "imagenes/".$imag;

			$move_imagen = move_uploaded_file($_imagen_tmp, $imagen);
			if (!$move_imagen) {
				$respuesta["estatus"] = 2;
				$respuesta['mensaje'] = "Error al cargar la imágen";
				$_imagenload= true;
			}
			if ($_imagenload == false ) {
				$consult = 1;
				$sql = "INSERT INTO usuarios (id_usuario,nombre,apellido_paterno, apellido_materno,tipo_usuario,estatus,password,foto,usuario,correo)VALUES(null,'$nombre','$apellido_pat','$apellido_mat','$tipo_usuario',0,'$sha1_pass','$imagen','$usuario','$email')";	
				//$base->exec($sql);

				if ($base->query($sql)) {
					$respuesta["estatus"] = 1;
					$respuesta['mensaje'] = "Usuario Registrado Exitosamente";
				} else {
					$respuesta["estatus"] = 3;
					$respuesta['mensaje'] = "Error al crear el registro";
				}

					$db = null;
				//$respuesta["estatus"] = 1;
				//$respuesta['mensaje'] = "Usuario Registrado Exitosamente";
			}
			if ($consult==1) {
				$respuesta["estatus"] = 1;
				$respuesta['mensaje'] = "Usuario Registrado Exitosamente";
			}
		}

		if ($resul2 !=0) {
			$respuesta["estatus"] = 2;
			$respuesta['mensaje'] = "El usuario ".$usuario." ya existe, elige un nombre de usuario diferente";
		}

		
	}else{
		$respuesta["estatus"] = 2;
		$respuesta['mensaje'] = "Faltan datos obligatorios";
	}

	echo json_encode($respuesta);
?>
