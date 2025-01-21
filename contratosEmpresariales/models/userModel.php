<?php
    class User{
        private $id_user;
        private $username;
        private $password;
        private $rol;

        public function __construct($id_user, $username, $password, $rol) {
            $this->id_user = $id_user;
            $this->username = $username;
            $this->password = $password;
            $this->rol = $rol;
        }

        public function getId(){
            return $this->id_user;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getRole(){
            return $this->rol;
        }
    }
?>