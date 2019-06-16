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
$usuario=$_REQUEST['usuario'];
$contra=$_REQUEST['pass'];
$contra=password_hash($contra, PASSWORD_DEFAULT);
$userType=$_REQUEST['tipoUsuario'];
$sql="insert into usuario(id_usuario,usuario,contrasena,tipo_usuario) values(0,'".$usuario."','".$contra."','".$userType."');";
mysqli_query($conexion,$sql);


echo" <script>
alert('Usuario ingresado con éxito');
</script>";
echo" <script>
        window.location.href='../html/usuario.php';
</script>";
mysqli_close($conexion); 
?>