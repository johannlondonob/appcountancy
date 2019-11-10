<?php
    class UsuarioModel
    {
        private $idUsuario;
        private $idTercero;
        private $loginUsuario;
        private $claveUsuario;
        private $idRol;
        public $db;

        public function __construct()
        {
            $this -> db = Db::Conectar();
        }
        
        public function setIdUsuario($idUsuario = null)
        {
            $this -> idUsuario = $idUsuario;
        }
        
        public function setIdTercero($idTercero)
        {
            $this -> idTercero = $idTercero;
        }
        
        public function setLoginUsuario($loginUsuario)
        {
            $this -> loginUsuario = $loginUsuario;
        }
        
        public function setClaveUsuario($claveUsuario)
        {
            $this -> claveUsuario = $claveUsuario;
        }
        
        public function setIdRol($idRol)
        {
            $this -> idRol = $idRol;
        }
        
        public function getIdUsuario()
        {
            return $this -> idUsuario;
        }
        
        public function getIdTercero()
        {
            return $this -> idTercero;
        }
        
        public function getLoginUsuario()
        {
            return $this -> loginUsuario;
        }
        
        public function getClaveUsuario()
        {
            return $this -> claveUsuario;
        }
        
        public function getIdRol()
        {
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
        public function LogIn()
        {
            $instruccionSql = 'SELECT id_rol, id_tercero, id_usuario FROM usuario WHERE login_usuario = :loginUsuario AND clave_usuario = :claveUsuario';
            $transaccion = $this -> db -> prepare($instruccionSql);
            $transaccion -> bindValue('loginUsuario', $this->getLoginUsuario());
            $transaccion -> bindValue('claveUsuario', $this->getClaveUsuario());

            $transaccion -> execute();

            $usuario = $transaccion->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                return $usuario;
            } else {
                return false;
            }

            /*             if ($transaccion) {
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
                        } */
        }
    }
