<?php
    if(isset($_GET['create']) && $_POST['titulo']){
        $user = $_SESSION['user'];
        lista::createList($user->getId(), $_POST['titulo']);
        header('Location: index.php');
    }

    if(isset($_GET['creates']) && $_POST['titulo'] && $_POST['autor'] && $_POST['duracion']){
        cancion::createSong($_POST['titulo'], $_POST['autor'], $_POST['duracion']);
    }

    if(isset($_GET['listaView'])){
        $id = $_GET['id'];
        $nombreLista = lista::getNombreById($id);
        $canciones = cancion::getAllSongsByLista($id);

        $duracion = 0;
        foreach($canciones as $cancion){
            $duracion += $cancion->getDuracion();
        }
        require_once('views/listaView.phtml');
        die();
    }

    if(isset($_GET['mainView'])){
        require_once('views/ListView.phtml');
        die();
    }

    if (isset($_GET['searchSongs'])) {
        $query = $_POST['query'];
        $songs = cancion::searchSongs($query);
        require_once('views/searchSongs.phtml');
        exit;
    }

    if(isset($_GET['addSongToList']) && $_POST['cancion']){
        $idCancion = cancion::getIdSongByTittle($_POST['cancion']);
        lista::addSongToList($_GET['id'], $idCancion);
        echo "añadido";
    }

    

    
?>
