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
$academia=$_REQUEST['nombre'];
$carrera=$_REQUEST['carreras'];

$sql="insert into academia(id_academia, nombre, id_carrera) values(0,'".$academia."','".$carrera."');";
mysqli_query($conexion,$sql);

echo" <script>
alert('Academia ingresada con éxito');
</script>";
echo" <script>
window.location.href='../html/academia.php';
</script>";

mysqli_close($conexion);


?>