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
$nombre=$_REQUEST['nombre'];

$sql="delete from municipio where nombre ='".$nombre."';";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Municipio eliminado con éxito');
</script>
";
echo" <script>
        window.location.href='../html/municipio.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado el municipio');
</script>";
echo" <script>
        window.location.href='../html/municipio.php';
</script>";
}

mysqli_close($conexion); 
?>