<?php
    class UserRepository{
        public static function getusers(){
            $db = Connection::connect();
            $q = "SELECT * FROM users";
            $result = $db->query($q);
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $user = new User($row['id_user'], $row['username'],$row['password'], $row['rol']);
                $users[] = $user;
            }
            return $users;
        }

        public static function getUserById($id){
            $db = Connection::connect();
            $q = "SELECT * FROM users WHERE id_user = $id";
            $result = $db->query($q);
            if ($row = $result->fetch_assoc()) {
                return new User($row['id_user'], $row['username'], $row['rol']);
            }
            return false;
        }
    }
?>