-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-10-2019 a las 14:07:25
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  AUTOCOMMIT = 0;
START TRANSACTION;
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Base de datos: `appcountancy`
  --
  -- --------------------------------------------------------
  --
  -- Estructura de tabla para la tabla `empresa`
  --
  DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
    `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
    `nro_identificacion` varchar(15) NOT NULL COMMENT 'Cédula o NIT',
    `razon_social` varchar(100) NOT NULL COMMENT 'Nombre de la empresa',
    `direccion` varchar(100) NOT NULL,
    `telefono_uno` varchar(15) NOT NULL,
    `telefono_dos` varchar(15) DEFAULT NULL,
    `email_uno` varchar(100) NOT NULL,
    `email_dos` varchar(100) DEFAULT NULL,
    `activo` varchar(1) NOT NULL COMMENT 'Activo o inactivo',
    PRIMARY KEY (`id_empresa`),
    UNIQUE KEY `nro_identificacion` (`nro_identificacion`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4;
--
  -- Estructura de tabla para la tabla `rol`
  --
  DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
    `id_rol` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(20) NOT NULL,
    `descripcion` varchar(250) NOT NULL,
    PRIMARY KEY (`id_rol`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4;
--
  --
  -- Estructura de tabla para la tabla `tercero`
  --
  DROP TABLE IF EXISTS `tercero`;
CREATE TABLE IF NOT EXISTS `tercero` (
    `id_tercero` int(11) NOT NULL AUTO_INCREMENT,
    `nro_identificacion` varchar(15) NOT NULL COMMENT 'Cédula de ciudadanía',
    `primer_nombre` varchar(30) NOT NULL,
    `segundo_nombre` varchar(30) DEFAULT NULL,
    `primer_apellido` varchar(30) NOT NULL,
    `segundo_apellido` varchar(30) DEFAULT NULL,
    `telefono_uno` varchar(15) NOT NULL,
    `telefono_dos` varchar(15) DEFAULT NULL,
    `email` varchar(100) NOT NULL,
    `activo` varchar(1) NOT NULL COMMENT 'Si es activo o inactivo',
    PRIMARY KEY (`id_tercero`),
    UNIQUE KEY `nro_identificacion` (`nro_identificacion`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4;
--
  --
  -- Estructura de tabla para la tabla `usuario`
  --
  DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
    `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
    `id_tercero` int(11) NOT NULL,
    `clave_usuario` varchar(15) NOT NULL,
    `id_rol` int(11) NOT NULL,
    PRIMARY KEY (`id_usuario`),
    UNIQUE KEY `id_tercero_2` (`id_tercero`),
    KEY `id_tercero` (`id_tercero`),
    KEY `id_rol` (`id_rol`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4;
--
  --
  -- Estructura de tabla para la tabla `usuario_empresa`
  --
  DROP TABLE IF EXISTS `usuario_empresa`;
CREATE TABLE IF NOT EXISTS `usuario_empresa` (
    `id_usuario_empresa` int(11) NOT NULL AUTO_INCREMENT,
    `id_usuario` int(11) NOT NULL,
    `id_empresa` int(11) NOT NULL,
    PRIMARY KEY (`id_usuario_empresa`),
    KEY `id_empresa` (`id_empresa`),
    KEY `id_usuario` (`id_usuario`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4;