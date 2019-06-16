<?php
include 'conexion.php';
$nombre=$_REQUEST['nombre'];
$id=$_REQUEST['id'];

$sql="update municipio set nombre='".$nombre."' where clave_municipio =".$id.";";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
	echo"<script>
	alert('Municipo modificado con exito');
	</script>
	";
	echo" <script>
        window.location.href='../html/municipio.php';
</script>";
}
else{
	echo" <script>
	alert('No se ha encontrado el municipio, verificar que se haya llenado el campo de Buscar correctamente.');
	</script>";
	echo" <script>
        window.location.href='../html/municipio.php';
</script>";
}

mysqli_close($conexion);


?>