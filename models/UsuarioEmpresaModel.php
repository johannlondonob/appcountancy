<?php
    class UsuarioEmpresaModel
    {
        private $idUsuarioEmpresa;
        private $idUsuario;
        private $idEmpresa;

        function __construct() {}
        
        function setIdUsuarioEmpresa($idUsuarioEmpresa = NULL) {
            $this -> idUsuarioEmpresa = $idUsuarioEmpresa;
        }
        
        function setIdUsuario($idUsuario) {
            $this -> idUsuario = $idUsuario;
        }
        
        function setIdEmpresa($idEmpresa) {
            $this -> idEmpresa = $idEmpresa;
        }

        function getIdUsuarioEmpresa() {
            return $this -> idUsuarioEmpresa;
        }
        
        function getIdUsuario() {
            return $this -> idUsuario;
        }
        
        function getIdEmpresa() {
            return $this -> idEmpresa;
        }

        
    }