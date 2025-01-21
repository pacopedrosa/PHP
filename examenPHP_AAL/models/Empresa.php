<?php

class Empresa
{
    private $id;
    private $nombre;
    private $nif;
    private $direccion;
    private $telefono;
    private $correo;
    private $mostrar;

    public function __construct($id, $nombre, $nif, $direccion, $telefono, $correo, $mostrar){
        $this->id = $id;
        $this->nif = $nif;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;
    }

    public function getId(){
        return $this->id;
    }
    
    public function getNif(){
        return $this->nif;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getDireccion(){
        return $this->direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getCorreo(){
        return $this->correo;
    }
    public function getMostrar(){
        return $this->mostrar;
    }



}
?>