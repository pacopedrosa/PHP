<?php
    class Tema{
        private $id_tema;
        private $nombre_tema;
        private $visible;
        private $id_foro;
    
        public function __construct($id_tema, $nombre_tema, $visible, $id_foro) {
            $this->id_tema = $id_tema;
            $this->nombre_tema = $nombre_tema;
            $this->visible = $visible;
            $this->id_foro = $id_foro;
        }
        
        public function getId(){
            return $this->id_tema;
        }
        
        public function getNombre(){
            return $this->nombre_tema;
        }
        
        public function getVisible(){
            return $this->visible;
        }
        
        public function getIdForo(){
            return $this->id_foro;
        }

        public static function insertTema($nombreTema, $visible, $idForo){
            $db = Connection::connect();
            $q = "INSERT INTO temas (nombreTema, visible, id_foro) VALUES ('$nombreTema', $visible, $idForo)";
            return $db->query($q);
            echo "Tema añadido correctamente";
        }

        public static function getAllTemas(){
            $db = Connection::connect();
            $q = "SELECT * FROM temas";
            $result = $db->query($q);
            $temas = [];
            while($row = $result->fetch_assoc()){
                $temas[] = new tema($row['id_tema'], $row['nombreTema'], $row['visible'], $row['id_foro']);
            }
            return $temas;
        }

        public static function ocultarTema($id_tema) {
            $db = Connection::connect();
            $q = "UPDATE temas SET visible = 0 WHERE id_tema = '$id_tema'";
            return $db->query($q);
        }
    }
?>