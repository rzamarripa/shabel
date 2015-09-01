/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : shabel

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-09-01 12:10:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `actividad`
-- ----------------------------
DROP TABLE IF EXISTS `actividad`;
CREATE TABLE `actividad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `modulo` varchar(20) DEFAULT NULL,
  `descripcion` text,
  `usuario` varchar(10) DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of actividad
-- ----------------------------
INSERT INTO `actividad` VALUES ('1', null, 'Ha creado una requisición', '1', '2015-08-25 14:51:37');
INSERT INTO `actividad` VALUES ('2', null, 'Ha creado una requisición', '1', '2015-08-25 14:56:41');
INSERT INTO `actividad` VALUES ('3', null, 'Ha creado una requisición', '1', '2015-08-25 15:27:09');
INSERT INTO `actividad` VALUES ('4', null, 'Ha creado una requisición', '1', '2015-08-25 15:39:05');
INSERT INTO `actividad` VALUES ('5', null, 'Ha creado una requisición', '1', '2015-08-25 15:40:25');
INSERT INTO `actividad` VALUES ('6', null, 'Ha creado una requisición', '1', '2015-08-27 18:59:31');
INSERT INTO `actividad` VALUES ('7', null, 'Ha creado una requisición', '1', '2015-08-27 19:05:07');
INSERT INTO `actividad` VALUES ('8', null, 'Ha actualizado una requisición', '1', '2015-08-27 23:57:03');
INSERT INTO `actividad` VALUES ('9', null, 'Ha actualizado una requisición', '1', '2015-08-27 23:57:44');
INSERT INTO `actividad` VALUES ('10', null, 'Ha actualizado una requisición', '1', '2015-08-27 23:58:02');
INSERT INTO `actividad` VALUES ('11', null, 'Ha creado una requisición', '1', '2015-08-28 17:08:27');
INSERT INTO `actividad` VALUES ('12', null, 'Ha creado una requisición', '1', '2015-08-28 17:09:41');

-- ----------------------------
-- Table structure for `articulo`
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articulo
-- ----------------------------
INSERT INTO `articulo` VALUES ('1', 'Laptop Hp', 'pza', '1', '2015-08-25 14:24:10');
INSERT INTO `articulo` VALUES ('2', 'Laptop Dell', 'pza', '1', '2015-08-25 14:45:11');
INSERT INTO `articulo` VALUES ('3', 'MacBook Pro', 'pza', '1', '2015-08-27 18:47:21');
INSERT INTO `articulo` VALUES ('5', 'MacBook Air', 'pza', '1', '2015-09-01 12:08:26');
INSERT INTO `articulo` VALUES ('7', 'AlienWare 14', 'pza', '1', '2015-09-01 12:08:46');
INSERT INTO `articulo` VALUES ('8', 'AlienWare 15', 'pza', '1', '2015-09-01 12:08:56');
INSERT INTO `articulo` VALUES ('9', 'Laptop MSI Viper', 'pza', '1', '2015-09-01 12:09:15');

-- ----------------------------
-- Table structure for `cliente`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('1', 'uss', 'uss', 'dvwefv', '234234', '234234', 'ervrt@wfeerf', '1', '2015-08-19 14:06:35');
INSERT INTO `cliente` VALUES ('2', 'Masoft', 'Enrique segobiano', 'Roberto Zamaripa', '761256315623', null, 'zama.rripa@gmail.com', '1', '2015-08-27 18:44:54');

-- ----------------------------
-- Table structure for `configuracion`
-- ----------------------------
DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mantenimiento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of configuracion
-- ----------------------------
INSERT INTO `configuracion` VALUES ('1', '0');

-- ----------------------------
-- Table structure for `cotizacion`
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
-- Records of cotizacion
-- ----------------------------

-- ----------------------------
-- Table structure for `detallecotizacion`
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
-- Records of detallecotizacion
-- ----------------------------

-- ----------------------------
-- Table structure for `detalleordencompra`
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
-- Records of detalleordencompra
-- ----------------------------

-- ----------------------------
-- Table structure for `detalleordenentrega`
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
-- Records of detalleordenentrega
-- ----------------------------

-- ----------------------------
-- Table structure for `detallerequisicion`
-- ----------------------------
DROP TABLE IF EXISTS `detallerequisicion`;
CREATE TABLE `detallerequisicion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `articulo_aid` int(11) unsigned NOT NULL,
  `comentarios` text,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `requisicion_did` int(11) unsigned NOT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallerequisicion_articulo` (`articulo_aid`),
  KEY `detallerequisicion_requisicion` (`requisicion_did`),
  KEY `detallerequisicion_estatus` (`estatus_did`),
  CONSTRAINT `detallerequisicion_articulo` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`),
  CONSTRAINT `detallerequisicion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detallerequisicion_requisicion` FOREIGN KEY (`requisicion_did`) REFERENCES `requisicion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detallerequisicion
-- ----------------------------
INSERT INTO `detallerequisicion` VALUES ('27', '4', '1', '', '1', '19', '2015-08-28 17:08:27');
INSERT INTO `detallerequisicion` VALUES ('28', '5', '2', '', '1', '19', '2015-08-28 17:08:27');
INSERT INTO `detallerequisicion` VALUES ('29', '5', '3', '', '1', '20', '2015-08-28 17:09:41');

-- ----------------------------
-- Table structure for `detallesolicitud`
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
-- Records of detallesolicitud
-- ----------------------------

-- ----------------------------
-- Table structure for `empleados`
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empleados
-- ----------------------------
INSERT INTO `empleados` VALUES ('1', 'Roberto', 'Zamarripa Villegas', '6677519841', 'Director', 'Valle de Oaxaca #2542 Fracc. Valle Alto', '1', null);
INSERT INTO `empleados` VALUES ('2', 'Juan Carlos', 'Robles Medina', '667123123', 'Programador', 'Recursos', '1', null);
INSERT INTO `empleados` VALUES ('3', 'Roberto', 'Zamarripa', '6677519841', 'Programador', 'Valle Alto', '1', null);
INSERT INTO `empleados` VALUES ('4', 'Hernan', 'Hernandez', '234235234', 'Líder de proyecto', 'alguna', '1', '2015-08-28 00:20:45');

-- ----------------------------
-- Table structure for `estatus`
-- ----------------------------
DROP TABLE IF EXISTS `estatus`;
CREATE TABLE `estatus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `requisicion` varchar(20) DEFAULT NULL,
  `cotizacion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of estatus
-- ----------------------------
INSERT INTO `estatus` VALUES ('1', 'Activo', 'Pendiente', 'Pendiente');
INSERT INTO `estatus` VALUES ('2', 'Inactivo', 'Enviada', 'Aceptada');
INSERT INTO `estatus` VALUES ('3', null, 'Cotizada', 'Rechazada');
INSERT INTO `estatus` VALUES ('4', null, 'Cerrada', 'Cancelada');
INSERT INTO `estatus` VALUES ('5', null, 'Eliminada', null);

-- ----------------------------
-- Table structure for `inventario`
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
-- Records of inventario
-- ----------------------------

-- ----------------------------
-- Table structure for `ordencompra`
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
-- Records of ordencompra
-- ----------------------------

-- ----------------------------
-- Table structure for `ordenentrega`
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
-- Records of ordenentrega
-- ----------------------------

-- ----------------------------
-- Table structure for `pago`
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
-- Records of pago
-- ----------------------------

-- ----------------------------
-- Table structure for `proveedor`
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
INSERT INTO `proveedor` VALUES ('1', 'Lapizes del norte', 'efqwef', '123', '123123', '13123', 'wefwef', '1', '2015-08-28 17:48:26');
INSERT INTO `proveedor` VALUES ('3', 'Lala', '12312', 'efwef', '12312', '12312', 'dvwe', '1', '2015-08-28 17:54:37');
INSERT INTO `proveedor` VALUES ('4', 'Marinela', 'vwev', '23412', '234234', '234234', 'dbergber', '1', '2015-08-28 17:54:55');

-- ----------------------------
-- Table structure for `reqporproveedor`
-- ----------------------------
DROP TABLE IF EXISTS `reqporproveedor`;
CREATE TABLE `reqporproveedor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `requisicion_did` int(11) unsigned NOT NULL,
  `proveedor_did` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requisicion` (`requisicion_did`),
  KEY `proveedor` (`proveedor_did`),
  CONSTRAINT `proveedor` FOREIGN KEY (`proveedor_did`) REFERENCES `proveedor` (`id`),
  CONSTRAINT `requisicion` FOREIGN KEY (`requisicion_did`) REFERENCES `requisicion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reqporproveedor
-- ----------------------------
INSERT INTO `reqporproveedor` VALUES ('3', '19', '1');
INSERT INTO `reqporproveedor` VALUES ('4', '19', '3');
INSERT INTO `reqporproveedor` VALUES ('5', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('6', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('7', '19', '3');
INSERT INTO `reqporproveedor` VALUES ('8', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('9', '19', '1');
INSERT INTO `reqporproveedor` VALUES ('10', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('11', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('12', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('13', '19', '1');
INSERT INTO `reqporproveedor` VALUES ('14', '19', '3');
INSERT INTO `reqporproveedor` VALUES ('15', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('16', '19', '1');
INSERT INTO `reqporproveedor` VALUES ('17', '19', '3');
INSERT INTO `reqporproveedor` VALUES ('18', '20', '1');
INSERT INTO `reqporproveedor` VALUES ('19', '20', '3');
INSERT INTO `reqporproveedor` VALUES ('20', '20', '4');
INSERT INTO `reqporproveedor` VALUES ('21', '19', '1');
INSERT INTO `reqporproveedor` VALUES ('22', '19', '3');
INSERT INTO `reqporproveedor` VALUES ('23', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('24', '19', '1');
INSERT INTO `reqporproveedor` VALUES ('25', '19', '3');
INSERT INTO `reqporproveedor` VALUES ('26', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('27', '19', '1');
INSERT INTO `reqporproveedor` VALUES ('28', '19', '3');
INSERT INTO `reqporproveedor` VALUES ('29', '19', '4');
INSERT INTO `reqporproveedor` VALUES ('30', '19', '1');
INSERT INTO `reqporproveedor` VALUES ('31', '19', '3');
INSERT INTO `reqporproveedor` VALUES ('32', '19', '4');

-- ----------------------------
-- Table structure for `requisicion`
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of requisicion
-- ----------------------------
INSERT INTO `requisicion` VALUES ('19', '123', '2015-08-29', '2', 'Compras', '', '1', '1', '2015-08-28 17:08:27');
INSERT INTO `requisicion` VALUES ('20', '123', '2015-08-29', '2', 'Compras', '', '1', '1', '2015-08-28 17:09:41');

-- ----------------------------
-- Table structure for `solicitud`
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
-- Records of solicitud
-- ----------------------------

-- ----------------------------
-- Table structure for `tipousuario`
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
-- Records of tipousuario
-- ----------------------------
INSERT INTO `tipousuario` VALUES ('1', 'Administrador', '1', null);
INSERT INTO `tipousuario` VALUES ('2', 'Compras', '1', null);

-- ----------------------------
-- Table structure for `usuarios`
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

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'zama', '$2y$13$qwBK1uVdFVElaJgmmOTejeVkF/79H9CdZjvGOgL9dunCozxDu5qcC', '10', 'roberto@masoft.mx', '0-VH3OFD9TKCnea_aZflZtGCNxoOS7Qr', '1427244706', '1427244706', '', '1', '1', '2015-07-08 12:59:40');
INSERT INTO `usuarios` VALUES ('2', 'carlitos', '$2y$13$/YzeeqMybFr2o34Ux3102OMcKfP/RgVClimUuwuNAN2YYQ7Weu6Vq', '10', 'juancarlos@masoft.mx', 'F6WtN0hehLmVbxLxEf_Ug1Fk8fecLWpz', '1436382345', '1436382345', '', '2', '1', '2015-07-08 13:05:45');
