<?php
//cargamos el modelo
require_once("models/loginRepository.php");
require_once("models/registerRepository.php");
require_once("models/userModel.php");
require_once("models/UserRepository.php");
require_once("models/adminRepository.php");
require_once("models/empresaModel.php");
require_once("models/empresaRepository.php");
require_once("models/personaContactoModel.php");
require_once("models/personaContactoRepository.php");
require_once("models/registroComunicacionModel.php");
require_once("models/registroComunicacionRepository.php");



session_start();



if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php'); //Coge el controlador que toca segun lo que reciba la variable get
} else require_once('controllers/contratosController.php');

// cargar la vista

require_once("views/ListView.phtml");

?>