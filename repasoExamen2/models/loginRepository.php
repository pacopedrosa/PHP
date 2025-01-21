<?php
    class loginRepository{
        public static function login($username, $password){
            $db = Connection::connect();
            $q = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = $db->query($q);
            
            if ($row = $result->fetch_assoc()) {
                $user = new User($row['id_user'], $row['username'], $row['password'], $row['rol']);
                return $user;
            }
            
            return false; // Usuario o contraseña incorrecta
        }
    }
?>