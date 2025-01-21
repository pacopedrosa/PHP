<?php
class Empresa{
    private $id_empresa;
    private $nombre;
    private $nif;
    private $direccion;
    private $telefono;
    private $email;
    private $visible;

    public function __construct($id_empresa, $nombre, $nif, $direccion, $telefono, $email, $visible) {
        $this->id_empresa = $id_empresa;
        $this->nombre = $nombre;
        $this->nif = $nif;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->visible = $visible;
    }

    public function getId(){
        return $this->id_empresa;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getNif(){
        return $this->nif;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getEmail(){
        return $this->email;
    }

    public function isVisible(){
        return $this->visible;
    }
}

?>