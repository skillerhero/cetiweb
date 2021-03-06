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

$municipio="";
$filas['clave_municipio']="";
if (isset($_POST['Buscar'])){
	$municipio=$_POST['nombre'];
	$sql="select *from municipio where nombre='".$municipio."';";
	$resultado=mysqli_query($conexion,$sql);
	if(mysqli_affected_rows($conexion)>0){
		$filas=mysqli_fetch_assoc($resultado);
		$municipio="<p style='color:green;'>&#10004 Usuario encontrado </p><br>";
		$municipio.="<p>Clave_municipio:".$filas['clave_municipio']." Nombre:".$filas['nombre']."</p><br>";
	}
	else{ 	
		$municipio="<p style='color:red;'>&#10060; El usuario no ha sido encontrado </p><br>";
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
	<title>Municipio</title>
</head>

<body>

	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='menuAdm.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="home" onclick="window.location.href='menuAdm.php';" class="botonHome">&#127968;</button> 
		<button type="button" name="tabla" onclick="window.location.href='../php/mostrarMunicipio.php';" class="botonHome">&#128196; </button>
		<button type="button" name="logout" onclick="window.location.href='../php/logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>

		<h1>Formulario para municipios</h1>
		<form method="post" action="../php/agregarMunicipio.php">
			<h2>Añadir</h2>
			<br><p>Nombre</p><input type="text" name = "nombre" required autofocus/>
			<br><input type ="submit" value="&#10010;  Agregar" class="botonAgregar"/>
		</form>
		
		<form method="post" action="../php/eliminarMunicipio.php">
			<h2>Eliminar</h2>
			<br><p>Nombre</p><input type="text" name = "nombre" required/>
            <br><input type ="submit" value="&#10007;  Eliminar" class="botonEliminar" />
		</form method="post" action="">

		<form method="post" action="">
			<h2>Buscar</h2>
			<?php echo $municipio;?>
			<br><p>Nombre</p><input type="text" name = "nombre" required/>
			<br><input type ="submit" value="&#128270; Buscar" name="Buscar" class="botonBuscar" />
		</form>

		<form method="post" action="../php/modificarMunicipio.php">
			<h2>Modificar</h2>
			<input type="hidden" name="id" value=<?php echo "'".$filas['clave_municipio']."'"?>>
			<br><p>Nombre</p><input type="text" name = "nombre" required/>
			<br><input type ="submit" value="&#9998;  Modificar" class="botonModificar" />
		</form>

</body>
</html>