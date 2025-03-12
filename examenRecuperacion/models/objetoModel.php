<?php

    class Objeto{
        private $id_objeto;
        private $descripcion;
        private $cantidad;

        public function __construct($id_objeto, $descripcion, $cantidad) {
            $this->id_objeto = $id_objeto;
            $this->descripcion = $descripcion;
            $this->cantidad = $cantidad;
    
        }
        public function getId(){
            return $this->id_objeto;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getCantidad(){
            return $this->cantidad;
        }
    }

?>