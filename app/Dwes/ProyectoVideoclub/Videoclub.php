<?php

namespace Dwes\ProyectoVideoclub;


use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;


class Videoclub {

    //-----------------------------atributos---------------------
    private $nombre; //nombre del videoclub
    private $productos; //array que contiene los soportes
    private $numProductos;
    private $socios; //array que contiene los clientes
    private $numSocios; // aqui guardaremos el numero de socios

    //-----------------------------Constructor-------------------
    public function __construct($nombre) {
        $this->nombre = $nombre;
        $this->productos = array();
        $this->socios = array();
    }

    //-------------------------------metodos---------------------
    //************************************
    private function incluirProducto(Soporte $producto) {
        echo "<br />Incluido Producto (Numero: " . $producto->getNumero() . ")\n";
        $this->productos[] = $producto;
    }

    //*************************************
    public function incluirCintaVideo($titulo, $precio, $duracion) {
        //creamos una instancio de la clase CintaVideo
        $nuevaCintaVideo = new CintaVideo($titulo, (count($this->productos) + 1), $precio, $duracion);
        //Añadimos el producto al listado de productos
        $this->incluirProducto($nuevaCintaVideo);
    }

    public function incluirDvd($titulo, $precio, $idiomas, $pantalla) {
        //creamos una instancio de la clase dvd
        $nuevoDvd = new Dvd($titulo, (count($this->productos) + 1), $precio, $idiomas, $pantalla);
        //Añadimos el producto al listado de productos
        $this->incluirProducto($nuevoDvd);
    }

    public function incluirJuego($titulo, $precio, $consola, $jugadoresMin, $jugadoresMax) {
        //creamos una instancio de la clase juego
        $nuevoJuego = new Juego($titulo, (count($this->productos) + 1), $precio, $consola, $jugadoresMin, $jugadoresMax);
        //Añadimos el producto al listado de productos
        $this->incluirProducto($nuevoJuego);
    }

    public function incluirSocio($nombre, $maxAlquilerConcurrente = 3) {
        echo "<br />Incluido Socio (Numero: " . (count($this->socios) + 1) . ")\n";
        $nuevo_socio = new Cliente($nombre, (count($this->socios) + 1), $maxAlquilerConcurrente);
        $this->socios[] = $nuevo_socio;
    }

    public function listarProductos() {
        echo "<br>Productos totales: " . count($this->productos);
        $contador_productos = count($this->productos);
        echo "<br>Listado de los $contador_productos productos";
        foreach ($this->productos as $key => $producto) {
            $producto->muestraResumen();
        }

//        for ($i = 0; $i < count($this->productos); $i++) {
//            echo $this->productos[$i]->titulo;
////recuerda, para sacar un atributo de un objeto, no se utiliza los getters como en java, aqui se pone el nombre del atributo
//            echo $this->productos[$i]->muestraResumen();
//            //tambien se puede llamar al metodo utilizando el mismo procedimiento. (en java hay getters aqui nada...)
//        }
    }

    public function listarSocios() {
        foreach ($this->socios as $socio) {
            var_dump($socio);
        }
    }

    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    public function alquilaSocioProducto($numeroCliente, $numeroSoporte) {
        try {
            $posCliente = $this->clientesComprovar($numeroCliente);
            $posProducto = $this->productosComprovar($numeroSoporte);
            //si hemos encontrado el cliente y producto...
            if ($posCliente >= 0 && $posProducto >= 0) {
                $this->socios[$posCliente]->alquilar($this->productos[$posProducto]);
                return $this;
            } else {
                //echo "<br />Ha habido un error en el numero del cliente o producto...\n";
                throw new ClienteNoEncontradoException("Exception, No se ha encontrado el cliente");
                //return $this;
            }
        } catch (Exception $ex) {
            //throw new ClienteNoEncontradoException("Exception, No se ha encontrado el cliente");
            echo "<br>" . $ex;
        }
    }

    //comprovamos que exista el numero de cliente
    //si lo encuentra, devuelve la posicion del array donde se encuentra almacenado
    private function clientesComprovar($numCliente) {
        for ($i = 0; $i < count($this->socios); $i++) {
            if (!is_null($this->socios[$i])) {
                if ($this->socios[$i]->getNumero() == $numCliente)
                    return $i;
            }
        }
        return -1;
    }

    //comprovamos que exista el numero de productos
    //si lo encuentra, devuelve la posicion del array donde se encuentra almacenado
    private function productosComprovar($numProducto) {
        for ($i = 0; $i < count($this->productos); $i++) {
            if (!is_null($this->productos[$i])) {
                if ($this->productos[$i]->getNumero() == $numProducto)
                    return $i;
            }
        }
        return -1;
    }

}

?>
