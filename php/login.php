<?php
$usuario=$_REQUEST['user'];
$contrasena=$_REQUEST['pass'];

if($usuario=='admin' and $contrasena=='admin'){
	echo "<script type=\"text/javascript\">
	window.location.href='../html/menuAdm.html';
	</script>";
}
else{

	echo "<script type=\"text/javascript\">
	window.alert("Usuario y/o contrasena incorrecta");
	</script>";
}
?>
