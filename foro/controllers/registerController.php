<?php
    if(isset($_GET['registerView'])){
        require_once('views/registerView.phtml');
        die();
    }

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $avatar = $_FILES['avatar']['name'];    
        // Llamamos a la función register con los nuevos datos
        registerRepository::register($username, $password, $email, $avatar);
        header('Location: index.php');
        exit();
    }
    
?>