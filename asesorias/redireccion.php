
<?php 
	session_start();
	if (!isset($_SESSION['usuario']) ) {
		header("Location:login.html");
	}else{
switch ($_SESSION['tipo_usuario']) {
	case 'Administrador':
		header("Location:inicioAdministrador.php");
		break;
	case 'Asesor':
		header("Location:inicioAsesor.php");
		break;
		case 'Alumno Asesor':
		header("Location:inicioAlumnoAsesor.php");
		break;
	default:
		header("Location:inicioAsesorado.php");
		break;
}

	}?>

