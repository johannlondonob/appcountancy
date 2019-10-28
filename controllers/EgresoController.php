<?php
  require_once('../config/Db.php');
  require_once('../models/EgresoModel.php');

  $egresoModel = new EgresoModel();

  $error;

  if (isset($_POST['logGasto'])) {

    $fechaGasto = $_POST['fechaGasto'];
    $conceptoGasto = $_POST['conceptoGasto'];
    $valorGasto = $_POST['valorGasto'];
    $observacionGasto = $_POST['observacionGasto'];

    // Se evalúa si por alguna razón la fecha es mayor o menor a la actual, pues, para un cuadre diario es imprescindible
    // que los gastos correspondan al mismo día
    if (isset($fechaGasto) && $fechaGasto === date('Y-m-d')) {
      if (isset($conceptoGasto) && isset($valorGasto)) {
        $error = '-1';     
      } else {
        $error = '1';
      }
    } else {
      $error = '0';
    }

    switch ($error) {
      case '-1':        
        $egresoModel -> setFechaGasto($fechaGasto);
        $egresoModel -> setConceptoGasto($conceptoGasto);
        $egresoModel -> setValorGasto($valorGasto);
        $egresoModel -> setObservacionGasto($observacionGasto);

        $error = $egresoModel -> InsertOnce($egresoModel);

        if ($error) {
          header('Location: ../views/egreso/nuevo_egreso.php');
        } else {
          echo 'Error al insertar';
        }
        break;

      case '0':
        echo 'Error en la fecha. No se asignó o es mayor o menor a la de hoy, ' . date('Y-m-d');
        header('Location: ../views/egreso/control_egreso.php');
        break;

      case '1':
        echo 'Error en los campos Concepto y Valor del gasto.';
        header('Location: ../views/egreso/control_egreso.php');
        break;  
            
      default:
        echo 'Consulte con el administrador del sistema';
        break;
    }

  }

  if (isset($_GET['fn'])) {
      $accion = $_GET['fn'];

      switch ($accion) {
        case 'selectAll':
          $arrayEgreso = $egresoModel -> SelectAll();
          include_once('../views/egreso/ver_egresos.php');
          break;
          
        case 'deleteOnce':
          
      }
    }