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
$registroAgregar=$_REQUEST['registroAgregar'];
$calificacion=$_REQUEST['calificacion'];





$sql="insert into calificacion values(0, '".$asignaturas."',".$registroAgregar.", '".$periodo."', ".$calificacion.",".$docentes.") ;";
echo $sql."<br>";


mysqli_query($conexion,$sql);

echo" <script>
alert('Calificacion ingresada con éxito');
</script>";
echo" <script>
        window.location.href='../html/calificacion.php';
</script>";
mysqli_close($conexion);


?>