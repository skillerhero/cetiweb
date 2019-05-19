
<?php
$usuario=$_REQUEST['user'];
$contrasena=$_REQUEST['pass'];

if($usuario=='admin' and $contrasena=='admin'){
	header('../html/menuAdm.html');
}
else{
	header('../index.html');
}
?>