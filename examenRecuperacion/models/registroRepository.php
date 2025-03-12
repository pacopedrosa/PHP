<?php

    class registroRepository{
        public static function getRegistros(){
            $db = Connection::connect();
            $q = "SELECT * FROM registro";
            $result = $db->query($q);
            $registros = [];
            while($row = $result->fetch_assoc()){
                $registro = new Registro($row['id_registro'], $row['cantidad'], $row['fecha_entrada'], $row['id_objeto']);
                $registros[] = $registro;
            }
            return $registros;
        }

        public static function getRegistroById($id){
            $db = Connection::connect();
            $q = "SELECT * FROM registro WHERE id_registro = $id";
            $result = $db->query($q);
            if($row = $result->fetch_assoc()){
                return new Registro($row['id_registro'], $row['cantidad'], $row['fecha_entrada'],$row['id_objeto']);
            }
            return null;
        }

        public static function insertObject($cantidad, $fecha_entrada, $id_objeto){
            $db = Connection::connect();
            $q = "INSERT INTO registro (cantidad, fecha_entrada, id_objeto) VALUES ($cantidad, '$fecha_entrada', $id_objeto)";
            $db->query($q);
            return $db->insert_id;
        }

        
    }

?>