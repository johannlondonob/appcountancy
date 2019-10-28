<?php
  require_once '../config/Db.php';
  require_once '../models/MensajeroModel.php';

  $mensajero = new MensajeroModel();

  if ($_POST['logMensajero']) {
    $idTercero = $_POST['mensajeroDomicilio'];
    
    $result = $mensajero->Find(null,$idTercero);
    
    if(isset($result) && count($result)) {
      header('Location: ../views/mensajero/nuevo_mensajero.php');
    } else {
      $mensajero = $mensajero->InsertOnce($idTercero);

      if ($mensajero) {
        header('Location: ../views/usuario/index.php');
      } else {
        echo 'Error al procesar su solicitud. Consulte con el administrador.';
      }
    }

    
  }