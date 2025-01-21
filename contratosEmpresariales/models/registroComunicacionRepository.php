<?php
    class registroComunicacionRepository{
        public static function getRegistros() {
            $db = Connection::connect();
            $q = "SELECT * FROM registrocomunicacion";
            $result = $db->query($q);
            $registros = [];
            while ($row = $result->fetch_assoc()) {
                $registro = new registroComunicacion($row['id_registro'], $row['fecha'], $row['id_persona'], $row['anotacion'], $row['cerrado']);
                $registros[] = $registro;
            }
            return $registros;
        }

        public static function getRegistrosAbiertosPorUsuario($idUsuario) {
            $db = Connection::connect();
            $q = "SELECT COUNT(*) as abiertos 
                  FROM registrocomunicacion 
                  WHERE id_persona = $idUsuario AND cerrado = 0"; // cerrado = 0 representa registros abiertos
            $result = $db->query($q);
            $row = $result->fetch_assoc();
            return $row['abiertos'];
        }
        

        public static function finalizarComunicacion($idRegistro) {
            $db = Connection::connect();
            $q = "UPDATE registrocomunicacion 
                  SET cerrado = 1 
                  WHERE id_registro = $idRegistro";
            return $db->query($q);
        }
        
        public static function getRegistrosPorUsuario($id_usuario){
            $db = Connection::connect();
            $q = "SELECT * FROM registrocomunicacion WHERE id_persona = $id_usuario";
            $result = $db->query($q);
            $registros = [];
            while ($row = $result->fetch_assoc()) {
                $registro = new RegistroComunicacion($row['id_registro'], $row['fecha'], $row['id_persona'], $row['anotacion'], $row['cerrado']);
                $registros[] = $registro;
            }
            return $registros;
        }
    }
?>