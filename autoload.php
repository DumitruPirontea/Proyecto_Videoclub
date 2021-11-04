<?php

spl_autoload_register(function ($nombreClase) {
    include_once "app/Dwes/ProyectoVideoclub" . $nombreClase . '.php';
});
?>