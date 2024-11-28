<?php

class Dos_ruedas extends Vehiculo {

    private $cilindrada;

    public function __construct($color, $peso, $cilindrada) {
        parent::__construct($color, $peso);
        $this->cilindrada = $cilindrada;
    }

    public static function poner_gasolina($litros){
        echo "Añadidos $litros litros de gasolina";
    }
}

?>