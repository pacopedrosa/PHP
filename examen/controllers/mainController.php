<?php
//cargamos el modelo
require_once('models/loginRepository.php');
require_once('models/registerRepository.php');
require_once('models/userModel.php');
require_once('models/adminRepository.php');
require_once('models/empresaModel.php');
require_once('models/profesorRepository.php');
require_once('models/listaModel.php');

session_start();



if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php'); //Coge el controlador que toca segun lo que reciba la variable get
} else require_once('controllers/examenController.php');

// cargar la vista
require_once("views/ListView.phtml");

?>