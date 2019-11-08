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
                if ((isset($_POST['usuario']) && $_POST['usuario'] != '') && (isset($_POST['clave']) && $_POST['clave'] != '')) {

                    $usuario->setLoginUsuario($_POST['usuario']);
                    $usuario->setClaveUsuario($_POST['clave']);

                    $resultQuery = $usuario->LogIn();

                    if ($resultQuery) {
                        
                        $consulta = [
                            'error' => '0',
                            'message' => 'La solicitud se pudo procesar correctamente.',
                            'data' => [$resultQuery]
                        ];
                        echo json_encode($consulta);
                    } else {
                        
                        $consulta = [
                            'error' => '1',
                            'message' => 'La solicitud no se pudo procesar.',
                            'data' => []
                        ];
                        echo json_encode($consulta);
                    }

                } else {
                    $consulta = [
                        'error' => '2',
                        'message' => 'No se han enviado los datos necesarios para la autenticación.',
                        'data' => []
                    ];

                    echo json_encode($consulta);
                }
                
                break;
            
            default:
                header('Location: UsuarioController.php');
                break;
        }
    } else {
        header('Location: UsuarioController.php?fn=index');
    }