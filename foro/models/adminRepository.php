<?php
    class adminRepository{

        public static function setRole($id){
            $db = Connection::connect();
            $q = "UPDATE users SET admin = 1 WHERE id_user = $id";
            return $db->query($q);
        }
        public static function removeRole($id){
            $db = Connection::connect();
            $q = "UPDATE users SET admin = 0 WHERE id_user = $id";
            return $db->query($q);
        }

        public static function addForo($nombre, $publico) {
            $db = Connection::connect();
            $q = "INSERT INTO foros (nombre, publico) VALUES ('$nombre', $publico)";
            $result = $db->query($q);
            return $result;
        }        

        public static function removeUser($id){
            $db = Connection::connect();
            $q = "UPDATE users SET baneado = 1 WHERE id_user = $id";
            return $db->query($q); // Retorna true si la consulta fue exitosa
        }

        public static function setRemoveUser($id){
            $db = Connection::connect();
            $q = "UPDATE users SET baneado = 0 WHERE id_user = $id";
            return $db->query($q); // Retorna true si la consulta fue exitosa
        }
        


        
    }
?>