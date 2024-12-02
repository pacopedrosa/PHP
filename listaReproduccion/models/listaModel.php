<?php
    class lista{
        private $id_lista;
        private $nombreLista;
        private $id_user;

        public function __construct($id_lista, $nombreLista, $id_user) {
            $this->id_lista = $id_lista;
            $this->nombreLista = $nombreLista;
            $this->id_user = $id_user;
        }

        public function getId(){
            return $this->id_lista;
        }

        public function getNombre(){
            return $this->nombreLista;
        }



        public function getUser(){
            return $this->id_user;
        }

        public static function getAllListas($id_user){
            $db = Connection::connect();
            $query = $db->query("SELECT * FROM listas WHERE id_user = $id_user");
            $listas = [];
            while($row = $query->fetch_assoc()){
                $listas[] = new Lista($row['id_lista'], $row['nombreLista'], $row['id_user']);
            }
            return $listas;
        }

        public static function createList($id_user, $titulo){
            $db = Connection::connect();
            $query = $db->query("INSERT INTO listas (nombreLista, id_user) VALUES ('$titulo', $id_user)");
            if($query){
                return $db->insert_id;
            } else {
                return false;
            }
        }

        public static function getNombreById($id){
            $db = Connection::connect();
            $query = $db->query("SELECT nombreLista FROM listas WHERE id_lista = $id");
            if($query->num_rows > 0){
                $row = $query->fetch_assoc();
                return $row['nombreLista'];
            } else {
                return false;
            }
        }

        public static function addSongToList($id_lista, $id_cancion) {
            $db = Connection::connect();
            $q = "INSERT INTO lista_canciones (id_lista, id_cancion) VALUES ('$id_lista', '$id_cancion')";
            return $db->query($q);
        }
        
    }
?>
