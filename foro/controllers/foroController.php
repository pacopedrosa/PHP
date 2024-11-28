<?php
    if(isset($_GET['mainView'])){
        require_once('views/listView.phtml');
        die();
    }

    if(isset($_GET['saveComment']) && isset($_POST['informacion'])){
        $user = $_SESSION['user'];
        $informacion = $_POST['informacion'];
        comentario::insertComment($informacion, $user->getId(), $_GET['idTema']);
   }


   if(isset($_GET['newTema']) && isset($_POST['nombre'])){
        $tema=$_POST['nombre'];
        tema::insertTema($tema, true, $_GET['idForo']);
   }

   if(isset($_GET['ocultarComentario'])){
    comentario::ocultarComentarios($_GET['idComentario']);
   }

   if(isset($_GET['deleteTema'])){
    tema::ocultarTema($_GET['idTema']);
   }
?>