<?php
    if(isset($_GET['loginView'])){
        require_once('views/loginView.phtml');
        die();
    }


    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Llamamos a la función login con los datos
        $user = loginRepository::login($username, $password);
        if($user){
            $_SESSION['user'] = $user;
            header('Location: index.php');
            exit();
        }else{
            $_SESSION['user']='invitado';
            echo "Usuario o contraseña incorrectos";
        }
    }


    if (isset($_GET['logout'])) {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        header('Location: index.php');
        exit();
    }
?>