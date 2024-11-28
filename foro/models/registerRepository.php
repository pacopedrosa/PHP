<?php
class registerRepository {
    public static function register($username, $password, $email, $avatar) {
        $db = Connection::connect();
        $q = "INSERT INTO users (username, password, email, avatar) VALUES ('$username', '$password', '$email', '$avatar')";
        if ($db->query($q)) {
            return $db->insert_id;
        } else {
            // Si hay un error, lo mostramos
            echo "Error en la consulta: " . $db->error;
        }
    }
}
?>
