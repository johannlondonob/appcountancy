<?php
    class CuadreDiarioModel
    {
        private $idCuadre;
        private $fechaCuadre;
        private $valorTransferencias;
        private $valorDatafono;
        private $valorTrasladoAdmin;
        private $valorRecibidoDomicilios;
        private $valorPagoDomiciliario;
        private $valorVentasEfectivo;
        private $valorGastosDia;

        function __construct() {}
        
        function setIdCuadre($idCuadre) {
            $this -> idCuadre = $idCuadre;
        }
        
        function setFechaCuadre($fechaCuadre) {
            $this -> fechaCuadre = $fechaCuadre;
        }
        
        function setValorTransferencias($valorTransferencias) {
            $this -> valorTransferencias = $valorTransferencias;
        }
        
        function setValorDatafono($valorDatafono) {
            $this -> valorDatafono = $valorDatafono;
        }
        
        function setValorTrasladoAdmin($valorTrasladoAdmin) {
            $this -> valorTrasladoAdmin = $valorTrasladoAdmin;
        }
        
        function setValorRecibidoDomicilios($valorRecibidoDomicilios) {
            $this -> valorRecibidoDomicilios = $valorRecibidoDomicilios;
        }
        
        function setValorPagoDomiciliario($ValorPagoDomiciliario) {
            $this -> ValorPagoDomiciliario = $ValorPagoDomiciliario;
        }
        
        function setValorVentasEfectivo($valorVentasEfectivo) {
            $this -> valorVentasEfectivo = $valorVentasEfectivo;
        }
        
        function setValorGastosDia($valorGastosDia) {
            $this -> valorGastosDia = $valorGastosDia;
        }
        
        function getIdCuadre() {
            return $this -> idCuadre;
        }
        
        function getFechaCuadre() {
            return $this -> fechaCuadre;
        }
        
        function getValorTransferencias() {
            return $this -> valorTransferencias;
        }
        
        function getValorDatafono() {
            return $this -> valorDatafono;
        }
        
        function getValorTrasladoAdmin() {
            return $this -> valorTrasladoAdmin;
        }
        
        function getValorRecibidoDomicilios() {
            return $this -> valorRecibidoDomicilios;
        }
        
        function getValorPagoDomiciliario() {
            return $this -> ValorPagoDomiciliario;
        }
        
        function getValorVentasEfectivo() {
            return $this -> valorVentasEfectivo;
        }
        
        function getValorGastosDia() {
            return $this -> valorGastosDia;
        }
    }