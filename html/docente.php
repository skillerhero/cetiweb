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
$sql="select *from academia";
$resultado=mysqli_query($conexion,$sql);
$listaAcademias="<select name='academia'>";
while($filas=mysqli_fetch_assoc($resultado))
{
	$listaAcademias.="<option value='{$filas['id_academia']}'>{$filas['nombre']}</option>\n";
}
$listaAcademias.="</select>";

$sql="select usuario from usuario;";
$resultado=mysqli_query($conexion,$sql);
$listaUsuarios="<input type='text' name='txtUsuarios' list='usuarios'/>";
$listaUsuarios.="<datalist id='usuarios'>\n";
while($filas=mysqli_fetch_assoc($resultado))
{
	$listaUsuarios.="<option value='{$filas['usuario']}'></option>\n";
}
$listaUsuarios.="</datalist>";


$docente="";
if (isset($_POST['buscar'])){
	$nombre=$_POST['nombre'];
	$apellidoP=$_POST['apellidoPa'];
	$apellidoM=$_POST['apellidoMa'];
	$sql="select *from docente where nombre='".$nombre."' and apellido_paterno='".$apellidoP."' and apellido_materno='".$apellidoM."';";
	$resultado=mysqli_query($conexion,$sql);
	if(mysqli_affected_rows($conexion)>0){
		$filas=mysqli_fetch_assoc($resultado);
		$docente="<p style='color:green;'>&#10004 Usuario encontrado </p><br>";
		$docente.="<p> Nombre:".$filas['nombre']." ".$filas['apellido_paterno']." ".$filas['apellido_materno']."</p><br>";
	}
	else{ 	
		$docente="<p style='color:red;'>&#10060; El usuario no ha sido encontrado </p><br>";
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
	<title>Docente</title>
</head>

<body>

	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='menuAdm.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="home" onclick="window.location.href='menuAdm.php';" class="botonHome">&#127968;</button> 
		<button type="button" name="tabla" onclick="window.location.href='../php/mostrarDocente.php';" class="botonHome">&#128196; </button>
		<button type="button" name="logout" onclick="window.location.href='../php/logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>

	<h1>Formulario de docentes</h1>
	<form method="post" action="../php/agregarDocente.php">
		<h2>Añadir</h2>
		<br><p>Nombre(s)</p><input type="text" name = "nombre" required autofocus />
		<br><p>Apellido Paterno</p><input type="text" name = "apellido_paterno" required/>
		<br><p>Apellido Materno</p><input type="text" name = "apellido_materno" required/>
		<br><p>Nómina</p><input type="text" name = "id_docente" required/>
		<p>Academia</p> 
		<?php echo $listaAcademias; ?>
		<p>Usuario</p><?php echo $listaUsuarios; ?>
		<br><input type ="submit" value="&#10010;  Agregar" class="botonAgregar"/>
	</form>


	<form method="post" action="../php/eliminarDocente.php">
		<h2>Eliminar</h2>
		<br><p>Nombre(s)</p><input type="text" name = "nombre" required/>
		<br><p>Apellido Paterno</p><input type="text" name = "apellido paterno" required/>
		<br><p>Apellido Materno</p><input type="text" name = "apellido materno" required/>
		<br><input type ="submit" value="&#10007;  Eliminar" class="botonEliminar" />
	</form>
	
	<form method="post" action="">
		<h2>Buscar<span></span></h2>
		<?php echo $docente; ?>
		<br><p>Nombre(s)</p><input type="text" name = "nombre" required/>
		<br><p>Apellido Paterno</p><input type="text" name = "apellidoPa" required/>
		<br><p>Apellido Materno</p><input type="text" name = "apellidoMa" required/>
		<br><input type ="submit" value="&#128270;  Buscar" class="botonBuscar" name="buscar" />
	</form>

	<form method="post" action="../php/modificarDocente.php">
		<h2>Modificar<span></span></h2>
		<br><p>Nombre(s)</p><input type="text" name = "nombre" required autofocus />
		<br><p>Apellido Paterno</p><input type="text" name = "apellido_paterno" required/>
		<br><p>Apellido Materno</p><input type="text" name = "apellido_materno" required/>
		<br><p>Nómina</p><input type="text" name = "id_docente" required/>
		<p>Academia</p> 
		<?php echo $listaAcademias; ?>
		<p>Usuario</p><?php echo $listaUsuarios; ?>
		<input type="hidden" name="id" value=<?php echo "'".$filas['id_docente']."'"?>>
		<br><input type ="submit" value="&#9998;  Modificar" class="botonModificar" />
	</form>


</body>
</html>