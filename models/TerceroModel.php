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

        public function __construct()
        {
            $this -> db = Db::Conectar();
        }

        public function setIdTercero($idTercero)
        {
            $this -> idTercero = $idTercero;
        }

        public function setNroIdentificacion($nroIdentificacion)
        {
            $this -> nroIdentificacion = $nroIdentificacion;
        }

        public function setPrimerNombre($primerNombre)
        {
            $this -> primerNombre = $primerNombre;
        }

        public function setSegundoNombre($segundoNombre)
        {
            $this -> segundoNombre = $segundoNombre;
        }

        public function setPrimerApellido($primerApellido)
        {
            $this -> primerApellido = $primerApellido;
        }

        public function setSegundoApellido($segundoApellido)
        {
            $this -> segundoApellido = $segundoApellido;
        }

        public function setTelefonoUno($telefonoUno)
        {
            $this -> telefonoUno = $telefonoUno;
        }

        public function setTelefonoDos($telefonoDos)
        {
            $this -> telefonoDos = $telefonoDos;
        }

        public function setEmail($email)
        {
            $this -> email = $email;
        }

        public function setActivo($activo)
        {
            $this -> activo = $activo;
        }

        public function getIdTercero()
        {
            return $this -> idTercero;
        }

        public function getNroIdentificacion()
        {
            return $this -> nroIdentificacion;
        }

        public function getPrimerNombre()
        {
            return $this -> primerNombre;
        }

        public function getSegundoNombre()
        {
            return $this -> segundoNombre;
        }

        public function getPrimerApellido()
        {
            return $this -> primerApellido;
        }

        public function getSegundoApellido()
        {
            return $this -> segundoApellido;
        }

        public function getTelefonoUno()
        {
            return $this -> telefonoUno;
        }

        public function getTelefonoDos()
        {
            return $this -> telefonoDos;
        }

        public function getEmail()
        {
            return $this -> email;
        }

        public function getActivo()
        {
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
        public function Find()
        {
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

        public function SelectAll()
        {
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
