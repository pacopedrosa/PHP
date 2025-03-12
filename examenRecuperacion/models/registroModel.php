<?php

    class Registro{
        private $id_registro;
        private $cantidad;
        private $fecha_entrada;
        private $id_objeto;

        public function __construct($id_registro, $cantidad, $fecha_entrada, $id_objeto) {
            $this->id_registro = $id_registro;
            $this->cantidad = $cantidad;
            $this->fecha_entrada = $fecha_entrada;
            $this->id_objeto = $id_objeto;
        }
        
        public function getId(){
            return $this->id_registro;
        }
        
        public function getCantidad(){
            return $this->cantidad;
        }
        
        public function getFechaEntrada(){
            return $this->fecha_entrada;
        }
        
        public function getIdObjeto(){
            return $this->id_objeto;
        }
    }

?>