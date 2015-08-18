# ************************************************************
# Sequel Pro SQL dump
# Versión 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38)
# Base de datos: shabel
# Tiempo de Generación: 2015-08-18 18:11:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla actividad
# ------------------------------------------------------------

DROP TABLE IF EXISTS `actividad`;

CREATE TABLE `actividad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `modulo` varchar(20) DEFAULT NULL,
  `descripcion` text,
  `usuario` varchar(10) DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla articulo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articulo`;

CREATE TABLE `articulo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `unidad` varchar(50) DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `articulo_estatus` (`estatus_did`),
  CONSTRAINT `articulo_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla cliente
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` text,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT '',
  `telefono1` varchar(12) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `proveedor_estatus` (`estatus_did`),
  CONSTRAINT `cliente_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla configuracion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `configuracion`;

CREATE TABLE `configuracion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mantenimiento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla cotizacion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cotizacion`;

CREATE TABLE `cotizacion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) DEFAULT NULL,
  `fecha_f` date DEFAULT NULL,
  `porcentaje` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `requisicion_did` int(11) unsigned DEFAULT NULL,
  `cliente_did` int(11) unsigned DEFAULT NULL,
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



# Volcado de tabla detallecotizacion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detallecotizacion`;

CREATE TABLE `detallecotizacion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `articulo_aid` int(11) unsigned DEFAULT NULL,
  `preciounitario` float DEFAULT NULL,
  `importe` float DEFAULT NULL,
  `porcentaje` float DEFAULT NULL,
  `cotizacion_did` int(11) unsigned DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `comentarios` text,
  `fechacreacion_ft` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallerequisicion_articulo` (`articulo_aid`),
  KEY `detallerequisicion_requisicion` (`cotizacion_did`),
  KEY `detallerequisicion_estatus` (`estatus_did`),
  CONSTRAINT `detallecotizacion_cotizacion` FOREIGN KEY (`cotizacion_did`) REFERENCES `cotizacion` (`id`),
  CONSTRAINT `detallecotizacion_ibfk_1` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detallecotizacion_ibfk_2` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla detalleordencompra
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detalleordencompra`;

CREATE TABLE `detalleordencompra` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `articulo_aid` int(11) unsigned DEFAULT NULL,
  `comentarios` text,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `ordencompra_did` int(11) unsigned DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallerequisicion_articulo` (`articulo_aid`),
  KEY `detallerequisicion_requisicion` (`ordencompra_did`),
  KEY `detallerequisicion_estatus` (`estatus_did`),
  CONSTRAINT `detalleordencompra_ibfk_1` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detalleordencompra_ibfk_2` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`),
  CONSTRAINT `detalleordencompra_ibfk_3` FOREIGN KEY (`ordencompra_did`) REFERENCES `ordencompra` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla detalleordenentrega
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detalleordenentrega`;

CREATE TABLE `detalleordenentrega` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `articulo_aid` int(11) unsigned DEFAULT NULL,
  `preciounitario` float DEFAULT NULL,
  `importe` float DEFAULT NULL,
  `porcentaje` float DEFAULT NULL,
  `ordenentrega_did` int(11) unsigned DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `comentarios` text,
  `fechacreacion_ft` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallerequisicion_articulo` (`articulo_aid`),
  KEY `detallerequisicion_requisicion` (`ordenentrega_did`),
  KEY `detallerequisicion_estatus` (`estatus_did`),
  CONSTRAINT `detalleordenentrega_ibfk_1` FOREIGN KEY (`ordenentrega_did`) REFERENCES `ordenentrega` (`id`),
  CONSTRAINT `detalleordenentrega_ibfk_2` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detalleordenentrega_ibfk_3` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla detallerequisicion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detallerequisicion`;

CREATE TABLE `detallerequisicion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `articulo_aid` int(11) unsigned DEFAULT NULL,
  `comentarios` text,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `requisicion_did` int(11) unsigned DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallerequisicion_articulo` (`articulo_aid`),
  KEY `detallerequisicion_requisicion` (`requisicion_did`),
  KEY `detallerequisicion_estatus` (`estatus_did`),
  CONSTRAINT `detallerequisicion_articulo` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`),
  CONSTRAINT `detallerequisicion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detallerequisicion_requisicion` FOREIGN KEY (`requisicion_did`) REFERENCES `requisicion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla detallesolicitud
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detallesolicitud`;

CREATE TABLE `detallesolicitud` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `articulo_aid` int(11) unsigned DEFAULT NULL,
  `solicitud_did` int(11) unsigned DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `comentarios` text,
  `fechacreacion_ft` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `detallesolicitud_articulo` (`articulo_aid`),
  KEY `detallesolicitud_requisicion` (`solicitud_did`),
  KEY `detallesolicitud_estatus` (`estatus_did`),
  CONSTRAINT `detallesolicitud_articulos` FOREIGN KEY (`articulo_aid`) REFERENCES `articulo` (`id`),
  CONSTRAINT `detallesolicitud_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `detallesolicitud_solicitud` FOREIGN KEY (`solicitud_did`) REFERENCES `solicitud` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla empleados
# ------------------------------------------------------------

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT '',
  `apellidos` varchar(100) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `puesto` varchar(100) DEFAULT NULL,
  `direccion` text,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empleados_estatus` (`estatus_did`),
  CONSTRAINT `empleados_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;

INSERT INTO `empleados` (`id`, `nombre`, `apellidos`, `celular`, `puesto`, `direccion`, `estatus_did`)
VALUES
	(1,'Roberto','Zamarripa Villegas','6677519841','Director','Valle de Oaxaca #2542 Fracc. Valle Alto',1),
	(2,'Juan Carlos','Robles Medina','667123123','Programador','Recursos',1),
	(3,'Roberto','Zamarripa','6677519841','Programador','Valle Alto',1);

/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla estatus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `estatus`;

CREATE TABLE `estatus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `requisicion` varchar(20) DEFAULT NULL,
  `cotizacion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `estatus` WRITE;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;

INSERT INTO `estatus` (`id`, `nombre`, `requisicion`, `cotizacion`)
VALUES
	(1,'Activo','Pendiente','Pendiente');

/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla inventario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `inventario`;

CREATE TABLE `inventario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `articulos_aid` int(11) unsigned DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `inventario_articulo` (`articulos_aid`),
  KEY `inventario_estatus` (`estatus_did`),
  CONSTRAINT `inventario_articulo` FOREIGN KEY (`articulos_aid`) REFERENCES `articulo` (`id`),
  CONSTRAINT `inventario_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla ordencompra
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ordencompra`;

CREATE TABLE `ordencompra` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) DEFAULT NULL,
  `requisicion_did` int(11) unsigned DEFAULT NULL,
  `codicionpago` varchar(20) DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `fechaCreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ordencompra_requisicion` (`requisicion_did`),
  KEY `ordencompra_estatus` (`estatus_did`),
  CONSTRAINT `ordencompra_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `ordencompra_requisicion` FOREIGN KEY (`requisicion_did`) REFERENCES `requisicion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla ordenentrega
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ordenentrega`;

CREATE TABLE `ordenentrega` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_did` int(11) unsigned DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `folio` varchar(20) DEFAULT NULL,
  `fecha_f` date DEFAULT NULL,
  `comentarios` text,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ordenentrega_cliente` (`cliente_did`),
  KEY `ordenentrega_estatus` (`estatus_did`),
  CONSTRAINT `ordenentrega_cliente` FOREIGN KEY (`cliente_did`) REFERENCES `cliente` (`id`),
  CONSTRAINT `ordenentrega_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla pago
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pago`;

CREATE TABLE `pago` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `requisicion_did` int(11) unsigned DEFAULT NULL,
  `cotizacion_did` int(11) unsigned DEFAULT NULL,
  `ordenentrega_did` int(11) unsigned DEFAULT NULL,
  `importe` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla proveedor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` text,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT '',
  `telefono1` varchar(12) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `proveedor_estatus` (`estatus_did`),
  CONSTRAINT `proveedor_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla requisicion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `requisicion`;

CREATE TABLE `requisicion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) DEFAULT NULL,
  `fecha_f` date DEFAULT NULL,
  `cliente_did` int(11) unsigned DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `comentarios` text,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `usuario_aid` int(11) unsigned DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `requisicion_cliente` (`cliente_did`),
  KEY `requisicion_estatus` (`estatus_did`),
  KEY `requisicion_usuario` (`usuario_aid`),
  CONSTRAINT `requisicion_cliente` FOREIGN KEY (`cliente_did`) REFERENCES `cliente` (`id`),
  CONSTRAINT `requisicion_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`),
  CONSTRAINT `requisicion_usuario` FOREIGN KEY (`usuario_aid`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla solicitud
# ------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `requisicion_did` int(11) unsigned DEFAULT NULL,
  `proveedor_did` int(11) unsigned DEFAULT NULL,
  `fecha_f` date DEFAULT NULL,
  `fechacreacion_ft` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `solicitud_requisicion` (`requisicion_did`),
  KEY `solicitud_proveedor` (`proveedor_did`),
  CONSTRAINT `solicitud_proveedor` FOREIGN KEY (`proveedor_did`) REFERENCES `proveedor` (`id`),
  CONSTRAINT `solicitud_requisicion` FOREIGN KEY (`requisicion_did`) REFERENCES `requisicion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla tipousuario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tipousuario`;

CREATE TABLE `tipousuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipousuario_estatus` (`estatus_did`),
  CONSTRAINT `tipousuario_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;

INSERT INTO `tipousuario` (`id`, `nombre`, `estatus_did`)
VALUES
	(1,'Administrador',1),
	(2,'Compras',1);

/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password_hash` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `auth_key` varchar(50) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `empleado_did` int(11) unsigned DEFAULT NULL,
  `estatus_did` int(11) unsigned DEFAULT NULL,
  `fechacreacion_ft` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `usuario_estatus` (`estatus_did`),
  KEY `usuario_empleado` (`empleado_did`),
  CONSTRAINT `usuario_empleado` FOREIGN KEY (`empleado_did`) REFERENCES `empleados` (`id`),
  CONSTRAINT `usuario_estatus` FOREIGN KEY (`estatus_did`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id`, `username`, `password_hash`, `status`, `email`, `auth_key`, `created_at`, `updated_at`, `password_reset_token`, `empleado_did`, `estatus_did`, `fechacreacion_ft`)
VALUES
	(1,'zama','$2y$13$qwBK1uVdFVElaJgmmOTejeVkF/79H9CdZjvGOgL9dunCozxDu5qcC',10,'roberto@masoft.mx','0-VH3OFD9TKCnea_aZflZtGCNxoOS7Qr',1427244706,1427244706,NULL,1,1,'2015-07-08 12:59:40'),
	(2,'carlitos','$2y$13$/YzeeqMybFr2o34Ux3102OMcKfP/RgVClimUuwuNAN2YYQ7Weu6Vq',10,'juancarlos@masoft.mx','F6WtN0hehLmVbxLxEf_Ug1Fk8fecLWpz',1436382345,1436382345,NULL,2,1,'2015-07-08 13:05:45');

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
