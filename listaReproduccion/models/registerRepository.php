<?php
class registerRepository {
    public static function register($username, $password) {
        $db = Connection::connect();
        $q = "INSERT INTO users (nombre, password) VALUES ('$username', '$password')";
        if ($db->query($q)) {
            return $db->insert_id;
        } else {
            // Si hay un error, lo mostramos
            echo "Error en la consulta: " . $db->error;
        }
    }
}
?>
