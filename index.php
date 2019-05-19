<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">


<head>
	<meta charset="UTF-8">
	<link rel='stylesheet' type='text/css' href='css/estilos.css' >
	<title>Login</title>
</head>
<body style="background-image: url(imagenes/login.jpg);">

	<h1>Bienvenido!</h1>

	<form name="formLogin" method="get" action="login()"  style="background:rgba(255,255,255,0.4);">
		<h2>Iniciar sesión</h2>
		<br><input class="input" type="text" name="user" placeholder="&#128100;  Usuario" required autofocus>
		<br><input type="password" name="pass" placeholder="&#9998;  Contraseña"required></br>
		<br><input type ="submit" value="&#128275;  Entrar" class="botonEntrar"  />
	</form>
	<?php 
	function login(){
		if(isset($_POST['submit']))
		{
			$usuario=$_REQUEST['user'];
			$contrasena=$_REQUEST['pass'];

			if($usuario=='admin' and $contrasena=='admin'){
				echo "<script type=\"text/javascript\">
				window.location.href='../html/menuAdm.html';
				</script>";
			}
			else{
				echo "alert('Usuario y/o contraseña incorrecta');";
				echo "<script type=\'text/javascript\'>
				alert('contrasena incorrecta');
				</script>";
			}
		}
	}

	?>
</body>
</html>
