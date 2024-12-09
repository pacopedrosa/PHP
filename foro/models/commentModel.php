<?php
class Comentario {
    private $id_comentario;
    private $informacion;
    private $id_user;
    private $id_foro;
    private $id_tema;
    private $visible;

    public function __construct($id_comentario, $informacion, $id_user, $id_foro, $id_tema, $visible) {
        $this->id_comentario = $id_comentario;
        $this->informacion = $informacion;
        $this->id_user = $id_user;
        $this->id_foro = $id_foro;
        $this->id_tema = $id_tema;
        $this->visible = $visible;
    }

    public function getId() {
        return $this->id_comentario;
    }

    public function getInformacion() {
        return $this->informacion;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function getIdForo() {
        return $this->id_foro;
    }

    public function getIdTema() {
        return $this->id_tema;
    }
    public function getVisible() {
        return $this->visible;
    }

    // Método para insertar un comentario
    public static function insertComment($informacion, $id_user, $id_tema) {
        $db = Connection::connect();
        $q = "INSERT INTO comentarios (informacion, id_user, id_tema) VALUES ('$informacion','$id_user' , '$id_tema')";
        $result = $db->query($q);
        if ($result) {
            return $db->insert_id;
        } else {
            return false;
        }
    }

    // Método para obtener todos los comentarios
    public static function getAllComments() {
        $db = Connection::connect();
        $query = "SELECT * FROM comentarios";
        $result = $db->query($query);
        $comentarios = [];
        while ($row = $result->fetch_assoc()) {
            $comentarios[] = new Comentario($row['id_comentario'], $row['informacion'], $row['id_user'], $row['id_foro'], $row['id_tema'], $row['visible']);
        }
        return $comentarios;
    }

    // Método para obtener comentarios de un tema específico
    public static function getCommentsByTema($id_tema) {
        $db = Connection::connect();
        $query = "SELECT * FROM comentarios WHERE id_tema = '$id_tema'";
        $result = $db->query($query);
        $comentarios = [];
        while ($row = $result->fetch_assoc()) {
            $comentarios[] = new Comentario($row['id_comentario'], $row['informacion'], $row['id_user'], $row['id_foro'], $row['id_tema'], $row['visible']);
        }
        return $comentarios;
    }


    public static function ocultarComentarios($id_comentario) {
        $db = Connection::connect();
        $q = "UPDATE comentarios SET visible = 0 WHERE id_comentario = '$id_comentario'";
        return $db->query($q);
    }
}
?>
