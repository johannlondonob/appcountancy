<?php
  require_once('../config/Db.php');
  require_once('../models/EgresoModel.php');
  session_start();

  $egresoModel = new EgresoModel();

  $error;

  
  if (isset($_GET['fn'])) {
    $accion = $_GET['fn'];
    
    switch ($accion) {
      case 'selectAll':
      $arrayEgreso = $egresoModel -> SelectAll();
      $nombreRol = $_SESSION['nombreRol'];
      $titlePage ='Ver egresos';
      include_once('../views/common/head.php');
      include_once('../views/common/navbar.php');
      include_once('../views/egreso/ver_egresos.php');
      include_once('../views/common/datatables.php');
      include_once('../views/common/bootstrapJS.php');
      break;
      
      case 'deleteOnce':
      
    }
  }