<?php
include 'conexion.php';
$sql="select nombre from carrera";
$resultado=mysqli_query($conexion,$sql);
while($filas=mysqli_fetch_assoc($resultado))
{
	$nombre=$filas['nombre'];
	echo "<option value='".$nombre."'>".$nombre."</option>";
}
?>