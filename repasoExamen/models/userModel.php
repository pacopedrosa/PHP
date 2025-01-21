<?php

class User {
    private $id_user;
    private $username;
    private $password;
    private $email;
    private $avatar;
    private $baneado;
    private $admin;

    public function __construct($id_user, $username, $password, $email, $avatar, $baneado, $admin) {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->avatar = $avatar;
        $this->baneado = $baneado;
        $this->admin = $admin;
    }

    public function getId() {
        return $this->id_user;
    }

    public function getNombre() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function isBaneado() {
        return $this->baneado;
    }

    public function esAdmin() {
        return $this->admin;
    }
}
?>