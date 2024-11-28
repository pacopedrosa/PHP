<?php
if (isset($_GET['adminView'])) {
    require_once('views/adminView.phtml');
    exit();
}

if (isset($_GET['addForo'])) {
    require_once('views/adminView.phtml');
    exit();
}

if (isset($_GET['add']) && isset($_POST['nombre']) && isset($_POST['publico'])) {
    $nombre = $_POST['nombre'];
    $publico = $_POST['publico'];

    if (!empty($nombre) && is_numeric($publico)) {
        if (adminRepository::addForo($nombre, $publico)) {
            echo "Foro creado con éxito.";
        } else {
            echo "Hubo un error al crear el foro.";
        }
    } else {
        echo "Por favor, completa todos los campos correctamente.";
    }
}

if (isset($_GET['ban'])) {
    require_once('views/adminView.phtml');
    exit();
}

if (isset($_GET['banear']) && isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    $user = User::getUserById($id_usuario);
    if ($user && $user->isBaneado() == 0) { 
        if (adminRepository::removeUser($id_usuario)) {
            echo "El usuario ha sido baneado.";
        } else {
            echo "Error al banear.";
        }
    } elseif ($user) { 
        if (adminRepository::setRemoveUser($id_usuario)) {
            echo "El usuario ha sido reestablecido.";
        } else {
            echo "Error al desbanear.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
} else {
    echo "Usuario no encontrado.";
}

if (isset($_GET['role'])) {
    require_once('views/adminView.phtml');
    exit();
}

if (isset($_GET['rol']) && isset($_GET['id'])) {
    $idUser = $_GET['id'];
    $user = User::getUserById($idUser);

    if ($user && $user->esAdmin() == 1) { 
        if (adminRepository::removeRole($idUser)) {
            echo "El rol del usuario ha sido cambiado a usuario estándar.";
        } else {
            echo "Error al cambiar el rol del usuario.";
        }
    } elseif ($user) { 
        if (adminRepository::setRole($idUser)) {
            echo "El rol del usuario ha sido cambiado a administrador.";
        } else {
            echo "Error al cambiar el rol del usuario.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}

if (isset($_GET['vistaAdmin'])) {
    require_once('views/adminView.phtml');
    exit();
}

?>
