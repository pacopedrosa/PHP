<?php

class Vehiculo {
    protected $color;
    private $peso;

    public function __construct($color, $peso) {
        $this->color = $color;
        $this->peso = $peso;
    }

    public function circula() {
        echo "El vehículo está circulando";
    }

    public function anadir_persona($peso_persona) {
        $this->peso += $peso_persona;
    }
    
    public function getColor() {
        return $this->color;
    }
    
    public function getPeso() {
        return $this->peso;
    }
}

?>