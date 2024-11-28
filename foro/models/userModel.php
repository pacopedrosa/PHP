<?php
    class User{
        
        private $id_user;
        private $username;
        private $email;
        private $avatar;
        private $baneado;
        private $admin;

        public function __construct($id_user, $username, $email, $avatar, $baneado, $admin) {
            $this->id_user = $id_user;
            $this->username = $username;
            $this->email = $email;
            $this->avatar = $avatar;
            $this->baneado = $baneado;
            $this->admin = $admin;
        }
        
        public function getId(){
            return $this->id_user;
        }
        
        public function getNombre(){
            return $this->username;
        }
        
        public function getEmail(){
            return $this->email;
        }
        
        public function getAvatar(){
            return $this->avatar;
        }
        
        public function isBaneado(){
            return $this->baneado;
        }
        
        public function esAdmin(){
            return $this->admin;
        }

        public static function getUsers(){
            $db = Connection::connect();
            $query = $db->query('SELECT * FROM users');
            $users = [];
            while($row = $query->fetch_assoc()){
                $users[] = new User($row['id_user'], $row['username'], $row['email'], $row['avatar'], $row['baneado'], $row['admin']);
            }
            return $users;
        }

        public static function getUserById($id){
            $db = Connection::connect();
            $query = $db->query("SELECT * FROM users WHERE id_user = $id");
            $row = $query->fetch_assoc();
            return new User($row['id_user'], $row['username'], $row['email'], $row['avatar'], $row['baneado'], $row['admin']);
        }

    }
?>