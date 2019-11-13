<?php
  session_start();
  require_once '../config/Db.php';
  require_once '../models/ReporteDomicilio.php';
  require_once '../models/DomicilioModel.php';
  
  $reporteDomicilio = new ReporteDomicilio();
  // $domicilio = new DomicilioModel();
  
  if (isset($_GET['fn'])) {
      $funcion = $_GET['fn'];
  
      switch ($funcion) {
      case 'ver':
        $reporteDomicilio = $reporteDomicilio->GenerateReport();

        if (! empty($reporteDomicilio)) {
            $data = [
            "error" => "0",
            "message" => "Consulta exitosa.",
            "data" => $reporteDomicilio
          ];
            echo json_encode($data);
            return;
        } else {
            $data = [
                "error" => "1",
                "message" => "Consulta no resuelta.",
                "data" => $reporteDomicilio
              ];
            echo  json_encode($data);
            return;
        }
        break;
  
      default:
        break;
    }
  }
