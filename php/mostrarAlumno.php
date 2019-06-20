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
if($tipo!='a'){
	echo "<body style='	background-image: url(../imagenes/restricted.jpg);
	background-size: 100vw 100vh;
	background-attachment: fixed;'></body>";
die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="../imagenes/favicon.ico">
	<meta name="viewport" content="width=device-width">
	<link rel='stylesheet' type='text/css' href='../css/estilos.css' media='all'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<title>Alumnos</title>
</head>
<body>
	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='../html/alumnos.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="home" onclick="window.location.href='../html/menuAdm.php';" class="botonHome">&#127968;</button> 
		<button type="button" name="logout" onclick="window.location.href='logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>
<?php
include 'conexion.php';
echo "<h2 style='margin-top: 100px;'>Alumnos:</h2>";
$sql="select alumno.registro, alumno.nombre as nombreAlumno,alumno.apellido_paterno,alumno.apellido_materno,alumno.domicilio,alumno.celular,alumno.sexo,alumno.colonia,municipio.NOMBRE as nombreMunicipio,carrera.nombre as nombreCarrera,usuario.usuario from alumno inner join municipio on alumno.clave_municipio = municipio.clave_municipio inner join carrera on alumno.id_carrera = carrera.id_carrera inner join usuario on alumno.id_usuario=usuario.id_usuario;";
$resultado=mysqli_query($conexion,$sql);


//th columna, tr fila y td dato
echo "<table>\n
<thead>
<tr>
<th>Registro</th>
<th>Nombre</th>
<th>Apellido paterno</th>
<th>Apellido materno</th>
<th>Domicilio</th>
<th>Celular</th>
<th>Sexo</th>
<th>Colonia</th>
<th>Municipio</th>
<th>Carrera</th>
<th>Usuario</th>
</tr>
</thead>
";

while($filas=mysqli_fetch_assoc($resultado))
{	
	echo "<tr>";
	echo "<td>".$filas['registro']."</td>";
	echo "<td>".$filas['nombreAlumno']."</td>";
	echo "<td>".$filas['apellido_paterno']."</td>";
	echo "<td>".$filas['apellido_materno']."</td>";
	echo "<td>".$filas['domicilio']."</td>";
	echo "<td>".$filas['celular']."</td>";
	echo "<td>".$filas['sexo']."</td>";
	echo "<td>".$filas['colonia']."</td>";
	echo "<td>".$filas['nombreMunicipio']."</td>";
	echo "<td>".$filas['nombreCarrera']."</td>";
	echo "<td>".$filas['usuario']."</td>";
	echo "</tr>";
}
echo "</table>";
?>
</body>
</html>