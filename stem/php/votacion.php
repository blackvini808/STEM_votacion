<?php
session_start();

// Verificar si el usuario inició sesión
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.html"); // redirige si no está logueado
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Votación</title>
</head>
<body>
    <!-- Caja de bienvenida -->
    <div id="user-box">
        👋 Hola, <strong><?php echo $_SESSION["usuario_nombre"]; ?></strong>
        <a href="php/logout.php">Cerrar sesión</a>
    </div>

    <main>
        <header>
            <h2 id="titulo">Torneo Academia Stem</h2>
            <div class="banner"><img src="img/Academia Stem.jpg" alt="academia_stem_logo" width="800px"></div>
        </header>
        
        <h3>Votos por proyecto</h3>
        <h3>Categoría ICT</h3>
        
        <div id="unis">
            <div class="container">
                <h4 id="itcj">ITCJ: </h4>
                <p id="conta1">0</p>
                <img src="img/itcj.png">
                <button id="miBtn1"> Vota <span></span></button>
            </div>
            <div class="container">
                <h4 id="tec">TECMI: </h4>
                <p id="conta2">0</p>
                <img src="img/tecmi.png">
                <button id="miBtn2"> Vota <span></span></button>
            </div>
            <div class="container">
                <h4 id="urn">URN: </h4>
                <p id="conta3">0</p>
                <img src="img/urn.png">
                <button id="miBtn3"> Vota <span></span></button>
            </div>
            <div class="container">
                <h4 id="uacj">UACJ: </h4>
                <p id="conta4">0</p>
                <img src="img/uacj.jpg">
                <button id="miBtn4"> Vota <span></span></button>
            </div>
            <div class="container">
                <h4 id="uach">UACH: </h4>
                <p id="conta5">0</p>
                <img src="img/uach.png">
                <button id="miBtn5"> Vota <span></span></button>
            </div>
        </div>        
    </main>
    <script src="script.js"></script>
</body>
</html>