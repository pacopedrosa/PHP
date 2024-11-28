<?php
    class cancion{
        private $id_cancion;
        private $titulo;
        private $autor;
        private $duracion;
        private $id_lista;
        
        public function __construct($id_cancion, $titulo, $autor, $duracion, $id_lista) {
            $this->id_cancion = $id_cancion;
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->duracion = $duracion;
            $this->id_lista = $id_lista;
        }
        
        public function getId(){
            return $this->id_cancion;
        }
        
        public function getTitulo(){
            return $this->titulo;
        }
        
        public function getAutor(){
            return $this->autor;
        }
        
        public function getDuracion(){
            return $this->duracion;
        }
        
        public function getIdLista(){
            return $this->id_lista;
        }

        public static function getAllSongsByLista($id_lista){
            $db = Connection::connect();
            $q = "SELECT * FROM canciones WHERE id_lista = $id_lista";
            $result = $db->query($q);
            $canciones = [];
            while($row = $result->fetch_assoc()){
                $canciones[] = new cancion($row['id_cancion'], $row['titulo'], $row['autor'], $row['duracion'], $row['id_lista']);
            }
            return $canciones;
        }

        public static function createSong($id_lista, $titulo, $autor, $duracion){
            $db = Connection::connect();
            $q = "INSERT INTO canciones (titulo, autor, duracion, id_lista) VALUES ('$titulo', '$autor', $duracion, $id_lista)";
            return $db->query($q);
        }
    }
?>