<?php
  class MensajeroModel
  {
    private $idMensajero;
    private $idTercero;
    public $db;

    function __construct() {
      $this -> db = Db::Conectar();
    }

    function setIdMensajero($idMensajero) {
      $this -> idMensajero = $idMensajero;
    }

    function setIdTercero($idTercero) {
      $this -> idTercero = $idTercero;
    }

    function getIdMensajero() {
      return $this -> idMensajero;
    }

    function getIdTercero() {
      return $this -> idMensajero;
    }

    function InsertOnce() {
      $sql = 'INSERT INTO mensajero VALUES(null, :idTercero)';
      $transaccion = $this->db->prepare($sql);
      $transaccion->bindValue('idTercero', $this->idTercero);
      $transaccion->execute();

      return $transaccion;
    }

    function SelectAll() {
      $sql = 'SELECT * FROM mensajero';
      $transaccion = $this -> db -> prepare($sql);
      $transaccion -> execute();

      $mensajeroModel = [];

      foreach ($transaccion as $key) {
        $mensajerito = new MensajeroModel();
        $mensajerito -> setIdMensajero($key['id_mensajero']);
        $mensajerito -> setIdTercero($key['id_tercero']);

        $mensajeroModel[] = $mensajerito;
      }
      return $mensajeroModel;
    }

    function Find($idMensajero = null, $idTercero = null) {
      $sql = 'SELECT * FROM mensajero WHERE id_mensajero = :idMensajero OR id_tercero = :idTercero';
      $transaccion = $this -> db -> prepare($sql);
      $transaccion -> bindValue('idMensajero', $idMensajero);
      $transaccion -> bindValue('idTercero', $idTercero);
      $transaccion -> execute();

      $mensajeroModel = [];

      foreach ($transaccion as $key) {
        $mensajerito = new MensajeroModel();
        $mensajerito -> setIdMensajero($key['id_mensajero']);
        $mensajerito -> setIdTercero($key['id_tercero']);

        $mensajeroModel[] = $mensajerito;
      }
      return $mensajeroModel;
    }
  }
