<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
    header("Location: listar.php");
    exit();
}

$usuarioGuardado = '';
$claveGuardada = '';
$idiomaGuardado = 'es';
$recordarChecked = false;

if (isset($_COOKIE['c_recordarme']) && $_COOKIE['c_recordarme'] == true) {
    $usuarioGuardado = $_COOKIE['c_usuario'] ?? '';
    $claveGuardada = $_COOKIE['c_clave'] ?? '';
    $idiomaGuardado = $_COOKIE['c_idioma'] ?? 'es';
    $recordarChecked = true;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Incidencias Técnicas</title>
</head>

<body>
    <h1>Sistemas de Incidencias Técnicas</h1>
    <h2>Bienvenido, ingrese sus credenciales por favor</h2>
    <form action="acceso.php" method="post">
        <fieldset>
            <legend>Inicio de Sesión</legend>
            <label for="usuario">Usuario:</label><br>
            <input type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario" value="<?php echo htmlspecialchars($usuarioGuardado); ?>">
            <br>
            <label for="clave">Contraseña:</label><br>
            <input type="password" name="clave" id="clave" placeholder="Ingrese su contraseña" value="<?php echo htmlspecialchars($claveGuardada); ?>">
            <br><br>
            <label for="idioma">Idioma:</label>
			<select name="idioma" id="idioma">
				<option value="es" <?php echo ($idiomaGuardado === 'es') ? 'selected' : ''; ?>>Español</option>
				<option value="en" <?php echo ($idiomaGuardado === 'en') ? 'selected' : ''; ?>>Inglés</option>
			</select>
            <input type="checkbox" name="recordarme" id="recordarme" <?php echo $recordarChecked ? 'checked' : ''; ?>>
            <label for="recordarme">Recordar mis datos</label>
            <br><br>
            <input type="submit" value="Ingresar">
        </fieldset>
    </form>
</body>

</html>