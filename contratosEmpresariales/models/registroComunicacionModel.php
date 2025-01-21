<?php
    class registroComunicacion{
        private $id_registro;
        private $fecha;
        private $id_persona;
        private $anotacion;
        private $cerrado;

        public function __construct($id_registro, $fecha, $id_persona, $anotacion, $cerrado) {
            $this->id_registro = $id_registro;
            $this->fecha = $fecha;
            $this->id_persona = $id_persona;
            $this->anotacion = $anotacion;
            $this->cerrado = $cerrado;
        }

        public function getId(){
            return $this->id_registro;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function getIdPersona(){
            return $this->id_persona;
        }

        public function getAnotacion(){
            return $this->anotacion;
        }

        public function getCerrado(){
            return $this->cerrado;
        }
    }
?>