/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : shabel

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-08-27 14:17:16
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of actividad
-- ----------------------------
INSERT INTO `actividad` VALUES ('1', null, 'Ha creado una requisición', '1', '2015-08-25 14:51:37');
INSERT INTO `actividad` VALUES ('2', null, 'Ha creado una requisición', '1', '2015-08-25 14:56:41');
INSERT INTO `actividad` VALUES ('3', null, 'Ha creado una requisición', '1', '2015-08-25 15:27:09');
INSERT INTO `actividad` VALUES ('4', null, 'Ha creado una requisición', '1', '2015-08-25 15:39:05');
INSERT INTO `actividad` VALUES ('5', null, 'Ha creado una requisición', '1', '2015-08-25 15:40:25');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articulo
-- ----------------------------
INSERT INTO `articulo` VALUES ('1', 'chicle', 'pza', '1', '2015-08-25 14:24:10');
INSERT INTO `articulo` VALUES ('2', 'pizza', 'pza', '1', '2015-08-25 14:45:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('1', 'uss', 'uss', 'dvwefv', '234234', '234234', 'ervrt@wfeerf', '1', '2015-08-19 14:06:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detallerequisicion
-- ----------------------------
INSERT INTO `detallerequisicion` VALUES ('1', '0', '1', 'wqefqwef', '1', '7', '2015-08-25 14:43:10');
INSERT INTO `detallerequisicion` VALUES ('2', '1', '1', 'asdasdasd', '1', '8', '2015-08-25 14:43:44');
INSERT INTO `detallerequisicion` VALUES ('3', '23', '1', 'asfawfqw', '1', '9', '2015-08-25 14:45:52');
INSERT INTO `detallerequisicion` VALUES ('4', '32', '2', 'ergerg', '1', '9', '2015-08-25 14:45:52');
INSERT INTO `detallerequisicion` VALUES ('6', '12', '1', 'wefwef', '1', '11', '2015-08-25 14:51:37');
INSERT INTO `detallerequisicion` VALUES ('8', '12', '1', 'wefwef', '1', '13', '2015-08-25 14:56:41');
INSERT INTO `detallerequisicion` VALUES ('9', '12', '1', 'efwef', '1', '14', '2015-08-25 15:27:09');
INSERT INTO `detallerequisicion` VALUES ('10', '12', '1', 'wqefwef', '1', '15', '2015-08-25 15:39:05');
INSERT INTO `detallerequisicion` VALUES ('11', '12', '1', 'wefwef', '1', '16', '2015-08-25 15:40:25');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empleados
-- ----------------------------
INSERT INTO `empleados` VALUES ('1', 'Roberto', 'Zamarripa Villegas', '6677519841', 'Director', 'Valle de Oaxaca #2542 Fracc. Valle Alto', '1', null);
INSERT INTO `empleados` VALUES ('2', 'Juan Carlos', 'Robles Medina', '667123123', 'Programador', 'Recursos', '1', null);
INSERT INTO `empleados` VALUES ('3', 'Roberto', 'Zamarripa', '6677519841', 'Programador', 'Valle Alto', '1', null);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proveedor
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of requisicion
-- ----------------------------
INSERT INTO `requisicion` VALUES ('1', 'qergwe', '0000-00-00', '1', 'qerg', 'q3gfq', '1', '1', '2015-08-19 14:13:19');
INSERT INTO `requisicion` VALUES ('2', 'aweW', '2015-08-19', '1', 'qwdQW', 'qwdQWD', '1', '1', '2015-08-19 14:15:15');
INSERT INTO `requisicion` VALUES ('3', '', '2015-08-20', '1', '', '', '1', '1', '2015-08-20 14:23:28');
INSERT INTO `requisicion` VALUES ('7', 'qwdqw', '0000-00-00', '1', 'qwdqwd', 'qwdqwd', '1', '1', '2015-08-25 14:43:10');
INSERT INTO `requisicion` VALUES ('8', '12345', '0000-00-00', '1', 'cosme', 'no mames we', '1', '1', '2015-08-25 14:43:44');
INSERT INTO `requisicion` VALUES ('9', '123456', '0000-00-00', '1', 'cosme', 'no mames we', '1', '1', '2015-08-25 14:45:52');
INSERT INTO `requisicion` VALUES ('11', '123', '2015-08-25', '1', 'awdqw', 'qwdqwd', '1', '1', '2015-08-25 14:51:37');
INSERT INTO `requisicion` VALUES ('13', '1233423', '2015-08-25', '1', 'wefwef', 'qwefwef', '1', '1', '2015-08-25 14:56:41');
INSERT INTO `requisicion` VALUES ('14', 'qwd212', '2015-08-25', '1', 'qwfqwf', 'qwfqwf', '1', '1', '2015-08-25 15:27:09');
INSERT INTO `requisicion` VALUES ('15', 'wefwe', '2015-08-25', '1', 'wefwef', 'wefwef', '1', '1', '2015-08-25 15:39:05');
INSERT INTO `requisicion` VALUES ('16', 'wwef', '2015-08-25', '1', 'wefwe', 'wefwef', '1', '1', '2015-08-25 15:40:25');

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
