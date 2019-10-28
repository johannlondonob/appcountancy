<?php
    /**
     * 
     * Clase del modelo Rol de la base de datos Appcountancy
     * 
     * Esta clase se usa para almacenar los datos que recibe de la base de datos
     * de la tabla Rol.
     * 
     * @access public
     * @return RolModel
     */

    class RolModel
    {
        private $idRol;
        private $nombre;
        private $descripcion;
        public $db;

        function __construct() {
            $this -> db = Db::Conectar();
        }
        
        function setIdRol($idRol) {
            $this -> idRol = $idRol;
        }
        
        function setNombre($nombre) {
            $this -> nombre = $nombre;
        }
        
        function setDescripcion($descripcion) {
            $this -> descripcion = $descripcion;
        }
        
        function getIdRol() {
            return $this -> idRol;
        }
        
        function getNombre() {
            return $this -> nombre;
        }
        
        function getDescripcion() {
            return $this -> descripcion;
        }

        function FindRol() {
            $instruccionSql = 'SELECT * FROM rol WHERE id_rol = :idRol';
            $transaccion = $this -> db -> prepare($instruccionSql);
            $transaccion -> bindValue('idRol', $this->idRol);

            $transaccion -> execute();
            
            $rolModel = [];

            foreach ($transaccion as $key) {
                $receptorValores = new RolModel();

                $receptorValores -> setIdRol($key['id_rol']);
                $receptorValores -> setNombre($key['nombre']);
                $receptorValores -> setDescripcion($key['descripcion']);

                $rolModel[] = $receptorValores;
            }

            return $rolModel;

        }

    }