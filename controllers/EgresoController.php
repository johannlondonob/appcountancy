<?php
  require_once('../config/Db.php');
  require_once('../models/EgresoModel.php');
  session_start();

  $egresoModel = new EgresoModel();

  $error;

  
  if (isset($_GET['fn'])) {
      $accion = $_GET['fn'];
    
      switch ($accion) {
      case 'ver':
      $egresos = $egresoModel -> SelectAll();
      if ($egresos) {
          $datos = [
            "error" => "0",
            "message" => "Éxito",
            "data" => $egresos
          ];
          echo json_encode($datos);
          return;
      }

      $datos = [
        "error" => "0",
        "message" => "Éxito",
        "data" => []
      ];
        echo json_encode($datos);
        return;

      /* $titlePage ='Ver egresos';
      include_once('../views/common/head.php');
      include_once('../views/common/navbar.php');
      include_once('../views/egreso/ver_egresos.php');
      include_once('../views/common/datatables.php');
      include_once('../views/common/bootstrapJS.php'); */
      break;
      
      case 'deleteOnce':
      
    }
  }
