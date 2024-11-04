<?php
class registerRepository{
    public static function register($username, $password){
        $db = Connection::connect();
        $q = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $db->query($q);
        return $db->insert_id;
        echo "registro completado";
    }
}
?>