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
$usuario=$_REQUEST['nombre'];
$sql="insert into municipio(clave_municipio,nombre) values(0,'".$usuario."');";
mysqli_query($conexion,$sql);

echo" <script>
alert('Municipio ingresado con éxito');
</script>";
echo" <script>
        window.location.href='../html/municipio.php';
</script>";
mysqli_close($conexion);
?>