<?php
$usuario=$_REQUEST['user'];
$contrasena=$_REQUEST['pass'];
$id="";
$tipo="";
include 'conexion.php';
$sql="select *from usuario where usuario='".$usuario."'";
$resultado=mysqli_query($conexion,$sql);
while($filas=mysqli_fetch_assoc($resultado))
{
	if(password_verify($contrasena, $filas['contrasena'])){
	$id= $filas['id_usuario'];
	$tipo=$filas['tipo_usuario'];
	}
}

if($tipo=='a'){
	session_start();
	$_SESSION['id']=$id;
	$_SESSION['tipo']=$tipo;
	echo "<script>
	window.location.href='../html/menuAdm.php';
	</script>";
}else if($tipo=='e'){
	session_start();
	$_SESSION['id']=$id;
	$_SESSION['tipo']=$tipo;
	echo "<script>
	window.location.href='../html/alumno.php';
	</script>";
}else if($tipo=='d'){
	session_start();
	$_SESSION['id']=$id;
	$_SESSION['tipo']=$tipo;
	echo "<script>
	window.location.href='../html/profesor.php';
	</script>";
}
else{
	echo "<script>
	alert('Usuario y/o contraseña incorrecta');
	window.location.href='../index.php';
	</script>";
}
?>