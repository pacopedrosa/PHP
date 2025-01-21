<?php

if (isset($_GET['addContactView'])) {
    $empresas = EmpresaRepository::getAllEmpresas();
    require_once('views/addContactView.phtml');
    die();
}

if (isset($_GET['addContact'])) {
    ContactRepository::addContact($_SESSION['user']->getId(), $_POST['empresa'], $_POST['nombreContact'], $_POST['puesto'], $_POST['telf'], $_POST['correoContact']);
    header('Location: index.php');
}

if (isset($_GET['editContactView'])) {
    $contactSelect = ContactRepository::getContactById($_GET['editContactView']);
    require_once('views/editContactView.phtml');
    die();
}

if (isset($_GET['editContact'])) {
    ContactRepository::editContact($_POST['campo'],$_POST['nuevo_valor'],$_GET['editContact']);
    header('Location: index.php');
}