<?php
    /**
     * Clase del modelo Empresa de la base de datos Appcountancy
     *
     * Esta clase se usa para almacenar los datos que recibe de la base de datos
     * de la tabla Empresa.
     *
     * @access public
     * @return EmpresaModel
     */

    class EmpresaModel
    {
        /**
         * Llave primaria del modelo 'idEmpresa'
         *
         * @var int Llave primaria del modelo 'empresa'
         *
         */
        private $idEmpresa;

        /**
         * Columna de la tabla que almacena el NIT o la cédula de la empresa
         *
         * @var string Número de identificación de la persona natural o jurídica
         *
         */
        private $nroIdentificacion;

        /**
         * Columna de la tabla que almacena el nombre de la empresa
         *
         * @var string Nombre de la empresa
         *
         */
        private $razonSocial;

        /**
         * Columna de la tabla que almacena la dirección de la empresa
         *
         * @var string Dirección o ubicación de la empresa
         *
         */
        private $direccion;

        /**
         * Columna de la tabla que almacena la primera opción del número telefónico de la persona o empresa. Es obligatorio
         *
         * @var string Número telefónico de la persona o empresa
         *
         */
        private $telefonoUno;

        /**
         * Columna de la tabla que almacena la segunda opción del número telefónico de la persona o empresa. No es obligatorio
         *
         * @var string Número telefónico de la persona o empresa
         *
         */
        private $telefonoDos;

        /**
         * Columna de la tabla que almacena la primera opción del correo electrónico de la persona o empresa
         *
         * @var string Correo eletrónico de la persona o empresa
         *
         */
        private $emailUno;

        /**
         * Columna de la tabla que almacena la segunda opción del correo electrónico de la persona o empresa
         *
         * @var string Correo eletrónico de la persona o empresa
         *
         */
        private $emailDos;

        /**
         * Columna de la tabla que almacena si la entidad está activa o no
         *
         * @var string Responde a la pregunta si está activo con una 'S' o no, con una 'N'
         *
         */
        private $activo;

        public $db;

        /**
         * Contructor de la clase EmpresaModel
         *
         * Crea un objeto de la clase EmpresaModel
         */
        function __construct () {
          $this -> db = Db::Conectar();
        }

        /**
         * Establecer valor a la llave primaria de la tabla
         *
         * @param int $idEmpresa
         * @return void
         */
        function setIdEmpresa($idEmpresa = NULL) {
            $this -> idEmpresa = $idEmpresa;
        }

        /**
         * Establecer número de identificación
         *
         * @param string $nroIdentificacion Número de la identificación de la persona o empresa
         * @return void
         */
        function setNroIdentificacion($nroIdentificacion) {
            $this -> nroIdentificacion = $nroIdentificacion;
        }

        /**
         * Establecer razón social o nombre de la empresa
         *
         * @param string $razonSocial
         * @return void
         */
        function setRazonSocial($razonSocial) {
            $this -> razonSocial = $razonSocial;
        }

        /**
         * Establecer domicilio de la persona o empresa
         *
         * @param string $direccion
         * @return void
         */
        function setDireccion($direccion) {
            $this -> direccion = $direccion;
        }

        /**
         * Establecer la primera opción del número telefónico de la persona o empresa
         *
         * @param string $telefonoUno
         * @return void
         */
        function setTelefonoUno($telefonoUno) {
            $this -> telefonoUno = $telefonoUno;
        }

        /**
         * Establecer segunda opción del número telefónico de la persona o empresa
         *
         * @param string $telefonoDos
         * @return void
         */
        function setTelefonoDos($telefonoDos = NULL) {
            $this -> telefonoDos = $telefonoDos;
        }

        /**
         * Establecer primera opción del correo electrónico de la persona o empresa
         *
         * @param string $emailUno
         * @return void
         */
        function setEmailUno($emailUno) {
            $this -> emailUno = $emailUno;
        }

        /**
         * Establecer segunda opción del correo electrónico de la persona o empresa
         *
         * @param string $emailDos
         * @return void
         */
        function setEmailDos($emailDos = NULL) {
            $this -> emailDos = $emailDos;
        }

        /**
         * Establecer actividad de la persona o empresa
         *
         * El valor por defecto de esta función es 'S'
         *
         * @param string $activo Si es activo 'S', si no es activo 'N'
         * @return void
         */
        function setActivo($activo = 'S') {

            $this -> activo = $activo;
        }

        /**
         * Obtener clave primaria de la entidad
         *
         * @return string
         */
        function getIdEmpresa() {
            return $this -> idEmpresa;
        }

        /**
         * Obtener el número de identificación de la persona o empresa
         *
         * @return string
         */
        function getNroIdentificacion() {
            return $this -> nroIdentificacion;
        }

        /**
         * Obtener la razón social o nombre de la persona o empresa
         *
         * @return string
         */
        function getRazonSocial() {
            return $this -> razonSocial;
        }

        /**
         * Obtener la dirección o domicilio de la persona o empresa
         *
         * @return string
         */
        function getDireccion() {
            return $this -> direccion;
        }

        /**
         * Obtener la primera opción del número telefónico de la persona o empresa
         *
         * @return string
         */
        function getTelefonoUno() {
            return $this -> telefonoUno;
        }

        /**
         * Obtener la segunda opción del número telefónico de la persona o empresa.
         *
         * @return string
         */
        function getTelefonoDos() {
            return $this -> telefonoDos;
        }

        /**
         * Obtener la primera opción del correo electrónico de la persona o empresa.
         *
         * @return string
         */
        function getEmailUno() {
            return $this -> emailUno;
        }

        /**
         * Obtener la segunda opción del correo eletrónico de la persona o empresa.
         *
         * @return string
         */
        function getEmailDos() {
            return $this -> emailDos;
        }

        /**
         * Obtener el estado de actividad de la persona o empresa
         *
         * @return string
         */
        function getActivo() {
            return $this -> activo;
        }

        function InserOnce($empresaModel)
        {
          $sql = 'INSERT INTO empresa VALUES(NULL, :idEmpresa, :nroIdentificacion, :razonSocial, :direccion, :telefonoUno, :telefonoUno, :emailUno, :emailDos, :activo)';
          $transaccion = $this -> db -> prepare($sql);
        }

    }
