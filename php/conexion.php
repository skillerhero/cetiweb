<?php
$conexion = mysqli_connect("remotemysql.com", "VwyqdVFVEv", "DJRYGjlwt0", "VwyqdVFVEv");
if (mysqli_connect_errno()) {
    printf("No se pudo establecer la conexion %s\n", mysqli_connect_error());
    exit();
}
$resultado=mysqli_select_db($conexion, "VwyqdVFVEv");
mysqli_set_charset($conexion, "utf8");
?>
