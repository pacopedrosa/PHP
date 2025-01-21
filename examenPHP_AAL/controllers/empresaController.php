<?php


if (isset($_GET['addEmpresaView'])) {
    require_once('views/addEmpresaView.phtml');
    die();
}

if (isset($_GET['addEmpresa'])) {
    EmpresaRepository::addEmpresa($_POST['nombre'],$_POST['nif'],$_POST['direccion'],$_POST['telefono'],$_POST['correo']);
    header('Location: index.php');
}

if (isset($_GET['empresasView'])) {
    $empresas = EmpresaRepository::getAllEmpresas();
    require_once('views/empresasView.phtml');
    die();
}

if (isset($_GET['seeDetails'])) {
    $empresaSelect = EmpresaRepository::getEmpresaById($_GET['seeDetails']);
    require_once('views/seeDetails.phtml');
    die();
}

if (isset($_GET['editEmpresaView'])) {
    $empresaSelect = EmpresaRepository::getEmpresaById($_GET['editEmpresaView']);
    require_once('views/editEmpresaView.phtml');
    die();
}

if (isset($_GET['editEmpresa'])) {
    EmpresaRepository::editEmpresa($_POST['campo'],$_POST['nuevo_valor'],$_GET['editEmpresa']);
    header('Location: index.php');
}

if (isset($_GET['borrarEmpresa'])) {
    EmpresaRepository::deleteEmpresa($_GET['borrarEmpresa']);
    header('Location: index.php');
}

if (isset($_GET['buscarEmpresa'])) {
    $empresas= EmpresaRepository::buscarEmpresa($_POST['datoBuscado']);
    require_once('views/busquedaView.phtml');
    die();
}



?>