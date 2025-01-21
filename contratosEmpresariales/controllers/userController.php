<?php

    if(isset($_GET['communication'])){
        require_once('views/comunicacionView.phtml');
        die();
    }

    if(isset($_GET['sendCommunication'])){
        $fecha = $_POST['fecha'];
        $contacto = $_POST['contacto'];
        $anotacion = $_POST['anotacion'];

        userRepository::anadirRegistro($fecha, $contacto, $anotacion);
        header('Location: index.php');
        exit();
    }

    if(isset($_GET['ended'])){
        registroComunicacionRepository::finalizarComunicacion($_GET['id']);
        header('Location: index.php');
        exit();
    }

    if(isset($_GET['viewCommunications'])){
        $registros = registroComunicacionRepository::getRegistros();
        require_once('views/communicationsUserView.phtml');
        die();
    }

    if(isset($_GET['searchByUser'])){
        
    }

?>