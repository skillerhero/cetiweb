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
$registro=$_REQUEST['registro'];
$nuevoRegistro=$_REQUEST['nuevoRegistro'];
$carrera=$_REQUEST['carreras'];
$genero=$_REQUEST['genero'];
$nombre=$_REQUEST['nombre'];
$apellidoP=$_REQUEST['apellidoP'];
$apellidoM=$_REQUEST['apellidoM'];
$celular=$_REQUEST['celular'];
$domicilio=$_REQUEST['domicilio'];
$colonia=$_REQUEST['colonia'];
$usuario=$_REQUEST['txtUsuarios'];
$municipio=$_REQUEST['txtMunicipios'];

$sql="select id_usuario from usuario where usuario='".$usuario."';";
$resultado=mysqli_query($conexion,$sql);
$resultadoUsuario=mysqli_fetch_assoc($resultado);

$sql="select clave_municipio from municipio where nombre='".$municipio."';";
$resultado=mysqli_query($conexion,$sql);
$resultadoMunicipio=mysqli_fetch_assoc($resultado);


$sql="update alumno set registro=".$nuevoRegistro.", domicilio='".$domicilio."', celular=".$celular.",sexo='".$genero."',APELLIDO_MATERNO='".$apellidoM."',APELLIDO_PATERNO='".$apellidoP."',colonia='".$colonia."',nombre='".$nombre."',id_carrera=".$carrera." where registro =".$registro.";";

mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Alumno modificado con éxito');
</script>
";
echo" <script>
        window.location.href='../html/alumnos.php';
</script>";
}
else{
	        echo" <script>
alert('No se ha encontrado el alumno, verificar que se haya llenado el campo de Buscar correctamente.');
</script>";
echo" <script>
        window.location.href='../html/alumnos.php';
</script>";
}

mysqli_close($conexion); 
?>