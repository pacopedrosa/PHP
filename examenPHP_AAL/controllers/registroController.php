<?php

if (isset($_GET['addRegistroView'])) {
    $contacts = ContactRepository::getAllContacts();
    require_once('views/addRegistroView.phtml');
    die();
}

if (isset($_GET['addRegistro'])) {
    RegistroRepository::addRegistro($_POST['dateRegistro'], $_SESSION['user']->getId(), $_POST['contact'], $_POST['anotacion'], 0);
    header('Location: index.php');
}

if (isset($_GET['seeMoreRegistros'])) {
    $registros = RegistroRepository::getAllRegistros();
    require_once('views/seeMoreRegistrosView.phtml');
    die();
}