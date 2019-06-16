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
$carreras=$_REQUEST['carreras'];

$sql="delete from academia where nombre ='".$nombre."' AND id_carrera= '".$carreras."' ;";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Academia eliminado con éxito');
</script>
";
echo" <script>
        window.location.href='../html/academia.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado la Academia');
</script>";
echo" <script>
        window.location.href='../html/academia.php';
</script>";
}


mysqli_close($conexion); 
?>