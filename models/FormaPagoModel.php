<?php
    class FormaPagoModel
    {
        private $idFormaPago;
        private $nombrePago;
        public $db;

        function __construct() {
          $this->db = Db::Conectar();
        }

        function setIdFormaPago($idFormaPago) {
            $this -> idFormaPago = $idFormaPago;
        }

        function setNombrePago($nombrePago) {
            $this -> nombrePago = $nombrePago;
        }

        function getIdFormaPago() {
            return $this -> idFormaPago;
        }

        function getNombrePago() {
            return $this -> nombrePago;
        }

        function SelectAll() {
          $sql = 'SELECT * FROM forma_pago';
          $transaccion = $this -> db -> prepare($sql);
          $transaccion -> execute();

          $formaPagoModel = [];

          foreach ($transaccion as $key) {
            $modoPago = new FormaPagoModel();

            $modoPago -> setIdFormaPago($key['id_forma_pago']);
            $modoPago -> setNombrePago($key['nombre_pago']);

            $formaPagoModel[] = $modoPago;
          }
          return $formaPagoModel;
        }

        function Find() {
          $sql = 'SELECT * FROM forma_pago WHERE id_forma_pago = :idFormaPago';
          $transaccion = $this -> db -> prepare($sql);
          $transaccion -> bindValue('idFormaPago', $this->idFormaPago);
          $transaccion -> execute();

          $formaPagoModel = [];

          foreach ($transaccion as $key) {
            $modoPago = new FormaPagoModel();

            $modoPago -> setIdFormaPago($key['id_forma_pago']);
            $modoPago -> setNombrePago($key['nombre_pago']);

            $formaPagoModel[] = $modoPago;
          }
          return $formaPagoModel;
        }
    }
