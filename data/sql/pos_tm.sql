-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: pos_tm
-- ------------------------------------------------------
-- Server version	5.6.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acceso`
--

DROP TABLE IF EXISTS `acceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `credencial` varchar(100) DEFAULT NULL,
  `menu_seguridad_id` int(11) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acceso_FI_1` (`menu_seguridad_id`),
  CONSTRAINT `acceso_FK_1` FOREIGN KEY (`menu_seguridad_id`) REFERENCES `menu_seguridad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acceso`
--

LOCK TABLES `acceso` WRITE;
/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora_archivo`
--

DROP TABLE IF EXISTS `bitacora_archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(260) NOT NULL,
  `nombre_original` varchar(260) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bitacora_archivo_FI_1` (`empresa_id`),
  CONSTRAINT `bitacora_archivo_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_archivo`
--

LOCK TABLES `bitacora_archivo` WRITE;
/*!40000 ALTER TABLE `bitacora_archivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora_archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodega`
--

DROP TABLE IF EXISTS `bodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bodega` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(60) DEFAULT NULL,
  `contacto` varchar(60) DEFAULT NULL,
  `encargado` varchar(60) DEFAULT NULL,
  `observaciones` text,
  `referencia` varchar(60) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `principal` tinyint(1) DEFAULT '0',
  `tipo_bodega_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bodega_FI_1` (`empresa_id`),
  KEY `bodega_FI_2` (`tipo_bodega_id`),
  CONSTRAINT `bodega_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `bodega_FK_2` FOREIGN KEY (`tipo_bodega_id`) REFERENCES `tipo_bodega` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodega`
--

LOCK TABLES `bodega` WRITE;
/*!40000 ALTER TABLE `bodega` DISABLE KEYS */;
/*!40000 ALTER TABLE `bodega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carga_lista_precio_detalle`
--

DROP TABLE IF EXISTS `carga_lista_precio_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carga_lista_precio_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lista_precio_id` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `moneda_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carga_lista_precio_detalle_FI_1` (`lista_precio_id`),
  KEY `carga_lista_precio_detalle_FI_2` (`moneda_id`),
  KEY `carga_lista_precio_detalle_FI_3` (`producto_id`),
  KEY `carga_lista_precio_detalle_FI_4` (`empresa_id`),
  CONSTRAINT `carga_lista_precio_detalle_FK_1` FOREIGN KEY (`lista_precio_id`) REFERENCES `lista_precio` (`id`),
  CONSTRAINT `carga_lista_precio_detalle_FK_2` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`),
  CONSTRAINT `carga_lista_precio_detalle_FK_3` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `carga_lista_precio_detalle_FK_4` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carga_lista_precio_detalle`
--

LOCK TABLES `carga_lista_precio_detalle` WRITE;
/*!40000 ALTER TABLE `carga_lista_precio_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `carga_lista_precio_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carga_lista_precio_encabezado`
--

DROP TABLE IF EXISTS `carga_lista_precio_encabezado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carga_lista_precio_encabezado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `bitacora_archivo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carga_lista_precio_encabezado_FI_1` (`empresa_id`),
  KEY `carga_lista_precio_encabezado_FI_2` (`bitacora_archivo_id`),
  CONSTRAINT `carga_lista_precio_encabezado_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `carga_lista_precio_encabezado_FK_2` FOREIGN KEY (`bitacora_archivo_id`) REFERENCES `bitacora_archivo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carga_lista_precio_encabezado`
--

LOCK TABLES `carga_lista_precio_encabezado` WRITE;
/*!40000 ALTER TABLE `carga_lista_precio_encabezado` DISABLE KEYS */;
/*!40000 ALTER TABLE `carga_lista_precio_encabezado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo_servicio`
--

DROP TABLE IF EXISTS `cargo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `valor_fijo` double DEFAULT '0',
  `valor_porcentaje` double DEFAULT '0',
  `tipo` varchar(32) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `observaciones` text,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cargo_servicio_FI_1` (`empresa_id`),
  KEY `cargo_servicio_FI_2` (`region_id`),
  CONSTRAINT `cargo_servicio_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `cargo_servicio_FK_2` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo_servicio`
--

LOCK TABLES `cargo_servicio` WRITE;
/*!40000 ALTER TABLE `cargo_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_producto`
--

DROP TABLE IF EXISTS `categoria_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `observaciones` text,
  `activo` tinyint(1) DEFAULT '1',
  `cantidad_alerta_minimo` int(11) DEFAULT NULL,
  `alerta_minimo` tinyint(1) DEFAULT '0',
  `claves_busqueda` varchar(500) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `comision_vendedor` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_producto_FI_1` (`empresa_id`),
  CONSTRAINT `categoria_producto_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_producto`
--

LOCK TABLES `categoria_producto` WRITE;
/*!40000 ALTER TABLE `categoria_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_usuario`
--

DROP TABLE IF EXISTS `categoria_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `categoria_producto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_usuario_FI_1` (`usuario_id`),
  KEY `categoria_usuario_FI_2` (`categoria_producto_id`),
  CONSTRAINT `categoria_usuario_FK_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  CONSTRAINT `categoria_usuario_FK_2` FOREIGN KEY (`categoria_producto_id`) REFERENCES `categoria_producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_usuario`
--

LOCK TABLES `categoria_usuario` WRITE;
/*!40000 ALTER TABLE `categoria_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cliente_id` int(11) DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `lista_precio_id` int(11) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `tipo_documento_identificacion` varchar(20) DEFAULT NULL,
  `no_documento_identificacion` varchar(200) DEFAULT NULL,
  `nit` varchar(60) DEFAULT NULL,
  `referencia` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `telefono_secundario` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(60) DEFAULT NULL,
  `contacto` varchar(60) DEFAULT NULL,
  `observaciones` text,
  `limite_credito` double DEFAULT NULL,
  `dias_credito` int(11) DEFAULT NULL,
  `ultima_compra` date DEFAULT NULL,
  `referido_por` varchar(32) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_FI_1` (`tipo_cliente_id`),
  KEY `cliente_FI_2` (`empresa_id`),
  KEY `cliente_FI_3` (`lista_precio_id`),
  CONSTRAINT `cliente_FK_1` FOREIGN KEY (`tipo_cliente_id`) REFERENCES `tipo_cliente` (`id`),
  CONSTRAINT `cliente_FK_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `cliente_FK_3` FOREIGN KEY (`lista_precio_id`) REFERENCES `lista_precio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combo_producto`
--

DROP TABLE IF EXISTS `combo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combo_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(32) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `observaciones` text,
  `empresa_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `combo_producto_FI_1` (`empresa_id`),
  CONSTRAINT `combo_producto_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combo_producto`
--

LOCK TABLES `combo_producto` WRITE;
/*!40000 ALTER TABLE `combo_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `combo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combo_producto_detalle`
--

DROP TABLE IF EXISTS `combo_producto_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combo_producto_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `cantidad_producto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `combo_producto_detalle_FI_1` (`producto_id`),
  KEY `combo_producto_detalle_FI_2` (`empresa_id`),
  CONSTRAINT `combo_producto_detalle_FK_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `combo_producto_detalle_FK_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combo_producto_detalle`
--

LOCK TABLES `combo_producto_detalle` WRITE;
/*!40000 ALTER TABLE `combo_producto_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `combo_producto_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario_cliente`
--

DROP TABLE IF EXISTS `comentario_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `titulo` varchar(60) DEFAULT NULL,
  `comentario` text,
  `fecha_hora` datetime DEFAULT NULL,
  `estatus` varchar(300) DEFAULT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comentario_cliente_FI_1` (`empresa_id`),
  KEY `comentario_cliente_FI_2` (`cliente_id`),
  CONSTRAINT `comentario_cliente_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `comentario_cliente_FK_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario_cliente`
--

LOCK TABLES `comentario_cliente` WRITE;
/*!40000 ALTER TABLE `comentario_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `representante` varchar(160) DEFAULT NULL,
  `gerente` varchar(160) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(60) DEFAULT NULL,
  `correo_electronico_contacto` varchar(60) DEFAULT NULL,
  `contacto` varchar(60) DEFAULT NULL,
  `tipo_servicio` varchar(60) DEFAULT NULL,
  `nit` varchar(60) DEFAULT NULL,
  `resolucion` varchar(60) DEFAULT NULL,
  `razon_social` varchar(60) DEFAULT NULL,
  `referencia` varchar(60) DEFAULT NULL,
  `web_social` varchar(200) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `eslogan` varchar(200) DEFAULT NULL,
  `observaciones` text,
  `visiom` text,
  `mision` text,
  `historia` text,
  `corre_electronico` varchar(60) DEFAULT NULL,
  `clave_electronico` varchar(60) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `garantia_producto`
--

DROP TABLE IF EXISTS `garantia_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `garantia_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `motivo` varchar(60) DEFAULT NULL,
  `comentario` text,
  `fecha_hora` datetime DEFAULT NULL,
  `estatus` varchar(300) DEFAULT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `garantia_producto_FI_1` (`empresa_id`),
  KEY `garantia_producto_FI_2` (`cliente_id`),
  KEY `garantia_producto_FI_3` (`producto_id`),
  CONSTRAINT `garantia_producto_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `garantia_producto_FK_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `garantia_producto_FK_3` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garantia_producto`
--

LOCK TABLES `garantia_producto` WRITE;
/*!40000 ALTER TABLE `garantia_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `garantia_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario_producto`
--

DROP TABLE IF EXISTS `inventario_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario_producto` (
  `empresa_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `observaciones` text,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `estatus` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventario_producto_FI_1` (`empresa_id`),
  CONSTRAINT `inventario_producto_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario_producto`
--

LOCK TABLES `inventario_producto` WRITE;
/*!40000 ALTER TABLE `inventario_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario_producto_detalle`
--

DROP TABLE IF EXISTS `inventario_producto_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario_producto_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventario_producto_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `combo_producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventario_producto_detalle_FI_1` (`inventario_producto_id`),
  KEY `inventario_producto_detalle_FI_2` (`producto_id`),
  KEY `inventario_producto_detalle_FI_3` (`combo_producto_id`),
  KEY `inventario_producto_detalle_FI_4` (`empresa_id`),
  CONSTRAINT `inventario_producto_detalle_FK_1` FOREIGN KEY (`inventario_producto_id`) REFERENCES `inventario_producto` (`id`),
  CONSTRAINT `inventario_producto_detalle_FK_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `inventario_producto_detalle_FK_3` FOREIGN KEY (`combo_producto_id`) REFERENCES `combo_producto` (`id`),
  CONSTRAINT `inventario_producto_detalle_FK_4` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario_producto_detalle`
--

LOCK TABLES `inventario_producto_detalle` WRITE;
/*!40000 ALTER TABLE `inventario_producto_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario_producto_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_precio`
--

DROP TABLE IF EXISTS `lista_precio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_precio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `principal` tinyint(1) DEFAULT '0',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lista_precio_FI_1` (`empresa_id`),
  CONSTRAINT `lista_precio_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_precio`
--

LOCK TABLES `lista_precio` WRITE;
/*!40000 ALTER TABLE `lista_precio` DISABLE KEYS */;
/*!40000 ALTER TABLE `lista_precio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_seguridad`
--

DROP TABLE IF EXISTS `menu_seguridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_seguridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `credencial` varchar(100) DEFAULT NULL,
  `modulo` varchar(100) DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `superior` int(11) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_seguridad`
--

LOCK TABLES `menu_seguridad` WRITE;
/*!40000 ALTER TABLE `menu_seguridad` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_seguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moneda`
--

DROP TABLE IF EXISTS `moneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moneda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `principal` tinyint(1) DEFAULT '0',
  `codigo_iso` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moneda`
--

LOCK TABLES `moneda` WRITE;
/*!40000 ALTER TABLE `moneda` DISABLE KEYS */;
INSERT INTO `moneda` VALUES (1,0,'as','ss',1,NULL,NULL,'2015-07-19 08:33:48','2015-07-19 08:33:48',NULL);
/*!40000 ALTER TABLE `moneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento_producto`
--

DROP TABLE IF EXISTS `movimiento_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `tipo_movimiento_id` int(11) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `observaciones` text,
  `activo` tinyint(1) DEFAULT '1',
  `valor_signo` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movimiento_producto_FI_1` (`empresa_id`),
  KEY `movimiento_producto_FI_2` (`cliente_id`),
  KEY `movimiento_producto_FI_3` (`proveedor_id`),
  KEY `movimiento_producto_FI_4` (`tipo_movimiento_id`),
  CONSTRAINT `movimiento_producto_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `movimiento_producto_FK_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `movimiento_producto_FK_3` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`),
  CONSTRAINT `movimiento_producto_FK_4` FOREIGN KEY (`tipo_movimiento_id`) REFERENCES `tipo_movimiento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento_producto`
--

LOCK TABLES `movimiento_producto` WRITE;
/*!40000 ALTER TABLE `movimiento_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimiento_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento_producto_detalle`
--

DROP TABLE IF EXISTS `movimiento_producto_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento_producto_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventario_producto_id` int(11) DEFAULT NULL,
  `movimiento_producto_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `combo_producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valor_signo` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movimiento_producto_detalle_FI_1` (`inventario_producto_id`),
  KEY `movimiento_producto_detalle_FI_2` (`movimiento_producto_id`),
  KEY `movimiento_producto_detalle_FI_3` (`producto_id`),
  KEY `movimiento_producto_detalle_FI_4` (`combo_producto_id`),
  CONSTRAINT `movimiento_producto_detalle_FK_1` FOREIGN KEY (`inventario_producto_id`) REFERENCES `inventario_producto` (`id`),
  CONSTRAINT `movimiento_producto_detalle_FK_2` FOREIGN KEY (`movimiento_producto_id`) REFERENCES `movimiento_producto` (`id`),
  CONSTRAINT `movimiento_producto_detalle_FK_3` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `movimiento_producto_detalle_FK_4` FOREIGN KEY (`combo_producto_id`) REFERENCES `combo_producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento_producto_detalle`
--

LOCK TABLES `movimiento_producto_detalle` WRITE;
/*!40000 ALTER TABLE `movimiento_producto_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimiento_producto_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operacion`
--

DROP TABLE IF EXISTS `operacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `nit` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `observaciones` text,
  `activo` tinyint(1) DEFAULT '1',
  `valor_total` double DEFAULT NULL,
  `estatus` varchar(300) DEFAULT NULL,
  `anulado` tinyint(1) DEFAULT NULL,
  `valor_pagado` double DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operacion_FI_1` (`empresa_id`),
  KEY `operacion_FI_2` (`cliente_id`),
  CONSTRAINT `operacion_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `operacion_FK_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operacion`
--

LOCK TABLES `operacion` WRITE;
/*!40000 ALTER TABLE `operacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `operacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operacion_detalle`
--

DROP TABLE IF EXISTS `operacion_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operacion_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `combo_producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operacion_detalle_FI_1` (`empresa_id`),
  KEY `operacion_detalle_FI_2` (`producto_id`),
  KEY `operacion_detalle_FI_3` (`combo_producto_id`),
  CONSTRAINT `operacion_detalle_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `operacion_detalle_FK_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `operacion_detalle_FK_3` FOREIGN KEY (`combo_producto_id`) REFERENCES `combo_producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operacion_detalle`
--

LOCK TABLES `operacion_detalle` WRITE;
/*!40000 ALTER TABLE `operacion_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `operacion_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `principal` tinyint(1) DEFAULT '0',
  `codigo_iso` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_acceso`
--

DROP TABLE IF EXISTS `perfil_acceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_id` int(11) DEFAULT NULL,
  `acceso_id` int(11) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil_acceso_FI_1` (`perfil_id`),
  KEY `perfil_acceso_FI_2` (`acceso_id`),
  CONSTRAINT `perfil_acceso_FK_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  CONSTRAINT `perfil_acceso_FK_2` FOREIGN KEY (`acceso_id`) REFERENCES `acceso` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_acceso`
--

LOCK TABLES `perfil_acceso` WRITE;
/*!40000 ALTER TABLE `perfil_acceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil_acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_menu`
--

DROP TABLE IF EXISTS `perfil_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_id` int(11) DEFAULT NULL,
  `menu_seguridad_id` int(11) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil_menu_FI_1` (`perfil_id`),
  KEY `perfil_menu_FI_2` (`menu_seguridad_id`),
  CONSTRAINT `perfil_menu_FK_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  CONSTRAINT `perfil_menu_FK_2` FOREIGN KEY (`menu_seguridad_id`) REFERENCES `menu_seguridad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_menu`
--

LOCK TABLES `perfil_menu` WRITE;
/*!40000 ALTER TABLE `perfil_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precio_producto`
--

DROP TABLE IF EXISTS `precio_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precio_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `lista_precio_id` int(11) DEFAULT NULL,
  `moneda_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `valor` double DEFAULT NULL,
  `ultima_actualizacion` date DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `precio_producto_FI_1` (`producto_id`),
  KEY `precio_producto_FI_2` (`lista_precio_id`),
  KEY `precio_producto_FI_3` (`moneda_id`),
  CONSTRAINT `precio_producto_FK_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `precio_producto_FK_2` FOREIGN KEY (`lista_precio_id`) REFERENCES `lista_precio` (`id`),
  CONSTRAINT `precio_producto_FK_3` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precio_producto`
--

LOCK TABLES `precio_producto` WRITE;
/*!40000 ALTER TABLE `precio_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `precio_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comision_vendedor` double DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `claves_busqueda` varchar(500) DEFAULT NULL,
  `categoria_producto_id` int(11) DEFAULT NULL,
  `cantidad_alerta_minimo` int(11) DEFAULT NULL,
  `notifica_movimiento` int(11) DEFAULT NULL,
  `codigo_erp` varchar(32) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `observaciones` text,
  `empresa_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `dias_garantia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_FI_1` (`categoria_producto_id`),
  KEY `producto_FI_2` (`empresa_id`),
  CONSTRAINT `producto_FK_1` FOREIGN KEY (`categoria_producto_id`) REFERENCES `categoria_producto` (`id`),
  CONSTRAINT `producto_FK_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_existencia`
--

DROP TABLE IF EXISTS `producto_existencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_existencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `bodega_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_existencia_FI_1` (`empresa_id`),
  KEY `producto_existencia_FI_2` (`producto_id`),
  KEY `producto_existencia_FI_3` (`bodega_id`),
  CONSTRAINT `producto_existencia_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `producto_existencia_FK_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `producto_existencia_FK_3` FOREIGN KEY (`bodega_id`) REFERENCES `bodega` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_existencia`
--

LOCK TABLES `producto_existencia` WRITE;
/*!40000 ALTER TABLE `producto_existencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_existencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propel_migration`
--

DROP TABLE IF EXISTS `propel_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propel_migration` (
  `version` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propel_migration`
--

LOCK TABLES `propel_migration` WRITE;
/*!40000 ALTER TABLE `propel_migration` DISABLE KEYS */;
INSERT INTO `propel_migration` VALUES (1437017310);
/*!40000 ALTER TABLE `propel_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `observaciones` text,
  `telefono` varchar(60) DEFAULT NULL,
  `correo_electronico` varchar(60) DEFAULT NULL,
  `contacto` varchar(60) DEFAULT NULL,
  `nit` varchar(60) DEFAULT NULL,
  `dias_credito` int(11) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proveedor_FI_1` (`empresa_id`),
  CONSTRAINT `proveedor_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `principal` tinyint(1) DEFAULT '0',
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`id`),
  KEY `region_FI_1` (`empresa_id`),
  CONSTRAINT `region_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region_detalle`
--

DROP TABLE IF EXISTS `region_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `region_detalle_FI_1` (`region_id`),
  CONSTRAINT `region_detalle_FK_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region_detalle`
--

LOCK TABLES `region_detalle` WRITE;
/*!40000 ALTER TABLE `region_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `region_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_bodega`
--

DROP TABLE IF EXISTS `tipo_bodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_bodega` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_bodega_FI_1` (`empresa_id`),
  CONSTRAINT `tipo_bodega_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_bodega`
--

LOCK TABLES `tipo_bodega` WRITE;
/*!40000 ALTER TABLE `tipo_bodega` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_bodega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_cliente_FI_1` (`empresa_id`),
  CONSTRAINT `tipo_cliente_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cliente`
--

LOCK TABLES `tipo_cliente` WRITE;
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_descuento`
--

DROP TABLE IF EXISTS `tipo_descuento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_descuento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor_fijo` double DEFAULT '0',
  `valor_porcentaje` double DEFAULT '0',
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_descuento`
--

LOCK TABLES `tipo_descuento` WRITE;
/*!40000 ALTER TABLE `tipo_descuento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_descuento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_movimiento`
--

DROP TABLE IF EXISTS `tipo_movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_movimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_movimiento_FI_1` (`empresa_id`),
  CONSTRAINT `tipo_movimiento_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_movimiento`
--

LOCK TABLES `tipo_movimiento` WRITE;
/*!40000 ALTER TABLE `tipo_movimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(32) NOT NULL,
  `clave` varchar(60) DEFAULT NULL,
  `nombre_completo` varchar(250) NOT NULL,
  `administrador` tinyint(1) DEFAULT '0',
  `reintento_incorrecto` int(11) DEFAULT '0',
  `ultimo_ingreso` date DEFAULT NULL,
  `bloqueado` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'demo','89e495e7941cf9e40e6980d14a16bf023ccd4c91','x',0,0,NULL,0,NULL,NULL,NULL,NULL),(2,'usuario','b665e217b51994789b02b1838e730d6b93baa30f','usa',0,0,NULL,0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_perfil`
--

DROP TABLE IF EXISTS `usuario_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_perfil_FI_1` (`perfil_id`),
  KEY `usuario_perfil_FI_2` (`usuario_id`),
  CONSTRAINT `usuario_perfil_FK_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  CONSTRAINT `usuario_perfil_FK_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_perfil`
--

LOCK TABLES `usuario_perfil` WRITE;
/*!40000 ALTER TABLE `usuario_perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_perfil` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-19 21:10:53
