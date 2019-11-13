<?php
  require_once '../config/Db.php';
  require_once '../models/ZonaModel.php';

  $zona = new ZonaModel();

  if (isset($_GET['fn']) && !empty($_GET)) {
      $funcion = $_GET['fn'];

      switch ($funcion) {
        case 'ver':
          $datos = $zona->SelectAll();
          if ($datos) {
              $data = [
              "error" => "0",
              "message" => "Exito",
              "data" => $datos
            ];
              echo json_encode($data);
              return;
          } else {
              $data = [
              "error" => "1",
              "message" => "Error",
              "data" => []
            ];
              echo json_encode($data);
              return;
          }
          
          break;
        
        default:
          
          break;
    }
  }
