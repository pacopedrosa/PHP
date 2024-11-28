<?php

class Coche extends Cuatro_ruedas {
    private $numero_cadenas_nieve;

    public function __construct($color, $peso, $numero_puertas, $numero_cadenas_nieve) {
        parent::__construct($color, $peso, $numero_puertas);
        $this->numero_cadenas_nieve = $numero_cadenas_nieve;
    }

    public function anadir_cadenas_nieve($num) {
        $this->numero_cadenas_nieve += $num;
        return "El coche ha añadido $num cadenas de nieve.";
    }

    public function quitar_cadenas_nieve($num) {
        $this->numero_cadenas_nieve -= $num;
        return "El coche ha quitado $num cadenas de nieve.";
    }
}


?>