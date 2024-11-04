<?php

if(isset($_GET['loginView'])){
    require_once ('views/loginView.phtml');
    die();
}


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($user = loginRepository::login($username , $password)){
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit();  // para evitar que siga ejecutando el código después de haber hecho el logout.php y volver al loginView.phtml.  // El exit() deja de ejecutar el resto de código en este archivo.  // Este exit() también puede ser usado en el logout.php para terminar la sesión y volver al login.php.  // Este exit() también puede ser usado en cualquier lugar del código
    } else {
        header('Location: index.php?loginView=true&error=true');
    }
}


if (isset($_GET['logout'])) {
    // Verificar si hay un usuario en la sesión
    if (isset($_SESSION['user'])) {
        // Opcional: almacenar datos del usuario antes de cerrar sesión
        $user = $_SESSION['user'];
        $id = $user->getId();
        $nombre = $user->getUsername();

        // Eliminar el usuario de la sesión
        unset($_SESSION['user']); 
         session_destroy(); //destruir toda la sesión
    }
    header('Location: index.php');
    exit(); 
}   

?>