<?php
include 'conexion.php';
$nombre=$_POST['nombre'];
$apellidoM=$_POST['apellido_materno'];
$apellidoP=$_POST['apellido_paterno'];
$nomina=$_POST['id_docente'];
$academia=$_POST['academia'];
$usuario=$_POST['txtUsuarios'];
$id=$_POST['id'];
echo"holaS";

$sql = "select id_usuario from usuario where usuario= '".$usuario."';";
echo $sql;
$resultado = mysqli_query($conexion,$sql);
$fila1=mysqli_fetch_assoc($resultado);

$sql="update docente set nombre='".$nombre."',apellido_paterno='".$apellidoP."',apellido_materno='".$apellidoM."',id_docente=".$nomina.",id_academia=".$academia.",id_usuario=".$fila1['id_usuario']." where id_docente =".$id.";";
echo $sql;
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion) > 0){
        echo"<script>
alert('Docente modificado con exito');
</script>
";
echo" <script>
        window.location.href='../html/docente.php';
</script>";
}
else{
echo" <script>
alert('No se ha encontrado el docente');
</script>";
echo" <script>
        window.location.href='../html/docente.php';
</script>";
}

mysqli_close($conexion); 
?>