<?php
    class foroRepository{
        public static function getForos(){
            $db = Connection::connect();
            $q = "SELECT * FROM foros";
            $result = $db->query($q);
            $foros = [];
            while ($row = $result->fetch_assoc()) {
                $foro = new Foro($row['id_foro'], $row['nombre'], $row['publico']);
                $foros[] = $foro;
            }
            return $foros;
        }

        public static function getForoById($id_foro){
            $db = Connection::connect();
            $q = "SELECT * FROM foros WHERE id_foro = $id_foro";
            $result = $db->query($q);
            if ($row = $result->fetch_assoc()) {
                $foro = new Foro($row['id_foro'], $row['nombre'], $row['publico']);
                return $foro;
            }
            return false;
        }

        public static function crearForo($nombre, $publico){
            $db = Connection::connect();
            $q = "INSERT INTO foros (nombre, publico) VALUES ('$nombre', $publico)";
            $db->query($q);
        }
    }
?>