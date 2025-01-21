<?php

class ContactRepository {

    public static function addContact($idUser, $idEmpresa, $nombre, $puesto, $telefono, $correoContact){
        // Añadir contacto a la base de datos
        $db = Connection::connect();
        $q = "INSERT INTO contactos (idUser, idEmpresa, nombre, puesto, telefono, correoConct) VALUES ($idUser, $idEmpresa, '$nombre', '$puesto', '$telefono', '$correoContact')";
        if ($db->query($q)) {
            return $db->insert_id;
        } else {
            echo "Error al añadir el contacto... ";
        }

    }

    public static function getContactByRegistro($idContactRegistro){
        // Obtener contacto por id de registro
        $db = Connection::connect();
        $q = "SELECT * FROM contactos WHERE id = $idContactRegistro";
        $result = $db->query($q);
        $row = $result->fetch_assoc();
        return new Contacto($row['id'], $row['idUser'], $row['idEmpresa'], $row['nombre'], $row['puesto'], $row['telefono'], $row['correoConct']);
    }

    public static function getContactByEmpresa($idEmpresa){
        // Obtener contacto por id de registro
        $db = Connection::connect();
        $q = "SELECT * FROM contactos WHERE idEmpresa = $idEmpresa";
        $result = $db->query($q);
        $contactosRel = [];
        while($row = $result->fetch_assoc()){
            $contactosRel[] = new Contacto($row['id'], $row['idUser'], $row['idEmpresa'], $row['nombre'], $row['puesto'], $row['telefono'], $row['correoConct']);
        }
        return $contactosRel;
    }


    public static function getAllContacts(){
        // Obtener todos los contactos de la base de datos
        $db = Connection::connect();
        $q = "SELECT * FROM contactos";
        $result = $db->query($q);
        $contacts = [];
        while($row = $result->fetch_assoc()){
            $contacts[] = new Contacto($row['id'], $row['idUser'], $row['idEmpresa'], $row['nombre'], $row['puesto'], $row['telefono'], $row['correoConct']);
        }
        return $contacts;
    }

    public static function getContactById($id){
        // Obtener contacto por id
        $db = Connection::connect();
        $q = "SELECT * FROM contactos WHERE id = $id";
        $result = $db->query($q);
        $row = $result->fetch_assoc();
        return new Contacto($row['id'], $row['idUser'], $row['idEmpresa'], $row['nombre'], $row['puesto'], $row['telefono'], $row['correoConct']);
    }

    public static function editContact($campo, $nuevo_valor, $id){
        $db = Connection::connect();
        $q = "UPDATE contactos SET $campo ='$nuevo_valor' WHERE id=$id";
        $db->query($q);
    }

    



}