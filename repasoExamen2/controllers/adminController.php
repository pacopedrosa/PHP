<?php

    if(isset($_GET['adminView'])){
        require_once('views/adminView.phtml');
        die();
    }

    if(isset($_GET['newProduct'])){
        require_once('views/productsView.phtml');
        die();
    }

    if(isset($_GET['change'])){
        $users = userRepository::getusers(); //Mostramos todos los usuarios
        require_once('views/usersView.phtml'); 
        die();
    }

    if(isset($_GET['changeRole'])){
        userRepository::setRole($_GET['id']);
    }
    
    if(isset($_GET['removeRole'])){
        userRepository::removeRole($_GET['id']);
    }

?>