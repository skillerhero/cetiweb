
<?php
$usuario=$_REQUEST['user'];
$contrasena=$_REQUEST['pass'];

if($usuario=='admin' and $contrasena=='admin'){
	include '../html/menuAdm.html';
}
else{
	include '../index.html';
}
?>