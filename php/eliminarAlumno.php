<?php
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['tipo'])){
	echo "<body style='	background-image: url(../imagenes/restricted.jpg);
	background-size: 100vw 100vh;
	background-attachment: fixed;'></body>";
die();
}

$id=$_SESSION['id'];
$tipo=$_SESSION['tipo'];
include 'conexion.php';
if (isset($_POST['eliminarAlumno'])){
	$alumno=$_REQUEST['registroEliminar'];
	$sql="delete from alumno where registro ='".$alumno."';";
	mysqli_query($conexion,$sql);
	if(mysqli_affected_rows($conexion) > 0){
		echo"<script>
		alert('\u2714 Usuario Eliminado');
		</script>
		";
		echo" <script>
        window.location.href='../html/alumnos.php';
		</script>";

	}
	else{
		echo" <script>
		alert('\u274C El usuario no ha sido encontrado');
		</script>";
		echo" <script>
        window.location.href='../html/alumnos.php';
		</script>";

	}
	
}
mysqli_close($conexion); 

?>