<?php

require_once './Soporte.php';

class Cliente {

    //----------------------------atributos----------------------
    public $nombre;
    private $numero;
    private $soportesAlquilados = []; //array
    private $numSoportesAlquilados; //aqui se almacenará el tamaño del array
    private $maxAlquilerConcurrente;

    //---------------------------constructor-----------------------
    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3) {
        //maxAlquilerConcurrente es un paramerto opcional y con valor por defecto 3
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    //------------------------metodos------------
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero): void {
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados() {
        return $this->numSoportesAlquilados;
    }

    public function muestraResumen() {
        echo "<br> Nombre: " . $this->nombre;
        echo "<br> Cantidad de alquileres: " . $this->numSoportesAlquilados;
        //echo "<br> Cantidad de alquileres: ".count($this->soportesAlquilados); //tambien se puede asi
    }

    public function tieneAlquilado(Soporte $s): bool {
        if (array_search($s, $this->numSoportesAlquilados, true)) {
            return true;
        } else {
            return false;
        }
    }

    public function alquilar(Soporte $s): bool {
        if (count($this->numSoportesAlquilados) < $this->maxAlquilerConcurrente) {
            if (!$this->tieneAlquilado($s)) {
                array_push($this->numSoportesAlquilados, $s);
            }
        }
    }

}
?>

