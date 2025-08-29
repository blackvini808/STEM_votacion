<?php
session_start();

// Verificar si el usuario inició sesión
if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Hola, <?php echo $_SESSION["usuario_nombre"]; ?> 👋</h1>
    <p>Has iniciado sesión correctamente.</p>
    <a href="php/logout.php">Cerrar sesión</a>
</body>
</html>
