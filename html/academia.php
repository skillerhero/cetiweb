﻿<?php
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
include '../php/conexion.php';
$sql="select *from carrera";
$resultado=mysqli_query($conexion,$sql);
$opt="<select name='carreras'>";
while($filas=mysqli_fetch_assoc($resultado))
{
	$opt.="<option value='{$filas['id_carrera']}'>{$filas['nombre']}</option>\n";
}
$opt.="</select>";

$academia="";
$filas['id_carrera']="";
$filas['nombre']="";
if (isset($_POST['bscAcademia'])){
	$academia=$_POST['nombre'];
	$carrera=$_POST['carreras'];
	$sql="select *from academia where nombre='".$academia."' and id_carrera=".$carrera.";";
	$resultado=mysqli_query($conexion,$sql);
	if(mysqli_affected_rows($conexion)>0){
		$filas=mysqli_fetch_assoc($resultado);
		$academia="<p style='color:green;'>&#10004 Usuario encontrado </p><br>";
		$academia.="<p>Id_academia:".$filas['id_academia']." Nombre:".$filas['nombre']." Id_carrera:".$filas['id_carrera']."</p><br>";
	}
	else{ 	
		$academia="<p style='color:red;'>&#10060; El usuario no ha sido encontrado </p><br>";
	}
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
	<title>Academia</title>
</head>

<body>

	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='menuAdm.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="home" onclick="window.location.href='menuAdm.php';" class="botonHome">&#127968;</button> 
		<button type="button" name="tabla" onclick="window.location.href='../php/mostrarAcademia.php';" class="botonHome">&#128196; </button> 
		<button type="button" name="logout" onclick="window.location.href='../php/logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>

	<h1>Formulario de academias</h1>
	<form action="../php/agregarAcademia.php" method="post">
		<h2>Añadir</h2>
		<br><p>Nombre</p><input type="text" name = "nombre" required autofocus />	
		<p>Carrera</p> 
		<?php echo $opt; ?>
		<br><input type ="submit" value="&#10010;  Agregar" class="botonAgregar" />

	</form>



	<form method="post" action="../php/eliminarAcademia.php">
		<h2>Eliminar</h2>
		<br><p>Nombre</p><input type="text" name = "nombre" required/>
		<p>Carrera</p> 
		<?php echo $opt; ?>
		<br><input type ="submit" value="&#10007;  Eliminar" class="botonEliminar" />
	</form>

	<form method="post" action="">
		<h2>Buscar</h2>
		<?php echo $academia; ?>
		<br><p>Nombre</p><input type="text" name = "nombre" required/>
		<p>Carrera</p> 
		<?php echo $opt; ?>
		<br><input type ="submit" value="&#128270;Buscar" class="botonBuscar" name="bscAcademia" />
	</form>

	<form action="../php/modificarAcademia.php" method="post">
		<h2>Modificar<span></span></h2>
		<br><p>Nombre</p><input type="text" name = "nombre" required/>
		<p>Carrera</p> 
		<?php echo $opt; ?>
		<input type="hidden" name="old_IdCarrera" value=<?php echo "'".$filas['id_carrera']."'"?>>
		<input type="hidden" name="oldNombre" value=<?php echo "'".$filas['nombre']."'"?>>
		<br><input type ="submit" value="&#9998;  Modificar" class="botonModificar" />
	</form>

</body>
</html>