<?php

    class Empresa{
        private $id;
        private $nombre;
        private $nif;
        private $direccion;
        private $nombre_tutor;
        private $telefono;
        private $correo;
        private $id_user;

        public function __construct($id, $nombre, $nif, $direccion, $nombre_tutor, $telefono, $correo, $id_user) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->nif = $nif;
            $this->direccion = $direccion;
            $this->nombre_tutor = $nombre_tutor;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->id_user = $id_user;
        }

        public function getId(){
            return $this->id;
        }
        
        public function getNombre(){
            return $this->nombre;
        }
        
        public function getNif(){
            return $this->nif;
        }
        
        public function getDireccion(){
            return $this->direccion;
        }
        
        public function getNombreTutor(){
            return $this->nombre_tutor;
        }
        
        public function getTelefono(){
            return $this->telefono;
        }
        
        public function getCorreo(){
            return $this->correo;
        }
        
        public function getIdUser(){
            return $this->id_user;
        }

        public static function getEmpresas(){
            $db = Connection::connect();
            $query = $db->query('SELECT * FROM empresas');
            $empresas = [];
            while($row = $query->fetch_assoc()){
                $empresas[] = new Empresa($row['id_empresa'], $row['nombre'], $row['nif'], $row['direccion'], $row['nombre_tutor'], $row['telefono'], $row['correo'], $row['id_user']);
            }
            return $empresas;
        }


        public static function getEmpresaById($id){
            $db = Connection::connect();
            $query = $db->query("SELECT * FROM empresas WHERE id_empresa = $id");
            $row = $query->fetch_assoc();
            return new Empresa($row['id_empresa'], $row['nombre'], $row['nif'], $row['direccion'], $row['nombre_tutor'], $row['telefono'], $row['correo'], $row['id_user']);
        }

        public static function getIdEmpresaByNombre($nombre){
            $db = Connection::connect();
            $query = $db->query("SELECT id_empresa FROM empresas WHERE nombre = '$nombre'");
            $row = $query->fetch_assoc();
            return $row['id_empresa'];
        }

        

    }

?>