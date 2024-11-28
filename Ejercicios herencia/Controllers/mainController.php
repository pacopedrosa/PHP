<?php
// Cargamos los modelos en el orden correcto
require_once('models/vehiculo.php');
require_once('models/Cuatro_ruedas.php');
require_once('models/Dos_ruedas.php');
require_once('models/Coche.php');
require_once('models/Camion.php');

session_start();

if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php'); // Carga el controlador según el parámetro GET
} else {
    require_once('controllers/herenciaController.php'); // Controlador por defecto
}

// Cargar la vista
require_once("views/mostrar.phtml");
?>
