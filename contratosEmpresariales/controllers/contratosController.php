<?php

    if(isset($_GET['create'])){
        require_once('views/createEmpresaView.phtml');
        die();
    }

    if(isset($_GET['edit'])){
        require_once('views/editEmpresaView.phtml');
        die();
    }

    if(isset($_POST['enviar'])){
        empresaRepository::createEmpresa($_POST['nombre'],$_POST['nif'],$_POST['direccion'],$_POST['telefono'],$_POST['email'],$_POST['visible']);
        header('Location: index.php');
    }

    

    if(isset($_GET['delete'])){
        empresaRepository::deleteEmpresa($_GET['id']);
        header('Location: index.php');
    }

    if (isset($_GET['update']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $nif = $_POST['nif'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $visible = $_POST['visible'];

        empresaRepository::updateEmpresa($id, $nombre, $nif, $direccion, $telefono, $email, $visible);
        header('Location: index.php');
        exit();
    }

    if(isset($_GET['listCompany'])){
        $empresas = empresaRepository::getEmpresas();
        require_once('views/listEmpresaView.phtml');
        die();
    }

    if(isset($_GET['seeDetails'])){
        $id = $_GET['id'];
        $personasContacto = personaContactoRepository::getPersonasByEmpresa($id);
        $empresa = empresaRepository::getEmpresaById($id);
        require_once('views/empresaView.phtml');
        die();
    }

    if(isset($_GET['search'])){
        $query = $_POST['query'];
        $empresas = empresaRepository::buscarEmpresa($query);
        require_once('views/busquedaView.phtml');
        die();
    }

?>
