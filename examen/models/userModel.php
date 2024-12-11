<?php
class User {

    private $id;
    private $username;
    private $role;

    public function __construct($id, $username, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getRole() {
        return $this->role;
    }

    public static function getUsers() {
        $db = Connection::connect();
        $q = "SELECT id_user, username, rol FROM users";
        $result = $db->query($q);
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = new User($row['id_user'], $row['username'], $row['rol']);
        }
        return $users;
    }
    
    public static function getIdUserByNombre($nombre) {
        $db = Connection::connect();
        $q = "SELECT id_user FROM users WHERE username = '$nombre'";
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return $row['id_user'];
        }
        return null; // Si no se encuentra el usuario
    }        

    public static function getUserById($id) {
        $db = Connection::connect();
        $q = "SELECT id_user, username, rol FROM users WHERE id_user = $id";
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new User($row['id_user'], $row['username'], $row['rol']);
        }
        return null; // Si no se encuentra el usuario
    }
}
?>
