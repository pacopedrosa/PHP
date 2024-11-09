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

    public static function actualizarPagado($id_user) {
        $db = Connection::connect();
        $q = "UPDATE compra SET pagado = TRUE WHERE id_user = '$id_user'";
        $db->query($q);
        return $db->affected_rows;
    }
    
    public static function actualizarEnviado($id_compra) {
        $db = Connection::connect();
        $q = "UPDATE compra SET enviado = 1 WHERE id_compra = '$id_compra'";
        if ($db->query($q)) {
            echo "Compra marcada como enviada."; 
            return $db->affected_rows;
        } 
    }

    public static function topProductSell() {
        $db = Connection::connect();
        $q = "SELECT l.id_producto, p.nombre, SUM(l.cantidad) AS total_vendido
              FROM linea l
              JOIN productos p ON l.id_producto = p.id_producto
              WHERE l.visible = FALSE  
              GROUP BY l.id_producto
              ORDER BY total_vendido DESC
              LIMIT 1";  // Obtener solo el producto más vendido
        $result = $db->query($q);
        
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }


    public static function topUserByPurchases() {
        $db = Connection::connect();
        $q = "SELECT c.id_user, u.username, COUNT(c.id_compra) AS total_compras
              FROM compra c
              JOIN users u ON c.id_user = u.id_user
              GROUP BY c.id_user
              ORDER BY total_compras DESC
              LIMIT 1";  // Obtener solo el usuario con más compras
        $result = $db->query($q);
        
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;  // Si no hay resultados
        }
    }
    
    
    
    

    public static function procesarCompra($id_user, $fechaCompra, $precioTotal, $tipo_pago, $address) {
        $db = Connection::connect();
            $q = "INSERT INTO compra (id_user, fechaCompra, precioTotal, tipo_pago, address) 
              VALUES ('$id_user', '$fechaCompra', '$precioTotal', '$tipo_pago', '$address')";
            $db->query($q);
        tiendaRepository::actualizarVisible($id_user);
        tiendaRepository::actualizarPagado($id_user);
        return $db->insert_id;
    }
    

    public static function getPrecioTotal($id_user) {
        $db = Connection::connect();
        
        $q = "SELECT precio, cantidad FROM linea WHERE id_user = '$id_user' AND visible = TRUE";
        $result = $db->query($q);
        
        $total = 0;
        
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


    public static function getVecesComprado($id_producto, $id_user) {
        $db = Connection::connect();
    
        $q = "SELECT u.username, p.nombre AS producto, COUNT(l.id_linea) AS veces_comprado 
              FROM linea l
              JOIN users u ON l.id_user = u.id_user 
              JOIN productos p ON l.id_producto = p.id_producto 
              WHERE l.visible = 0 AND l.id_producto = '$id_producto' AND l.id_user = '$id_user'
              GROUP BY u.id_user, l.id_producto 
              ORDER BY veces_comprado DESC";
    
        $result = $db->query($q);
    
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return " 0 veces";  
    }
    

    public static function getOrders($id_user){
        $db = Connection::connect();
        $q = "SELECT c.id_compra, u.username, c.fechaCompra, c.precioTotal 
              FROM compra c 
              JOIN users u ON u.id_user = c.id_user 
              WHERE c.id_user = '$id_user'";
        $result = $db->query($q);
        
        $pedidos = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedidos[] = $row;
            }
        }
        
        return $pedidos;  // Devolver todos los pedidos encontrados
    }
    
}
    
?>
