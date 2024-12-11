<?php
    class adminRepository{
        public static function changeRol($id){
           $db = Connection::connect();
           $q = "UPDATE users SET rol = 1 WHERE id_user = $id";
           $db->query($q);
        }

        public static function removeRol($id){
            $db = Connection::connect();
            $q = "UPDATE users SET rol = 0 WHERE id_user = $id";
            $db->query($q);
        }
    }
?>