<?php
    class EgresoModel
    {
        private $idGasto;
        private $fechaGasto;
        private $conceptoGasto;
        private $valorGasto;
        private $observacionGasto;
        public $db;

        public function __construct()
        {
            $this->db = Db::Conectar();
        }

        public function setIdGasto($idGasto)
        {
            $this->idGasto = $idGasto;
        }

        public function setFechaGasto($fechaGasto)
        {
            $this->fechaGasto = $fechaGasto;
        }

        public function setConceptoGasto($conceptoGasto)
        {
            $this->conceptoGasto = $conceptoGasto;
        }

        public function setValorGasto($valorGasto)
        {
            $this->valorGasto = $valorGasto;
        }

        public function setObservacionGasto($observacionGasto)
        {
            $this->observacionGasto = $observacionGasto;
        }

        public function getIdGasto()
        {
            return $this->idGasto;
        }

        public function getFechaGasto()
        {
            return $this->fechaGasto;
        }

        public function getConceptoGasto()
        {
            return $this->conceptoGasto;
        }

        public function getValorGasto()
        {
            return $this->valorGasto;
        }

        public function getObservacionGasto()
        {
            return $this->observacionGasto;
        }

        public function InsertOnce()
        {
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

        public function SelectAll()
        {
            $instruccionSql = 'SELECT * FROM egreso';
            $transaccion = $this->db->prepare($instruccionSql);
            $transaccion->execute();
            $datos = $transaccion->fetchAll(PDO::FETCH_ASSOC);

            if ($datos) {
                return $datos;
            } else {
                return false;
            }
        }

        public function Delete()
        {
            $sql = 'DELETE FROM egreso WHERE id_gasto = :idGasto';
            $transaccion = $this->db->prepare($sql);
            $transaccion->bindValue('idGasto', $this->idGasto);
            $transaccion->execute();
            return $transaccion;
        }
    }
