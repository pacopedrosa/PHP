<?php

class Product {
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $precio;
    private $cantidad;

    public function __construct($id, $nombre, $descripcion, $imagen, $precio, $cantidad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function getImagen() {
        return $this->imagen;
    }
    
    public function getPrecio() {
        return $this->precio;
    }
    
    public function getCantidad() {
        return $this->cantidad;
    }


    public static function addProduct($nombre, $descripcion, $imagen, $precio, $cantidad) {
        $db = Connection::connect();
        $q = "INSERT INTO productos (nombre, descripcion, imagen, precio, cantidad) VALUES ('$nombre', '$descripcion', '$imagen', '$precio', '$cantidad')";
        $db->query($q);
        return $db->insert_id;
    }

    public static function editProduct($id, $nombre, $descripcion, $imagen, $precio, $cantidad) {
        $db = Connection::connect();
        // Actualiza los datos del producto en la base de datos
        $q = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', imagen = '$imagen', precio = '$precio', cantidad = '$cantidad' WHERE id_producto = '$id'";
        $db->query($q);
    }
    

    public static function deleteProduct($id_producto) {
        $db = Connection::connect();
        $q = "DELETE FROM productos WHERE id_producto = '$id_producto'";
        $db->query($q);
        return $db->affected_rows;  
    }
    
    public static function getAllProducts(){
        $db = Connection::connect();
        $q = "SELECT * FROM productos";
        $result = $db->query($q);
        $products = [];
        while($row = $result->fetch_assoc()){
            $products[] = new Product($row['id_producto'], $row['nombre'], $row['descripcion'], $row['imagen'], $row['precio'], $row['cantidad']);
        }
        return $products;
    }

    public static function getProductById($nombreProducto){
        $db = Connection::connect();
        $q = "SELECT id_producto FROM productos WHERE nombre = '$nombreProducto'";
        $result = $db->query($q);
        $row = $result->fetch_assoc();
        return new Product($row['id_producto'], $row['nombre'], $row['descripcion'], $row['imagen'], $row['precio'], $row['cantidad']);
    }

    public static function getPrecioById($id_producto){
        $db = Connection::connect();
        $q = "SELECT precio FROM productos WHERE id_producto = '$id_producto'";
        $result = $db->query($q);
        $row = $result->fetch_assoc();
        return $row['precio'];
    }


}

?>