<?php
    class UsuarioModel
    {
        private $idUsuario;
        private $idTercero;
        private $loginUsuario;
        private $claveUsuario;
        private $idRol;
        public $db;

        function __construct() {
            $this -> db = Db::Conectar();
        }
        
        function setIdUsuario($idUsuario = NULL) {
            $this -> idUsuario = $idUsuario;
        }
        
        function setIdTercero($idTercero) {
            $this -> idTercero = $idTercero;
        }
        
        function setLoginUsuario($loginUsuario) {
            $this -> loginUsuario = $loginUsuario;
        }
        
        function setClaveUsuario($claveUsuario) {
            $this -> claveUsuario = $claveUsuario;
        }
        
        function setIdRol($idRol) {
            $this -> idRol = $idRol;
        }
        
        function getIdUsuario() {
            return $this -> idUsuario;
        }
        
        function getIdTercero() {
            return $this -> idTercero;
        }
        
        function getLoginUsuario() {
            return $this -> loginUsuario;
        }
        
        function getClaveUsuario() {
            return $this -> claveUsuario;
        }
        
        function getIdRol() {
            return $this -> idRol;
        }

        /**
         * Autenticar la entidad Usuario con cuenta y clave
         * 
         * Esta función le preguntará al servidor si el intento de loggearse existe y coincide su clave, devolverá un array del tercero.
         * 
         * @param UsuarioModel Un objeto de tipo UsuarioModel que contenga los datos necesarios para la verificación de la cuenta.
         * @return UsuarioModel
         */
        function LogIn() {
            
            $instruccionSql = 'SELECT * FROM usuario WHERE login_usuario = :loginUsuario AND clave_usuario = :claveUsuario';
            $transaccion = $this -> db -> prepare($instruccionSql);
            $transaccion -> bindValue('loginUsuario', $this->getLoginUsuario());
            $transaccion -> bindValue('claveUsuario', $this->getClaveUsuario());

            $transaccion -> execute();

            if ($transaccion) {
                $usuario = [];

                foreach ($transaccion as $user) {
                    $receptorValores = new UsuarioModel();

                    $receptorValores -> setIdUsuario($user['id_usuario']);
                    $receptorValores -> setIdTercero($user['id_tercero']);
                    $receptorValores -> setIdRol($user['id_rol']);
                    $receptorValores -> setLoginUsuario($user['login_usuario']);
                    $receptorValores -> setClaveUsuario($user['clave_usuario']);

                    $usuario[] = $receptorValores;
                }
                return $usuario;
            }
        }        
    }
/* require_once('../config/Db.php');

$userModel = new UsuarioModel();
$userModel -> setLoginUsuario('JOHANL');
$userModel -> setClaveUsuario('199520');

    $usuarioModel = new UsuarioModel();

    $usuarioModel = $usuarioModel -> LogIn($userModel);

    foreach ($usuarioModel as $key) {
        echo $key -> getIdUsuario() . "<br>";
        echo $key -> getIdTercero() . "<br>";
        echo $key -> getIdRol() . "<br>";
        echo $key -> getLoginUsuario() . "<br>";
        echo $key -> getClaveUsuario() . "<br>";
    } */