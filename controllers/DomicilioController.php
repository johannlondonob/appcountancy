<?php
  require_once '../config/Db.php';
  require_once '../models/ReporteDomicilio.php';
  require_once '../models/DomicilioModel.php';

  $rDomicilio = new ReporteDomicilio();
  $domicilio = new DomicilioModel();

  if (isset($_POST['logDomicilio'])) {

    $fechaActualDomicilio = $_POST['fechaDomicilio'];
    $fechaAsignadaDomicilio = $_POST['fechaEntregaDineroDomicilio'];

    if (strlen($fechaAsignadaDomicilio) > 0) {      
      if ($fechaActualDomicilio > $fechaAsignadaDomicilio) {
        header('Location: ../views/domicilio/nuevo_domicilio.php');
      }
    }

    $nroFactura = $_POST['nroFacturaDomicilio'];
    $existeFactura = $domicilio->FindFactura($nroFactura);

    if(isset($existeFactura) && count($existeFactura)) {
      header('Location: ../views/domicilio/nuevo_domicilio.php');
    }

    if (strlen($fechaAsignadaDomicilio) == 0) {
      $domicilio->setFechaEntregaDinero(null);
    } else {
      $domicilio->setFechaEntregaDinero($_POST['fechaEntregaDineroDomicilio']);
    }

    $domicilio->setFechaDomicilio($fechaActualDomicilio);
    $domicilio->setNroFactura($_POST['nroFacturaDomicilio']);
    $domicilio->setValorFactura($_POST['valorFacturaDomicilio']);
    $domicilio->setIdZona($_POST['zonaDomicilio']);
    $domicilio->setIdMensajero($_POST['mensajeroDomicilio']);
    $domicilio->setIdFormaPago($_POST['formaPagoDomicilio']);
    $domicilio->setObservaciones($_POST['observacionDomicilio']);

    $result = $domicilio->InsertOnce($domicilio);

    if ($result) {
      header('Location: ../views/usuario/index.php');
    } else {
      echo 'Error al procesar la solicitud. Consulte con el administrador.';
    }

  }

  if (isset($_GET['fn'])) {
    $funcion = $_GET['fn'];

    switch ($funcion) {
      case 'selectAll':

        $domicilio = $rDomicilio->GenerateReport();
        include_once '../views/domicilio/domicilios.php';
        break;

      default:
        // code...
        break;
    }
  }

  
