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

$usuario="";
$filas['id_usuario']="";
if (isset($_POST['Buscar'])){
	$usuario=$_POST['usuario'];
	$sql="select *from usuario where usuario='".$usuario."';";
	$resultado=mysqli_query($conexion,$sql);
	if(mysqli_affected_rows($conexion)>0){
		$filas=mysqli_fetch_assoc($resultado);
		$usuario="<p style='color:green;'>&#10004 Usuario encontrado </p><br>";
		$usuario.="<p>Id_usuario:".$filas['id_usuario']." Usuario:".$filas['usuario']."</p><br>";
	}
	else{ 	
		$usuario="<p style='color:red;'>&#10060; El usuario no ha sido encontrado </p><br>";
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
	<title>Usuario</title>
</head>

<body>

	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='menuAdm.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="home" onclick="window.location.href='menuAdm.php';" class="botonHome">&#127968;</button> 
		<button type="button" name="tabla" onclick="window.location.href='../php/mostrarUsuario.php';" class="botonHome">&#128196; </button>
		<button type="button" name="logout" onclick="window.location.href='../php/logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>
	
	<h1>Form de usuarios</h1>
	
	<form method="POST" action="../php/agregarUsuario.php" >
		<h2>Añadir</h2>
		<br><p>Usuario</p><input type="text" name = "usuario" required autofocus/>
		<br><p>Contraseña</p><input type="password" name = "pass" required/>
		
		<p>Tipo de usuario: </p> 
		<select name="tipoUsuario">
			<option value="e">Alumno</option> 
			<option value="d">Docente</option> 
			<option value="a">Administrador</option>
		</select>
		<br><input type ="submit" value="&#10010;  Agregar" class="botonAgregar"/>
	</form>

	<form method="POST" action="../php/eliminarUsuario.php">
		<h2>Eliminar</h2>
		<br><p>Usuario</p><input type="text" name = "usuario" required/>
		<br><input type ="submit" value="&#10007;  Eliminar" class="botonEliminar" />
	</form>

	<form method="POST" action="">
		<h2>Buscar</h2>
		<?php echo $usuario;?>
		<br><p>Usuario</p><input type="text" name = "usuario" required/>
		<br><input type ="submit" value="&#128270;  Buscar" class="botonBuscar" name="Buscar" />
	</form>
	
	<form method="POST" action="../php/modificarUsuario.php">
		<h2>Modificar<span></span></h2>
		<input type="hidden" name="id" value=<?php echo "'".$filas['id_usuario']."'"?>>
		<br><p>Usuario</p><input type="text" name = "usuario" required/>
		<br><p>Contraseña</p><input type="password" name = "pass" required/>
		<p>Tipo de usuario:</p> 
		<select name="tipo">
			<option value="e">Alumno</option> 
			<option value="d">Docente</option> 
			<option value="a">Admin</option>
		</select>
		<br><input type ="submit" value="&#9998;  Modificar" class="botonModificar" />
	</form>


</body>
</html>