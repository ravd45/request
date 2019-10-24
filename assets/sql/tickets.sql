-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 208.91.198.53    Database: proye7nb_tickets
-- ------------------------------------------------------
-- Server version	5.5.61-38.13-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asignacion`
--

DROP TABLE IF EXISTS `asignacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignacion` (
  `idasignacion` int(11) NOT NULL AUTO_INCREMENT,
  `idticket` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idasignacion`),
  KEY `idusuario_idx` (`idusuario`),
  KEY `idticket_idx` (`idticket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacion`
--

LOCK TABLES `asignacion` WRITE;
/*!40000 ALTER TABLE `asignacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_proyecto`
--

DROP TABLE IF EXISTS `c_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `c_proyecto` (
  `idc_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto` varchar(45) NOT NULL,
  PRIMARY KEY (`idc_proyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_proyecto`
--

LOCK TABLES `c_proyecto` WRITE;
/*!40000 ALTER TABLE `c_proyecto` DISABLE KEYS */;
INSERT INTO `c_proyecto` VALUES (1,'Sarape'),(2,'Simplificación Adminstrativa'),(3,'Yoremia'),(4,'Escuelas Particulares'),(5,'Escuela Poblana'),(6,'Reporte APA'),(7,'Aplicaciones Móviles'),(8,'Todos');
/*!40000 ALTER TABLE `c_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_tipo_usuario`
--

DROP TABLE IF EXISTS `c_tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `c_tipo_usuario` (
  `idc_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idc_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_tipo_usuario`
--

LOCK TABLES `c_tipo_usuario` WRITE;
/*!40000 ALTER TABLE `c_tipo_usuario` DISABLE KEYS */;
INSERT INTO `c_tipo_usuario` VALUES (1,'Superadministrador'),(2,'Administrador'),(3,'Desarrollador');
/*!40000 ALTER TABLE `c_tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observaciones`
--

DROP TABLE IF EXISTS `observaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `observaciones` (
  `idobservaciones` int(11) NOT NULL AUTO_INCREMENT,
  `observacion` text NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idticket` int(11) DEFAULT NULL,
  PRIMARY KEY (`idobservaciones`),
  KEY `idusuario_idx` (`idusuario`),
  KEY `idticket_idx` (`idticket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observaciones`
--

LOCK TABLES `observaciones` WRITE;
/*!40000 ALTER TABLE `observaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `observaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_usuario`
--

DROP TABLE IF EXISTS `proyecto_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyecto_usuario` (
  `idproyecto_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idproyecto` int(11) NOT NULL,
  PRIMARY KEY (`idproyecto_usuario`),
  KEY `idusuario_idx` (`idusuario`),
  KEY `idproyecto_idx` (`idproyecto`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_usuario`
--

LOCK TABLES `proyecto_usuario` WRITE;
/*!40000 ALTER TABLE `proyecto_usuario` DISABLE KEYS */;
INSERT INTO `proyecto_usuario` VALUES (1,1,1),(2,1,2),(3,1,4),(4,2,1),(5,2,2),(6,2,3),(7,2,4),(8,2,5),(9,2,6),(10,2,7),(11,3,1),(12,3,4),(13,3,5),(14,3,6),(15,4,3),(16,4,4),(17,4,7),(18,5,4),(19,6,4),(20,7,1),(21,7,2),(22,7,3),(23,7,4),(24,7,5),(25,7,6),(26,7,7);
/*!40000 ALTER TABLE `proyecto_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguridad`
--

DROP TABLE IF EXISTS `seguridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seguridad` (
  `idseguridad` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `token` varchar(45) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idseguridad`),
  KEY `idusuario_idx` (`idusuario`),
  KEY `tipo_usuario_idx` (`tipo_usuario`),
  CONSTRAINT `tipo_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `c_tipo_usuario` (`idc_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguridad`
--

LOCK TABLES `seguridad` WRITE;
/*!40000 ALTER TABLE `seguridad` DISABLE KEYS */;
INSERT INTO `seguridad` VALUES (1,'AVelazquez','ae587a964fba41976532c9319bcf263d',1,'User.1231',1),(2,'AMartinez','3b001dbbf2035da0db50af89dc9b84ac',2,'User.1232',1),(3,'EHidalgo','3c3ff4dcd6969c37c2f8472502153020',3,'User.1233',3),(4,'JSanchez','377857cada9d819396ee707ca03cdbd7',4,'User.1234',3),(5,'MHernandez','3a9d832ac0acbf03f4b17a47f6207491',5,'User.1235',3),(6,'CSanchez','d3813a7abec33bac0f8d982d03395679',6,'User.1236',3),(7,'LVidal','823ca2d285639dfb90c865ddc7785d3a',7,'User.1237',2);
/*!40000 ALTER TABLE `seguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket` (
  `idticket` int(11) NOT NULL AUTO_INCREMENT,
  `solicitante` int(11) NOT NULL,
  `detalle` varchar(1500) NOT NULL,
  `fechaPeticion` datetime NOT NULL,
  `fechaInicio` datetime DEFAULT NULL,
  `fechaTermino` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `ruta_anexo` varchar(405) DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `idproyecto` int(11) NOT NULL,
  `otro_proyecto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idticket`),
  KEY `solicitante_idx` (`solicitante`),
  KEY `idproyecto_idx` (`idproyecto`),
  CONSTRAINT `idproyecto` FOREIGN KEY (`idproyecto`) REFERENCES `c_proyecto` (`idc_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `paterno` varchar(45) DEFAULT NULL,
  `materno` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Rubi Aracely','Velazquez','Diaz','kbakemono@gmail.com','2291396118','Desarrollador'),(2,'Alejandro Uziel','Martinez','Herrera',NULL,NULL,'Desarrollador'),(3,'Eloisa','Hidalgo',NULL,NULL,NULL,'Desarrollador'),(4,'Jose Luis','Sanchez','Arenas',NULL,NULL,'Desarrollador'),(5,'Miguel','Hernandez','Ramos',NULL,NULL,'Desarrollador'),(6,'Carlos','Sanchez',NULL,NULL,NULL,'Desarrollador'),(7,'Luis','Vidal',NULL,NULL,NULL,NULL);
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

-- Dump completed on 2019-10-24 17:01:41
