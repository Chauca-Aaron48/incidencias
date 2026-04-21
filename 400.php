<?php
session_start();
if (!isset($_SESSION['nombre']) && !isset($_SESSION['clave'])) {
    header("Location: index.php");
    exit();
}
http_response_code(400);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codigo 400</title>
</head>

<body>
    <h3>Usuario: <?php echo htmlspecialchars($_SESSION['nombre']); ?></h3>
    <p><a href="login.php"> Cerrar sesión</a></p>
    <fieldset>
        <h1>Error 400 - Bad request</h1>
    </fieldset>
    <p><a href="registrar.php">Volver al registro</a></p>
</body>

</html>