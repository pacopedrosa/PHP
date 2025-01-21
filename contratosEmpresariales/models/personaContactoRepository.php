<?php
    class personaContactoRepository{
        public static function getPersonas(){
            $db = Connection::connect();
            $q = "SELECT * FROM personacontacto";
            $result = $db->query($q);
            $personas = [];
            while ($row = $result->fetch_assoc()) {
                $persona = new PersonaContacto($row['id_persona'], $row['nombre'], $row['puesto'], $row['telefono'], $row['email'], $row['id_empresa'],$row['visible']);
                $personas[] = $persona;
            }
            return $personas;

        }

        public static function getPersonaById($id){
            $db = Connection::connect();
            $q = "SELECT * FROM personacontacto WHERE id_persona = $id";
            $result = $db->query($q);
            $row = $result->fetch_assoc();
            return new PersonaContacto($row['id_persona'], $row['nombre'], $row['puesto'], $row['telefono'], $row['email'], $row['id_empresa'],$row['visible']);
        }

        public static function getPersonasByEmpresa($idEmpresa) {
            $db = Connection::connect();
            $q = "SELECT * FROM personacontacto WHERE id_empresa = $idEmpresa AND visible = 1"; // visible = 1 para incluir solo contactos visibles
            $result = $db->query($q);
            $personas = [];
            while ($row = $result->fetch_assoc()) {
                $persona = new PersonaContacto($row['id_persona'], $row['nombre'], $row['puesto'], $row['telefono'], $row['email'], $row['id_empresa'], $row['visible']);
                $personas[] = $persona;
            }
            return $personas;
        }

        
    }
?>