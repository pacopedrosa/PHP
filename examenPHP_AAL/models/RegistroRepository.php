<?php

class RegistroRepository {

    public static function addRegistro($date, $idUser, $idContact, $notacion, $cerrado){
        // Añadir contacto a la base de datos
        $db = Connection::connect();
        $q = "INSERT INTO registros (date, idUser, idContact, notacion, cerrado) VALUES ($date, $idUser, $idContact, '$notacion', $cerrado)";
        if ($db->query($q)) {
            return $db->insert_id;
        } else {
            echo "Error al añadir el registro... ";
        }

    }

    public static function getRegistroById($idUser){
        $db = Connection::connect();
        $q = "SELECT * FROM registros WHERE idUser=$idUser";
        $result = $db->query($q);
        $row = $result->fetch_assoc();
        return new Registro($row['id'],$row['date'],$row['idUser'],$row['idContact'],$row['notacion'],$row['cerrado']);
    }



    public static function getAllRegistros(){
        $db = Connection::connect();
        $q = "SELECT * FROM registros";
        $result = $db->query($q);
        $registros = [];
        while($row = $result->fetch_assoc()){
            $registros[] = new Registro($row['id'],$row['date'],$row['idUser'],$row['idContact'],$row['notacion'],$row['cerrado']);
        }
        return $registros;
    }
}
