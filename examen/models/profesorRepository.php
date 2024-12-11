<?php

    class profesorRepository{

        public static function createEmpresa($nombre, $nif, $direccion, $nombre_tutor, $telefono, $correo, $id_user){
            $db = Connection::connect();
            $q = "INSERT INTO empresas (nombre, nif, direccion, nombre_tutor, telefono, correo, id_user) VALUES 
            ('$nombre', '$nif', '$direccion', '$nombre_tutor', '$telefono', '$correo', $id_user)";
            $db->query($q);
        }

        public static function deleteEmpresa($id){
            $db = Connection::connect();
            $q = "DELETE FROM empresas WHERE id_empresa = $id";
            return $db->query($q);
            echo "empresa eliminada";
        }

        public static function editEmpresa($id, $nombre, $nif, $direccion, $nombre_tutor, $telefono, $correo, $id_user){
            $db = Connection::connect();
            $q = "UPDATE empresas SET nombre = '$nombre', nif = '$nif', direccion = '$direccion', nombre_tutor = '$nombre_tutor', telefono = '$telefono', 
            correo = '$correo', id_user = $id_user WHERE id_empresa = $id";
            return $db->query($q);
        }

        public static function insertIntoListaEmpresas($id_empresa, $id_userAsignado, $fechaInicio, $fechaFin, $id_tutor){
            $db = Connection::connect();
            $q = "INSERT INTO lista_practicas (id_empresa, id_user, fecha_inicio, fecha_fin, id_tutor) VALUES 
            ($id_empresa, $id_userAsignado, '$fechaInicio', '$fechaFin', $id_tutor)";
            $db->query($q);
            echo "empresa añadida a la lista";
        }

        public static function updateListaEmpresas($id_lista, $id_empresa, $id_userAsignado, $fechaInicio, $fechaFin, $id_tutor){
            $db = Connection::connect();
            $q = "UPDATE lista_practicas SET id_empresa = $id_empresa, id_user = $id_userAsignado, fecha_inicio = '$fechaInicio', fecha_fin = '$fechaFin', 
            id_tutor = $id_tutor WHERE id_lista = $id_lista";
            return $db->query($q);
        }
        
        public static function getListaPracticas(){
            $db = Connection::connect();
            $q = "SELECT * FROM lista_practicas";
            $result = $db->query($q);
            return $result->fetch_all(MYSQLI_ASSOC);
        }


        //En esta parte he tenido que buscar la consulta ya que en la bd al almacenar 
        //el id, el buscador me pedia el nombre y tenia que averiguar el nombre para asi poder buscar
        public static function searchAsignacion($id_empresa) {
            $db = Connection::connect();
            $q = "SELECT lista_practicas.*, users.username AS userName, empresas.nombre AS empresaName 
                FROM lista_practicas
                LEFT JOIN users ON lista_practicas.id_user = users.id_user
                LEFT JOIN empresas ON lista_practicas.id_empresa = empresas.id_empresa
                WHERE lista_practicas.id_empresa = $id_empresa";
            $result = $db->query($q);
            
            $asignacion = [];
            while ($row = $result->fetch_assoc()) {
                $asignacion[] = new Lista(
                    $row['id_lista'], 
                    $row['empresaName'], 
                    $row['userName'],  
                    $row['fecha_inicio'], 
                    $row['fecha_fin'], 
                    $row['id_tutor']
                );
            }
            
            return $asignacion;
        }

        public static function searchAlumno($nombre){
                $db = Connection::connect();
                $q = "SELECT * FROM users WHERE username LIKE '%$nombre%'";
                $result = $db->query($q);
                $alumnos = [];
                while ($row = $result->fetch_assoc()) {
                    $alumnos[] = new User($row['id_user'], $row['username'], $row['rol']);
                }
                return $alumnos;
        }

        public static function searchProfesores($nombre){
            $db = Connection::connect();
            $q = "SELECT * FROM users WHERE username LIKE '%$nombre%' AND rol = 1";
            $result = $db->query($q);
            $profesores = [];
            while ($row = $result->fetch_assoc()) {
                $profesores[] = new User($row['id_user'], $row['username'], $row['rol']);
            }
            return $profesores;
        }
        
        
    }

?>