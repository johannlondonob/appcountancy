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

        public function __construct()
        {
            $this->db = Db::Conectar();
        }

        public function setIdDomicilio($idDomicilio)
        {
            $this -> idDomicilio = $idDomicilio;
        }

        public function setFechaDomicilio($fechaDomicilio)
        {
            $this -> fechaDomicilio = $fechaDomicilio;
        }

        public function setNroFactura($nroFactura)
        {
            $this -> nroFactura = $nroFactura;
        }

        public function setValorFactura($valorFactura)
        {
            $this -> valorFactura = $valorFactura;
        }

        public function setIdZona($idZona)
        {
            $this -> idZona = $idZona;
        }

        public function setIdMensajero($idMensajero)
        {
            $this -> idMensajero = $idMensajero;
        }

        public function setIdFormaPago($idFormaPago)
        {
            $this -> idFormaPago = $idFormaPago;
        }

        public function setFechaEntregaDinero($fechaEntregaDinero)
        {
            $this -> fechaEntregaDinero = $fechaEntregaDinero;
        }
        
        public function setObservaciones($observaciones)
        {
            $this -> observaciones = $observaciones;
        }

        public function getIdDomicilio()
        {
            return $this -> idDomicilio;
        }

        public function getFechaDomicilio()
        {
            return $this -> fechaDomicilio;
        }

        public function getNroFactura()
        {
            return $this -> nroFactura;
        }

        public function getValorFactura()
        {
            return $this -> valorFactura;
        }

        public function getIdZona()
        {
            return $this -> idZona;
        }

        public function getIdMensajero()
        {
            return $this -> idMensajero;
        }

        public function getIdFormaPago()
        {
            return $this -> idFormaPago;
        }

        public function getFechaEntregaDomicilio()
        {
            return $this -> fechaEntregaDinero;
        }

        public function getObservaciones()
        {
            return $this -> observaciones;
        }

        public function InsertOnce()
        {
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

        public function FindFactura()
        {
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

        public function Delete()
        {
            $sql = 'DELETE FROM domicilio WHERE id_egreso = :idDomicilio';
            $transaccion = $this->db->prepare($sql);
            $transaccion->bindValue('idDomicilio', $this->idDomicilio);
            $transaccion->execute();

            return $transaccion;
        }
    }
