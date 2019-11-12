<?php
    session_start();
    require_once('../config/Db.php');
    require_once('../models/UsuarioModel.php');
    require_once('../models/PerfilModel.php');
    // require_once('../models/TerceroModel.php');
    // require_once('../models/RolModel.php');
    // $tercero = new TerceroModel();
    // $rol = new RolModel();
    $usuario = new UsuarioModel();
    $perfil = new PerfilModel();
    if ($_GET['fn']) {
        $funcion = $_GET['fn'];
        $data = [];
        
        switch ($funcion) {
            case 'login':
                if ((isset($_POST['usuario']) && $_POST['usuario'] != '') && (isset($_POST['clave']) && $_POST['clave'] != '')) {
                    $usuario->setLoginUsuario($_POST['usuario']);
                    $usuario->setClaveUsuario($_POST['clave']);
                    
                    $datos = $usuario->LogIn();
                    
                    if ($datos) {
                        foreach ($datos as $key => $value) {
                            $_SESSION[$key] = $value;
                        }
                        $data = [
                            'error' => '0',
                            'message' => 'La solicitud se pudo procesar correctamente.',
                            'data' => [$datos]
                        ];
                        echo json_encode($data);
                    } else {
                        $data = [
                            'error' => '1',
                            'message' => 'La solicitud no se pudo procesar.',
                            'data' => []
                        ];
                        session_destroy();
                        echo json_encode($data);
                    }
                } else {
                    $data = [
                        'error' => '2',
                        'message' => 'No se han enviado los datos necesarios para la autenticación.',
                        'data' => []
                    ];
                    session_destroy();
                    echo json_encode($data);
                }
                
                break;
                
            case 'perfil':
                if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] != '' && $_SESSION['id_usuario'] != null) {
                    $perfil->setIdTercero($_SESSION['id_tercero']);
                }
                
                $datos = $perfil->FindProfile();

                // $datos = json_encode($perfil);

                // var_dump($datos);
                // var_dump($perfil);
                // exit();
                    
                if ($datos) {
                    $data = [
                        'error' => '0',
                        'message' => 'La solicitud se pudo procesar correctamente.',
                        'data' => [$datos]
                    ];
                    // var_dump($data);
                    // exit();
                    // echo "hola";
                    echo json_encode($data);
                    return;
                } else {
                    $data = [
                        'error' => '1',
                        'message' => 'Error en la ejecución de su solicitud.',
                        'data' => []
                    ];
                    // var_dump($data);
                    // exit();
                    echo json_encode($data);
                    return;
                }
                // return;
            break;
            
            default:
                // return;
                header('Location: UsuarioController.php');
                break;
        }
    } else {
        // return;
        header('Location: UsuarioController.php?fn=index');
    }
