<?php
include 'conexion.php';
$usuario=$_REQUEST['usuario'];
$id=$_REQUEST['id'];
$contra=$_REQUEST['pass'];
$contra=password_hash($contra, PASSWORD_DEFAULT);
$tipo=$_REQUEST['tipo'];

$sql="update usuario set usuario='".$usuario."',contrasena='".$contra."',tipo_usuario='".$tipo."' where id_usuario =".$id.";";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
	echo"<script>
	alert('Usuario modificado con exito');
	</script>
	";
	echo" <script>
        window.location.href='../html/usuario.php';
</script>";
}
else{
	echo" <script>
	alert('No se ha encontrado el usuario, verificar que se haya llenado el campo de Buscar correctamente.');
	</script>";
	echo" <script>
        window.location.href='../html/usuario.php';
</script>";
}
mysqli_close($conexion);


?>