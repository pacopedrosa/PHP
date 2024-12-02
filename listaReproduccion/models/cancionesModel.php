<?php
    class cancion{
        private $id_cancion;
        private $titulo;
        private $autor;
        private $duracion;

        public function __construct($id_cancion, $titulo, $autor, $duracion) {
            $this->id_cancion = $id_cancion;
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->duracion = $duracion;
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

        public static function getAllSongsByLista($id_lista){
            $db = Connection::connect();
        
            // En esta consulta uno las dos tablas para asi de una sacar el id de la cancion segun la lista 
            // y despues con su id sacar el nombre de la cancion para listarlo

                $q = "SELECT canciones.id_cancion, canciones.titulo, canciones.autor, canciones.duracion
                  FROM canciones
                  INNER JOIN lista_canciones ON canciones.id_cancion = lista_canciones.id_cancion
                  WHERE lista_canciones.id_lista = $id_lista";
        
            $result = $db->query($q);
            $canciones = [];
        
            while($row = $result->fetch_assoc()){
                $canciones[] = new cancion($row['id_cancion'], $row['titulo'], $row['autor'], $row['duracion']);
            }
        
            return $canciones;
        }
        

        public static function createSong($titulo, $autor, $duracion){
            $db = Connection::connect();
            $q = "INSERT INTO canciones (titulo, autor, duracion) VALUES ('$titulo', '$autor', $duracion)";
            return $db->query($q);
        }

        public static function searchSongs($query) {
            $db = Connection::connect();
            $q = "SELECT * FROM canciones WHERE titulo LIKE '%$query%' OR autor LIKE '%$query%'";
            $result = $db->query($q);
            $canciones = [];
            while ($row = $result->fetch_assoc()) {
                $canciones[] = new cancion($row['id_cancion'], $row['titulo'], $row['autor'], $row['duracion']);
            }
            return $canciones;
        }

        public static function getAllSongs() {
            $db = Connection::connect();
            $q = "SELECT * FROM canciones";
            $result = $db->query($q);
            $canciones = [];
            while ($row = $result->fetch_assoc()) {
                $canciones[] = new cancion($row['id_cancion'], $row['titulo'], $row['autor'], $row['duracion']);
            }
            return $canciones;
        }

        public static function getSongByTitle($titulo) {
            $db = Connection::connect();
            $query = $db->query("SELECT * FROM canciones WHERE titulo = '$titulo'");
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return new Cancion($row['id_cancion'], $row['titulo'], $row['autor'], $row['duracion']);
            }
            return false;
        }

        public static function getIdSongByTittle($titulo) {
            $db = Connection::connect();
            $query = $db->query("SELECT id_cancion FROM canciones WHERE titulo = '$titulo'");
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row['id_cancion'];
            }
            return false;
        }
        
        
    }
?>
