<?php
include 'conexion.php';
$nombre=$_REQUEST['nombre'];
$id=$_REQUEST['id'];


$sql="update carrera set nombre='".$nombre."' where id_carrera =".$id.";";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Carrera modificada con éxito');
</script>
";
echo" <script>
        window.location.href='../html/carrera.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado la carrera');
</script>";
echo" <script>
        window.location.href='../html/carrera.php';
</script>";
}

mysqli_close($conexion); 
?>