<?php

class Contacto
{
    private $id;
    private $idUser;
    private $idEmpresa;
    private $nombre;
    private $puesto;
    private $telefono;
    private $correoContact;

    public function __construct($id, $idUser, $idEmpresa, $nombre, $puesto, $telefono, $correoContact){
        $this->id = $id;
        $this->idEmpresa = $idEmpresa;
        $this->idUser = $idUser;
        $this->nombre = $nombre;
        $this->puesto = $puesto;
        $this->telefono = $telefono;
        $this->correoContact = $correoContact;
    }

    public function getId(){
        return $this->id;
    }
    
    public function getIdEmpresa(){
        return $this->idEmpresa;
    }
    
    public function getIdUser(){
        return $this->idUser;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getPuesto(){
        return $this->puesto;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getCorreoContact(){
        return $this->correoContact;
    }



}
?>