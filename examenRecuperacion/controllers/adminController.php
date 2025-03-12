<?php

    if(isset($_GET['adminView'])){
        require_once('views/adminView.phtml');
        die();
    }

    if(isset($_GET['addObject'])){
        require_once('views/addObjectView.phtml');
        die();
    }

    if (isset($_GET['add'])) {
        objetoRepository::addObject($_POST['descripcion'], $_POST['cantidad']);
        $object = objetoRepository::getObjectByDescription($_POST['descripcion']);
        
        if ($object) {
            ubicacionRepository::insertAddress($_POST['pasillo'], $_POST['estanteria'], $_POST['estante'], $object->getId());
            
            header('Location: index.php');
        } else {
            echo "Hubo un problema al crear el objeto.";
        }
    }
    
    

    if(isset($_GET['editView'])){
        $id = $_GET['id'];
        require_once('views/editObjectView.phtml');
        die();
    }

    if(isset($_GET['listObject'])){
        require_once('views/adminView.phtml');
        die();
    }

    if(isset($_GET['edit'])){
        objetoRepository::updateObject($_GET['id'], $_POST['descripcion'], $_POST['cantidad']);
        ubicacionRepository::updateAddress($_POST['pasillo'], $_POST['estanteria'], $_POST['estante'], $_GET['id']);
        header('index.php');
    }


?>