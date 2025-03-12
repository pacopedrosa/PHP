<?php
    class objetoRepository{
        public static function getObjetos(){
            $db = Connection::connect();
            $q = "SELECT * FROM objetos";
            $result = $db->query($q);
            $objetos = [];
            while ($row = $result->fetch_assoc()) {
                $objeto = new Objeto($row['id_objeto'], $row['descripcion'], $row['cantidad']);
                $objetos[] = $objeto;
            }
            return $objetos;
        }

        public static function getObjetoById($id_objeto){
            $db = Connection::connect();
            $q = "SELECT * FROM objetos WHERE id_objeto = $id_objeto";
            $result = $db->query($q);
            if($row = $result->fetch_assoc()){
                return new Objeto($row['id_objeto'], $row['descripcion'], $row['cantidad']);
            }
            return false;
        }

        public static function addObject($descripcion, $cantidad){
            $db = Connection::connect();
            $q = "INSERT INTO objetos (descripcion, cantidad) VALUES ('$descripcion', $cantidad)";
            $db->query($q);
            $id_objeto = $db->insert_id;
            $objeto = new Objeto($id_objeto, $descripcion, $cantidad);
        
            return $objeto;
        }
        

        public static function updateObject($id_objeto, $descripcion, $cantidad){
            $db = Connection::connect();
            $q = "UPDATE objetos SET descripcion = '$descripcion', cantidad = $cantidad WHERE id_objeto = $id_objeto";
            $db->query($q);
        }

        public static function updateAmountObject($id_objeto, $cantidad){
            $db = Connection::connect();
            $q = "UPDATE objetos SET cantidad = cantidad + $cantidad WHERE id_objeto = $id_objeto";
            $db->query($q);
        }

        public static function updateRetireObject($cantidad, $id_objeto){
            $db = Connection::connect();
            $q = "UPDATE objetos SET cantidad = cantidad - $cantidad WHERE id_objeto = $id_objeto";
            $db->query($q);
            return $db->affected_rows;
        }

        public static function totalObjects(){
            $db = Connection::connect();
            $q = "SELECT COUNT(*) AS total FROM objetos";
            $result = $db->query($q);
            if ($row = $result->fetch_assoc()) {
                return $row['total'];
            }
            return 0; // Si no hay objetos, retorna 0
        }

        public static function getObjectByDescription($description){
            $db = Connection::connect();
            $q = "SELECT * FROM objetos WHERE descripcion = '$description'";
            $result = $db->query($q);
            if($row = $result->fetch_assoc()){
                return new Objeto($row['id_objeto'], $row['descripcion'], $row['cantidad']);
            }
            return false;
        }
    }
?>