<?php
    if(isset($_GET['registerView'])){
        require_once('views/registerView.phtml');
        die();
    }

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];    
        RegisterRepository::register($username, $password);
        header('Location: index.php');
        exit();
    }
    
?>