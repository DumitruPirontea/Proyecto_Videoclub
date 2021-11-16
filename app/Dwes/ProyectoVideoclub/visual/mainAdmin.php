<?php
// Recuperamos la información de la sesión
if (!isset($_SESSION)) { //si no existe la sesion, se crea
    session_start();
}

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) { //si no existe el atributo "usuario" es que no se ha loguedado.
    die("Error - debe <a href='index.php'>identificarse</a>.<br />");
}
?>

<?php
// Recuperamos la información de la sesión
if (!isset($_SESSION)) { //si no existe la sesion, se crea
    session_start();
}

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['nombre_usuario_registrado']) && !isset($_SESSION['usuario_registrado'])) {
    echo "<br> Error, al registrar usuario";
} else {
    $nombre_usuario_registrado = $_SESSION['nombre_usuario_registrado'];
    $usuario_registrado = $_SESSION['usuario_registrado'];
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de productos</title>
    </head>
    <body>
        <h1>-----Panel del administrador-----</h1>
        <h1>Bienvenido <?= $_SESSION['usuario'] ?></h1>
        <p>Pulse <a href="logout.php">aquí</a> para salir</p>
        <!--<p>Volver al <a href="main.php">inicio</a></p> -->
        <h2>Listado de productos</h2>
        <ul>
            <li>Producto 1</li>
            <li>Producto 2</li>
            <li>Producto 3</li>
            <li>Producto 4</li>
        </ul>
        <br>
        <br>
        <h1>Usuario registrado:</h1>
        <h2><?php echo "Nombre Usuario: $nombre_usuario_registrado --- Usuario: $usuario_registrado ";?></h2>
        <a href="formCreateCliente.php" >Crear un nuevo cliente</a>
    </body>
</html>

