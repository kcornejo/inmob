-- MySQL dump 10.13  Distrib 5.5.36, for Win32 (x86)
--
-- Host: localhost    Database: vit_sms
-- ------------------------------------------------------
-- Server version	5.5.36

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
-- Table structure for table `bitacora_archivo_csv`
--

DROP TABLE IF EXISTS `bitacora_archivo_csv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_archivo_csv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_original` varchar(200) DEFAULT NULL,
  `nombre_archivo` varchar(200) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_archivo_csv`
--

LOCK TABLES `bitacora_archivo_csv` WRITE;
/*!40000 ALTER TABLE `bitacora_archivo_csv` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora_archivo_csv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion_envio`
--

DROP TABLE IF EXISTS `configuracion_envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion_envio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_sms` varchar(300) DEFAULT NULL,
  `usuario_sms` varchar(300) DEFAULT NULL,
  `key_sms` varchar(300) DEFAULT NULL,
  `procesa_sms` tinyint(1) DEFAULT '0',
  `pais_iso` varchar(5) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion_envio`
--

LOCK TABLES `configuracion_envio` WRITE;
/*!40000 ALTER TABLE `configuracion_envio` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracion_envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefijo` varchar(32) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL,
  `direccion` varchar(260) DEFAULT NULL,
  `telefono` varchar(260) DEFAULT NULL,
  `encargado` varchar(260) DEFAULT NULL,
  `observaciones` text,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `limite_envio` int(11) DEFAULT NULL,
  `limite_envio_diario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'El','El camino Web','San, Cristobal, Guatemala','404646869','jose luis','',1,NULL,NULL,'2015-05-24 05:43:10','2015-05-24 05:43:10',10000,10000);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa_filtra_campos`
--

DROP TABLE IF EXISTS `empresa_filtra_campos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa_filtra_campos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `campo` varchar(160) NOT NULL,
  `sustituye` varchar(160) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresa_filtra_campos_FI_1` (`empresa_id`),
  CONSTRAINT `empresa_filtra_campos_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_filtra_campos`
--

LOCK TABLES `empresa_filtra_campos` WRITE;
/*!40000 ALTER TABLE `empresa_filtra_campos` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa_filtra_campos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envio_mensaje`
--

DROP TABLE IF EXISTS `envio_mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envio_mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bitacora_archivo_csv_id` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `hora_inicio` varchar(20) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `usuario` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `envio_mensaje_FI_1` (`bitacora_archivo_csv_id`),
  CONSTRAINT `envio_mensaje_FK_1` FOREIGN KEY (`bitacora_archivo_csv_id`) REFERENCES `bitacora_archivo_csv` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envio_mensaje`
--

LOCK TABLES `envio_mensaje` WRITE;
/*!40000 ALTER TABLE `envio_mensaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `envio_mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envio_mensaje_detalle`
--

DROP TABLE IF EXISTS `envio_mensaje_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envio_mensaje_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `envio_mensaje_id` int(11) DEFAULT NULL,
  `descripcion` varchar(380) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `enviado` tinyint(1) DEFAULT '0',
  `respuesta` varchar(380) DEFAULT NULL,
  `operador` varchar(32) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `envio_mensaje_detalle_FI_1` (`envio_mensaje_id`),
  CONSTRAINT `envio_mensaje_detalle_FK_1` FOREIGN KEY (`envio_mensaje_id`) REFERENCES `envio_mensaje` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envio_mensaje_detalle`
--

LOCK TABLES `envio_mensaje_detalle` WRITE;
/*!40000 ALTER TABLE `envio_mensaje_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `envio_mensaje_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_negra_acceso_ip`
--

DROP TABLE IF EXISTS `lista_negra_acceso_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_negra_acceso_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(380) NOT NULL,
  `numero_ip` varchar(20) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_negra_acceso_ip`
--

LOCK TABLES `lista_negra_acceso_ip` WRITE;
/*!40000 ALTER TABLE `lista_negra_acceso_ip` DISABLE KEYS */;
INSERT INTO `lista_negra_acceso_ip` VALUES (1,'hatc','123.155.101.5',1,NULL,NULL,'2015-05-24 05:48:33','2015-05-24 05:48:33');
/*!40000 ALTER TABLE `lista_negra_acceso_ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_negra_telefono`
--

DROP TABLE IF EXISTS `lista_negra_telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_negra_telefono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(380) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lista_negra_telefono_FI_1` (`empresa_id`),
  CONSTRAINT `lista_negra_telefono_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_negra_telefono`
--

LOCK TABLES `lista_negra_telefono` WRITE;
/*!40000 ALTER TABLE `lista_negra_telefono` DISABLE KEYS */;
INSERT INTO `lista_negra_telefono` VALUES (1,'No enviar','40105341',1,NULL,NULL,'2015-05-24 05:53:42','2015-05-24 05:53:42',1);
/*!40000 ALTER TABLE `lista_negra_telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje`
--

DROP TABLE IF EXISTS `mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(380) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `hora_inicio` varchar(20) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `enviado` tinyint(1) DEFAULT '0',
  `respuesta` varchar(380) DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje`
--

LOCK TABLES `mensaje` WRITE;
/*!40000 ALTER TABLE `mensaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operadores_prefijos`
--

DROP TABLE IF EXISTS `operadores_prefijos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operadores_prefijos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operador` varchar(160) NOT NULL,
  `rango_inicial` int(11) DEFAULT NULL,
  `rango_final` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operadores_prefijos`
--

LOCK TABLES `operadores_prefijos` WRITE;
/*!40000 ALTER TABLE `operadores_prefijos` DISABLE KEYS */;
/*!40000 ALTER TABLE `operadores_prefijos` ENABLE KEYS */;
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
INSERT INTO `propel_migration` VALUES (1432439508);
/*!40000 ALTER TABLE `propel_migration` ENABLE KEYS */;
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
  `clave` varchar(40) DEFAULT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `revisor` tinyint(1) DEFAULT '0',
  `supervisor` tinyint(1) DEFAULT '0',
  `vo_bo` tinyint(1) DEFAULT '0',
  `administrador` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `ip_logueo` varchar(32) DEFAULT NULL,
  `id_integracion` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `llave` (`usuario`),
  KEY `usuario_FI_1` (`empresa_id`),
  CONSTRAINT `usuario_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'demo','89e495e7941cf9e40e6980d14a16bf023ccd4c91','usuario demo','aperllido demo',1,0,0,0,1,NULL,'2015-05-24 05:44:15',NULL,NULL,'',''),(2,'usuario','b665e217b51994789b02b1838e730d6b93baa30f','usa','rio',1,0,1,0,0,NULL,'2015-05-24 05:48:06',NULL,NULL,'','');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-23 21:55:00
