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
$academia=$_REQUEST['nombre'];
$carrera=$_REQUEST['carreras'];
$oldIdCarrera=$_REQUEST['old_IdCarrera'];
$oldNombre=$_REQUEST['oldNombre'];

$sql="update academia set nombre='".$academia."',id_carrera=".$carrera." where nombre ='".$oldNombre."' and id_carrera=".$oldIdCarrera.";";
echo $sql."<br>";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Academia modificada con éxito');
</script>
";
echo" <script>
        window.location.href='../html/academia.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado la academia, verificar que se haya llenado el campo de Buscar correctamente.');
</script>";
echo" <script>
        window.location.href='../html/academia.php';
</script>";
}

mysqli_close($conexion);
?>