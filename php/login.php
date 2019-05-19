<?php
$usuario=$_REQUEST['user'];
$contrasena=$_REQUEST['pass'];

if($usuario=='admin' and $contrasena=='admin'){
	echo "<script type=\"text/javascript\">
	window.location.href='../html/menuAdm.html';
	</script>";
}
else{
	echo "alert('Usuario y/o contraseña incorrecta');";
	echo "<script type=\"text/javascript\">
	window.location.href='../index.php';
	</script>";
}
?>