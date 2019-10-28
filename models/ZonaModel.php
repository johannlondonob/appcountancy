<?php
    class ZonaModel
    {
        private $idZona;
        private $nombreZona;
        private $valorZona;
        private $activoZona;
        public $db;

        function __construct() {
            $this -> db = Db::Conectar();
        }

        function setIdZona($idZona) {
            $this -> idZona = $idZona;
        }

        function setNombreZona($nombreZona) {
            $this -> nombreZona = $nombreZona;
        }

        function setValorZona($valorZona) {
            $this -> valorZona = $valorZona;
        }

        function setActivoZona($activoZona) {
            $this -> activoZona = $activoZona;
        }

        function getIdZona() {
            return $this -> idZona;
        }

        function getNombreZona() {
            return $this -> nombreZona;
        }

        function getValorZona() {
            return $this -> valorZona;
        }

        function getActivoZona() {
            return $this -> activoZona;
        }

        function InsertOnce() {
            $sql = 'INSERT INTO zona VALUES(null, :nombreZona, :valorZona, :activoZona)';
            $transaccion = $this->db->prepare($sql);
            $transaccion->bindValue('nombreZona', $this->getNombreZona());
            $transaccion->bindValue('valorZona', $this->getValorZona());
            $transaccion->bindValue('activoZona', $this->getActivoZona());
            $result = $transaccion->execute();
            return $result;
        }

        function SelectAll() {
            $sql = 'SELECT * FROM zona';
            $transaccion = $this -> db -> prepare($sql);
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

        function Find() {
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
