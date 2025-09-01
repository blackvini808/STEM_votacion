<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"]; // debe coincidir con la BD
    $password = $_POST["password"];

    // Cifrar contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Obtener IP y navegador
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];

    // Insertar en la BD
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, ip, browser) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $email, $password_hash, $ip, $browser);

    if ($stmt->execute()) {
        echo "✅ Registro exitoso. Ya puedes iniciar sesión.";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
