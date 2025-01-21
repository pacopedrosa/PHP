<?php

    class adminRepository{
        public static function changeRole($id_user){
            $db = Connection::connect();
            $q = "UPDATE users SET rol = 1 WHERE id_user = $id_user";
            $db->query($q);
        }

        public static function removeRole($id_user){
            $db = Connection::connect();
            $q = "UPDATE users SET rol = 0 WHERE id_user = $id_user";
            $db->query($q);
        }

        public static function closeCommunication($id){
            $db = Connection::connect();
            $q = "UPDATE registrocomunicacion SET cerrado = 1 WHERE id_registro = $id";
            $db->query($q);
        }

        public static function openCommunication($id){
            $db = Connection::connect();
            $q = "UPDATE registrocomunicacion SET cerrado = 0 WHERE id_registro = $id";
            $db->query($q);
        }

        public static function deleteCommunication($id){
            $db = Connection::connect();
            $q = "DELETE FROM registrocomunicacion WHERE id_registro = $id";
            $db->query($q);
        }
    }

?>