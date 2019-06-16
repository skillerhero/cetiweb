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
$asignatura=$_REQUEST['nombre'];
$academia=$_REQUEST['academias'];
$oldIdAcademia=$_REQUEST['old_IdAcademia'];
$oldNombre=$_REQUEST['old_Nombre'];
$idAsignatura=$_REQUEST['idAsignatura'];

$sql="update asignatura set id_asignatura='".$idAsignatura."', nombre='".$asignatura."',id_academia=".$academia." where nombre ='".$oldNombre."' and id_academia=".$oldIdAcademia.";";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Asignatura modificada con éxito');
</script>
";
echo" <script>
        window.location.href='../html/asignaturas.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado la Asignatura, verificar que se haya llenado el campo de Buscar correctamente.');
</script>";
echo" <script>
        window.location.href='../html/asignaturas.php';
</script>";
}


mysqli_close($conexion);


?>