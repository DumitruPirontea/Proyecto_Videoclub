<?php

require_once './Soporte.php';

class Cliente {

    //--------------------------atributos-----------------------------
    public $nombre;
    private $numero;
    private $soportesAlquilados;
    private $numSoportesAlquilados;
    private $maxAlquileresConcurrente;

    //----------------------------constructor---------------------------
    public function __construct(
            string $nombre,
            int $numero,
            int $maxAlquileresConcurrente = 3
    ) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquileresConcurrente = $maxAlquileresConcurrente;
        $this->soportesAlquilados = array();
        $this->numSoportesAlquilados = 0;
    }

    //----------------------------metodos--------------------------------

    /**
     * Get the value of numero
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setNumero($numero) {
        $this->numero = $numero;

        return $this;
    }

    public function muestraResumen() {
        echo "<br>";
        echo "Nombre: $this->nombre <br>";
        echo "Cantidad alquileres: $this->numSoportesAlquilados <br>";
    }

    public function tieneAlquilado(Soporte $s): bool {
        if (empty($this->soportesAlquilados)) {

            return false;
        }

        foreach ($this->soportesAlquilados as $unSoporte) {
            echo "<br> ... inspeccionant ...<br>";
            if ($unSoporte->getNumero() == $s->getNumero()) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s): bool {
        if ($this->tieneAlquilado($s)) {
            echo "Error: no se puede alquilar otra vez <br>";
            return false;
        }
        if ($this->maxAlquileresConcurrente == $this->numSoportesAlquilados) {
            echo "Error: has alcanzado el límite de alquileres <br>";
            return false;
        }

        array_push($this->soportesAlquilados, $s);
        $this->numSoportesAlquilados++;
        echo "<br>[Info]: Soporte " . $s->getNumero() . " alquilado correctamente<br>";
        //print_r($this->soportesAlquilados);
        return true;
    }

//----------------------------------------------------------------------------
    public function tieneAlquiladoSoporte(soporte $soporte) {
        //bucle hasta el final del array que hemos generado en el __constructor
        for ($i = 0; $i < $this->maxAlquileresConcurrente; $i++) {
            //Si es null, no tiene soporte alquilado
            if (!is_null($this->soportesAlquilados[$i])) {
                //comparamos el identificador del apuntador a la clase soporte
                // con el apuntador que ha recibido la funcion. En los dos,
                // utilizamos la funcion "devolverNumeroIdentificacion" de la
                // clase soporte.
                if ($this->soportesAlquilados[$i]->getNumero() == $soporte->getNumero())
                    return true;
            }
        }
        //si se llega a esta linea, es que no se tiene alquilado el soporte
        return false;
    }

    //------------------------------------------------------------------------
    public function devolver(int $numSoporte) {
        if (in_array($numSoporte, array_keys($this->soportesAlquilados))) {
            unset($this->soportesAlquilados[$numSoporte]);
            echo "<br> se ha elimindo el soporte " . $numSoporte;
        } else {
            echo "<br> el soporte no está en la lista";
        }
    }

    //***************************************
    public function ListarAlquileres(): void {
        if ($this->numSoportesAlquilados == 0) {
            echo "<br />Este cliente no tiene ningun soporte alquilado\n";
        } else {
            echo "<br />Listado de soportes alquilados por: " . $this->nombre . "\n";
            for ($i = 0; $i < $this->maxAlquileresConcurrente - 1; $i++) {
                if (!is_null($this->soportesAlquilados[$i])) {
                    $this->muestraResumen();
                }
            }
        }
    }

}
?>



