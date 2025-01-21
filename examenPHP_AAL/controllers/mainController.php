<?php
//cargamos el modelo
require_once('models/User.php');
require_once('models/UserRepository.php');
require_once('models/RegisterRepository.php');
require_once('models/Empresa.php');
require_once('models/EmpresaRepository.php');
require_once('models/Contacto.php');
require_once('models/ContactRepository.php');
require_once('models/Registro.php');
require_once('models/RegistroRepository.php');



session_start();

if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php');
} 



if (!isset($_SESSION['user'])){
    // cargar la vista
    require_once 'views/loginView.phtml';
}else{
    $registros = RegistroRepository::getAllRegistros();
    require_once 'views/mainView.phtml';
    
}


