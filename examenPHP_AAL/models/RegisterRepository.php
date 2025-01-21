<?php
class RegisterRepository {
    public static function register($username, $password) {
        $db = Connection::connect();
        $q = "INSERT INTO users (username, password) VALUES ('$username', MD5('$password'))";
        if ($db->query($q)) {
            return $db->insert_id;
        } else {
            echo "Error al añadir el usuario... ";
        }
    }
}
?>