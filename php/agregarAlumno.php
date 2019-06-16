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
$registro=$_REQUEST['registro'];
$carrera=$_REQUEST['carreras'];
$genero=$_REQUEST['genero'];
$nombre=$_REQUEST['nombre'];
$apellidoP=$_REQUEST['apellidoP'];
$apellidoM=$_REQUEST['apellidoM'];
$celular=$_REQUEST['celular'];
$domicilio=$_REQUEST['domicilio'];
$colonia=$_REQUEST['colonia'];
$usuario=$_REQUEST['txtUsuarios'];
$municipio=$_REQUEST['txtMunicipios'];

$sql = "select clave_municipio from municipio where nombre= '".$municipio."';";
$resultado = mysqli_query($conexion,$sql);
$fila1=mysqli_fetch_assoc($resultado);

$sql = "select id_usuario from usuario where usuario='".$usuario."';";
$resultado = mysqli_query($conexion,$sql);
$fila3=mysqli_fetch_assoc($resultado);

$sql= "insert into alumno(REGISTRO, DOMICILIO, CELULAR, SEXO, APELLIDO_MATERNO, APELLIDO_PATERNO, COLONIA, NOMBRE, CLAVE_MUNICIPIO, ID_CARRERA, id_usuario) values(".$registro.",'".$domicilio."',".$celular.",'".$genero."','".$apellidoM."','".$apellidoP."','".$colonia."','".$nombre."',".$fila1['clave_municipio'].",".$carrera.",".$fila3['id_usuario'].");";
mysqli_query($conexion,$sql);
echo" <script>
alert('Alumno ingresado con éxito');
</script>";
echo" <script>
        window.location.href='../html/alumnos.php';
</script>";

mysqli_close($conexion);


?>