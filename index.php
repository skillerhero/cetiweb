﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
	<meta charset="UTF-8">
	<title>Alumnos</title>
	<link rel='stylesheet' type='text/css' href='../css/estilos.css' >
</head>


<body>
	<h1 >Formulario de alumnos</h1>
		<form action="" name="formAgregar">
			<h3>Añadir</h3>
			<p>Registro</p>
			<input type="text" name = "registro" maxlength="8" required autofocus/>
			<p>Carrera</p> 
			<select>
				<option value="Desarrollo">Desarrollo</option>
				<option value="Control">Control</option>
				<option value="Construcción">Construcción</option>
				<option value="Electrónica">Electrónica</option>
			</select> 
			<br><p>Sexo</p>
			<input type="radio" name="genero" value="m"> Masculino
			<input type="radio" name="genero" value="f"> Femenino
			<br class="margen"><p>Nombre</p><input type="text" name = "nombre" required/>	
			<p>Apellido Paterno</p><input type="text" name = "apellidoP" required/>
			<p>Apellido Materno</p><input type="text" name = "apellidoM" required/>
			<p>Celular</p><input type="text" name = "celular" required />
			<p>Domicilio</p><input type="text" name = "domicilio" required />
			<p>Colonia</p><input type="text" name = "colonia" required />
			<p>Usuario</p><input type="text" name = "usuario" required />
			<br><input type ="submit" value="&#10010;  Agregar" class="botonAgregar"/>

		</form>

		<form action="" name="formEliminar">
			<h3>Eliminar</h3>
			<p>Registro</p><input type="text" name = "nombreEliminar" required/>
			<br><input type ="submit" value="&#128270;Buscar" class="botonBuscar" />
			<input type ="submit" value="&#10007;  Eliminar" class="botonEliminar" />
		</form>



		<form action="FormulariosProyectoPW.php" method="post" name="formModificar">
			<h3>Modificar</h3>
			<p>Registro</p><input type="text" name = "registro" required />
			<p>Carrera</p> 
			<select>
				<option value="volvo">Desarrollo</option>
				<option value="saab">Control</option>
				<option value="mercedes">Construcción</option>
				<option value="audi">Electrónica</option>
			</select> 
			<br><p>Sexo</p>
			<input type="radio" name="genero" value="m"> Masculino
			<input type="radio" name="genero" value="f"> Femenino
			<br class="margen"><p>Nombre</p><input type="text" name = "nombre" required />
			<p>Apellido Paterno</p><input type="text" name = "apellidoP" required />
			<p>Apellido Materno</p><input type="text" name = "apellidoM" required />
			<p>Celular</p><input type="text" name = "celular" required />
			<p>Domicilio</p><input type="text" name = "domicilio" required />
			<p>Colonia</p><input type="text" name = "colonia" required />
			<p>Usuario</p><input type="text" name = "usuario" required />
			<br><input type ="submit" value="&#128270;  Buscar" class="botonBuscar" />
			<input type ="submit" value="&#9998;  Modificar" class="botonModificar" />
		</form>
</body>
</html>