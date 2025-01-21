<?php

    class personaContacto{
        private $id_persona;
        private $nombre;
        private $puesto;
        private $telefono;
        private $email;
        private $id_empresa;
        private $visible;

        public function __construct($id_persona, $nombre, $puesto, $telefono, $email, $id_empresa, $visible) {
            $this->id_persona = $id_persona;
            $this->nombre = $nombre;
            $this->puesto = $puesto;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->id_empresa = $id_empresa;
            $this->visible = $visible;
        }

        public function getId(){
            return $this->id_persona;
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

        public function getEmail(){
            return $this->email;
        }

        public function getIdEmpresa(){
            return $this->id_empresa;
        }

        public function getVisible(){
            return $this->visible;
        }
    }

?>