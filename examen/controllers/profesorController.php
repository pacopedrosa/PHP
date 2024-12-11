<?php

    if(isset($_GET['profesorView'])){
        require_once('views/profesorView.phtml');
        die();
    }

    if(isset($_GET['newEmpresa'])){
        require_once('views/addEmpresaView.phtml');
        die();
    }

    if((isset($_GET['create'])) && (isset($_POST['nombre'])) && (isset($_POST['nif'])) && (isset($_POST['direccion'])) && (isset($_POST['tutor'])) 
    && (isset($_POST['telefono'])) && (isset($_POST['correo']))){

        $user = $_SESSION['user'];
        profesorRepository::createEmpresa($_POST['nombre'], $_POST['nif'], $_POST['direccion'], $_POST['tutor'], $_POST['telefono'], $_POST['correo'], $user->getId());
        echo "Empresa dada de alta correctamente";
    }

    if(isset($_GET['editEmpresa'])){
        require_once('views/editEmpresaView.phtml');
        die();
    }

    if(isset($_GET['deleteEmpresa'])){
        require_once('views/deleteEmpresaView.phtml');
        die();
    }

    if(isset($_GET['delete'])){
        profesorRepository::deleteEmpresa($_GET['id']);
        header('Location: index.php?profesorView');
        die();
    }

    if((isset($_GET['edit'])) || (isset($_POST['nombre'])) || (isset($_POST['nif'])) || (isset($_POST['direccion'])) || (isset($_POST['tutor'])) 
    || (isset($_POST['telefono'])) || (isset($_POST['correo']))){

        $user = $_SESSION['user'];
        $id = Empresa::getIdEmpresaByNombre($_POST['nombre']);
        profesorRepository::editEmpresa($id, $_POST['nombre'], $_POST['nif'], $_POST['direccion'], 
        $_POST['tutor'], $_POST['telefono'], $_POST['correo'], $user->getId());
    }

    if(isset($_GET['listadoAlumnos'])){
        require_once('views/alumnosView.phtml');
        die();
    }

    if(isset($_GET['listadoProfesores'])){
        require_once('views/profesoresView.phtml');
        die();
    }

    if(isset($_GET['asignar'])){
        require_once('views/asignarView.phtml');
        die();
    }

    if((isset($_GET['alumnoAsignado'])) && (isset($_POST['nombreEmpresa'])) && (isset($_POST['nombreUsuario'])) 
    && (isset($_POST['fechaComienzo'])) && (isset($_POST['fechaFin'])) && (isset($_POST['nombreTutor']))){

        $id_empresa = Empresa::getIdEmpresaByNombre($_POST['nombreEmpresa']);
        $id_usuario = User::getIdUserByNombre($_POST['nombreUsuario']);
        $id_tutor = User::getIdUserByNombre($_POST['nombreTutor']);

        $tutor = User::getUserById($id_tutor);
        $usuario = User::getUserById($id_usuario);
        if(($tutor->getRole() == 1) && ($usuario->getRole() == 0) ){
        profesorRepository::insertIntoListaEmpresas($id_empresa, $id_usuario, $_POST['fechaComienzo'], $_POST['fechaFin'], $id_tutor);
        echo "Asignación realizada correctamente";
        }
    }


    if(isset($_GET['editAsignacion'])){
        require_once('views/editAsignacionView.phtml');
        die();
    }

    if((isset($_GET['editAsignacionAlumnado'])) && (isset($_POST['nombreEmpresa'])) && (isset($_POST['nombreUsuario'])) 
    && (isset($_POST['fechaComienzo'])) && (isset($_POST['fechaFin'])) && (isset($_POST['nombreTutor']))){

        $id_empresa = Empresa::getIdEmpresaByNombre($_POST['nombreEmpresa']);
        $id_usuario = User::getIdUserByNombre($_POST['nombreUsuario']);
        $id_tutor = User::getIdUserByNombre($_POST['nombreTutor']);

        $tutor = User::getUserById($id_tutor);
        $usuario = User::getUserById($id_usuario);
        if(($tutor->getRole() == 1) && ($usuario->getRole() == 0) ){
        profesorRepository::updateListaEmpresas($_GET['id'] ,$id_empresa, $id_usuario, $_POST['fechaComienzo'], $_POST['fechaFin'], $id_tutor);
        echo "Asignación realizada correctamente";
        }
    }

    if(isset($_GET['eliminarAsignacion'])){
        Lista::deleteList($_GET['id']);
        echo "Asignacion eliminada";
    }

    if (isset($_GET['searchList'])) {
        $query = $_POST['query'];
        $id_empresa = Empresa::getIdEmpresaByNombre($query); 
        $empresa = Empresa::getEmpresaById($id_empresa);
        $buscador = profesorRepository::searchAsignacion($empresa->getId());
        require_once('views/searchAsignaciones.phtml');
        exit;
    }

    if(isset($_GET['searchAlumno'])){
        $alumno = profesorRepository::searchAlumno($_POST['query']);
        require_once('views/searchAlumnos.phtml');
        exit;
    }

    if(isset($_GET['searchProfesores'])){
        $profesor = profesorRepository::searchProfesores($_POST['query']);
        require_once('views/searchProfesores.phtml');
        exit;
    }
?>