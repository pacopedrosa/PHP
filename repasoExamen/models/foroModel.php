<?php
class Foro{
    private $id_foro;
    private $nombre;
    private $publico;

    public function __construct($id_foro, $nombre, $publico){
        $this->id_foro = $id_foro;
        $this->nombre = $nombre;
        $this->publico = $publico;
    }

    public function getIdForo(){
        return $this->id_foro;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPublico(){
        return $this->publico;
    }
}
?>