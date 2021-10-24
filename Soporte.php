<?php

class Soporte {

    //-----------------------------Atributos----------------------------
    public $titulo;
    protected $numero;
    private $precio;

    private const IVA = 21;

    //NOTA: no encuentro en ningun sitio de como hacer una constante privada y estatica
    // en java se puede hacer asi: Public static final nombre_constante;
    //---------------------------Constructor-------------------------------
    public function __construct($titulo, $numero, $precio) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    //----------------------------metodos-------------------------------
    public function getPrecio() {
        return $this->precio;
    }

    public function getPrecioConIVA() {
        $precio_iva = $this->precio + ($this->precio * 0.21);
        return $precio_iva;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function muestraResumen() {
        echo '<br> ------Resumen----';
        echo "<br>Titulo: " . $this->titulo;
        echo "<br>Precio sin IVA = " . $this->getPrecio() . " euros";
        echo "<br>Precio con IVA = " . $this->getPrecioConIVA() . " euros";
        echo "<br>Numero = " . $this->getNumero();
        echo '<br> --------------------<br>';
    }

}
?>

