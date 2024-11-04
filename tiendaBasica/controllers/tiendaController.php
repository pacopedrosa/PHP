<?php

    if(isset($_GET['mainView'])){
        require_once('views/listView.phtml');
        die();
    }

    if(isset($_GET['productView'])){
        require_once('views/productsView.phtml');
        die();
    }

    if(isset($_GET['usersView'])){
        require_once('views/usersView.phtml');
        die();
    }

    if(isset($_GET['carro'])){
        require_once('views/carritoView.phtml');
        die();
    }

    if(isset($_GET['delete'])){
        require_once('views/deleteView.phtml');
        die();
    }
   
    

    if (isset($_GET['add'])) {
        require_once('views/addProductView.phtml');
        die();
    }

    if (isset($_GET['editProduct']) && isset($_GET['idProduct'])) {
        $idProduct = $_GET['idProduct'];
        require_once('views/editProductView.phtml');
        die();
    }

    
    
    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_FILES['imagen']) && isset($_POST['precio']) && isset($_POST['cantidad'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $imagen = $_FILES['imagen']['name'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];    
        Product::addProduct($nombre, $descripcion, $imagen, $precio, $cantidad);
    }

    // Verificar si se está accediendo a la edición de un producto


// Procesar los datos del formulario si todos los campos están configurados
if (
    isset($_POST['nombreProduct']) && isset($_POST['descripcionProduct']) && isset($_FILES['imagenProduct'])
    && isset($_POST['precioProduct']) && isset($_POST['cantidadProduct']) && isset($_GET['idProduct'])
    && isset($_POST['actualizar'])) 
    {
    $nombre = $_POST['nombreProduct'];
    $descripcion = $_POST['descripcionProduct'];
    $imagen = $_FILES['imagenProduct']['name'];
    $precio = $_POST['precioProduct'];
    $cantidad = $_POST['cantidadProduct'];
    $id = $_GET['idProduct'];  // Captura el ID del producto de la URL

    // Llamar a la función editProduct con los datos obtenidos
    Product::editProduct($id, $nombre, $descripcion, $imagen, $precio, $cantidad);
}


    if(isset($_GET['deleteProduct'])){ 
        Product::deleteProduct($_GET['idProduct']);
        echo "Producto eliminado";
    }

    


?>