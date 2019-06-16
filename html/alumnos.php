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
include '../php/conexion.php';
$sql="select * from carrera;";
$resultado=mysqli_query($conexion,$sql);
$opt="<select name='carreras'>";
while($filasCarrera=mysqli_fetch_assoc($resultado))
{
	$opt.="<option value='{$filasCarrera['id_carrera']}'>{$filasCarrera['nombre']}</option>\n";
}
$opt.="</select>";

$sql="select *from usuario;";
$resultado=mysqli_query($conexion,$sql);
$listaUsuarios="<input type='text' name='txtUsuarios' list='usuarios'/>";
$listaUsuarios.="<datalist id='usuarios'>\n";
while($filasUsuario=mysqli_fetch_assoc($resultado))
{
	$listaUsuarios.="<option value='{$filasUsuario['usuario']}'></option>\n";
}
$listaUsuarios.="</datalist>";


$sql="select nombre from municipio;";
$resultado=mysqli_query($conexion,$sql);
$listaMunicipios="<input type='text' name='txtMunicipios' list='municipios'/>";
$listaMunicipios.="<datalist id='municipios'>\n";
while($filas=mysqli_fetch_assoc($resultado))
{
	$listaMunicipios.="<option value='{$filas['nombre']}'></option>\n";
}
$listaMunicipios.="</datalist>";

$alumnoMod="";
$filas['REGISTRO']="";
if (isset($_POST['bscAlumMod'])){
	$alumnoMod=$_POST['registroBuscar'];
	$sql="select *from alumno where registro=".$alumnoMod.";";
	$resultado=mysqli_query($conexion,$sql);
	if(mysqli_affected_rows($conexion)>0){
	$filas=mysqli_fetch_assoc($resultado);
	$alumnoMod="<p style='color:green;'>&#10004 Usuario encontrado </p><br>";
	$alumnoMod.="<p>Registro:".$filas['REGISTRO']." Nombre:".$filas['NOMBRE']." ".$filas['APELLIDO_PATERNO']." ".$filas['APELLIDO_MATERNO']."</p><br>";
	}
	else{ 	
	$alumnoMod="<p style='color:red;'>&#10060; El usuario no ha sido encontrado </p><br>";
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
	<title>Alumnos</title>
</head>

<body>
	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='menuAdm.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="home" onclick="window.location.href='menuAdm.php';" class="botonHome">&#127968;</button> 
		<button type="button" name="tabla" onclick="window.location.href='../php/mostrarAlumno.php';" class="botonHome">&#128196; </button>
		<button type="button" name="logout" onclick="window.location.href='../php/logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>

	<h1 >Formulario de alumnos</h1>
	<form method="post" action="../php/agregarAlumno.php">
		<h2>Añadir</h2>
		<p>Registro</p>
		<input type="text" name = "registro" maxlength="8" required autofocus/>
		<p>Carrera</p> 
		<?php echo $opt; ?>
		<br><p>Sexo</p>
		<input type="radio" name="genero" value="M" required> Masculino
		<input type="radio" name="genero" value="F"> Femenino	
		<br class="margen"><p>Nombre</p><input type="text" name = "nombre" required/>	
		<p>Apellido Paterno</p><input type="text" name = "apellidoP" required/>
		<p>Apellido Materno</p><input type="text" name = "apellidoM" required/>
		<p>Celular</p><input type="text" name = "celular" required />
		<p>Domicilio</p><input type="text" name = "domicilio" required />
		<p>Colonia</p><input type="text" name = "colonia" required />
		<p>Usuario</p><?php echo $listaUsuarios; ?>
		<br><p>Municipio</p><br><?php echo $listaMunicipios; ?>
		<br><input type ="submit" value="&#10010;  Agregar" class="botonAgregar" name="agregarAlumno" />

	</form>

	<form method="post" action="../php/eliminarAlumno.php">
		<h2>Eliminar</h2>
		<p>Registro</p><input type="text" name = "registroEliminar" required/>
		<br><input type ="submit" value="&#10007;  Eliminar" class="botonEliminar" name="eliminarAlumno" />
	</form>

	<form method="post" action="">
	<h2>Buscar</h2>
	<?php echo $alumnoMod; ?>
	<p>Registro</p><input type="text" name = "registroBuscar" required/>
	<br><input type ="submit" value="&#128270;Buscar" class="botonBuscar" name="bscAlumMod" />
	</form>

	<form method="post" action="../php/modificarAlumno.php" name="formModificar">
		<h2>Modificar</h2>
		<p>Registro</p>
		<input type="hidden" name="registro" value=<?php echo "'".$filas['REGISTRO']."'"?>>
		<input type="text" name = "nuevoRegistro" maxlength="8" required/>
		<p>Carrera</p> 
		<?php echo $opt; ?>
		<br><p>Sexo</p>
		<input type="radio" name="genero" value="M" required> Masculino
		<input type="radio" name="genero" value="F"> Femenino
		<br class="margen"><p>Nombre</p><input type="text" name = "nombre" required/>
		<p>Apellido Paterno</p><input type="text" name = "apellidoP" required/>
		<p>Apellido Materno</p><input type="text" name = "apellidoM" required/>
		<p>Celular</p><input type="text" name = "celular" required />
		<p>Domicilio</p><input type="text" name = "domicilio" required />
		<p>Colonia</p><input type="text" name = "colonia" required />
		<p>Usuario</p><?php echo $listaUsuarios; ?>
		<br><p>Municipio</p><br><?php echo $listaMunicipios; ?>
		<br><input type ="submit" value="&#9998;  Modificar" class="botonModificar" name="modAlum" />
	</form>
</body>
</html>