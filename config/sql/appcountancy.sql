-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-10-2019 a las 21:47:28
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appcountancy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadre_diario`
--

DROP TABLE IF EXISTS `cuadre_diario`;
CREATE TABLE IF NOT EXISTS `cuadre_diario` (
  `id_cuadre` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_cuadre` date NOT NULL,
  `valor_transferencias` float NOT NULL,
  `valor_datafono` float NOT NULL,
  `valor_traslado_admin` float NOT NULL,
  `valor_recibido_domicilios` float NOT NULL,
  `valor_pago_domiciliario` float NOT NULL,
  `valor_ventas_efectivo` float NOT NULL,
  `valor_gastos_dia` float NOT NULL,
  PRIMARY KEY (`id_cuadre`),
  UNIQUE KEY `fecha_cuadre` (`fecha_cuadre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
CREATE TABLE IF NOT EXISTS `domicilio` (
  `id_domicilio` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_domicilio` date NOT NULL,
  `nro_factura` int(11) NOT NULL,
  `valor_factura` float NOT NULL,
  `id_zona` int(11) NOT NULL,
  `id_mensajero` int(11) NOT NULL,
  `id_forma_pago` int(11) NOT NULL,
  `fecha_entrega_dinero` date DEFAULT NULL,
  `observaciones` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_domicilio`),
  UNIQUE KEY `nro_factura` (`nro_factura`),
  KEY `id_zona` (`id_zona`),
  KEY `id_forma_pago` (`id_forma_pago`),
  KEY `domicilio_ibfk_1` (`id_mensajero`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`id_domicilio`, `fecha_domicilio`, `nro_factura`, `valor_factura`, `id_zona`, `id_mensajero`, `id_forma_pago`, `fecha_entrega_dinero`, `observaciones`) VALUES
(1, '2019-10-20', 4454, 455700, 2, 1, 2, NULL, NULL),
(4, '2019-10-23', 655, 563700, 2, 1, 1, NULL, ''),
(6, '2019-10-23', 4467, 89000, 1, 2, 2, NULL, ''),
(7, '2019-10-23', 4468, 745050, 2, 3, 1, NULL, ''),
(8, '2019-10-23', 4469, 93400, 1, 2, 2, NULL, ''),
(12, '2019-10-23', 656, 700000, 1, 2, 2, '2019-10-24', ''),
(15, '2019-10-23', 700, 45600, 1, 2, 1, NULL, ''),
(17, '2019-10-28', 777, 5600, 1, 3, 1, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egreso`
--

DROP TABLE IF EXISTS `egreso`;
CREATE TABLE IF NOT EXISTS `egreso` (
  `id_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_gasto` date NOT NULL,
  `concepto_gasto` varchar(100) NOT NULL,
  `valor_gasto` float NOT NULL,
  `observacion_gasto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_gasto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `egreso`
--

INSERT INTO `egreso` (`id_gasto`, `fecha_gasto`, `concepto_gasto`, `valor_gasto`, `observacion_gasto`) VALUES
(1, '2019-10-18', 'ASEO', 9750, 'Se compra una paquete de detergente y una escoba.'),
(2, '2019-10-18', 'ASEO', 9750, 'Se compra una paquete de detergente y una escoba.'),
(3, '2019-10-18', 'ALMUERZOS', 45600, 'Se compra una Frispicada'),
(4, '2019-10-18', 'PAPELERÃA', 21400, 'Se compran rollos para la impresora tÃ©rmica.'),
(5, '2019-10-18', 'PAGO FACTURA ATENEA', 1204700, 'Se paga factura de mercancÃ­a nueva'),
(6, '2019-10-19', 'PAPELERÃA', 8900, ''),
(7, '2019-10-21', 'ALMUERZOS', 43000, 'Pollo KFC'),
(8, '2019-10-21', 'PAPELERÃA', 21400, 'Se compran cintas transparentes');

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
  `activo` varchar(1) NOT NULL DEFAULT 'S' COMMENT 'Activo o inactivo',
  PRIMARY KEY (`id_empresa`),
  UNIQUE KEY `nro_identificacion` (`nro_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nro_identificacion`, `razon_social`, `direccion`, `telefono_uno`, `telefono_dos`, `email_uno`, `email_dos`, `activo`) VALUES
(1, '1039467736', 'GIRLY', 'CL 73 SUR N 45 A 35', '3114904967', NULL, 'girli.sabaneta@gmail.com', NULL, 'S'),
(2, '1152197333', 'SELENE', 'CR 52 47 01 LC 01 05', '3617496', NULL, 'cata_1289@hotmail.com', NULL, 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

DROP TABLE IF EXISTS `forma_pago`;
CREATE TABLE IF NOT EXISTS `forma_pago` (
  `id_forma_pago` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pago` varchar(50) NOT NULL,
  PRIMARY KEY (`id_forma_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id_forma_pago`, `nombre_pago`) VALUES
(1, 'EFECTIVO'),
(2, 'TRANSFERENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajero`
--

DROP TABLE IF EXISTS `mensajero`;
CREATE TABLE IF NOT EXISTS `mensajero` (
  `id_mensajero` int(11) NOT NULL AUTO_INCREMENT,
  `id_tercero` int(11) NOT NULL,
  PRIMARY KEY (`id_mensajero`),
  KEY `mensajero_ibfk_1` (`id_tercero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajero`
--

INSERT INTO `mensajero` (`id_mensajero`, `id_tercero`) VALUES
(1, 3),
(3, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'ADMIN', 'Este rol permite hacer las tareas de un administrador.'),
(2, 'CAJERX', 'Este rol permite registrar pero no borrar ni actualizar.'),
(3, 'AUXILIAR', 'Este usuario permite generar reportes.');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tercero`
--

INSERT INTO `tercero` (`id_tercero`, `nro_identificacion`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `telefono_uno`, `telefono_dos`, `email`, `activo`) VALUES
(1, '1026154301', 'JOHAN', 'ALEXANDER', 'LONDOÑO', 'BEDOYA', '3195893669', NULL, 'johannlondonob@gmail.com', 's'),
(2, '1020293212', 'MARIA', 'ALEJANDRA', 'GUZMÁN', 'GARCÍA', '4480987', NULL, 'malejagarcia@gmail.com', 'S'),
(3, '1027153404', 'MARLON', 'ALEXIS', 'LONDOÑO', 'BEDOYA', '3189458810', NULL, 'marlon1099@hotmail.com', 'S'),
(4, '1026156001', 'JUAN', 'CAMILO', 'BEDOYA', NULL, '3006550', NULL, 'anfe0595@gmail.com', 'S'),
(5, '74829134', 'ESTEBAN', NULL, 'JARAMILLO', NULL, '3102948820', NULL, 'juanes@hotmail.com', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_tercero` int(11) NOT NULL,
  `login_usuario` varchar(10) NOT NULL,
  `clave_usuario` varchar(15) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_tercero_2` (`id_tercero`),
  UNIQUE KEY `login_usuario` (`login_usuario`),
  KEY `id_tercero` (`id_tercero`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tercero`, `login_usuario`, `clave_usuario`, `id_rol`) VALUES
(1, 1, 'JOHANL', '199520', 1),
(5, 2, 'MALEJITA', 'MALEJITA', 3);

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_empresa`
--

INSERT INTO `usuario_empresa` (`id_usuario_empresa`, `id_usuario`, `id_empresa`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

DROP TABLE IF EXISTS `zona`;
CREATE TABLE IF NOT EXISTS `zona` (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_zona` varchar(50) NOT NULL,
  `valor_zona` float NOT NULL,
  `activo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id_zona`, `nombre_zona`, `valor_zona`, `activo`) VALUES
(1, 'ZONA_1', 10000, 'S'),
(2, 'ZONA_2', 6000, 'S'),
(7, 'ZONA_3', 15000, 'S');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`id_mensajero`) REFERENCES `mensajero` (`id_mensajero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `domicilio_ibfk_2` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`) ON UPDATE CASCADE,
  ADD CONSTRAINT `domicilio_ibfk_3` FOREIGN KEY (`id_forma_pago`) REFERENCES `forma_pago` (`id_forma_pago`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajero`
--
ALTER TABLE `mensajero`
  ADD CONSTRAINT `mensajero_ibfk_1` FOREIGN KEY (`id_tercero`) REFERENCES `tercero` (`id_tercero`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tercero`) REFERENCES `tercero` (`id_tercero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_empresa`
--
ALTER TABLE `usuario_empresa`
  ADD CONSTRAINT `usuario_empresa_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_empresa_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
