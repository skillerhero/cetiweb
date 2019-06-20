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
if($tipo!='d'){
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
	<title>Calificaciones</title>
</head>
<body>
	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='../html/profesor.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="logout" onclick="window.location.href='logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>
<?php
include 'conexion.php';

$sql="select *from docente where id_usuario=".$id.";";
$resultado=mysqli_query($conexion,$sql);
if($filas=mysqli_fetch_assoc($resultado)){
$id=$filas['id_docente'];
$academia=$filas['id_academia'];
}

echo "<h2>Asignaturas dentro de esta tabla:</h2>";
$sql="select asignatura.id_asignatura, asignatura.nombre as nombreAsignatura, academia.nombre as nombreAcademia from asignatura inner join academia on asignatura.id_academia = academia.id_academia where academia.id_academia=".$academia.";";
$resultado=mysqli_query($conexion,$sql);

//th columna, tr fila y td dato
echo "<table>\n
	<thead>
	<tr>
	<th>Id</th>
	<th>Nombre</th>
	<th>Academia</th>
	</tr>
	</thead>
";

while($filas=mysqli_fetch_assoc($resultado))
{	
		echo "<tr>";
		echo "<td>".$filas['id_asignatura']."</td>";
		echo "<td>".$filas['nombreAsignatura']."</td>";
		echo "<td>".$filas['nombreAcademia']."</td>";
		echo "</tr>";
}
echo "</table>";


echo "<h2>Calificaciones dentro de esta tabla:</h2>";
$sql="select calificacion.clave_cursa, asignatura.nombre as nombreAsignatura, alumno.registro,alumno.nombre as nombreAlumno,calificacion.periodo,calificacion.calificacion,docente.nombre as nombreDocente from calificacion inner join asignatura on calificacion.id_asignatura= asignatura.id_asignatura inner join alumno on calificacion.registro = alumno.registro inner join docente on calificacion.nomina=docente.id_docente where nomina=".$id.";";
$resultado=mysqli_query($conexion,$sql);


//th columna, tr fila y td dato
echo "<table>\n
	<thead>
	<tr>
	<th>Id</th>
	<th>Asignatura</th>
	<th>Registro</th>
	<th>Alumno</th>
	<th>Periodo</th>
	<th>Calificación</th>
	<th>Docente</th>
	</tr>
	</thead>
";

while($filas=mysqli_fetch_assoc($resultado))
{	
		echo "<tr>";
		echo "<td>".$filas['clave_cursa']."</td>";
		echo "<td>".$filas['nombreAsignatura']."</td>";
		echo "<td>".$filas['registro']."</td>";
		echo "<td>".$filas['nombreAlumno']."</td>";
		echo "<td>".$filas['periodo']."</td>";
		echo "<td>".$filas['calificacion']."</td>";
		echo "<td>".$filas['nombreDocente']."</td>";
		echo "</tr>";
}
echo "</table>";
?>
</body>
</html>