<?php
    require_once('../config/Db.php');
    require_once('../models/UsuarioModel.php');
    require_once('../models/TerceroModel.php');
    require_once('../models/RolModel.php');
    session_start();

    $usuario = new UsuarioModel();
    $tercero = new TerceroModel();
    $rol = new RolModel();

    if (isset($_POST['logIn'])) {
        if(isset($_POST['cuentaUsuario']) && isset($_POST['claveUsuario'])) {

            $usuario -> setLoginUsuario(strtoupper($_POST['cuentaUsuario']));
            $usuario -> setClaveUsuario($_POST['claveUsuario']);

            $logged = $usuario -> LogIn($usuario);

            if (isset($logged) && empty($logged)) {
                header('Location: ../views/usuario/login.php');
            }

            foreach ($logged as $key) 
            {
                $idUsuario = $key -> getIdUsuario();
                $idTercero = $key -> getIdTercero();
                $idRol = $key -> getIdRol();
            }

            $terceroCompleted = $tercero -> Find($idTercero);
            $rolCompleted = $rol -> FindRol($idRol);

            foreach ($rolCompleted as $key) 
            {
                $_SESSION['nombreRol'] = $key -> getNombre();
                $_SESSION['descripcionRol'] = $key -> getDescripcion();
            }

            foreach ($terceroCompleted as $key) 
            {
                $_SESSION['primerNombreTercero'] = $key -> getPrimerNombre();
                $_SESSION['segundoNombreTercero'] = $key -> getSegundoNombre();
                $_SESSION['primerApellidoTercero'] = $key -> getPrimerApellido();
                $_SESSION['segundoApellidoTercero'] = $key -> getSegundoApellido();
            }            

        }
        
        header('Location: ../views/usuario/index.php');

    }