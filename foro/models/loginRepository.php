<?php
class loginRepository {
    public static function login($username, $password) {
        $db = Connection::connect();
        $q = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $db->query($q);
        
        if ($row = $result->fetch_assoc()) {
            // Crear objeto User siempre
            $user = new User($row['id_user'], $row['username'], $row['email'], $row['avatar'], $row['baneado'], $row['admin']);
            return $user; // Devolver objeto
        }
        return false;
    }
    
}
?>