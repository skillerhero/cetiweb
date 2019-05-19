
<?php
$usuario=$_REQUEST['user'];
$contrasena=$_REQUEST['pass'];

if($usuario=='admin' and $contrasena=='admin'){
	echo "window.location.href='../html/menuAdm.html';";
}
else{
	echo "window.location.href='../index.php';";
}
?>