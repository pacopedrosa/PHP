<?php
class Camion extends Cuatro_ruedas{
    private $longitud;
    public function __construct($color, $peso, $numero_puertas, $longitud){
        parent::__construct($color, $peso, $numero_puertas);
        $this->longitud = $longitud;
    }

    public function anadir_remolque($longitud_remolque){
        $this->longitud += $longitud_remolque;
    }
}
?>