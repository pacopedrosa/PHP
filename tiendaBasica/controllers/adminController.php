<?php
if(isset($_GET['adminView'])){
    require_once('views/adminView.phtml');
    die();
}

if(isset($_GET['change'])){
    $users = User::getUsers(); //Mostramos todos los usuarios
    require_once('views/usersView.phtml'); 
}

if(isset($_GET['changeRole'])){
    adminRepository::setRole($_GET['id']);
}

if(isset($_GET['removeRole'])){
    adminRepository::removeRole($_GET['id']);
}


?>