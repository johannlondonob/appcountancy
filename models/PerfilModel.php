<?php
require_once '../models/TerceroModel.php';

    class PerfilModel extends TerceroModel
    {
        private $idUsuario;
        private $idTercero;
        private $idEmpresa;
        private $razonSocial;
        public $db;

        public function __construct()
        {
            $this->db = Db::Conectar();
        }

        public function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }

        public function setIdTercero($idTercero)
        {
            $this->idTercero = $idTercero;
        }

        public function setIdEmpresa($idEmpresa)
        {
            $this->idEmpresa = $idEmpresa;
        }

        public function setRazonSocial($razonSocial)
        {
            $this->razonSocial = $razonSocial;
        }

        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        public function getIdTercero()
        {
            return $this->idTercero;
        }

        public function getIdEmpresa()
        {
            return $this->idEmpresa;
        }

        public function getRazonSocial()
        {
            return $this->razonSocial;
        }

        public function FindProfile()
        {
            $query = 'SELECT *
                /* usuario.id_usuario,
                usuario.login_usuario,
                tercero.id_tercero,
                tercero.nro_identificacion,
                tercero.primer_nombre,
                tercero.segundo_nombre,
                tercero.primer_apellido,
                tercero.segundo_apellido,
                tercero.telefono_uno,
                tercero.telefono_dos,
                tercero.email,
                tercero.activo,
                empresa.id_empresa,
                empresa.razon_social,
                -- empresa.direccion,
                -- empresa.telefono_uno,
                -- empresa.telefono_dos,
                -- empresa.email_uno,
                -- empresa.email_dos,
                -- empresa.activo,
                rol.id_rol,
                rol.nombre,
                rol.descripcion */
            FROM usuario 
            INNER JOIN usuario_empresa ON usuario.id_usuario = usuario_empresa.id_usuario
            INNER JOIN tercero ON usuario.id_tercero = tercero.id_tercero
            INNER JOIN empresa ON usuario_empresa.id_empresa = empresa.id_empresa
            INNER JOIN rol ON usuario.id_rol = rol.id_rol
            WHERE usuario.id_tercero = :idTercero';

            $transaccion = $this->db->prepare($query);

            $transaccion->bindValue('idTercero', $this->idTercero);
            $transaccion->execute();

            $data = $transaccion->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return $data;
            } else {
                return false;
            }
        }
    }
