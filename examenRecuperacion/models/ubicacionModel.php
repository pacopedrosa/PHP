<?php
    class Ubicacion{
        private $id_ubicacion;
        private $pasillo;
        private $estanteria;
        private $estante;
        private $id_objeto;
        public function __construct($id_ubicacion, $pasillo, $estanteria, $estante, $id_objeto) {
            $this->id_ubicacion = $id_ubicacion;
            $this->pasillo = $pasillo;
            $this->estanteria = $estanteria;
            $this->estante = $estante;
            $this->id_objeto = $id_objeto;
        }
        public function getIdUbicacion(){
            return $this->id_ubicacion;
        }
        public function getPasillo(){
            return $this->pasillo;
        }
        public function getEstanteria(){
            return $this->estanteria;
        }

        public function getEstante(){
            return $this->estante;
        }

        public function getIdObjeto(){
            return $this->id_objeto;
        }
    }
?>