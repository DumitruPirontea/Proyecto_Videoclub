<?php

if (isset($_POST['enviar2'])) {
    $nombre = $_POST['inputNombre'];
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];

    // validamos que recibimos ambos parámetros
    if (empty($usuario) || empty($password || empty($nombre))) {
        $error = "Debes introducir un nombre, usuario y contraseña";
        include "formCreateCliente.php";
    } else {
        session_start();
        $_SESSION['nombre_usuario_registrado'] = $nombre;
        $_SESSION['usuario_registrado'] = $usuario;

        include "mainAdmin.php";
    }
}
?>
