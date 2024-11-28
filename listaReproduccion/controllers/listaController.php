<?php
    if(isset($_GET['create']) && $_POST['titulo']){
        $user = $_SESSION['user'];
        lista::createList($user->getId(), $_POST['titulo']);
        header('Location: index.php');
    }

    if(isset($_GET['creates']) && $_POST['titulo'] && $_POST['autor'] && $_POST['duracion']){
        cancion::createSong($_GET['id'], $_POST['titulo'], $_POST['autor'], $_POST['duracion']);
    }

    if(isset($_GET['listaView'])){
        $id = $_GET['id'];
        $nombreLista=lista::getNombreById($id);
        $canciones = cancion::getAllSongsByLista($id);
        require_once('views/listaView.phtml');
        die();
    }

    if(isset($_GET['mainView'])){
        require_once('views/ListView.phtml');
        die();
    }
?>