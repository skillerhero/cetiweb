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
	<title>Menú administrador</title>
</head>

<body style="  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../imagenes/fondo.jpg);background-size: 100vw 100vh;
background-attachment: fixed;">
<div class="btnesControl">
	<button type="button" name="back" onclick="window.location.href='../php/logout.php';" class="botonBack" value="">&#129184;</button> 
	<button type="button" name="logout" onclick="window.location.href='../php/logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
</div>
<div class="antiwrapping">
	<button type="button" name="alumnos" onclick="window.location.href='../html/alumnos.php';" class="botonesMenuAdm" style="background-color: #1c0b8a; border-color: #1c0b8a;">Alumnos</button> 
	<button type="button" name="academia" onclick="window.location.href='../html/academia.php';" class="botonesMenuAdm" style="background-color: #8a0b0b; border-color: #8a0b0b;">Academia</button> 
	<button type="button" name="asignaturas" onclick="window.location.href='../html/asignaturas.php';" class="botonesMenuAdm" style="background-color: #0b8a11; border-color: #0b8a11;">Asignaturas</button> 
</div>
<div class="antiwrapping">
	<button type="button" name="calificacion" onclick="window.location.href='../html/calificacion.php';" class="botonesMenuAdm" style="background-color: #0b8a84; border-color: #0b8a84;">Calificacion</button> 
	<button type="button" name="carrera" onclick="window.location.href='../html/carrera.php';" class="botonesMenuAdm" style="background-color: #3b0b8a; border-color: #3b0b8a;">Carrera</button> 
	<button type="button" name="docente" onclick="window.location.href='../html/docente.php';" class="botonesMenuAdm" style="background-color: #8a0b5c; border-color: #8a0b5c;">Docente</button> 
</div>
<div class="antiwrapping">
	<button type="button" name="municipio" onclick="window.location.href='../html/municipio.php';"class="botonesMenuAdm" style="background-color: #e6621c; border-color: #e6621c;">Municipio</button> 
	<button type="button" name="usuario" onclick="window.location.href='../html/usuario.php';" class="botonesMenuAdm" style="background-color: #1c93e6; border-color: #1c93e6;">Usuario</button> 
	<button type="button" name="login" onclick="window.location.href='../index.php';" class="botonesMenuAdm" style="background-color: #6d4a28; border-color: #6d4a28;">Pantalla de inicio</button> 
</div>
</body>

</html>