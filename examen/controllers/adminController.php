<?php
    if(isset($_GET['adminView'])){
        require_once('views/adminView.phtml');
        die();
    }

    if(isset($_GET['change'])){
        require_once('views/changeRole.phtml');
        die();
    }

    if(isset($_GET['changeRol'])){
        $id = $_GET['id'];
        adminRepository::removeRol($id);
        header('Location: index.php?c=admin&adminView=1');
    }

    if(isset($_GET['newRol'])){
        $id = $_GET['id'];
        adminRepository::changeRol($id);
        header('Location: index.php?c=admin&adminView=1');
    }
?>