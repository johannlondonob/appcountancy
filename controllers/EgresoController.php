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
      break;
      
      case 'eliminar':
        if (isset($_POST) && $_POST['id'] != null && $_POST['id'] != '') {
            $egresoModel->setIdGasto($_POST['id']);
            $egresoModel->Delete();
            if ($egresoModel) {
                $datos = [
                "error" => "0",
                "message" => "Eliminación exitosa.",
                "data" => []
              ];
                echo json_encode($datos);
                return;
            } else {
                $datos = [
                "error" => "1",
                "message" => "La eliminación no se realizó.",
                "data" => []
              ];
                echo json_encode($datos);
                return;
            }
        }
      break;
      
    }
  }
