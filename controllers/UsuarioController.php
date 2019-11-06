<?php
    session_start();
    require_once('../config/Db.php');
    require_once('../models/UsuarioModel.php');
    require_once('../models/TerceroModel.php');
    require_once('../models/RolModel.php');

    $usuario = new UsuarioModel();
    $tercero = new TerceroModel();
    $rol = new RolModel();

    if ($_GET['fn']) {
        $funcion = $_GET['fn'];
        
        switch ($funcion) {
            case 'login':
                

                $titlePage = 'Login';
                include_once '../views/common/head.php';
                include_once '../views/common/navbar.php';
                include_once '../views/usuario/index.php';
                include_once '../views/common/bootstrapJS.php';


                break;
            
            default:
                # code...
                break;
        }
    }