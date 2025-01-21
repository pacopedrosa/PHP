<?php
    class Producto{
        private $id_producto;
        private $nombre;
        private $descripcion;
        private $imagen;
        private $precio;
        private $cantidad;

        public function __construct($id_producto, $nombre, $descripcion, $imagen, $precio, $cantidad){
            $this->id_producto = $id_producto;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->imagen = $imagen;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
        }

        public function getId(){
            return $this->id_producto;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function getCantidad(){
            return $this->cantidad;
        }
    }
?>