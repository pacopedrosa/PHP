<?php
    if(isset($_GET['adminView'])){
        require_once('views/adminView.phtml');
        die();
    }

    if(isset($_GET['crearForo'])){
        require_once('views/crearForoView.phtml');
        die();
    }
?>