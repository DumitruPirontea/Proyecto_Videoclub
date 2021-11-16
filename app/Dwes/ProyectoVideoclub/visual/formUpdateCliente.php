<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="estilos.css" rel="stylesheet" type="text/css">
        <title>Document</title>
    </head>
    <body>

        <form action='updateCliente.php' method='post'>
            <fieldset>
                <legend>Register</legend>
                <div><span class='error'><?php
                        if (isset($error)) {
                            echo $error;
                        }
                        ?></span></div>
                <div>
                    <label for='nombre_actual'>Nombre_Actual:</label><br />
                    <input type='text' name='inputNombreActual' id='nombre_actual' maxlength="50" /><br />
                </div>
                <div>
                    <label for='nombre_nuevo'>Nombre_Nuevo:</label><br />
                    <input type='text' name='inputNombreNuevo' id='nombre_nuevo' maxlength="50" /><br />
                </div>
                <div>
                    <label for='usuario'>Usuario:</label><br />
                    <input type='text' name='inputUsuario' id='usuario' maxlength="50" /><br />
                </div>
                <div>
                    <label for='password'>Contraseña:</label><br />
                    <input type='password' name='inputPassword' id='password' maxlength="50" /><br />
                </div>
                <div>
                    <input type='submit' name='enviar3' value='Modificar Datos' />
                </div>
            </fieldset>
        </form>

    </body>
</html>