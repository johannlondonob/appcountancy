<?php
  class MensajeroModel
  {
      private $idMensajero;
      private $idTercero;
      public $db;

      public function __construct()
      {
          $this -> db = Db::Conectar();
      }

      public function setIdMensajero($idMensajero)
      {
          $this -> idMensajero = $idMensajero;
      }

      public function setIdTercero($idTercero)
      {
          $this -> idTercero = $idTercero;
      }

      public function getIdMensajero()
      {
          return $this -> idMensajero;
      }

      public function getIdTercero()
      {
          return $this -> idMensajero;
      }

      public function InsertOnce()
      {
          $sql = 'INSERT INTO mensajero VALUES(null, :idTercero)';
          $transaccion = $this->db->prepare($sql);
          $transaccion->bindValue('idTercero', $this->idTercero);
          $transaccion->execute();

          return $transaccion;
      }

      public function SelectAll()
      {
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

      public function Find($idMensajero = null, $idTercero = null)
      {
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

      public function Delete()
      {
          $sql = 'DELETE FROM mensajero WHERE id_mensajero = :idMensajero';
          $transaccion = $this->db->prepare($sql);
          $transaccion->bindValue('idMensajero', $this->idMensajero);
          $transaccion->execute();

          return $transaccion;
      }
  }
