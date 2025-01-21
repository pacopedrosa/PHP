<?php

class Registro
{
    private $id;
    private $date;
    private $idUser;
    private $idContact;
    private $notacion;
    private $cerrado;

    public function __construct($id, $date, $idUser, $idContact, $notacion, $cerrado){
        $this->id = $id;
        $this->idUser = $idUser;
        $this->date = $date;
        $this->idContact = $idContact;
        $this->notacion = $notacion;
        $this->cerrado = $cerrado;
    }

    public function getId(){
        return $this->id;
    }
    
    public function getIdUser(){
        return $this->idUser;
    }
    
    public function getDate(){
        return $this->date;
    }
    
    public function getIdContact(){
        return $this->idContact;
    }

    public function getNotacion(){
        return $this->notacion;
    }

    public function getCerrado(){
        return $this->cerrado;
    }



}
?>