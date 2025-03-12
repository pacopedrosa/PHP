<?php
    class ubicacionRepository{

        public static function getAllAddress(){
            $db = Connection::connect();
            $q = "SELECT * FROM ubicacion";
            $result = $db->query($q);
            $ubicaciones = [];
            while ($row = $result->fetch_assoc()) {
                $ubicacion = new Ubicacion($row['id_ubicacion'], $row['pasillo'], $row['estanteria'], $row['estante'], $row['id_objeto']);
                $ubicaciones[] = $ubicacion;
            }
            return $ubicaciones;
        }
        public static function insertAddress($pasillo, $estanteria, $estante, $id_objeto){
            $db = Connection::connect();
            $q = "INSERT INTO ubicacion (pasillo, estanteria, estante, id_objeto) VALUES ('$pasillo', '$estanteria', '$estante', $id_objeto)";
            $db->query($q);
            echo "Ubicación registrada correctamente";
        }

        public static function updateAddress($pasillo, $estanteria, $estante, $id_objeto){
            $db = Connection::connect();
            $q = "UPDATE ubicacion SET pasillo='$pasillo', estanteria='$estanteria', estante='$estante' WHERE id_objeto = $id_objeto";
            $db->query($q);
            echo "Ubicación actualizada correctamente";
        }

        public static function getAddressByObject($id_objeto){
            $db = Connection::connect();
            $q = "SELECT * FROM ubicacion WHERE id_objeto = $id_objeto";
            $result = $db->query($q);
            $ubicaciones = [];
            if ($row = $result->fetch_assoc()) {
                $ubicacion = new Ubicacion($row['id_ubicacion'], $row['pasillo'], $row['estanteria'], $row['estante'], $row['id_objeto']);
                $ubicaciones[] = $ubicacion;
            }
            return $ubicaciones;
        }

        public static function getObjectsOrderedByLocation() {
            $db = Connection::connect();
            
            $q = "SELECT objetos.id_objeto, objetos.descripcion, objetos.cantidad, 
                    ubicacion.id_ubicacion, ubicacion.pasillo, ubicacion.estanteria, ubicacion.estante
                  FROM objetos
                  INNER JOIN ubicacion ON objetos.id_objeto = ubicacion.id_objeto
                  ORDER BY ubicacion.pasillo, ubicacion.estanteria, ubicacion.estante";
            
            $result = $db->query($q);
            
            $objetosConUbicacion = [];
            
            while ($row = $result->fetch_assoc()) {
                $objeto = new Objeto($row['id_objeto'], $row['descripcion'], $row['cantidad']);
                $ubicacion = new Ubicacion($row['id_ubicacion'],$row['pasillo'],$row['estanteria'],$row['estante'],$row['id_objeto']);
                $objetosConUbicacion[] = ['objeto' => $objeto, 'ubicacion' => $ubicacion];
            }
            
            return $objetosConUbicacion;
        }
        
        
    }
?>