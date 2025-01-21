<?php

class User
{
    private $id;
    private $username;
    private $password;
    private $rol;
 

    public function __construct($id, $username, $rol)
    {
        $this->id = $id;
        $this->username = $username;
        $this->rol = $rol;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }


    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }
    

    

 
}
