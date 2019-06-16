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
$asignaturas=$_REQUEST['asignaturas'];
$docentes=$_REQUEST['docentes'];
$periodo=$_REQUEST['periodo'];
$registro=$_REQUEST['registro'];
$calificacion=$_REQUEST['calificacion'];
$oldRegistro=$_REQUEST['oldRegistro'];
$oldPeriodo=$_REQUEST['oldPeriodo'];
$oldAsignatura=$_REQUEST['oldAsignatura'];


$sql="update calificacion set id_asignatura='".$asignaturas."',registro=".$registro.",periodo='".$periodo."', calificacion=".$calificacion.",nomina=".$docentes." where registro=".$oldRegistro." and periodo='".$oldPeriodo."' and id_asignatura='".$oldAsignatura."';";

mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
	echo"<script>
	alert('Calificacion modificada con éxito');
	</script>
	";
	echo" <script>
        window.location.href='../html/calificacion.php';
</script>";
}
else{
	echo" <script>
	alert('No se ha encontrado la calificacion, verificar que se haya llenado el campo de Buscar correctamente.');
	</script>";
	echo" <script>
        window.location.href='../html/calificacion.php';
</script>";
}

mysqli_close($conexion); 
?>