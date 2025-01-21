<?php

class EmpresaRepository
{
    public static function addEmpresa($nombre, $nif, $direccion, $telefono, $correo)
    {
        $db = Connection::connect();
        $q = "INSERT INTO empresas (nombre, nif, direccion, telefono, correo) VALUES ('$nombre', '$nif', '$direccion', '$telefono', '$correo')";
        $db->query($q);
        return true;

    }

    public static function getAllEmpresas(){
        $db = Connection::connect();
        $q = "SELECT * FROM empresas WHERE mostrar = 0";
        $result = $db->query($q);
        $empresas = array();
        while($row = $result->fetch_assoc()){
            $empresas[] = new Empresa($row['id'], $row['nombre'], $row['nif'], $row['direccion'], $row['telefono'], $row['correo'], $row['mostrar']);
        }
        return $empresas;
    }

    public static function getEmpresaById($id){
        $db = Connection::connect();
        $q = "SELECT * FROM empresas WHERE id=$id";
        $result = $db->query($q);
        $row = $result->fetch_assoc();
        return new Empresa($row['id'], $row['nombre'], $row['nif'], $row['direccion'], $row['telefono'], $row['correo'],$row['mostrar']);
    }

    public static function editEmpresa($campo, $nuevo_valor, $id){
        $db = Connection::connect();
        $q = "UPDATE empresas SET $campo ='$nuevo_valor' WHERE id=$id";
        $db->query($q);
    }

    public static function deleteEmpresa($id){
        $db = Connection::connect();
        $q = "UPDATE empresas SET mostrar = 1 WHERE id=$id";
        $db->query($q);
    }

    public static function buscarEmpresa($query) {
        $db = Connection::connect();
        $q = "SELECT * FROM empresas WHERE nombre LIKE '%$query%'";
        $result = $db->query($q);
        $empresas = [];
        while ($row = $result->fetch_assoc()) {
            $empresas[] = new Empresa($row['id'], $row['nombre'], $row['nif'], $row['direccion'], $row['telefono'], $row['correo'],$row['mostrar']);
        }
        return $empresas;
        
    }




    
}

?>