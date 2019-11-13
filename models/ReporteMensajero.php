<?php
  require_once 'MensajeroModel.php';

  class ReporteMensajero extends MensajeroModel
  {
      private $nombresMensajero;
      private $apellidosMensajero;
      public $db;

      public function __construct()
      {
          $this -> db = Db::Conectar();
      }
    
      public function setNombresMensajero($nombresMensajero)
      {
          $this -> nombresMensajero = $nombresMensajero;
      }

      public function setApellidosMensajero($apellidosMensajero)
      {
          $this -> apellidosMensajero = $apellidosMensajero;
      }

      public function getNombresMensajero()
      {
          return $this -> nombresMensajero;
      }

      public function getApellidosMensajero()
      {
          return $this -> apellidosMensajero;
      }

      public function SelectAll()
      {
          $sql = 'SELECT * FROM mensajero INNER JOIN tercero ON mensajero.id_tercero = tercero.id_tercero';
          $transaccion = $this -> db -> prepare($sql);
          $transaccion -> execute();

          if ($transaccion) {
              return $transaccion->fetchAll(PDO::FETCH_ASSOC);
          } else {
              return false;
          }
      

          /* $mensajero = [];

          foreach ($transaccion as $key) {
            $mensajerito = new ReporteMensajero();

            $mensajerito->setIdTercero($key['id_tercero']);
            $mensajerito->setIdMensajero($key['id_mensajero']);
            $mensajerito->setNombresMensajero($key['primer_nombre'].' '.$key['segundo_nombre']);
            $mensajerito->setApellidosMensajero($key['primer_apellido'].' '.$key['segundo_apellido']);

            $mensajero[] = $mensajerito;
          }
          return $mensajero; */
      }
  }
