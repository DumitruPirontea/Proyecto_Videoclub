<?php

namespace Dwes\ProyectoVideoclub;

//include_once 'Util/SoporteYaAlquiladoException.php';
//include_once 'Util/CupoSuperadoException.php';

//
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
//

class Cliente {

    //--------------------------atributos-----------------------------
    public $nombre;
    private $numero;
    private $soportesAlquilados;
    private $numSoportesAlquilados;
    private $maxAlquileresConcurrente;
    
    private $user;
    private $password;

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
    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setUser($user): void {
        $this->user = $user;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    
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
            if ($unSoporte->getNumero() == $s->getNumero()) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s) {
        if ($this->tieneAlquilado($s)) {
            echo "<br>Error: no se puede alquilar otra vez <br>";
            throw new SoporteYaAlquiladoException("Exception, no se puede volver a alquilar");
            //return $this;
        }
        if ($this->maxAlquileresConcurrente == $this->numSoportesAlquilados) {
            echo "<br>Error: has alcanzado el límite de alquileres <br>";
            throw new CupoSuperadoException("Exception, limite de alquileres alcanzado");
            //return $this;
        }

        array_push($this->soportesAlquilados, $s);
        $this->numSoportesAlquilados++;
        echo "<br>[Info]: Soporte " . $s->getNumero() . " alquilado correctamente<br>";
        //print_r($this->soportesAlquilados);
        return $this;
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

            for ($i = 0; $i < $this->maxAlquileresConcurrente - 1; $i++) {
                if (!is_null($this->soportesAlquilados[$i])) {
                    //var_dump($this->soportesAlquilados[$i]);
                    echo "<br />Listado de soportes alquilados por: " . $this->nombre . "\n";
                    $this->soportesAlquilados[$i]->muestraResumen();
                }
            }
        }
    }

    public function getAlquileres(){
        return $this->soportesAlquilados;
    }
}
?>



