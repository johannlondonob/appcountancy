<?php
    class EgresoModel
    {
        private $idGasto;
        private $fechaGasto;
        private $conceptoGasto;
        private $valorGasto;
        private $observacionGasto;
        public $db;

        function __construct() {
            $this->db = Db::Conectar();
            
        }

        function setIdGasto($idGasto) {
            $this->idGasto = $idGasto;
        }

        function setFechaGasto($fechaGasto) {
            $this->fechaGasto = $fechaGasto;
        }

        function setConceptoGasto($conceptoGasto) {
            $this->conceptoGasto = $conceptoGasto;
        }

        function setValorGasto($valorGasto) {
            $this->valorGasto = $valorGasto;
        }

        function setObservacionGasto($observacionGasto) {
            $this->observacionGasto = $observacionGasto;
        }

        function getIdGasto() {
            return $this->idGasto;
        }

        function getFechaGasto() {
            return $this->fechaGasto;
        }

        function getConceptoGasto() {
            return $this->conceptoGasto;
        }

        function getValorGasto() {
            return $this->valorGasto;
        }

        function getObservacionGasto() {
            return $this->observacionGasto;
        }

        function InsertOnce() {
            $instruccionSql = 'INSERT INTO egreso(id_gasto, fecha_gasto, concepto_gasto, valor_gasto, observacion_gasto)
                                VALUES(:idGasto, :fechaGasto, :conceptoGasto, :valorGasto, :observacionGasto)';
            $transaccion = $this->db->prepare($instruccionSql);
            $transaccion->bindValue('idGasto', $this->getIdGasto());
            $transaccion->bindValue('fechaGasto', $this->getFechaGasto());
            $transaccion->bindValue('conceptoGasto', $this->getConceptoGasto());
            $transaccion->bindValue('valorGasto', $this->getValorGasto());
            $transaccion->bindValue('observacionGasto', $this->getObservacionGasto());
            return $transaccion->execute();
        }

        function SelectAll() {
            $instruccionSql = 'SELECT * FROM egreso';
            $transaccion = $this->db->prepare($instruccionSql);
            $transaccion->execute();

            $egresoModel = [];

            foreach ($transaccion as $key) {
                $receptorValores = new EgresoModel();

                $receptorValores->setIdGasto($key['id_gasto']);
                $receptorValores->setFechaGasto($key['fecha_gasto']);
                $receptorValores->setConceptoGasto($key['concepto_gasto']);
                $receptorValores->setValorGasto($key['valor_gasto']);
                $receptorValores->setObservacionGasto($key['observacion_gasto']);

                $egresoModel[] = $receptorValores;
            }
            return $egresoModel;
        }
    }
