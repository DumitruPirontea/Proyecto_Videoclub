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

        <form action='createCliente.php' method='post'>
            <fieldset>
                <legend>Register</legend>
                <div><span class='error'><?php
                        if (isset($error)) {
                            echo $error;
                        }
                        ?></span></div>
                <div>
                    <label for='nombre'>Nombre:</label><br />
                    <input type='text' name='inputNombre' id='nombre' maxlength="50" /><br />
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
                    <input type='submit' name='enviar2' value='Registrarse' />
                </div>
            </fieldset>
        </form>

    </body>
</html>

