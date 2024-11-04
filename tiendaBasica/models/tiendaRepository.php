<?php
class tiendaRepository {

    public static function registrarUsers($username, $password) {
        $db = Connection::connect();
        $q = "INSERT INTO tienda (username, password) VALUES ('$username', '$password')";
        $db->query($q);
        return $db->insert_id;
    }

    public static function comprar($cantidad) {
        $fechaActual = date("Y-m-d");
        $cantidad = $_POST['cantidad'];

        // Verificar si el ID del producto está presente en GET
        if (isset($_GET['id'])) {
            $precio = Product::getPrecioById($_GET['id']);
            $precioTotal = $precio * $cantidad;
        } else {
            echo "Error: ID del producto no encontrado.";
            return false;
        }

        // Verificar si el usuario está en sesión
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user']->getUsername();
            $id_user = User::getUserById($username);
        } else {
            echo "Error: Usuario no en sesión.";
            return false;
        }

        $db = Connection::connect();
        $q = "INSERT INTO compra (id_user, fechaCompra, precioTotal, cantidad) 
              VALUES ('$id_user', '$fechaActual', '$precioTotal', '$cantidad')";
        $db->query($q);
        return $db->insert_id;
    }

    public static function add($id_producto, $precio, $cantidad, $id_user){

        $db = Connection::connect();
        $q = "INSERT INTO linea (id_producto, precio, cantidad, id_user) VALUES ('$id_producto', '$precio', '$cantidad', '$id_user')";
        $db->query($q);
        return $db->insert_id;
    }

    public static function getCarro($id_user) {
        $db = Connection::connect();
        $q = "SELECT id_producto, precio, cantidad FROM linea WHERE id_user = '$id_user' AND visible = TRUE";
        $result = $db->query($q);
    
        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    
        return $productos;
    }
    

    public static function actualizarVisible($id_user) {
        $db = Connection::connect();
        $q = "UPDATE linea SET visible = FALSE WHERE id_user = '$id_user' AND visible = TRUE";
        $db->query($q);
        return $db->affected_rows; 
    }
    
    

    public static function procesarCompra($id_user, $fechaCompra, $precioTotal){
        $db = Connection::connect();
        $q = "INSERT INTO compra (id_user, fechaCompra, precioTotal) VALUES ('$id_user', '$fechaCompra', '$precioTotal')";
        $db->query($q);
        tiendaRepository::actualizarVisible($id_user);
        return $db->insert_id;
    }

    public static function getPrecioTotal($id_user) {
        $db = Connection::connect();
        
        $q = "SELECT precio, cantidad FROM linea WHERE id_user = '$id_user'";
        $result = $db->query($q);
        
        $total = 0; 
        
        // Verifica si hay resultados y luego calcula el total
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                // Multiplica el precio por la cantidad y acumula en total
                $total += $row['precio'] * $row['cantidad'];
            }
        } else {
            echo "Error en la consulta: " . $db->error; 
        }
    
        return $total; 
    }
    
    public static function actualizarStock($id_producto, $cantidad){
        $db = Connection::connect();
        $q = "UPDATE productos SET cantidad = cantidad - '$cantidad' WHERE id_producto = '$id_producto'";
        $db->query($q);
        return $db->affected_rows;  // Devuelve el número de filas afectadas
    }

    
    
}
?>
