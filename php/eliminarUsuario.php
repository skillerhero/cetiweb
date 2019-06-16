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
$sql="delete from usuario where usuario ='".$usuario."';";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Usuario eliminado con éxito');
</script>
";
echo" <script>
        window.location.href='../html/usuario.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado el usuario');
</script>";
echo" <script>
        window.location.href='../html/usuario.php';
</script>";
}

mysqli_close($conexion); 
?>