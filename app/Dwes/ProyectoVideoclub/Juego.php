<?php
namespace app\Dwes\ProyectoVideoclub;

require_once 'Soporte.php';

class Juego extends Soporte {

//---------------------atributos------------
    public $consola;
    private $minNumeroJugadores;
    private $maxNumeroJugadores;

//-----------------------constructor-------------
    public function __construct($titulo, $numero, $precio, $consola, $minNumeroJugadores, $maxNumeroJugadores) {
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumeroJugadores = $minNumeroJugadores;
        $this->maxNumeroJugadores = $maxNumeroJugadores;
    }

//------------------------metodos-----------
    public function muestraJugadoresPosibles() {
        if ($this->minNumeroJugadores == 1 && $this->maxNumeroJugadores == 1) {
            echo "<br>Para un jugador";
        } else if ($this->minNumeroJugadores > 1) {
            echo "<br>Para $this->maxNumeroJugadores";
        } else if ($this->minNumeroJugadores >= 1 && $this->maxNumeroJugadores <= $this->maxNumeroJugadores) {
            echo "<br>Para minimo " . $this->minNumeroJugadores . " y maximo: " . $this->maxNumeroJugadores . " jugadores";
        }
    }

    public function muestraResumen() {
        echo '<br> ------Resumen----';
        echo "<br>Titulo: " . $this->titulo;
        echo "<br>Precio sin IVA = " . $this->getPrecio() . " euros";
        echo "<br>Precio con IVA = " . $this->getPrecioConIVA() . " euros";
        echo "<br>Numero = " . $this->getNumero();
        echo "<br>Consola: " . $this->consola;
        $this->muestraJugadoresPosibles();
        echo '<br> -------------------- <br>';
        //NOTA: se que puedo llamar a "parent::" y llamar al metodo muestra y añadir lo que falta
        //pero prefiero sobre escribirlo todo.
    }

}
?>

