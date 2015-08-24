/*
Navicat MySQL Data Transfer

Source Server         : sql
Source Server Version : 50536
Source Host           : localhost:3306
Source Database       : shabel

Target Server Type    : MYSQL
Target Server Version : 50536
File Encoding         : 65001

Date: 2015-08-22 10:41:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for actividad
-- ----------------------------
DROP TABLE IF EXISTS `actividad`;
CREATE TABLE `actividad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `modulo` varchar(20) DEFAULT NULL,
  `descripcion` text,
  `usuario` varchar(10) DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for articulo
-- ----------------------------
DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL DEFAULT '',
  `unidad` varchar(50) NOT NULL DEFAULT '',
  `estatus_did` int(11) unsigned NOT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `articulo_estatus` (`estatus_did`),
  CONSTRAINT `articulo_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `direccion` text,
  `contacto` varchar(100) DEFAULT '',
  `telefono` varchar(12) DEFAULT '',
  `telefono1` varchar(12) DEFAULT NULL,
  `correo` varchar(50) DEFAULT '',
  `estatus_did` int(11) unsigned NOT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `proveedor_estatus` (`estatus_did`),
  CONSTRAINT `cliente_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for configuracion
-- ----------------------------
DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mantenimiento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cotizacion
-- ----------------------------
DROP TABLE IF EXISTS `cotizacion`;
CREATE TABLE `cotizacion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) NOT NULL DEFAULT '',
  `fecha_f` date NOT NULL,
  `porcentaje` float DEFAULT NULL,
  `subtotal` float NOT NULL,
  `iva` float NOT NULL,
  `total` float NOT NULL,
  `estatus_did` int(11) unsigned NOT NULL,
  `requisicion_did` int(11) unsigned NOT NULL,
  `cliente_did` int(11) unsigned NOT NULL,
  `comentarios` text,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cotizacion_estatus` (`estatus_did`),
  KEY `cotizacion_cliente` (`cliente_did`),
  KEY `cotizacion_requisicion` (`requisicion_did`),
  CONSTRAINT `cotizacion_cliente` FOREIGN KEY (`cliente_did`) REFERENCES `cliente` (`id`),
  CONSTRAINT `cotizacion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `cotizacion_requisicion` FOREIGN KEY (`requisicion_did`) REFERENCES `requisicion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for detallecotizacion
-- ----------------------------
DROP TABLE IF EXISTS `detallecotizacion`;
CREATE TABLE `detallecotizacion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `articulo_aid` int(11) unsigned NOT NULL,
  `preciounitario` float NOT NULL,
  `importe` float NOT NULL,
  `porcentaje` float DEFAULT NULL,
  `cotizacion_did` int(11) unsigned NOT NULL,
  `estatus_did` int(11) unsigned NOT NULL,
  `comentarios` text,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallerequisicion_articulo` (`articulo_aid`),
  KEY `detallerequisicion_requisicion` (`cotizacion_did`),
  KEY `detallerequisicion_estatus` (`estatus_did`),
  CONSTRAINT `detallecotizacion_cotizacion` FOREIGN KEY (`cotizacion_did`) REFERENCES `cotizacion` (`id`),
  CONSTRAINT `detallecotizacion_ibfk_1` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detallecotizacion_ibfk_2` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for detalleordencompra
-- ----------------------------
DROP TABLE IF EXISTS `detalleordencompra`;
CREATE TABLE `detalleordencompra` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `articulo_aid` int(11) unsigned NOT NULL,
  `comentarios` text,
  `estatus_did` int(11) unsigned NOT NULL,
  `ordencompra_did` int(11) unsigned NOT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallerequisicion_articulo` (`articulo_aid`),
  KEY `detallerequisicion_requisicion` (`ordencompra_did`),
  KEY `detallerequisicion_estatus` (`estatus_did`),
  CONSTRAINT `detalleordencompra_ibfk_1` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detalleordencompra_ibfk_2` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`),
  CONSTRAINT `detalleordencompra_ibfk_3` FOREIGN KEY (`ordencompra_did`) REFERENCES `ordencompra` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for detalleordenentrega
-- ----------------------------
DROP TABLE IF EXISTS `detalleordenentrega`;
CREATE TABLE `detalleordenentrega` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `articulo_aid` int(11) unsigned NOT NULL,
  `preciounitario` float NOT NULL,
  `importe` float NOT NULL,
  `porcentaje` float DEFAULT NULL,
  `ordenentrega_did` int(11) unsigned NOT NULL,
  `estatus_did` int(11) unsigned NOT NULL,
  `comentarios` text,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallerequisicion_articulo` (`articulo_aid`),
  KEY `detallerequisicion_requisicion` (`ordenentrega_did`),
  KEY `detallerequisicion_estatus` (`estatus_did`),
  CONSTRAINT `detalleordenentrega_ibfk_1` FOREIGN KEY (`ordenentrega_did`) REFERENCES `ordenentrega` (`id`),
  CONSTRAINT `detalleordenentrega_ibfk_2` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detalleordenentrega_ibfk_3` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for detallerequisicion
-- ----------------------------
DROP TABLE IF EXISTS `detallerequisicion`;
CREATE TABLE `detallerequisicion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `articulo_aid` int(11) unsigned NOT NULL,
  `comentarios` text,
  `estatus_did` int(11) unsigned NOT NULL,
  `requisicion_did` int(11) unsigned NOT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallerequisicion_articulo` (`articulo_aid`),
  KEY `detallerequisicion_requisicion` (`requisicion_did`),
  KEY `detallerequisicion_estatus` (`estatus_did`),
  CONSTRAINT `detallerequisicion_articulo` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`),
  CONSTRAINT `detallerequisicion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detallerequisicion_requisicion` FOREIGN KEY (`requisicion_did`) REFERENCES `requisicion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for detallesolicitud
-- ----------------------------
DROP TABLE IF EXISTS `detallesolicitud`;
CREATE TABLE `detallesolicitud` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `articulo_aid` int(11) unsigned NOT NULL,
  `solicitud_did` int(11) unsigned NOT NULL,
  `estatus_did` int(11) unsigned NOT NULL,
  `comentarios` text,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallesolicitud_articulo` (`articulo_aid`),
  KEY `detallesolicitud_requisicion` (`solicitud_did`),
  KEY `detallesolicitud_estatus` (`estatus_did`),
  CONSTRAINT `detallesolicitud_articulos` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`),
  CONSTRAINT `detallesolicitud_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detallesolicitud_solicitud` FOREIGN KEY (`solicitud_did`) REFERENCES `solicitud` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for empleados
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `apellidos` varchar(100) DEFAULT NULL,
  `celular` varchar(20) NOT NULL DEFAULT '',
  `puesto` varchar(100) NOT NULL DEFAULT '',
  `direccion` text,
  `estatus_did` int(11) unsigned NOT NULL,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `empleados_estatus` (`estatus_did`),
  CONSTRAINT `empleados_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for estatus
-- ----------------------------
DROP TABLE IF EXISTS `estatus`;
CREATE TABLE `estatus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `requisicion` varchar(20) DEFAULT NULL,
  `cotizacion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for inventario
-- ----------------------------
DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `articulos_aid` int(11) unsigned NOT NULL,
  `estatus_did` int(11) unsigned NOT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `inventario_articulo` (`articulos_aid`),
  KEY `inventario_estatus` (`estatus_did`),
  CONSTRAINT `inventario_articulo` FOREIGN KEY (`articulos_aid`) REFERENCES `articulo` (`id`),
  CONSTRAINT `inventario_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ordencompra
-- ----------------------------
DROP TABLE IF EXISTS `ordencompra`;
CREATE TABLE `ordencompra` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) NOT NULL DEFAULT '',
  `requisicion_did` int(11) unsigned NOT NULL,
  `codicionpago` varchar(20) DEFAULT NULL,
  `estatus_did` int(11) unsigned NOT NULL,
  `fechaCreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ordencompra_requisicion` (`requisicion_did`),
  KEY `ordencompra_estatus` (`estatus_did`),
  CONSTRAINT `ordencompra_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `ordencompra_requisicion` FOREIGN KEY (`requisicion_did`) REFERENCES `requisicion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ordenentrega
-- ----------------------------
DROP TABLE IF EXISTS `ordenentrega`;
CREATE TABLE `ordenentrega` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_did` int(11) unsigned NOT NULL,
  `contacto` varchar(100) NOT NULL DEFAULT '',
  `folio` varchar(20) NOT NULL DEFAULT '',
  `fecha_f` date NOT NULL,
  `comentarios` text,
  `estatus_did` int(11) unsigned NOT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ordenentrega_cliente` (`cliente_did`),
  KEY `ordenentrega_estatus` (`estatus_did`),
  CONSTRAINT `ordenentrega_cliente` FOREIGN KEY (`cliente_did`) REFERENCES `cliente` (`id`),
  CONSTRAINT `ordenentrega_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pago
-- ----------------------------
DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `requisicion_did` int(11) unsigned NOT NULL,
  `cotizacion_did` int(11) unsigned NOT NULL,
  `ordenentrega_did` int(11) unsigned NOT NULL,
  `importe` float NOT NULL,
  `fechaCreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `direccion` text,
  `contacto` varchar(100) NOT NULL DEFAULT '',
  `telefono` varchar(12) DEFAULT '',
  `telefono1` varchar(12) DEFAULT NULL,
  `correo` varchar(50) NOT NULL DEFAULT '',
  `estatus_did` int(11) unsigned NOT NULL,
  `fechaCreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `proveedor_estatus` (`estatus_did`),
  CONSTRAINT `proveedor_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for requisicion
-- ----------------------------
DROP TABLE IF EXISTS `requisicion`;
CREATE TABLE `requisicion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) NOT NULL DEFAULT '',
  `fecha_f` date NOT NULL,
  `cliente_did` int(11) unsigned NOT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `comentarios` text,
  `estatus_did` int(11) unsigned NOT NULL,
  `usuario_aid` int(11) unsigned NOT NULL,
  `fechaCreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `requisicion_cliente` (`cliente_did`),
  KEY `requisicion_estatus` (`estatus_did`),
  KEY `requisicion_usuario` (`usuario_aid`),
  CONSTRAINT `requisicion_cliente` FOREIGN KEY (`cliente_did`) REFERENCES `cliente` (`id`),
  CONSTRAINT `requisicion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `requisicion_usuario` FOREIGN KEY (`usuario_aid`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for solicitud
-- ----------------------------
DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE `solicitud` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `requisicion_did` int(11) unsigned NOT NULL,
  `proveedor_did` int(11) unsigned NOT NULL,
  `fecha_f` date NOT NULL,
  `fechaCreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `solicitud_requisicion` (`requisicion_did`),
  KEY `solicitud_proveedor` (`proveedor_did`),
  CONSTRAINT `solicitud_proveedor` FOREIGN KEY (`proveedor_did`) REFERENCES `proveedor` (`id`),
  CONSTRAINT `solicitud_requisicion` FOREIGN KEY (`requisicion_did`) REFERENCES `requisicion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tipousuario
-- ----------------------------
DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE `tipousuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `estatus_did` int(11) unsigned NOT NULL,
  `fechaCreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tipousuario_estatus` (`estatus_did`),
  CONSTRAINT `tipousuario_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password_hash` varchar(100) NOT NULL DEFAULT '',
  `status` int(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `auth_key` varchar(50) NOT NULL DEFAULT '',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `password_reset_token` varchar(100) NOT NULL DEFAULT '',
  `empleado_did` int(11) unsigned NOT NULL,
  `estatus_did` int(11) unsigned NOT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `usuario_estatus` (`estatus_did`),
  KEY `usuario_empleado` (`empleado_did`),
  CONSTRAINT `usuario_empleado` FOREIGN KEY (`empleado_did`) REFERENCES `empleados` (`id`),
  CONSTRAINT `usuario_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
