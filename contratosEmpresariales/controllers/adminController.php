<?php

    if(isset($_GET['adminView'])){
        require_once('views/adminView.phtml');
        die();
    }

    if(isset($_GET['list'])){
        require_once('views/adminView.phtml');
        die();
    }

    if(isset($_GET['changeRole'])){
        $id = $_GET['id'];
        adminRepository::removeRole($id);
        header('Location: index.php?c=admin&adminView=1');
    }

    if(isset($_GET['newRole'])){
        $id = $_GET['id'];
        adminRepository::changeRole($id);
        header('Location: index.php?c=admin&adminView=1');
    }

    if(isset($_GET['delete'])){
        $registros = registroComunicacionRepository::getRegistros();
        require_once('views/allCommunications.phtml');
        die();
    }

    if(isset($_GET['close'])){
        adminRepository::closeCommunication($_GET['id']);
    }

    if(isset($_GET['open'])){
        adminRepository::openCommunication($_GET['id']);
    }


    if(isset($_GET['permBan'])){
        adminRepository::deleteCommunication($_GET['id']);
    }


?>