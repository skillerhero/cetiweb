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
$carrera=$_REQUEST['nombre'];
$sql="insert into carrera(id_carrera, nombre) values(0,'".$carrera."');";
mysqli_query($conexion,$sql);

echo" <script>
alert('Carrera ingresada con éxito');
</script>";
echo" <script>
        window.location.href='../html/carrera.php';
</script>";
mysqli_close($conexion);


?>