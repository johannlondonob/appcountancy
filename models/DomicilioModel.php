<?php
    class DomicilioModel
    {
        private $idDomicilio;
        private $fechaDomicilio;
        private $nroFactura;
        private $valorFactura;
        private $idZona;
        private $idMensajero;
        private $idFormaPago;
        private $fechaEntregaDinero;
        private $observaciones;
        private $db;

        function __construct() {
          $this->db = Db::Conectar();
        }

        function setIdDomicilio($idDomicilio) {
            $this -> idDomicilio = $idDomicilio;
        }

        function setFechaDomicilio($fechaDomicilio) {
            $this -> fechaDomicilio = $fechaDomicilio;
        }

        function setNroFactura($nroFactura) {
            $this -> nroFactura = $nroFactura;
        }

        function setValorFactura($valorFactura) {
            $this -> valorFactura = $valorFactura;
        }

        function setIdZona($idZona) {
            $this -> idZona = $idZona;
        }

        function setIdMensajero($idMensajero) {
            $this -> idMensajero = $idMensajero;
        }

        function setIdFormaPago($idFormaPago) {
            $this -> idFormaPago = $idFormaPago;
        }

        function setFechaEntregaDinero($fechaEntregaDinero) {
            $this -> fechaEntregaDinero = $fechaEntregaDinero;
        }
        
        function setObservaciones($observaciones) {
            $this -> observaciones = $observaciones;
        }

        function getIdDomicilio() {
            return $this -> idDomicilio;
        }

        function getFechaDomicilio() {
            return $this -> fechaDomicilio;
        }

        function getNroFactura() {
            return $this -> nroFactura;
        }

        function getValorFactura() {
            return $this -> valorFactura;
        }

        function getIdZona() {
            return $this -> idZona;
        }

        function getIdMensajero() {
            return $this -> idMensajero;
        }

        function getIdFormaPago() {
            return $this -> idFormaPago;
        }

        function getFechaEntregaDomicilio() {
            return $this -> fechaEntregaDinero;
        }

        function getObservaciones() {
            return $this -> observaciones;
        }

        function InsertOnce() {
            $sql = 'INSERT INTO domicilio VALUES(null, :fechaDomicilio, :nroFactura, :valorFactura, :idZona, :idMensajero, :idFormaPago, :fechaEntregaDinero, :observaciones)';

            $transaccion = $this -> db -> prepare($sql);
            $transaccion->bindValue('fechaDomicilio', $this->getFechaDomicilio());
            $transaccion->bindValue('nroFactura', $this->getNroFactura());
            $transaccion->bindValue('valorFactura', $this->getValorFactura());
            $transaccion->bindValue('idZona', $this->getIdZona());
            $transaccion->bindValue('idMensajero', $this->getIdMensajero());
            $transaccion->bindValue('idFormaPago', $this->getIdFormaPago());
            $transaccion->bindValue('fechaEntregaDinero', $this->getFechaEntregaDomicilio());
            $transaccion->bindValue('observaciones', $this->getObservaciones());

            $transaccion->execute();

            return $transaccion;

        }

        function FindFactura() {
            $sql = 'SELECT * FROM domicilio WHERE nro_factura = :nroFactura';

            $transaccion = $this -> db -> prepare($sql);
            $transaccion->bindValue('nroFactura', $this->nroFactura);
            $transaccion->execute();

            $arrayFactura = [];
            foreach ($transaccion as $key) {
                $factura = new DomicilioModel();
                $factura->setNroFactura($key['nro_factura']);

                $arrayFactura[] = $factura;
            }
            return $arrayFactura;
        }

     //        // function SelectAll() {
                //     $sql = 'SELECT * FROM domicilio';
                //     $transaccion = $this -> db -> prepare($sql);
                //     $transaccion -> execute();
        // 
                //     $domicilioModel = [];
        // 
                //     foreach ($transaccion as $domicilio) {
                //         $domi = new DomicilioModel();
        // 
                //         $domi -> setIdDomicilio($domicilio['id_domicilio']);
                //         $domi -> setFechaDomicilio($domicilio['fecha_domicilio']);
                //         $domi -> setNroFactura($domicilio['nro_factura']);
                //         $domi -> setValorDomicilio($domicilio['valor_factura']);
                //         $domi -> setIdZona($domicilio['id_zona']);
                //         $domi -> setIdMensajero($domicilio['id_mensajero']);
                //         $domi -> setIdFormaPago($domicilio['id_forma_pago']);
                //         $domi -> setFechaEntregaDinero($domicilio['fecha_entrega_dinero']);
        // 
                //         $domicilioModel[] = $domi;
                //     }
                //     return $domicilioModel;
                // }
    }
