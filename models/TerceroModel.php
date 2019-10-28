<?php
    class TerceroModel
    {
        private $idTercero;
        private $nroIdentificacion;
        private $primerNombre;
        private $segundoNombre;
        private $primerApellido;
        private $segundoApellido;
        private $telefonoUno;
        private $telefonoDos;
        private $email;
        private $activo;
        public $db;

        function __construct() {
            $this -> db = Db::Conectar();
        }

        function setIdTercero($idTercero = NULL) {
            $this -> idTercero = $idTercero;
        }

        function setNroIdentificacion($nroIdentificacion) {
            $this -> nroIdentificacion = $nroIdentificacion;
        }

        function setPrimerNombre($primerNombre) {
            $this -> primerNombre = $primerNombre;
        }

        function setSegundoNombre($segundoNombre = NULL) {
            $this -> segundoNombre = $segundoNombre;
        }

        function setPrimerApellido($primerApellido) {
            $this -> primerApellido = $primerApellido;
        }

        function setSegundoApellido($segundoApellido = NULL) {
            $this -> segundoApellido = $segundoApellido;
        }

        function setTelefonoUno($telefonoUno) {
            $this -> telefonoUno = $telefonoUno;
        }

        function setTelefonoDos($telefonoDos = NULL) {
            $this -> telefonoDos = $telefonoDos;
        }

        function setEmail($email) {
            $this -> email = $email;
        }

        function setActivo($activo) {
            $this -> activo = $activo;
        }

        function getIdTercero() {
            return $this -> idTercero;
        }

        function getNroIdentificacion() {
            return $this -> nroIdentificacion;
        }

        function getPrimerNombre() {
            return $this -> primerNombre;
        }

        function getSegundoNombre() {
            return $this -> segundoNombre;
        }

        function getPrimerApellido() {
            return $this -> primerApellido;
        }

        function getSegundoApellido() {
            return $this -> segundoApellido;
        }

        function getTelefonoUno() {
            return $this -> telefonoUno;
        }

        function getTelefonoDos() {
            return $this -> telefonoDos;
        }

        function getEmail() {
            return $this -> email;
        }

        function getActivo() {
            return $this -> activo;
        }

        /**
         * Buscar un tercero por su id
         *
         * Esta función permite buscar en la tabla tercero de la base de datos,
         * a la entidad cuyo id se le pase a la función como argumento.
         *
         * @param string $idTercero Dígito único del tercero. Siempre de la clave primaria.
         * @return TerceroModel
         */
        function Find() {

            $instruccionSql = 'SELECT * FROM tercero WHERE id_tercero = :idTercero';
            $transaccion = $this -> db -> prepare($instruccionSql);
            $transaccion -> bindValue('idTercero', $this->idTercero);
            $transaccion -> execute();

            $tercero = [];

            foreach ($transaccion as $key) {
                $receptorTercero = new TerceroModel();

                $receptorTercero -> setIdTercero($key['id_tercero']);
                $receptorTercero -> setNroIdentificacion($key['nro_identificacion']);
                $receptorTercero -> setPrimerNombre($key['primer_nombre']);
                $receptorTercero -> setSegundoNombre($key['segundo_nombre']);
                $receptorTercero -> setPrimerApellido($key['primer_apellido']);
                $receptorTercero -> setSegundoApellido($key['segundo_apellido']);
                $receptorTercero -> setTelefonoUno($key['telefono_uno']);
                $receptorTercero -> setTelefonoDos($key['telefono_dos']);
                $receptorTercero -> setEmail($key['email']);
                $receptorTercero -> setActivo($key['activo']);

                $tercero[] = $receptorTercero;
            }
            return $tercero;
        }

        function SelectAll() {

            $instruccionSql = 'SELECT * FROM tercero';

            $transaccion = $this -> db -> prepare($instruccionSql);

            $transaccion -> execute();

            $tercero = [];

            foreach ($transaccion as $key) {
                $receptorTercero = new TerceroModel();

                $receptorTercero -> setIdTercero($key['id_tercero']);
                $receptorTercero -> setNroIdentificacion($key['nro_identificacion']);
                $receptorTercero -> setPrimerNombre($key['primer_nombre']);
                $receptorTercero -> setSegundoNombre($key['segundo_nombre']);
                $receptorTercero -> setPrimerApellido($key['primer_apellido']);
                $receptorTercero -> setSegundoApellido($key['segundo_apellido']);
                $receptorTercero -> setTelefonoUno($key['telefono_uno']);
                $receptorTercero -> setTelefonoDos($key['telefono_dos']);
                $receptorTercero -> setEmail($key['email']);
                $receptorTercero -> setActivo($key['activo']);

                $tercero[] = $receptorTercero;
            }
            return $tercero;
        }
    }
