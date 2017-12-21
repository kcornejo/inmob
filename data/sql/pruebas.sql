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
-- Table structure for table `tipo_aparato`
--

DROP TABLE IF EXISTS `tipo_aparato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_aparato` (
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
  KEY `tipo_aparato_FI_1` (`empresa_id`),
  CONSTRAINT `tipo_aparato_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_aparato`
--

LOCK TABLES `tipo_aparato` WRITE;
/*!40000 ALTER TABLE `tipo_aparato` DISABLE KEYS */;
INSERT INTO `tipo_aparato` VALUES (1,NULL,'ip','Iphone',1,NULL,NULL,'2015-08-09 01:18:02','2015-08-09 01:18:02'),(2,NULL,'sa','Samsung',1,NULL,NULL,'2015-08-09 01:18:14','2015-08-09 01:18:14');
/*!40000 ALTER TABLE `tipo_aparato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestion_reparacion`
--

DROP TABLE IF EXISTS `gestion_reparacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestion_reparacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `codigo` varchar(32) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha_recepcion` date DEFAULT NULL,
  `tipo_aparato_id` int(11) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `imei` varchar(32) DEFAULT NULL,
  `sim` tinyint(1) DEFAULT NULL,
  `memoria` tinyint(1) DEFAULT NULL,
  `dual` tinyint(1) DEFAULT NULL,
  `tapa` tinyint(1) DEFAULT NULL,
  `bateria` tinyint(1) DEFAULT NULL,
  `es_garantia` tinyint(1) DEFAULT NULL,
  `recibe_aparato_bloqueado` tinyint(1) DEFAULT NULL,
  `comentario_no_bloqueado` text,
  `motivo` varchar(450) DEFAULT NULL,
  `comentario_cliente` text,
  `fecha_estimada_entrega` date DEFAULT NULL,
  `recibido_por` int(11) DEFAULT NULL,
  `reparado_por` int(11) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `confirmo_aparato` tinyint(1) DEFAULT NULL,
  `confirmo_motivo` tinyint(1) DEFAULT NULL,
  `confirmo_componente` tinyint(1) DEFAULT NULL,
  `comentario_reparacion` text,
  PRIMARY KEY (`id`),
  KEY `gestion_reparacion_I_1` (`recibido_por`),
  KEY `gestion_reparacion_I_2` (`reparado_por`),
  KEY `gestion_reparacion_FI_1` (`empresa_id`),
  KEY `gestion_reparacion_FI_2` (`cliente_id`),
  KEY `gestion_reparacion_FI_3` (`tipo_aparato_id`),
  CONSTRAINT `gestion_reparacion_FK_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  CONSTRAINT `gestion_reparacion_FK_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `gestion_reparacion_FK_3` FOREIGN KEY (`tipo_aparato_id`) REFERENCES `tipo_aparato` (`id`),
  CONSTRAINT `gestion_reparacion_FK_4` FOREIGN KEY (`recibido_por`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestion_reparacion`
--

LOCK TABLES `gestion_reparacion` WRITE;
/*!40000 ALTER TABLE `gestion_reparacion` DISABLE KEYS */;
INSERT INTO `gestion_reparacion` VALUES (5,NULL,NULL,7494,'2015-08-09',2,'alfa','558878889','imeia23',1,1,0,0,0,1,0,'','pantalla arruinada','urgente detalle','2015-08-21',1,1,'RECIBIDO',1,NULL,NULL,'2015-08-09 03:53:59','2015-08-09 07:38:03',1,0,1,'adaddadadad'),(6,NULL,NULL,7495,'2015-08-09',1,'4 plus','2300','200000',0,1,0,1,0,0,1,'','cae agua en la pantalla','detalle chip','2015-08-06',1,2,'RECHAZADO',1,NULL,NULL,'2015-08-09 03:54:58','2015-08-09 20:24:42',NULL,NULL,NULL,NULL),(7,NULL,NULL,7493,'2015-08-09',2,'dad','adad','2333',1,1,1,0,0,0,0,'','boton apagado arruindado','no funciona el apagado','2015-08-20',1,1,'RECIBIDO',1,NULL,NULL,'2015-08-09 03:56:44','2015-08-09 03:56:44',NULL,NULL,NULL,NULL),(8,NULL,NULL,8842,'2015-08-09',1,'5 plus','20088','887888878',1,0,1,1,1,0,0,'por desocmpuesto','no reconoce botones lateral','no contiene botones','2015-08-25',1,1,'RECIBIDO',1,NULL,NULL,'2015-08-09 19:30:53','2015-08-09 19:30:53',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `gestion_reparacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestion_repuesto`
--

DROP TABLE IF EXISTS `gestion_repuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestion_repuesto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gestion_reparacion_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gestion_repuesto_FI_1` (`gestion_reparacion_id`),
  KEY `gestion_repuesto_FI_2` (`producto_id`),
  CONSTRAINT `gestion_repuesto_FK_1` FOREIGN KEY (`gestion_reparacion_id`) REFERENCES `gestion_reparacion` (`id`),
  CONSTRAINT `gestion_repuesto_FK_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestion_repuesto`
--

LOCK TABLES `gestion_repuesto` WRITE;
/*!40000 ALTER TABLE `gestion_repuesto` DISABLE KEYS */;
INSERT INTO `gestion_repuesto` VALUES (2,5,8,2),(3,5,8,1),(4,5,8,2);
/*!40000 ALTER TABLE `gestion_repuesto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-09 12:28:31
