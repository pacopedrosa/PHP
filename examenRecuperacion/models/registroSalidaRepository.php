<?php

    class registroSalidaRepository{
        
        public static function insertRetireRegister($cantidad, $fecha_salida, $id_objeto){
            $db = Connection::connect();
            $q = "INSERT INTO registrosalida (cantidad, fecha_salida, id_objeto) VALUES ($cantidad, '$fecha_salida', $id_objeto)";
            $db->query($q);
            return $db->insert_id;
        }
    }

?>