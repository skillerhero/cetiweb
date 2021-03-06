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
	<title>Academias</title>
</head>
<body>
	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='../html/academia.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="home" onclick="window.location.href='../html/menuAdm.php';" class="botonHome">&#127968;</button> 
		<button type="button" name="logout" onclick="window.location.href='logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>
	<?php
	include 'conexion.php';
	echo "<h2>Academias:</h2>";
	$sql="select academia.id_academia, academia.nombre as nombreAcademia, carrera.nombre as nombreCarrera from academia inner join carrera on academia.id_carrera = carrera.id_carrera;";
	$resultado=mysqli_query($conexion,$sql);

//th columna, tr fila y td dato
	echo "<table>\n
	<thead>
	<tr>
	<th>Id</th>
	<th>Nombre</th>
	<th>Carrera</th>
	</tr>
	</thead>
	";

	while($filas=mysqli_fetch_assoc($resultado))
	{	
		echo "<tr>";
		echo "<td>".$filas['id_academia']."</td>";
		echo "<td>".$filas['nombreAcademia']."</td>";
		echo "<td>".$filas['nombreCarrera']."</td>";
		echo "</tr>";
	}
	echo "</table>";

	echo "<br><br><h2>Carreras:</h2>";
	$sql="select *from carrera;";
	$resultado=mysqli_query($conexion,$sql);


//th columna, tr fila y td dato
	echo "<table>\n
	<thead>
	<tr>
	<th>Id</th>
	<th>Nombre</th>
	</tr>
	</thead>
	";

	while($filas=mysqli_fetch_assoc($resultado))
	{	
		echo "<tr>";
		echo "<td>".$filas['id_carrera']."</td>";
		echo "<td>".$filas['nombre']."</td>";
		echo "</tr>";
	}
	echo "</table>";

	?>
</body>
</html>