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
$nombre=$_REQUEST['nombreEliminar'];
$asignaturas=$_REQUEST['academias'];

$sql="delete from asignatura where nombre ='".$nombre."' AND id_academia= '".$asignaturas."' ;";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Asignatura eliminado con éxito');
</script>
";
echo" <script>
        window.location.href='../html/asignaturas.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado la Asignatura');
</script>";
echo" <script>
        window.location.href='../html/asignaturas.php';
</script>";
}

mysqli_close($conexion); 
?>