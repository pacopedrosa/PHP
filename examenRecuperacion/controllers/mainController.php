<?php
//cargamos el modelo
require_once("models/loginRepository.php");
require_once("models/registerRepository.php");
require_once("models/userModel.php");
require_once("models/userRepository.php");
require_once("models/registroRepository.php");
require_once("models/registroModel.php");
require_once("models/objetoModel.php");
require_once("models/objetoRepository.php");
require_once("models/registroSalidaModel.php");
require_once("models/registroSalidaRepository.php");
require_once("models/ubicacionModel.php");
require_once("models/ubicacionRepository.php");




session_start();



if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php'); //Coge el controlador que toca segun lo que reciba la variable get
} else require_once('controllers/registroController.php');

// cargar la vista

require_once("views/ListView.phtml");

?>