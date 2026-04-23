<?php
require_once 'Usuario.php';

session_start();

if (empty($_POST['usuario']) || empty($_POST["clave"])) {
    header('Location: 401.php');
    exit();
} else {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $recordarme = isset($_POST['recordarme']) ? true : false;
    $idioma = (isset($_POST['idioma']) && $_POST['idioma'] === 'es')? true : false;

    try {
        $usuarioObj = new Usuario($usuario, $clave);
        $usuarioValido = $usuarioObj->validar();

        if ($usuarioValido) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['clave'] = $clave;
            $_SESSION['nombre'] = $usuarioValido['nombre'];
            $_SESSION['id_usuario'] = $usuarioValido['id'];

            if ($recordarme) {
                $expiracion = time() + (7 * 24 * 60 * 60);
                setcookie('c_usuario', $usuario, $expiracion);
                setcookie('c_clave', $clave, $expiracion);
                setcookie('c_idioma', $idioma, $expiracion);
                setcookie('c_recordarme', $recordarme, $expiracion);
            } else {
                setcookie('c_usuario', '', time() - 3600);
                setcookie('c_clave', '', time() - 3600);
                setcookie('c_idioma', '', time() - 3600);
                setcookie('c_recordarme', '', time() - 3600);
            }

            header("Location: listar.php");
            exit();
        }
    } catch (Exception $e) {
        header('Location: 500.php');
        exit();
    }
}

?>