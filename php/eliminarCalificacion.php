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
$asignaturas=$_REQUEST['asignaturas'];
$periodo=$_REQUEST['periodo'];
$registro=$_REQUEST['registro'];

$sql="delete from calificacion where id_asignatura ='".$asignaturas."' AND periodo= '".$periodo."' AND registro = ".$registro."  ;";
echo $sql."<br>";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Calificacion eliminado con éxito');
</script>
";
echo" <script>
        window.location.href='../html/calificacion.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado la calificacion');
</script>";
echo" <script>
        window.location.href='../html/calificacion.php';
</script>";
}


mysqli_close($conexion); 
?>