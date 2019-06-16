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
$asignatura=$_REQUEST['nombreAgregar'];
$academia=$_REQUEST['academias'];
$idAsignatura=$_REQUEST['idAsignatura'];

$sql="insert into asignatura(Id_Asignatura, nombre, id_academia) values('".$idAsignatura."','".$asignatura."','". $academia."');";

mysqli_query($conexion,$sql);

echo" <script>
alert('Asignatura ingresada con éxito');
</script>";
echo" <script>
        window.location.href='../html/asignaturas.php';
</script>";

mysqli_close($conexion);


?>