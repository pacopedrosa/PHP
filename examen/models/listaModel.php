<?php

    class Lista{
        private $id_lista;
        private $id_empresa;
        private $id_user;
        private $fecha_inicio;
        private $fecha_fin;
        private $id_tutor;

        public function __construct($id_lista, $id_empresa, $id_user, $fecha_inicio, $fecha_fin, $id_tutor) {
            $this->id_lista = $id_lista;
            $this->id_empresa = $id_empresa;
            $this->id_user = $id_user;
            $this->fecha_inicio = $fecha_inicio;
            $this->fecha_fin = $fecha_fin;
            $this->id_tutor = $id_tutor;
        }
        
        public function getId(){
            return $this->id_lista;
        }

        public function getIdEmpresa(){
            return $this->id_empresa;
        }
        
        public function getIdUser(){
            return $this->id_user;
        }
        
        public function getFechaInicio(){
            return $this->fecha_inicio;
        }
        
        public function getFechaFin(){
            return $this->fecha_fin;
        }
        
        public function getIdTutor(){
            return $this->id_tutor;
        }


        public static function getAllListas(){
            $db = Connection::connect();
            $query = $db->query("SELECT * FROM lista_practicas");
            $listas = [];
            while($row = $query->fetch_assoc()){
                $listas[] = new Lista($row['id_lista'], $row['id_empresa'], $row['id_user'], $row['fecha_inicio'], $row['fecha_fin'], $row['id_tutor']);
            }
            return $listas;
        }

        public static function deleteList($id_lista){
            $db = Connection::connect();
            $query = $db->query("DELETE FROM lista_practicas WHERE id_lista = $id_lista");
            if($query){
                return true;
            } else {
                return false;
            }
        }

        public static function listaOrdenada(){
            $db = Connection::connect();
            $query = $db->query("SELECT * FROM lista_practicas ORDER BY fecha_inicio ASC");
            $listas = [];
            while($row = $query->fetch_assoc()){
                $listas[] = new Lista($row['id_lista'], $row['id_empresa'], $row['id_user'], $row['fecha_inicio'], $row['fecha_fin'], $row['id_tutor']);
            }
            return $listas;
        }
    }

?>