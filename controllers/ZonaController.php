<?php
  require_once '../config/Db.php';
  require_once '../models/ZonaModel.php';

  $zona = new ZonaModel();

  if($_POST['logZona']) {
    $zona->setNombreZona($_POST['nombreZona']);
    $zona->setValorZona($_POST['valorZona']);
    $zona->setActivoZona($_POST['activoZona']);

    $result = $zona->InsertOnce($zona);
    if($result){
      header('Location: ../views/usuario/index.php');
    } else {
      echo 'Error el procesar su solicitud. Consulte con el administrador.';
    }
  }
