<?php
require_once '../models/DomicilioModel.php';

    class ReporteDomicilio extends DomicilioModel
    {
        private $nombreZona;
        private $nombreMedioPago;
        private $nombreMensajero;
        public $db;

        public function __construct()
        {
            $this -> db = Db::Conectar();
        }

        public function setNombreZona($nombreZona)
        {
            $this -> nombreZona = $nombreZona;
        }

        public function setNombreMensajero($nombreMensajero)
        {
            $this -> nombreMensajero = $nombreMensajero;
        }

        public function setNombreMedioPago($nombreMedioPago)
        {
            $this -> nombreMedioPago = $nombreMedioPago;
        }

        public function getNombreZona()
        {
            return $this -> nombreZona;
        }

        public function getNombreMensajero()
        {
            return $this -> nombreMensajero;
        }

        public function getNombreMedioPAgo()
        {
            return $this -> nombreMedioPago;
        }

        public function GenerateReport()
        {
            $sql = 'SELECT * FROM domicilio INNER JOIN mensajero ON domicilio.id_mensajero = mensajero.id_mensajero INNER JOIN forma_pago ON domicilio.id_forma_pago = forma_pago.id_forma_pago INNER JOIN zona ON domicilio.id_zona = zona.id_zona INNER JOIN tercero ON mensajero.id_tercero = tercero.id_tercero';

            $transaccion = $this -> db -> prepare($sql);

            $transaccion->execute();

            if ($transaccion) {
                return $transaccion->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }

            /* $domicilios = [];
            foreach ($transaccion as $key) {
                $domicilio = new ReporteDomicilio();

                $domicilio -> setIdDomicilio($key['id_domicilio']);
                $domicilio -> setFechaDomicilio($key['fecha_domicilio']);
                $domicilio -> setNroFactura($key['nro_factura']);
                $domicilio -> setValorFactura($key['valor_factura']);
                $domicilio -> setIdZona($key['id_zona']);
                $domicilio -> setIdMensajero($key['id_mensajero']);
                $domicilio -> setIdFormaPago($key['id_forma_pago']);
                $domicilio -> setFechaEntregaDinero($key['fecha_entrega_dinero']);
                $domicilio -> setObservaciones($key['observaciones']);
                $domicilio -> setNombreZona($key['nombre_zona']);
                $domicilio -> setNombreMensajero($key['primer_nombre'] . ' ' . $key['primer_apellido']);
                $domicilio -> setNombreMedioPago($key['nombre_pago']);

                $domicilios[] = $domicilio;
            }
            return $domicilios; */
        }
    }
