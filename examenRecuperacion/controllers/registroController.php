<?php

if(isset($_GET['registerEntry'])){
    $id = $_GET['id'];
    $objeto = objetoRepository::getObjetoById($id);
    require_once('views/recordView.phtml');
    die();
}


if(isset($_GET['exitEntry'])){
    $id = $_GET['id'];
    $objeto = objetoRepository::getObjetoById($id);
    require_once('views/withdrawalView.phtml');
    die();
}

if(isset($_GET['update'])){
    $id = $_GET['id'];
    registroRepository::insertObject($_POST['amount'], $_POST['fecha_entrada'], $id);
    objetoRepository::updateAmountObject($_GET['id'], $_POST['amount']);
}

if(isset($_GET['retire'])){
    $id = $_GET['id'];
    $objeto = objetoRepository::getObjetoById($id);
    registroSalidaRepository::insertRetireRegister($_POST['amount'], $_POST['fecha_salida'], $id);
    objetoRepository::updateRetireObject( $_POST['amount'], $_GET['id']);
}
?>