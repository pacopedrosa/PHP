<?php
    class empresaRepository{
        public static function getEmpresas(){
            $db = Connection::connect();
            $q = "SELECT * FROM empresa";
            $result = $db->query($q);
            $empresas = [];
            while ($row = $result->fetch_assoc()) {
                $empresa = new Empresa($row['id_empresa'], $row['nombre'], $row['nif'], $row['direccion'], $row['telefono'], $row['email'], $row['visible']);
                $empresas[] = $empresa;
            }
            return $empresas;
        }
        
        public static function getEmpresaById($id){
            $db = Connection::connect();
            $q = "SELECT * FROM empresa WHERE id_empresa = $id";
            $result = $db->query($q);
            if ($row = $result->fetch_assoc()) {
                $empresa = new Empresa($row['id_empresa'], $row['nombre'], $row['nif'], $row['direccion'], $row['telefono'], $row['email'], $row['visible']);
                return $empresa;
            }
            return null;
        }

        public static function createEmpresa($nombre, $nif, $direccion, $telefono, $email, $visible){
            $db = Connection::connect();
            $q = "INSERT INTO empresa (nombre, nif, direccion, telefono, email, visible) VALUES ('$nombre', '$nif', '$direccion', '$telefono', '$email', $visible)";
            $db->query($q);
        }

        public static function updateEmpresa($id, $nombre, $nif, $direccion, $telefono, $email, $visible) {
            $db = Connection::connect();
            $q = "UPDATE empresa SET nombre = '$nombre', nif = '$nif', direccion = '$direccion', telefono = '$telefono', email = '$email', visible = $visible WHERE id_empresa = $id";
            $db->query($q);
        }

        public static function deleteEmpresa($id){
            $db = Connection::connect();
            $q = "UPDATE empresa SET visible = 0 WHERE id_empresa = '$id'";
            $db->query($q);
        }

        public static function buscarEmpresa($query) {
            $db = Connection::connect();
            $q = "SELECT * FROM empresa WHERE nombre LIKE '%$query%' AND visible = 1";
            $result = $db->query($q);
            $empresas = [];
            while ($row = $result->fetch_assoc()) {
                $empresas[] = new Empresa($row['id_empresa'], $row['nombre'], $row['nif'], $row['direccion'], $row['telefono'], $row['email'], $row['visible']);
            }
            return $empresas;
            
        }
        
    }
?>