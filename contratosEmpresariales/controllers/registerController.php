<?php
    if(isset($_GET['registerView'])){
        require_once('views/registerView.phtml');
        die();
    }

    if (isset($_POST['register'])) {
        // Encriptar la contraseña con md5 antes de pasarla al repositorio
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedPassword = md5($password);
    
        // Pasar la contraseña encriptada al repositorio
        registerRepository::register($username, $hashedPassword);
    
        // Redirigir al índice después del registro
        header('Location: index.php');
    }

?>