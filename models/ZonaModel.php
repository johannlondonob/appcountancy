<?php
    class ZonaModel
    {
        private $idZona;
        private $nombreZona;
        private $valorZona;
        private $activoZona;
        public $db;

        public function __construct()
        {
            $this -> db = Db::Conectar();
        }

        public function setIdZona($idZona)
        {
            $this -> idZona = $idZona;
        }

        public function setNombreZona($nombreZona)
        {
            $this -> nombreZona = $nombreZona;
        }

        public function setValorZona($valorZona)
        {
            $this -> valorZona = $valorZona;
        }

        public function setActivoZona($activoZona)
        {
            $this -> activoZona = $activoZona;
        }

        public function getIdZona()
        {
            return $this -> idZona;
        }

        public function getNombreZona()
        {
            return $this -> nombreZona;
        }

        public function getValorZona()
        {
            return $this -> valorZona;
        }

        public function getActivoZona()
        {
            return $this -> activoZona;
        }

        public function InsertOnce()
        {
            $sql = 'INSERT INTO zona VALUES(null, :nombreZona, :valorZona, :activoZona)';
            $transaccion = $this->db->prepare($sql);
            $transaccion->bindValue('nombreZona', $this->getNombreZona());
            $transaccion->bindValue('valorZona', $this->getValorZona());
            $transaccion->bindValue('activoZona', $this->getActivoZona());
            $result = $transaccion->execute();
            return $result;
        }

        public function SelectAll()
        {
            $sql = 'SELECT * FROM zona';
            $transaccion = $this -> db -> prepare($sql);
            $transaccion -> execute();
            
            if ($transaccion) {
                return $transaccion->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }

            /* $zonaModel = [];

            foreach ($transaccion as $zona) {
                $zone = new ZonaModel();

                $zone -> setIdZona($zona['id_zona']);
                $zone -> setNombreZona($zona['nombre_zona']);
                $zone -> setValorZona($zona['valor_zona']);

                $zonaModel[] = $zone;
            }
            return $zonaModel; */
        }

        public function Find()
        {
            $sql = 'SELECT * FROM zona WHERE id_zona = :idZona';
            $transaccion = $this -> db -> prepare($sql);
            $transaccion -> bindValue('idZona', $this->idZona);
            $transaccion -> execute();

            $zonaModel = [];

            foreach ($transaccion as $zona) {
                $zone = new ZonaModel();

                $zone -> setIdZona($zona['id_zona']);
                $zone -> setNombreZona($zona['nombre_zona']);
                $zone -> setValorZona($zona['valor_zona']);

                $zonaModel[] = $zone;
            }
            return $zonaModel;
        }
    }
