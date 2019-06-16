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
$apellido_materno=$_REQUEST['apellido_materno'];
$apellido_paterno=$_REQUEST['apellido_paterno'];

$sql="delete from docente where nombre ='".$nombre."' AND apellido_materno= '".$apellido_materno."' AND apellido_paterno = '".$apellido_paterno."' ;";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Docente eliminado con éxito');
</script>
";
echo" <script>
        window.location.href='../html/docente.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado al Docente');
</script>";
echo" <script>
        window.location.href='../html/docente.php';
</script>";
}


mysqli_close($conexion); 
?>