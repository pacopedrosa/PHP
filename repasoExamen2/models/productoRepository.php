<?php

    class productoRepository{
        public static function createProduct($nombre, $descripcion, $imagen, $precio, $cantidad){
            $db = Connection::connect();
            $q = "INSERT INTO productos (nombre, descripcion, imagen, precio, cantidad) VALUES 
            ('$nombre', '$descripcion', '$imagen', $precio, $cantidad)";
            $db->query($q);
        }

        public static function getAllProducts(){
            $db = Connection::connect();
            $q = "SELECT * FROM productos";
            $result = $db->query($q);
            $products = [];
            while($row = $result->fetch_assoc()){
                $products[] = new Producto($row['id_producto'], $row['nombre'], $row['descripcion'], $row['imagen'], $row['precio'], $row['cantidad']);
            }
            return $products;
        }

        public static function getProductById($id_producto){
            $db = Connection::connect();
            $q = "SELECT * FROM productos WHERE id_producto = $id_producto";
            $result = $db->query($q);
            if($row = $result->fetch_assoc()){
                return new Producto($row['id_producto'], $row['nombre'], $row['descripcion'], $row['imagen'], $row['precio'], $row['cantidad']);
            }
            return false;
        }
    }

?>