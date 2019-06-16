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
if($tipo!='d'){
	echo "<body style='	background-image: url(../imagenes/restricted.jpg);
	background-size: 100vw 100vh;
	background-attachment: fixed;'></body>";
die();
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
	<title>Información del docente</title>
</head>
<body>
	<div class="btnesControl">
		<button type="button" name="back" onclick="window.location.href='../php/logout.php';" class="botonBack" value="">&#129184;</button> 
		<button type="button" name="tabla" onclick="window.location.href='../php/mostrarCalificacionDocente.php';" class="botonHome">&#128196; </button>
		<button type="button" name="logout" onclick="window.location.href='../php/logout.php';" class="botonHome"><i class="fas fa-sign-out-alt"></i></button> 
	</div>
<?php
include '../php/conexion.php';
echo "<h2 style='margin-top: 100px;'>Información del docente:</h2>";

$nombreUsuario="";
$academia="";
$sql="select *from docente where id_usuario=".$id.";";
$resultado=mysqli_query($conexion,$sql);
if($filas=mysqli_fetch_assoc($resultado)){
$nombreUsuario=$filas["id_usuario"];
$academia=$filas["id_academia"];
$id=$filas["id_docente"];
}

$sql="select *from academia where id_academia=".$academia.";";
$resultado=mysqli_query($conexion,$sql);
if($filas=mysqli_fetch_assoc($resultado)){
$academia=$filas['nombre'];
}


$sql="select *from usuario where id_usuario=".$nombreUsuario.";";
$resultado=mysqli_query($conexion,$sql);
if($filas=mysqli_fetch_assoc($resultado)){
$nombreUsuario=$filas['usuario'];
}

$sql="select *from docente where id_docente=".$id.";";
$resultado=mysqli_query($conexion,$sql);
//th columna, tr fila y td dato
echo "<table>\n
<thead>
<tr>
<th>Nómina</th>
<th>Academia</th>
<th>Apellido paterno</th>
<th>Apellido materno</th>
<th>Nombre</th>
<th>Usuario</th>
</tr>
</thead>
";
$contador=0;
if($filas=mysqli_fetch_assoc($resultado))
{	
	echo "<tr>";
	echo "<td>".$id."</td>";
	echo "<td>".$academia."</td>";
	echo "<td>".$filas['apellido_materno']."</td>";
	echo "<td>".$filas['apellido_paterno']."</td>";
	echo "<td>".$filas['nombre']."</td>";
	echo "<td>".$nombreUsuario."</td>";
	echo "</tr>";
	$contador++;
}
echo "</table>";
if($contador==0){
	echo "<h1 style='margin-top: 100px;'>Este usuario no está relacionado a un docente.</h1>";
}

$academy="";
$sql="select *from docente";
$resultado=mysqli_query($conexion,$sql);
while($filas=mysqli_fetch_assoc($resultado))
{
	$academy=$filas['id_academia'];
}

$sql="select *from asignatura where id_academia=".$academy.";";
$resultado=mysqli_query($conexion,$sql);
$listaAsignaturas="<select name='asignaturas'>";
while($filas=mysqli_fetch_assoc($resultado))
{
  $listaAsignaturas.="<option value='{$filas['Id_Asignatura']}'>{$filas['nombre']}</option>\n";
}
$listaAsignaturas.="</select>";


$calificacion="";
$filas['id_asignatura']="";
$filas['periodo']="";
$filas['registro']="";
if (isset($_POST['buscar'])){
  $asignatura=$_POST['asignaturas'];
  $periodo=$_POST['periodo'];
  $registro=$_POST['registro'];
  $sql="select *from calificacion where id_asignatura='".$asignatura."' and periodo='".$periodo."' and registro=".$registro.";";
  echo $sql;
  $resultado=mysqli_query($conexion,$sql);
  if(mysqli_affected_rows($conexion)>0){
    $filas=mysqli_fetch_assoc($resultado);
    $calificacion="<p style='color:green;'>&#10004 Calificacion encontrada </p><br>";
    $calificacion.="<p>Id_asignatura:".$filas['id_asignatura']." Periodo:".$filas['periodo']." registro:".$filas['registro']."</p><br>";
  }
  else{   
    $calificacion="<p style='color:red;'>&#10060; La calificacion no ha sido encontrada </p><br>";
  }
}
?>

  <h1>Formulario de Calificaciones</h1>
  <form method="post" action="../php/agregarCalificacionDocente.php">
    <h2>Añadir</h2>
    <p>Asignatura</p>
    <?php echo $listaAsignaturas; ?>
    <p>Periodo</p><input type="text" name = "periodo" />
    <p>Registro</p><input type="text" name = "registroAgregar" />
    <p>Calificacion</p><input type="text" name = "calificacion" />
    <input type="hidden" name="docentes" value=<?php echo "'".$id."'"?>>
    <br><input type ="submit" value="&#10010;  Agregar" class="botonAgregar" />
  </form>
  
  <form method="post" action="../php/eliminarCalificacionDocente.php">
    <h2>Eliminar</h2>
    <p>Asignatura</p>
    <?php echo $listaAsignaturas; ?>
    <p>Periodo</p><input type="text" name = "periodo" />
    <p>Registro</p><input type="text" name = "registro" />
    <br><input type ="submit" value="&#10007;  Eliminar" class="botonEliminar" />
  </form>

  <form method="post" action="">
    <h2>Buscar</h2>
    <?php echo $calificacion; ?>
    <p>Asignatura</p>
    <?php echo $listaAsignaturas; ?>
    <p>Periodo</p><input type="text" name = "periodo" />
    <p>Registro</p><input type="text" name = "registro" />
    <br><input type ="submit" value="&#128270;Buscar" class="botonBuscar" name="buscar" />
  </form>


  <form action="../php/modificarCalificacionDocente.php" method="post" name="formModificar">
    <h2>Modificar</h2>
    <?php echo $listaAsignaturas; ?>
    <p>Periodo</p><input type="text" name = "periodo" />
    <p>Registro</p><input type="text" name = "registro" />
    <p>Calificacion</p><input type="text" name = "calificacion" />
    <input type="hidden" name="docentes" value=<?php echo "'".$id."'"?>>
    <input type="hidden" name="oldRegistro" value=<?php echo "'".$filas['registro']."'"?>>
    <input type="hidden" name="oldPeriodo" value=<?php echo "'".$filas['periodo']."'"?>>
    <input type="hidden" name="oldAsignatura" value=<?php echo "'".$filas['id_asignatura']."'"?>>
    <br><input type ="submit" value="&#9998;  Modificar" class="botonModificar" />
  </form>
</body>
</html>