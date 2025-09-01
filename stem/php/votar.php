<?php
session_start();
include("conexion.php");

if (!isset($_SESSION["usuario_id"])) {
    echo json_encode(["error" => "No estás logueado"]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["universidad"])) {
    $usuario_id = $_SESSION["usuario_id"];
    $universidad = $_POST["universidad"];

    // Verificar si ya votó
    $check = $conexion->prepare("SELECT * FROM votos WHERE usuario_id = ?");
    $check->bind_param("i", $usuario_id);
    $check->execute();
    $resultado = $check->get_result();

    if ($resultado->num_rows > 0) {
        echo json_encode(["error" => "Ya votaste"]);
        exit();
    }

    // Insertar voto
    $usuario_nombre = $_SESSION['usuario_nombre']; // NUEVO
	$stmt = $conexion->prepare("INSERT INTO votos (usuario_id, usuario_nombre, universidad) VALUES (?, ?, ?)");
	$stmt->bind_param("iss", $usuario_id, $usuario_nombre, $universidad);
    if ($stmt->execute()) {
        echo json_encode(["success" => "Voto registrado"]);
    } else {
        echo json_encode(["error" => $stmt->error]);
    }

    $stmt->close();
    $conexion->close();
} else {
    echo json_encode(["error" => "Datos incompletos"]);
}
?>
