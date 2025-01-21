<?php

    class userRepository{

        public static function getUsers() {
            // Ejemplo de cómo obtener usuarios de la base de datos
            // Aquí debes asegurarte de que se obtengan todos los campos necesarios
            $db = Connection::connect();
            $users = [];
            $result = $db->query("SELECT id_user, username, password, email, avatar, baneado, admin FROM users");
            while ($row = $result->fetch_assoc()) {
                $users[] = new User(
                    $row['id_user'],
                    $row['username'],
                    $row['password'],
                    $row['email'],
                    $row['avatar'],
                    $row['baneado'],
                    $row['admin']
                );
            }
            return $users;
        }

        public static function darAdmin($id){
            $db = Connection::connect();
            $q = "UPDATE users SET admin = 1 WHERE id_user = $id";
            $db->query($q);
        }

        public static function quitarAdmin($id){
            $db = Connection::connect();
            $q = "UPDATE users SET admin = 0 WHERE id_user = $id";
            $db->query($q);
        }



        public static function getUserById($id){
            $db = Connection::connect();
            $q = "SELECT * FROM users WHERE id_user = $id";
            $result = $db->query($q);
            if ($row = $result->fetch_assoc()) {
                $user = new User($row['id_user'], $row['username'], $row['email'], $row['avatar'], $row['baneado'], $row['admin']);
                return $user;
            }
            return false;
        }

        public static function banUser($id){
            $db = Connection::connect();
            $q = "UPDATE users SET baneado = 1 WHERE id_user = $id";
            $db->query($q);
        }

        public static function unbanUser($id){
            $db = Connection::connect();
            $q = "UPDATE users SET baneado = 0 WHERE id_user = $id";
            $db->query($q);
        }

    }
?>