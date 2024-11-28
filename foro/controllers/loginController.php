<?php
if (isset($_GET['loginView'])) {
    require_once('views/loginView.phtml');
    die();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = loginRepository::login($username, $password);
    
    if ($user && $user->isBaneado()) {
        // Si el usuario está baneado
        echo "No puedes iniciar sesión porque tu cuenta está baneada.";
    } elseif ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit();
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
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
