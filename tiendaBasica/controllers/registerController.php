<?php

if(isset($_GET['registerView'])){
    require_once ('views/registerView.phtml');
    die();
}

if(isset($_POST['register'])){
    registerRepository::register($_POST['username'], $_POST['password']);
    header('Location: index.php');
}


?>