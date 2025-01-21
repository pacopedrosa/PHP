<?php
    if(isset($_GET['list'])){
        require_once('views/productsView.phtml');
        die();
    }

    if(isset($_GET['usersView'])){
        require_once('views/usersView.phtml');
        die();
    }

    if(isset($_POST['crear'])){
        productoRepository::createProduct($_POST['nombre'], $_POST['descripcion'], $_FILES['imagen']['name'], $_POST['precio'], $_POST['cantidad']);
    }

    if(isset($_GET['showProducts'])){
        require_once('views/productsListView.phtml');
        die();
    }
?>