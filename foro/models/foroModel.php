<?php

    class Foro{
        private $id;
        private $nombre;
        private $publico;

        public function __construct($id,$nombre, $publico) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->publico = $publico;
        }
        
        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }  

        public function esPublico(){
            return $this->publico;
        }

        public static function getAllForos(){
            $db = Connection::connect();
            $q = "SELECT * FROM foros";
            $result = $db->query($q);
            $foros = [];
            while ($row = $result->fetch_assoc()) {
                $foros[] = new Foro($row['id_foro'], $row['nombre'], $row['publico']);
            }
            return $foros;
        }
    }
?>