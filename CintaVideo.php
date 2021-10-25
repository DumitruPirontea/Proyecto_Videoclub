<?php

require_once './Soporte.php'; //necesario hacer el requerimiento para no tener error.

class CintaVideo extends Soporte {

    //--------------------------atributos--------------------
    private $duracion;

    //-------------------------constructor--------------------
    public function __construct($titulo, $numero, $precio, $duracion) {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    //------------------------metodos----------------------
    public function muestraResumen() {
        echo '<br> ------Resumen----';
        echo "<br>Titulo: " . $this->titulo;
        echo "<br>Precio sin IVA = " . $this->getPrecio() . " euros";
        echo "<br>Precio con IVA = " . $this->getPrecioConIVA() . " euros";
        echo "<br>Numero = " . $this->getNumero();
        echo "<br>Duracion: " . $this->duracion;
        echo '<br> -------------------- <br>';
        //NOTA: se que puedo llamar a "parent::" y llamar al metodo muestra y añadir lo que falta
        //pero prefiero sobre escribirlo todo.
    }

}

?>
