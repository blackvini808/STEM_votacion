<?php
$servidor = "fdb1034.awardspace.net";
$usuario  = "BLACK VINI";
$password = "cn@cz0;84Hljdh}S";
$bd       = "4667271_usuariosstem";

$conexion = new mysqli($servidor, $usuario, $password, $bd);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
