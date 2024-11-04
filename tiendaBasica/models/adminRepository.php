<?php

class adminRepository {
    public static function setRole($id){
        $db = Connection::connect();
        $q = "UPDATE users SET rol = 1 WHERE id_user = $id";
        $db->query($q);
    }
    public static function removeRole($id){
        $db = Connection::connect();
        $q = "UPDATE users SET rol = 0 WHERE id_user = $id";
        $db->query($q);
    }
}

?>