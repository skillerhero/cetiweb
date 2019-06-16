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
$opt="<select name='academias'>";
	while($filas=mysqli_fetch_assoc($resultado))
	{
		$opt.="<option value='{$filas['id_academia']}'>{$filas['nombre']}</option>\n";
	}
$opt.="</select>";

$asignatura="";
$filas['id_academia']="";
$filas['nombre']="";
if (isset($_POST['bscAsignatura'])){
	$asignatura=$_POST['nombre'];
	$id_academia=$_POST['academias'];
	$sql="select *from asignatura where nombre='".$asignatura."' and id_academia=".$id_academia.";";
	$resultado=mysqli_query($conexion,$sql);
	if(mysqli_affected_rows($conexion)>0){
		$filas=mysqli_fetch_assoc($resultado);
		$asignatura="<p style='color:green;'>&#10004 Asignatura encontrada </p><br>";
		$asignatura.="<p>Id_asignatura:".$filas['Id_Asignatura']." Nombre:".$filas['nombre']." Id_academia:".$filas['id_academia']."</p><br>";
	}
	else{ 	
		$asignatura="<p style='color:red;'>&#10060; La asignatura no ha sido encontrada </p><br>";
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
	<title>Asignaturas</title>
</head>

<body>

	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='menuAdm.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="home" onclick="window.location.href='menuAdm.php';" class="botonHome">&#127968;</button> 
		<button type="button" name="tabla" onclick="window.location.href='../php/mostrarAsignaturas.php';" class="botonHome">&#128196; </button>
		<button type="button" name="logout" onclick="window.location.href='../php/logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>

	<h1>Formulario de asignaturas</h1>
	
	<form method="post" action="../php/agregarAsignatura.php">
		<h2>Añadir</h2>
		<p>Id</p><input type="text" name = "idAsignatura" required autofocus />
		<p>Nombre</p><input type="text" name = "nombreAgregar" required/>
		<p>Academia</p>
		<?php echo $opt; ?>
		<br><input type ="submit" value="&#10010;  Agregar" class="botonAgregar" />
	</form>

	<form method="post" action="../php/eliminarAsignatura.php">
		<h2>Eliminar</h2>
		<p>Nombre</p><input type="text" name = "nombreEliminar" />
		<p>Academia</p>
		<?php echo $opt; ?>
		<br><input type ="submit" value="&#10007;  Eliminar" class="botonEliminar" />
	</form>

	<form method="post" action="">
		<h2>Buscar</h2>
		<?php echo $asignatura; ?>
		<br><p>Nombre</p><input type="text" name = "nombre" required/>
		<p>Academia</p> 
		<?php echo $opt; ?>
		<br><input type ="submit" value="&#128270;Buscar" class="botonBuscar" name="bscAsignatura" />
	</form>

	<form action="../php/modificarAsignatura.php" method="post" name="formModificar">
		<h2>Modificar</h2>
		<p>Id</p><input type="text" name = "idAsignatura" required/>
		<p>Nombre</p><input type="text" name = "nombre" />
		<p>Academia</p>
		<?php echo $opt; ?>
		<input type="hidden" name="old_Nombre" value=<?php echo "'".$filas['nombre']."'"?>>
		<input type="hidden" name="old_IdAcademia" value=<?php echo "'".$filas['id_academia']."'"?>>
		<br><input type ="submit" value="&#9998;  Modificar" class="botonModificar" />
	</form>

</body>

</html>