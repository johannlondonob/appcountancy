<?php
  session_start();
  require_once '../config/Db.php';
  require_once '../models/ReporteDomicilio.php';
  require_once '../models/DomicilioModel.php';
  
  $rDomicilio = new ReporteDomicilio();
  $domicilio = new DomicilioModel();
  
  if (isset($_GET['fn'])) {
    $funcion = $_GET['fn'];
  
    switch ($funcion) {
      case 'selectAll':
        $titlePage = 'Ver egresos';
        $nombreRol = $_SESSION['nombreRol'];
        $domicilio = $rDomicilio->GenerateReport();
        include_once '../views/common/head.php';
        include_once '../views/common/navbar.php';
        include_once '../views/domicilio/domicilios.php';
        include_once '../views/common/datatables.php';
        include_once '../views/common/bootstrapJS.php';

        break;
  
      default:
        break;
    }
  }