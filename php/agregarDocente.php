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
$nombre=$_POST['nombre'];
$apellidoM=$_POST['apellido_materno'];
$apellidoP=$_POST['apellido_paterno'];
$nomina=$_POST['id_docente'];
$academia=$_POST['academia'];
$usuario=$_POST['txtUsuarios'];

$sql = "select id_usuario from usuario where usuario= '".$usuario."';";
$resultado = mysqli_query($conexion,$sql);
$fila2=mysqli_fetch_assoc($resultado);
//echo $fila2['id_usuario'];

$sql="insert into docente(id_docente, id_academia, apellido_materno, apellido_paterno, nombre, id_usuario) values('".$nomina."','".$academia."','".$apellidoM."','".$apellidoP."','".$nombre."','".$fila2['id_usuario']."');";

mysqli_query($conexion,$sql);

echo" <script>
alert('Docente ingresada con éxito');
</script>";
echo" <script>
        window.location.href='../html/docente.php';
</script>";

mysqli_close($conexion);


?>