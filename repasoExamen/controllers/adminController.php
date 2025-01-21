<?php

if(isset($_GET['adminView'])){
    require_once('views/adminView.phtml');
    die();
}
if(isset($_GET['add'])){
    foroRepository::crearForo($_POST['nombre'], $_POST['publico']);
    echo "foro creado";
}

if(isset($_GET['list'])){
    require_once('views/adminView.phtml');
    die();
}

if(isset($_GET['ban'])){
    userRepository::banUser($_GET['idUser']);
    echo "Usuario baneado";
}
if(isset($_GET['unBan'])){
    userRepository::unbanUser($_GET['idUser']);
    echo "Usuario baneado";
}

if(isset($_GET['darAdmin'])){
    userRepository::darAdmin($_GET['idUser']);
    echo "Usuario dado admin";
}

if(isset($_GET['quitarAdmin'])){
    userRepository::quitarAdmin($_GET['idUser']);
    echo "Usuario quitado de admin";
}

?>