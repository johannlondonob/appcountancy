<?php
  require_once 'MensajeroModel.php';

  class ReporteMensajero extends MensajeroModel
  {
    private $nombresMensajero;
    private $apellidosMensajero;
    public $db;

    function __construct() {
      $this -> db = Db::Conectar();
    }
    
    function setNombresMensajero($nombresMensajero) {
      $this -> nombresMensajero = $nombresMensajero;
    }

    function setApellidosMensajero($apellidosMensajero) {
      $this -> apellidosMensajero = $apellidosMensajero;
    }

    function getNombresMensajero() {
      return $this -> nombresMensajero;
    }

    function getApellidosMensajero() {
      return $this -> apellidosMensajero;
    }

    function SelectAll() {
      $sql = 'SELECT * FROM mensajero INNER JOIN tercero ON mensajero.id_tercero = tercero.id_tercero';
      $transaccion = $this -> db -> prepare($sql);
      $transaccion -> execute();

      $mensajero = [];

      foreach ($transaccion as $key) {
        $mensajerito = new ReporteMensajero();

        $mensajerito->setIdTercero($key['id_tercero']);
        $mensajerito->setIdMensajero($key['id_mensajero']);
        $mensajerito->setNombresMensajero($key['primer_nombre'].' '.$key['segundo_nombre']);
        $mensajerito->setApellidosMensajero($key['primer_apellido'].' '.$key['segundo_apellido']);

        $mensajero[] = $mensajerito;
      }
      return $mensajero;
    }
  }
