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
        // Crear sesión automáticamente
        session_start();
        $_SESSION["usuario_id"] = $stmt->insert_id;
        $_SESSION["usuario_nombre"] = $nombre;

        // Mensaje y redirección
        echo "✅ Registro exitoso, $nombre. Serás redirigido a votación en 3 segundos...";

        // Redirigir después de 3 segundos
        echo "<script>
            setTimeout(function() {
                window.location.href = 'votacion.php';
            }, 3000);
        </script>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
