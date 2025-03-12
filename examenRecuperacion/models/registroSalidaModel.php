<?php
    class RegistroSalida{
        private $id_registroSalida;
        private $cantidad;
        private $fecha_salida;
        private $id_objeto;

        public function __construct($id_registroSalida, $cantidad, $fecha_salida, $id_objeto) {
            $this->id_registroSalida = $id_registroSalida;
            $this->cantidad = $cantidad;
            $this->fecha_salida = $fecha_salida;
            $this->id_objeto = $id_objeto;
        }
        
        public function getId(){
            return $this->id_registroSalida;
        }
        
        public function getCantidad(){
            return $this->cantidad;
        }
        
        public function getFechaSalida(){
            return $this->fecha_salida;
        }
        
        public function getIdObjeto(){
            return $this->id_objeto;
        }
    }
?>