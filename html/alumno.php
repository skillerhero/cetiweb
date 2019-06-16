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
if($tipo!='e'){
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
	<title>Información del alumno</title>
</head>
<body>
	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='../php/logout.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="home" onclick="window.location.href='../php/logout.php';" class="botonHome">&#127968;</button> 
		<button type="button" name="logout" onclick="window.location.href='../php/logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>
<?php
include '../php/conexion.php';
echo "<h2 style='margin-top: 100px;'>Información del alumno:</h2>";

$municipio="";
$carrera="";
$nombreUsuario="";
$sql="select *from alumno where id_usuario=".$id.";";
$resultado=mysqli_query($conexion,$sql);
if($filas=mysqli_fetch_assoc($resultado)){
$municipio=$filas['CLAVE_MUNICIPIO'];
$carrera=$filas['ID_CARRERA'];
$nombreUsuario=$filas["id_usuario"];
$id=$filas["REGISTRO"];
}

$sql="select *from municipio where Clave_municipio=".$municipio.";";
$resultado=mysqli_query($conexion,$sql);
if($filas=mysqli_fetch_assoc($resultado)){
$municipio=$filas['nombre'];
}

$sql="select *from carrera where id_carrera=".$carrera.";";
$resultado=mysqli_query($conexion,$sql);
if($filas=mysqli_fetch_assoc($resultado)){
$carrera=$filas['nombre'];
}

$sql="select *from usuario where id_usuario=".$nombreUsuario.";";
$resultado=mysqli_query($conexion,$sql);
if($filas=mysqli_fetch_assoc($resultado)){
$nombreUsuario=$filas['usuario'];
}

$sql="select *from alumno where REGISTRO=".$id.";";
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
$contador=0;
if($filas=mysqli_fetch_assoc($resultado))
{	
	echo "<tr>";
	echo "<td>".$filas['REGISTRO']."</td>";
	echo "<td>".$filas['NOMBRE']."</td>";
	echo "<td>".$filas['APELLIDO_PATERNO']."</td>";
	echo "<td>".$filas['APELLIDO_MATERNO']."</td>";
	echo "<td>".$filas['DOMICILIO']."</td>";
	echo "<td>".$filas['CELULAR']."</td>";
	echo "<td>".$filas['SEXO']."</td>";
	echo "<td>".$filas['COLONIA']."</td>";
	echo "<td>".$municipio."</td>";
	echo "<td>".$carrera."</td>";
	echo "<td>".$nombreUsuario	."</td>";
	echo "</tr>";
	$contador++;
}
echo "</table>";
if($contador==0){
	echo "<h1 style='margin-top: 100px;'>Este usuario no está relacionado a un alumno.</h1>";
}
	

echo "<h2>Calificaciones</h2>";
$asignatura="";
$profesor="";
$sql="select *from calificacion where registro=".$id.";";
$resultado=mysqli_query($conexion,$sql);
if(($filas=mysqli_fetch_assoc($resultado))){
$asignatura=$filas['id_asignatura'];
$profesor=$filas['nomina'];
}

$sql="select *from asignatura where Id_Asignatura='".$asignatura."';";
$resultado=mysqli_query($conexion,$sql);
if(($filas=mysqli_fetch_assoc($resultado))){
$asignatura=$filas['nombre'];
}

$sql="select *from docente where id_docente=".$profesor.";";
$resultado=mysqli_query($conexion,$sql);
if(($filas=mysqli_fetch_assoc($resultado))){
$profesor=$filas['nombre']." ".$filas['apellido_paterno'].".".$filas['apellido_materno'];
}
//th columna, tr fila y td dato
echo "<table>\n
<thead>
<tr>
<th>Id</th>
<th>Asignatura</th>
<th>Registro</th>
<th>Periodo</th>
<th>Calificación</th>
<th>Profesor</th>
</tr>
</thead>
";
$contador=0;
$sql="select *from calificacion where registro=".$id.";";
$resultado=mysqli_query($conexion,$sql);
while($filas=mysqli_fetch_assoc($resultado))
{	
	echo "<tr>";
	echo "<td>".$filas['clave_cursa']."</td>";
	echo "<td>".$asignatura."</td>";
	echo "<td>".$filas['registro']."</td>";
	echo "<td>".$filas['periodo']."</td>";
	echo "<td>".$filas['calificacion']."</td>";
	echo "<td>".$profesor."</td>";
	echo "</tr>";
	$contador++;
}
echo "</table>";
if($contador==0){
	echo "<h1 style='margin-top: 100px;'>Este alumno no tiene calificaciones.</h1>";
}


?>
</body>
</html>