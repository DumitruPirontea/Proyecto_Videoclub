<?php

if (isset($_POST['enviar3'])) {
    $nombre_usuario_actual = $_POST['inputNombreActual'];
    $nombre_usuario_nuevo = $_POST['inputNombreNuevo'];
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];

    // validamos que recibimos ambos parámetros
    if (empty($nombre_usuario_actual) || empty($nombre_usuario_nuevo || empty($usuario) || empty($password))) {
        $error = "Debes introducir un nombre, usuario y contraseña";
        include "formUpdateCliente.php";
    } else {
        session_start();
        $_SESSION['nombre_usuario_actual'] = $nombre_usuario_actual;
        $_SESSION['nombre_usuario_nuevo'] = $nombre_usuario_nuevo;
        $_SESSION['usuario'] = $usuario;

        if (isset($_POST['usuario'])) {
            $usuario_logueado = $_POST['usuario'];
            if ($usuario_logueado == "admin") {
                include "mainAdmin.php";
                echo "Este es admin";
            } else {
                include "mainCliente.php";
                echo "Este es cliente";
            }
        } else {
            echo "No exite el usuario";
        }
    }
}
?>