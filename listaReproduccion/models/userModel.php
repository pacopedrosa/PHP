<?php
    class User{
        
        private $id_user;
        private $nombre;
        private $admin;

        public function __construct($id_user, $nombre, $admin) {
            $this->id_user = $id_user;
            $this->nombre = $nombre;
            $this->admin = $admin;
        }
        
        public function getId(){
            return $this->id_user;
        }
        
        public function getNombre(){
            return $this->nombre;
        }
        
        public function esAdmin(){
            return $this->admin;
        }

        public static function getUsers(){
            $db = Connection::connect();
            $query = $db->query('SELECT * FROM users');
            $users = [];
            while($row = $query->fetch_assoc()){
                $users[] = new User($row['id_user'], $row['nombre'], $row['admin']);
            }
            return $users;
        }

        public static function getUserById($id){
            $db = Connection::connect();
            $query = $db->query("SELECT * FROM users WHERE id_user = $id");
            $row = $query->fetch_assoc();
            return new User($row['id_user'], $row['nombre'], $row['admin']);
        }

    }
?>