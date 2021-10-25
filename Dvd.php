<?php

require_once './Soporte.php'; //necesario hacer el requerimiento para no tener error.

class Dvd extends Soporte {

    //-----------------------------atributos------------------
    public $idiomas;
    private $formatoPantalla;

    //-----------------------------constructor--------------
    public function __construct($titulo, $numero, $precio, $idiomas, $formatoPantalla) {
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    //-----------------------------metodos--------------
    public function muestraResumen() {
        echo '<br> ------Resumen----';
        echo "<br>Titulo: " . $this->titulo;
        echo "<br>Precio sin IVA = " . $this->getPrecio() . " euros";
        echo "<br>Precio con IVA = " . $this->getPrecioConIVA() . " euros";
        echo "<br>Numero = " . $this->getNumero();
        echo "<br>Idiomas: " . $this->idiomas;
        echo "<br>Formato: " . $this->formatoPantalla;
        echo '<br> -------------------- <br>';
    }

}
?>

