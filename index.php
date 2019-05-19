<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel='stylesheet' type='text/css' href='css/estilos.css' >
	<link rel="shortcut icon" type="image/png" href="imagenes/favicon.png">
	<title>Login</title>
</head>
<body style="background-image: url(imagenes/login.jpg);">

	<h1>Bienvenido!</h1>

	<form name="formLogin" method="post" action="php/login.php"  style="background:rgba(255,255,255,0.4);">
		<h2>Iniciar sesión</h2>
		<br><input class="input" type="text" name="user" placeholder="&#128100;  Usuario" required autofocus>
		<br><input type="password" name="pass" placeholder="&#9998;  Contraseña"required></br>
		<br><input type ="submit" value="&#128275;  Entrar" class="botonEntrar"  />
	</form>

</body>
</html>
