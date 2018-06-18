-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: nomina
-- ------------------------------------------------------
-- Server version	5.7.22-log

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `descripcionA` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Recursos Humanos'),(2,'Finanzas'),(3,'Materiales'),(4,'Tecnologias');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capturaconcepto`
--

DROP TABLE IF EXISTS `capturaconcepto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capturaconcepto` (
  `cve_cpto` varchar(6) NOT NULL,
  `no_empleado` varchar(10) NOT NULL,
  `porcentaje` int(3) NOT NULL DEFAULT '0',
  `numero_periodos` int(11) NOT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `idCaptura` int(11) NOT NULL AUTO_INCREMENT,
  `periodos_cobrados` int(11) DEFAULT '0',
  PRIMARY KEY (`idCaptura`),
  KEY `Fk_capturaconcepto_idx` (`no_empleado`),
  KEY `FK_Catura_concepto` (`cve_cpto`),
  CONSTRAINT `Fk2_capturaconcepto` FOREIGN KEY (`no_empleado`) REFERENCES `detalleempleado` (`no_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capturaconcepto`
--

LOCK TABLES `capturaconcepto` WRITE;
/*!40000 ALTER TABLE `capturaconcepto` DISABLE KEYS */;
INSERT INTO `capturaconcepto` VALUES ('P','125',0,1,'Activo',1,0),('D','2017a',0,1,'Inactivo',2,0),('D','2017a',0,1,'Inactivo',3,0),('D','2017a',0,1,'Inactivo',4,0),('D','2017a',0,1,'Inactivo',5,0),('D','2017a',0,1,'Activo',6,0),('P','125',0,1,'Activo',7,0),('D','125',0,1,'Activo',8,0),('D','Y12',0,1,'Activo',9,0),('P','2017a',0,1,'Activo',10,0),('D','125',0,1,'Activo',11,0),('P','Y12',0,1,'Activo',12,0),('P','Y101',0,1,'Activo',13,0),('P','2017A',0,4,'Activo',14,0),('D','2017A',0,1,'Activo',15,0),('D','Y12',10,12,'Inactivo',16,0),('P','Y12',10,12,'Inactivo',17,0),('D','Y12',10,12,'Inactivo',18,0),('D','Y12',10,12,'Inactivo',19,0),('P','Y12',10,12,'Inactivo',20,0),('D','Y12',10,12,'Inactivo',21,0),('D','Y12',10,12,'Inactivo',22,0),('P','Y12',10,12,'Inactivo',23,0),('D','Y12',10,12,'Inactivo',24,0),('D','Y12',10,12,'Inactivo',25,0),('P','Y12',10,12,'Inactivo',26,0),('D','Y12',10,12,'Inactivo',27,0),('D','2017a',10,12,'Activo',28,0),('P','2017a',10,12,'Activo',29,0),('D','2017a',10,12,'Activo',30,0),('D','Y12',10,12,'Activo',31,0),('P','Y12',10,12,'Activo',32,0),('D','Y12',10,12,'Activo',33,0),('D','Y101',10,12,'Inactivo',34,0),('P','Y101',10,12,'Inactivo',35,0),('D','Y101',10,12,'Inactivo',36,0),('D','Y101',10,12,'Inactivo',37,0),('P','Y101',10,12,'Inactivo',38,0),('D','Y101',10,12,'Inactivo',39,0),('D','Y101',10,12,'Activo',40,0),('P','Y101',10,12,'Activo',41,0),('D','Y101',10,12,'Activo',42,0),('D','2017a',10,12,'Inactivo',43,0),('P','2017a',10,12,'Inactivo',44,0),('D','2017a',10,12,'Inactivo',45,0),('D','2017a',1,12,'Inactivo',46,0),('P','2017a',1,12,'Inactivo',47,0),('D','2017a',1,12,'Inactivo',48,0),('D','2017a',1,1,'Inactivo',49,0),('P','2017a',1,1,'Inactivo',50,0),('D','2017a',1,1,'Inactivo',51,0);
/*!40000 ALTER TABLE `capturaconcepto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogoclaseimss`
--

DROP TABLE IF EXISTS `catalogoclaseimss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogoclaseimss` (
  `Id` varchar(3) NOT NULL,
  `descripción` varchar(15) DEFAULT NULL,
  `valor` float DEFAULT '0',
  `Activo` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogoclaseimss`
--

LOCK TABLES `catalogoclaseimss` WRITE;
/*!40000 ALTER TABLE `catalogoclaseimss` DISABLE KEYS */;
INSERT INTO `catalogoclaseimss` VALUES ('C1','Clase 1',0.54355,0),('C2','Clase 2',1.13065,0),('C3','Clase 3',2.5984,1),('C4','Clase 4',4.65325,0),('C5','Clase 5',7.55875,0);
/*!40000 ALTER TABLE `catalogoclaseimss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogoroles`
--

DROP TABLE IF EXISTS `catalogoroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogoroles` (
  `id_rol` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogoroles`
--

LOCK TABLES `catalogoroles` WRITE;
/*!40000 ALTER TABLE `catalogoroles` DISABLE KEYS */;
INSERT INTO `catalogoroles` VALUES (1,'Admin'),(2,'Empleado RH ');
/*!40000 ALTER TABLE `catalogoroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concepto`
--

DROP TABLE IF EXISTS `concepto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concepto` (
  `Cve_tipo_cpto` varchar(6) NOT NULL,
  `descripcion` varchar(120) DEFAULT NULL,
  `no_recibo` int(11) NOT NULL,
  `cve_cpto` varchar(6) NOT NULL,
  `id_con` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_con`),
  KEY `FK_Tipo_Concepto_idx` (`Cve_tipo_cpto`),
  KEY `Fk_ConceptoDetallenomina_idx` (`no_recibo`),
  KEY `FK_Catura_concepto` (`cve_cpto`),
  CONSTRAINT `FK_Catura_concepto` FOREIGN KEY (`cve_cpto`) REFERENCES `capturaconcepto` (`cve_cpto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Tipo_Concepto` FOREIGN KEY (`Cve_tipo_cpto`) REFERENCES `tipoconcepto` (`Cve_tipo_cpto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_autosIn` FOREIGN KEY (`id_con`) REFERENCES `capturaconcepto` (`idCaptura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_ConceptoDetallenomina` FOREIGN KEY (`no_recibo`) REFERENCES `detallenomina` (`no_recibo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concepto`
--

LOCK TABLES `concepto` WRITE;
/*!40000 ALTER TABLE `concepto` DISABLE KEYS */;
INSERT INTO `concepto` VALUES ('PBP','BONO',1,'P',1),('DFAL','Falta',2,'D',2),('DFAL','Falta',3,'D',3),('DFAL','Falta',4,'D',4),('DFAL','Falta',5,'D',5),('DFAL','Falta',6,'D',6),('PVA','jlkjoijoi',7,'P',7),('DFAL','Falta',8,'D',8),('DFAL','Falta',9,'D',9),('PAG','Ayuda Gas',10,'P',10),('DFAL','Falta',11,'D',11),('PAG','kjwooiejflojdofil',12,'P',12),('PAG','jdkedoil',13,'P',13),('PAG','SALIO ',14,'P',14),('DFAL','Falta',15,'D',15),('DFA','Deducción Fondo Ahorro',16,'D',16),('DFA','Percepción Fondo Ahorro Empresa',17,'P',17),('FAED','Deduccion Fondo Ahorro Empresa',18,'D',18),('DFA','Deducción Fondo Ahorro',19,'D',19),('DFA','Percepción Fondo Ahorro Empresa',20,'P',20),('FAED','Deduccion Fondo Ahorro Empresa',21,'D',21),('DFA','Deducción Fondo Ahorro',22,'D',22),('DFA','Percepción Fondo Ahorro Empresa',23,'P',23),('FAED','Deduccion Fondo Ahorro Empresa',24,'D',24),('DFA','Deducción Fondo Ahorro',25,'D',25),('DFA','Percepción Fondo Ahorro Empresa',26,'P',26),('FAED','Deduccion Fondo Ahorro Empresa',27,'D',27),('DFA','Deducción Fondo Ahorro',28,'D',28),('DFA','Percepción Fondo Ahorro Empresa',29,'P',29),('FAED','Deduccion Fondo Ahorro Empresa',30,'D',30),('DFA','Deducción Fondo Ahorro',31,'D',31),('DFA','Percepción Fondo Ahorro Empresa',32,'P',32),('FAED','Deduccion Fondo Ahorro Empresa',33,'D',33),('DFA','Deducción Fondo Ahorro',34,'D',34),('DFA','Percepción Fondo Ahorro Empresa',35,'P',35),('FAED','Deduccion Fondo Ahorro Empresa',36,'D',36),('DFA','Deducción Fondo Ahorro',37,'D',37),('DFA','Percepción Fondo Ahorro Empresa',38,'P',38),('FAED','Deduccion Fondo Ahorro Empresa',39,'D',39),('DFA','Deducción Fondo Ahorro',40,'D',40),('DFA','Percepción Fondo Ahorro Empresa',41,'P',41),('FAED','Deduccion Fondo Ahorro Empresa',42,'D',42),('DFA','Deducción Fondo Ahorro',43,'D',43),('FAE','Percepción Fondo Ahorro Empresa',44,'P',44),('FAED','Deduccion Fondo Ahorro Empresa',45,'D',45),('DFA','Deducción Fondo Ahorro',46,'D',46),('FAE','Percepción Fondo Ahorro Empresa',47,'P',47),('FAED','Deduccion Fondo Ahorro Empresa',48,'D',48),('DFA','Deducción Fondo Ahorro',49,'D',49),('FAE','Percepción Fondo Ahorro Empresa',50,'P',50),('FAED','Deduccion Fondo Ahorro Empresa',51,'D',51);
/*!40000 ALTER TABLE `concepto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deduccionesdefault`
--

DROP TABLE IF EXISTS `deduccionesdefault`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deduccionesdefault` (
  `no_empleado` varchar(10) NOT NULL,
  `isr` decimal(10,3) NOT NULL DEFAULT '0.000',
  `imss` decimal(10,3) NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`no_empleado`,`isr`,`imss`),
  CONSTRAINT `Fk_ImpuestosDefaul` FOREIGN KEY (`no_empleado`) REFERENCES `detalleempleado` (`no_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deduccionesdefault`
--

LOCK TABLES `deduccionesdefault` WRITE;
/*!40000 ALTER TABLE `deduccionesdefault` DISABLE KEYS */;
/*!40000 ALTER TABLE `deduccionesdefault` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleempleado`
--

DROP TABLE IF EXISTS `detalleempleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleempleado` (
  `no_empleado` varchar(10) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `tipo_empleado` varchar(15) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_puesto` int(11) NOT NULL,
  `contrasenia` varchar(15) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'Activo',
  `sueldo` decimal(10,3) NOT NULL DEFAULT '0.000',
  `tipo_nomina` varchar(2) NOT NULL,
  PRIMARY KEY (`no_empleado`),
  KEY `curp_idx` (`curp`),
  KEY `tipo_empleado_idx` (`tipo_empleado`),
  KEY `id_area_idx` (`id_area`),
  KEY `id_puesto_idx` (`id_puesto`),
  KEY `Tipo_nomina_FK_idx` (`tipo_nomina`),
  CONSTRAINT `curpDetalle` FOREIGN KEY (`curp`) REFERENCES `empleado` (`curp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_puesto` FOREIGN KEY (`id_puesto`) REFERENCES `puesto` (`id_puesto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipo_empleado` FOREIGN KEY (`tipo_empleado`) REFERENCES `tipoempleado` (`tipo_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipo_nomina` FOREIGN KEY (`tipo_nomina`) REFERENCES `tiponomina` (`tipo_nomina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleempleado`
--

LOCK TABLES `detalleempleado` WRITE;
/*!40000 ALTER TABLE `detalleempleado` DISABLE KEYS */;
INSERT INTO `detalleempleado` VALUES ('125','LOAS880729HDFPVL02','B',4,1,NULL,'Activo',6980.900,'M'),('2017a','DIVM970313MDFZLT00','B',4,4,NULL,'Activo',1114.000,'M'),('2018603041','VAMA990529HGRLRN01','B',4,2,NULL,'Activo',7800.000,'Q'),('234','DMJADJNVJD08789789','B',1,1,NULL,'Activo',40001.000,'Q'),('368311','LOAS909090HDFPVL09','C',4,2,NULL,'Activo',45000.000,'Q'),('4343','98349IKIJIJIOJ9898','B',1,1,NULL,'Inactivo',2324.000,'M'),('5432','VAPK970313MDFZLT00','B',2,2,NULL,'Activo',1235.000,'Q'),('5678','COVE961121HDFRLR06','C',3,3,NULL,'Activo',6787.000,'Q'),('8788','JBNHIJCNDSJFNJUN45','B',1,1,NULL,'Inactivo',123.000,'M'),('90980890','UIHUI9890898900890','B',1,1,NULL,'Inactivo',23455.000,'M'),('HH7','NJNJJKU9908089890I','B',1,1,NULL,'Inactivo',20000.000,'Q'),('J12','9038930JKNJNJKEFEW','B',1,1,NULL,'Inactivo',5000.000,'Q'),('jjjjjjnkjl','NIUHIUE38898798897','B',1,1,NULL,'Inactivo',2344.000,'M'),('njk4','HERNCJSIUUNU344567','C',2,2,NULL,'Activo',123.333,'Q'),('Q19','HUINUYHYIOH897989W','B',1,1,NULL,'Inactivo',100000.000,'Q'),('R23','JIOIJO983493099808','B',1,1,NULL,'Inactivo',23444.000,'M'),('U101','IUDHNCJD4534589798','B',1,1,NULL,'Inactivo',10000.000,'M'),('Y100','NNIJJISNCIU9332546','C',1,1,NULL,'Activo',12000.000,'M'),('Y101','HKJHHKDKFC44545466','B',1,1,NULL,'Activo',50000.000,'M'),('Y12','IJIODJ425SL09','B',1,1,'123456','Activo',30000.000,'Q'),('Y13','IJIODJ425SL10','B',1,1,NULL,'Inactivo',30000.000,'Q'),('Y14','IJIODJ425SL20','B',1,1,NULL,'Inactivo',30000.000,'Q'),('Y18','HERIODJ425SL21','C',1,1,NULL,'Inactivo',20000.000,'Q'),('Y200','FEKMOIJ54OIJO35IOT','C',3,3,NULL,'Activo',12222.000,'S'),('Y50','HERIODJ425SL25','C',1,1,NULL,'Activo',20000.000,'Q'),('y500','JNJNJNJKKJJK342332','B',1,1,NULL,'Activo',11111.000,'M'),('Y51','HERIODJ425SL15','C',1,1,NULL,'Activo',20000.000,'Q'),('Y69','728982HHHJKHHHIU22','B',1,1,NULL,'Activo',5000.000,'S'),('Y700','728982HHHJKHHHIU88','B',2,1,NULL,'Activo',12000.000,'M');
/*!40000 ALTER TABLE `detalleempleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallenomina`
--

DROP TABLE IF EXISTS `detallenomina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallenomina` (
  `no_recibo` int(11) NOT NULL AUTO_INCREMENT,
  `id_nomina` int(11) NOT NULL,
  `monto` decimal(10,3) DEFAULT '0.000',
  `fechaCaptura` date DEFAULT NULL,
  PRIMARY KEY (`no_recibo`),
  KEY `fk_detallenomina_nomina1_idx` (`id_nomina`),
  CONSTRAINT `fk_detallenomina_nomina1` FOREIGN KEY (`id_nomina`) REFERENCES `nomina` (`id_nomina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallenomina`
--

LOCK TABLES `detallenomina` WRITE;
/*!40000 ALTER TABLE `detallenomina` DISABLE KEYS */;
INSERT INTO `detallenomina` VALUES (1,30,200.000,'2018-06-12'),(2,25,55.700,'2018-06-12'),(3,25,55.700,'2018-06-12'),(4,25,55.700,'2018-06-12'),(5,25,55.700,'2018-06-12'),(6,25,55.700,'2018-06-14'),(7,30,500.000,'2018-06-14'),(8,30,349.045,'2018-06-14'),(9,4,3000.000,'2018-06-14'),(10,25,400.000,'2018-06-14'),(11,30,349.045,'2018-06-14'),(12,4,500.000,'2018-06-14'),(13,31,1000.000,'2018-06-14'),(14,25,430.000,'2018-06-14'),(15,25,55.700,'2018-06-14'),(16,4,3000.000,'2018-06-17'),(17,4,3000.000,'2018-06-17'),(18,4,3000.000,'2018-06-17'),(19,4,3000.000,'2018-06-17'),(20,4,3000.000,'2018-06-17'),(21,4,3000.000,'2018-06-17'),(22,4,3000.000,'2018-06-17'),(23,4,3000.000,'2018-06-17'),(24,4,3000.000,'2018-06-17'),(25,4,3000.000,'2018-06-17'),(26,4,3000.000,'2018-06-17'),(27,4,3000.000,'2018-06-17'),(28,25,111.400,'2018-06-17'),(29,25,111.400,'2018-06-17'),(30,25,111.400,'2018-06-17'),(31,4,3000.000,'2018-06-17'),(32,4,3000.000,'2018-06-17'),(33,4,3000.000,'2018-06-17'),(34,31,3000.000,'2018-06-17'),(35,31,3000.000,'2018-06-17'),(36,31,3000.000,'2018-06-17'),(37,31,3000.000,'2018-06-17'),(38,31,3000.000,'2018-06-17'),(39,31,3000.000,'2018-06-17'),(40,31,3000.000,'2018-06-17'),(41,31,3000.000,'2018-06-17'),(42,31,3000.000,'2018-06-17'),(43,25,111.400,'2018-06-17'),(44,25,111.400,'2018-06-17'),(45,25,111.400,'2018-06-17'),(46,25,11.140,'2018-06-17'),(47,25,11.140,'2018-06-17'),(48,25,11.140,'2018-06-17'),(49,25,11.140,'2018-06-17'),(50,25,11.140,'2018-06-17'),(51,25,11.140,'2018-06-17');
/*!40000 ALTER TABLE `detallenomina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `curp` varchar(18) NOT NULL,
  `rfc` varchar(15) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `ap_paterno` varchar(15) DEFAULT NULL,
  `ap_materno` varchar(15) DEFAULT NULL,
  `calle` varchar(25) DEFAULT NULL,
  `no_exterior` int(11) DEFAULT NULL,
  `colonia` varchar(25) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `telefono` bigint(10) DEFAULT NULL,
  `correo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`curp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('728982HHHJKHHHIU22','HBHCJBHJJH376','Camilo','HernÃ¡ndez','Canseco','jknjkl',98,'njnkjnjk',97899,777777777,'yoda_12@hotmail.com'),('728982HHHJKHHHIU88','NCEJ38982908200','huihuih','uihiiuhiu','uhdhuhui','njsnjn',87,'kjnckdnjknk',989868,55555555,'yoda_20@hotmail.com'),('9038930JKNJNJKEFEW','MKJ445425345EW8','Sebas','Hhuybh','Huhuhu','njjninj',9090,'njknjnj',90909,989088008,'yoda_fabian@hotmail.com'),('98349IKIJIJIOJ9898','980IOJIJIOJI890','uhuih','uiuiiu','uiuiuhiu','jfdsiujui',241,'ioerio',938093,2147483647,'yoda_19@hotmail.com'),('COVE961121HDFRLR06','COVE961121123','Erick','Cortes','Valle','Miguel Aleman',23,'Benito Juarez',72507,559111222,'erick@aol.com'),('DIVM970313MDFZLT00','DIVM970313MDF','Mitzy','Diaz','Valor','Rio churubusco',2009,'ramos millan',8000,2147483647,'mitzy_diaz_valor@outlook.com'),('DMJADJNVJD08789789','BVHDSHGHDSB787D','Diego','Pelaez','Cordoba','nhhnh',98,'njknjkjk',80950,55555555,'rasemyael@hotmail.com'),('FEKMOIJ54OIJO35IOT','NFKK44456565656','Sorry','kdk','kcmksÃ±','sfsnkj',343,'njksnkj',83425,2147483647,'rasem_yael1995@gmail.com'),('HERIODJ425SL15','23NJNV53','cairo','HernÃ¡ndez','Canseco','CERRADA',11,'SAN JOSE',52650,1264681297,'yael_fabian@hotmail.com'),('HERIODJ425SL21','23NJNVh2','Yael','HernÃ¡ndez','Canseco','CERRADA',11,'SAN JOSE',52650,1264681297,'yael_fabian@hotmail.com'),('HERIODJ425SL25','23NJNV5','Zoe','HernÃ¡ndez','Canseco','CERRADA',11,'SAN JOSE',52650,1264681297,'yael_fabian@hotmail.com'),('HERNCJSIUUNU344567','UINHFVI439576','Yasael','Carmelini','Canseco','huyeugeuyg',787,'hgjef',887987,2147483647,'rasemyael@hotmail.com'),('HKJHHKDKFC44545466','NJKNJKNKJ5456','Fabian','Canseco','Hernandez','ysnkjdw',8,'jhbnhkvkhjn',98409,5556666778,'rasemyael@hotmail.com'),('HUINUYHYIOH897989W','BVHDSHGHDSB787D','Marcos','fefe','nhbh','jnjinij',98,'jnjnj',98908,989890009,'yael_fabian@hotmail.com'),('IJIODJ425SL09','23NJNVJ2','Yael','Hernandez','Canseco','CERRADA',11,'SAN JOSE',52650,2147483647,'yael_fabian@hotmail.com'),('IJIODJ425SL10','23NJNVJ2','Yael','Hernandez','Canseco','CERRADA',11,'SAN JOSE',52650,5559648593,'yael_fabian@hotmail.com'),('IJIODJ425SL20','23NJNVJ2','Yael','Hernandez','Canseco','CERRADA',11,'SAN JOSE',52650,5559648593,'yael_fabian@hotmail.com'),('IUDHNCJD4534589798','HUIHUIHUI890891','uwyhuih','hiuhuh','uhiuhui','hdccnjchjbcbuheh',777,'hhjkhjk',87898,2147483647,'rasem_yael1995@gmail.com'),('JBNHIJCNDSJFNJUN45','NJKCNDNJEK45K46','ljiujliuj','jijjo','joijiojo','dfwfewe',8798,'dnckjdÃ±l',34566,2147483647,'rasem_yael1995@gmail.com'),('JIOIJO983493099808','IOOIJIOJ9890900','882','jijiuj','jiojio','nijndi',2,'jnkkn',43254,343524514,'oijoioiij@hotmail.com'),('JNJNJNJKKJJK342332','GYUGYGYT7697979','mnbbh','bhjbhjbkbjk','bkjjkkjbhbbjk','gygyugyu',69879,'gudyugy',78896,2147483647,'ghdsy789877989@hotmail.com'),('LOAS880729HDFPVL02','LOAS990701WE3','SAUL','LOPEZ','AVILA','AVENIDA TE',56,'GRANJA',3245,5512345678,'9@9.COM'),('LOAS909090HDFPVL09','LOAS870101AS2SS','saullllllllllllll','lopez','99999999999999','avenida te',950,'granjas',7990,2147483647,'a@a.com'),('NIUHIUE38898798897','JNJNIUU98980988','Yasa','jiuniu','nini','jhskjsfa',8,'njkj',98908,2147483647,'rasem_yael1995@gmail.com'),('NJNJJKU9908089890I','DMKLEJE99093456','Carlos','HernÃ¡ndez','Canseco','NHJKN',7,'NJNK',47789,55555555,'rasem_yael1995@gmail.com'),('NNIJJISNCIU9332546','NMJKNVJDSNJ4678','Yor','Sor','Sar','sfdf',879,'bhbhjb',35449,2147483647,'yoda_12@hotmail.com'),('UIHUI9890898900890','UIHU98909878977','huuiu','hui','uiuh','ijdiosajoisfos',9880,'989090',809890,324254335,'yoda_12@hotmail.com'),('VAMA990529HGRLRN01','VAMA99052901','Andre Zamir','Valverde ','Martell','Oriente 102',3003,'Gabriel Ramos Millan ',40880,5559648593,'andre_valverde@outlook.com'),('VAPK970313MDFZLT00','VAPK9703131234','karina','valor','pineda','rios',2019,'churubusco',8000,2147483647,'kp_valor@outlook.com');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finiquito`
--

DROP TABLE IF EXISTS `finiquito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finiquito` (
  `id_finiquito` int(11) NOT NULL AUTO_INCREMENT,
  `no_empleado` varchar(10) NOT NULL,
  `total_percepción` decimal(10,3) DEFAULT '0.000',
  `total_deduccion` decimal(10,3) DEFAULT '0.000',
  `importe_neto` decimal(10,3) DEFAULT '0.000',
  `fecha_entrega` date DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_finiquito`),
  KEY `no_empleado_idx` (`no_empleado`),
  CONSTRAINT `no_empleadoFiniquito` FOREIGN KEY (`no_empleado`) REFERENCES `detalleempleado` (`no_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finiquito`
--

LOCK TABLES `finiquito` WRITE;
/*!40000 ALTER TABLE `finiquito` DISABLE KEYS */;
/*!40000 ALTER TABLE `finiquito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fondoahorro`
--

DROP TABLE IF EXISTS `fondoahorro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fondoahorro` (
  `id_fondito` int(11) NOT NULL AUTO_INCREMENT,
  `porcentaje` decimal(10,0) DEFAULT '0',
  `no_empleado` varchar(10) NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `Total` decimal(10,3) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Inactivo',
  PRIMARY KEY (`id_fondito`),
  KEY `fk_fondoahorro_detalleempleado1_idx` (`no_empleado`),
  CONSTRAINT `fk_fondoahorro_detalleempleado1` FOREIGN KEY (`no_empleado`) REFERENCES `detalleempleado` (`no_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fondoahorro`
--

LOCK TABLES `fondoahorro` WRITE;
/*!40000 ALTER TABLE `fondoahorro` DISABLE KEYS */;
/*!40000 ALTER TABLE `fondoahorro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horaextra`
--

DROP TABLE IF EXISTS `horaextra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horaextra` (
  `id_horaExtra` int(11) NOT NULL AUTO_INCREMENT,
  `no_empleado` varchar(10) NOT NULL,
  `fechaCaptura` date NOT NULL,
  `horas` int(11) NOT NULL DEFAULT '0',
  `estado` varchar(15) DEFAULT 'Activo',
  PRIMARY KEY (`id_horaExtra`),
  KEY `FK_horaEmpleado_idx` (`no_empleado`),
  CONSTRAINT `FK_horaEmpleado` FOREIGN KEY (`no_empleado`) REFERENCES `detalleempleado` (`no_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horaextra`
--

LOCK TABLES `horaextra` WRITE;
/*!40000 ALTER TABLE `horaextra` DISABLE KEYS */;
INSERT INTO `horaextra` VALUES (1,'Y12','2018-06-12',2,'Activo'),(2,'125','2018-06-12',5,'Activo'),(3,'2017a','2018-06-14',10,'Activo');
/*!40000 ALTER TABLE `horaextra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientoempleado`
--

DROP TABLE IF EXISTS `movimientoempleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientoempleado` (
  `id_mov` int(11) NOT NULL AUTO_INCREMENT,
  `no_empleado` varchar(10) NOT NULL,
  `descripcion_mov` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_mov`),
  KEY `no_empleado_idx` (`no_empleado`),
  CONSTRAINT `no_empleadoMov` FOREIGN KEY (`no_empleado`) REFERENCES `detalleempleado` (`no_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientoempleado`
--

LOCK TABLES `movimientoempleado` WRITE;
/*!40000 ALTER TABLE `movimientoempleado` DISABLE KEYS */;
INSERT INTO `movimientoempleado` VALUES (4,'Y12','Alta','2018-05-26'),(5,'Y13','Alta','2018-05-26'),(6,'Y14','Alta','2018-05-26'),(7,'Y18','Baja','2018-05-26'),(8,'Y50','Alta','2018-05-28'),(9,'Y51','Baja','2018-05-28'),(10,'HH7','Alta','2018-05-28'),(11,'234','Alta','2018-05-28'),(12,'Q19','Alta','2018-05-28'),(13,'J12','Alta','2018-05-28'),(14,'234','Baja','2018-05-30'),(15,'HH7','Baja','2018-05-30'),(17,'Y12','Baja','2018-05-31'),(18,'Y13','Baja','2018-05-31'),(19,'Y13','Baja','2018-05-31'),(20,'Y14','Baja','2018-05-31'),(21,'Q19','Baja','2018-05-31'),(22,'J12','Baja','2018-05-31'),(23,'Y50','Baja','2018-05-31'),(24,'Y100','Alta','2018-05-31'),(25,'Y100','Baja','2018-05-31'),(26,'jjjjjjnkjl','Alta','2018-05-31'),(27,'jjjjjjnkjl','Baja','2018-05-31'),(28,'R23','Alta','2018-05-31'),(29,'R23','Baja','2018-05-31'),(30,'90980890','Alta','2018-05-31'),(31,'90980890','Baja','2018-05-31'),(33,'4343','Alta','2018-05-31'),(34,'4343','Baja','2018-05-31'),(35,'8788','Alta','2018-05-31'),(36,'8788','Baja','2018-05-31'),(37,'Y700','Alta','2018-05-31'),(38,'Y700','Baja','2018-05-31'),(39,'Y13','Baja','2018-05-31'),(40,'Y200','Alta','2018-06-03'),(41,'234','Reingreso','2018-06-03'),(42,'Y51','Reingreso','2018-06-03'),(43,'Y100','Reingreso','2018-06-03'),(44,'Y700','Reingreso','2018-06-03'),(45,'Y18','Modificación','2018-06-03'),(46,'Y50','Modificación','2018-06-03'),(47,'Y12','Modificación','2018-06-03'),(48,'234','Baja','2018-06-03'),(49,'Y18','Baja','2018-06-03'),(50,'U101','Alta','2018-06-03'),(51,'y500','Alta','2018-06-03'),(52,'368311','Alta','2018-06-05'),(53,'2017a','Alta','2018-06-05'),(54,'5432','Alta','2018-06-05'),(55,'234','Modificación','2018-06-06'),(56,'njk4','Alta','2018-06-07'),(57,'njk4','Modificación','2018-06-07'),(58,'njk4','Modificación','2018-06-07'),(59,'Y69','Alta','2018-06-11'),(60,'Y69','Baja','2018-06-11'),(61,'Y69','Modificación','2018-06-11'),(62,'2018603041','Alta','2018-06-11'),(63,'2018603041','Modificación','2018-06-11'),(64,'2018603041','Modificación','2018-06-11'),(65,'2018603041','Modificación','2018-06-11'),(66,'125','Alta','2018-06-12'),(67,'125','Modificación','2018-06-12'),(68,'U101','Baja','2018-06-12'),(69,'Y101','Alta','2018-06-14'),(70,'5678','Alta','2018-06-14');
/*!40000 ALTER TABLE `movimientoempleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nomina`
--

DROP TABLE IF EXISTS `nomina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nomina` (
  `id_nomina` int(11) NOT NULL AUTO_INCREMENT,
  `no_empleado` varchar(10) NOT NULL,
  `periodo` varchar(45) DEFAULT NULL,
  `total_percep` decimal(10,0) DEFAULT '0',
  `total_dedu` decimal(10,0) DEFAULT '0',
  `importe_neto` decimal(10,0) DEFAULT '0',
  `estado` varchar(10) NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id_nomina`),
  KEY `Fk_nomina_empleado_idx` (`no_empleado`),
  CONSTRAINT `Fk_nomina_empleado` FOREIGN KEY (`no_empleado`) REFERENCES `detalleempleado` (`no_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nomina`
--

LOCK TABLES `nomina` WRITE;
/*!40000 ALTER TABLE `nomina` DISABLE KEYS */;
INSERT INTO `nomina` VALUES (4,'Y12',NULL,0,0,0,'activo'),(5,'Y13',NULL,0,0,0,'activo'),(6,'Y14',NULL,0,0,0,'activo'),(7,'Y18',NULL,0,0,0,'activo'),(8,'Y50',NULL,0,0,0,'activo'),(9,'Y51',NULL,0,0,0,'activo'),(10,'HH7',NULL,0,0,0,'activo'),(11,'234',NULL,0,0,0,'activo'),(12,'Q19',NULL,0,0,0,'activo'),(13,'J12',NULL,0,0,0,'activo'),(14,'Y100',NULL,0,0,0,'activo'),(15,'jjjjjjnkjl',NULL,0,0,0,'activo'),(16,'R23',NULL,0,0,0,'activo'),(17,'90980890',NULL,0,0,0,'activo'),(18,'4343',NULL,0,0,0,'activo'),(19,'8788',NULL,0,0,0,'activo'),(20,'Y700',NULL,0,0,0,'activo'),(21,'Y200',NULL,0,0,0,'activo'),(22,'U101',NULL,0,0,0,'Inactivo'),(23,'y500',NULL,0,0,0,'activo'),(24,'368311',NULL,0,0,0,'activo'),(25,'2017a',NULL,0,0,0,'activo'),(26,'5432',NULL,0,0,0,'activo'),(27,'njk4',NULL,0,0,0,'activo'),(28,'Y69',NULL,0,0,0,'Inactivo'),(29,'2018603041',NULL,0,0,0,'activo'),(30,'125',NULL,0,0,0,'activo'),(31,'Y101',NULL,0,0,0,'activo'),(32,'5678',NULL,0,0,0,'activo');
/*!40000 ALTER TABLE `nomina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puesto`
--

DROP TABLE IF EXISTS `puesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puesto` (
  `id_puesto` int(11) NOT NULL,
  `descripcionP` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_puesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puesto`
--

LOCK TABLES `puesto` WRITE;
/*!40000 ALTER TABLE `puesto` DISABLE KEYS */;
INSERT INTO `puesto` VALUES (1,'Administracion'),(2,'Sub Jefe de Departamento'),(3,'Director'),(4,'Tecnologias');
/*!40000 ALTER TABLE `puesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retardo`
--

DROP TABLE IF EXISTS `retardo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retardo` (
  `id_retardo` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipoRetardo` int(11) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `detalleempleado_no_empleado` varchar(10) NOT NULL,
  PRIMARY KEY (`id_retardo`),
  KEY `id_tipoRetardo_idx` (`id_tipoRetardo`),
  KEY `fk_retardo_detalleempleado1_idx` (`detalleempleado_no_empleado`),
  CONSTRAINT `fk_retardo_detalleempleado1` FOREIGN KEY (`detalleempleado_no_empleado`) REFERENCES `detalleempleado` (`no_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tipoRetardo2` FOREIGN KEY (`id_tipoRetardo`) REFERENCES `tiporetardo` (`id_tipoRetardo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retardo`
--

LOCK TABLES `retardo` WRITE;
/*!40000 ALTER TABLE `retardo` DISABLE KEYS */;
INSERT INTO `retardo` VALUES (1,1,'Inactivo','2018-06-10','Y12'),(2,1,'Inactivo','2018-06-10','Y12'),(3,1,'Inactivo','2018-06-10','Y12'),(4,1,'Inactivo','2018-06-10','Y12'),(5,1,'Inactivo','2018-06-10','Y12'),(6,1,'Inactivo','2018-06-10','Y12'),(7,1,'Inactivo','2018-06-10','Y12'),(8,1,'Inactivo','2018-06-10','2017a'),(13,3,'Activo','2018-06-11','2017a'),(14,3,'Inactivo','2018-06-11','Y200'),(15,1,'Inactivo','2018-06-11','2017a'),(16,1,'Inactivo','2018-06-11','2017a'),(17,1,'Inactivo','2018-06-11','2017a'),(18,1,'Inactivo','2018-06-11','2017a'),(19,1,'Inactivo','2018-06-11','2017a'),(20,2,'Inactivo','2018-06-11','Y200'),(21,2,'Inactivo','2018-06-11','Y200'),(22,2,'Activo','2018-06-12','125'),(23,1,'Activo','2018-06-12','2017a');
/*!40000 ALTER TABLE `retardo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `curp` varchar(18) NOT NULL,
  KEY `id_rol_idx` (`id_rol`),
  KEY `curp_idx` (`curp`),
  CONSTRAINT `curp` FOREIGN KEY (`curp`) REFERENCES `empleado` (`curp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `catalogoroles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (2,'IJIODJ425SL09');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoconcepto`
--

DROP TABLE IF EXISTS `tipoconcepto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoconcepto` (
  `Cve_tipo_cpto` varchar(6) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Cve_tipo_cpto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoconcepto`
--

LOCK TABLES `tipoconcepto` WRITE;
/*!40000 ALTER TABLE `tipoconcepto` DISABLE KEYS */;
INSERT INTO `tipoconcepto` VALUES ('DFA','Fondo de Ahorro'),('DFAL','Falta'),('FAE','Fondo de ahorro Empresa Percepción'),('FAED','Fondo de ahorro Empresa Deducción'),('PAG','Ayuda de Gasolina'),('PBP','Bono de Productividad'),('PHE','Hora Extra'),('PVA','Vales de Despensa');
/*!40000 ALTER TABLE `tipoconcepto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoempleado`
--

DROP TABLE IF EXISTS `tipoempleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoempleado` (
  `tipo_empleado` varchar(15) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tipo_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoempleado`
--

LOCK TABLES `tipoempleado` WRITE;
/*!40000 ALTER TABLE `tipoempleado` DISABLE KEYS */;
INSERT INTO `tipoempleado` VALUES ('B','Base'),('C','Confianza');
/*!40000 ALTER TABLE `tipoempleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiponomina`
--

DROP TABLE IF EXISTS `tiponomina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiponomina` (
  `tipo_nomina` varchar(30) NOT NULL,
  `descripcionTN` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tipo_nomina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiponomina`
--

LOCK TABLES `tiponomina` WRITE;
/*!40000 ALTER TABLE `tiponomina` DISABLE KEYS */;
INSERT INTO `tiponomina` VALUES ('M','Mensual'),('Q','Quincenal'),('S','Semanal');
/*!40000 ALTER TABLE `tiponomina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiporetardo`
--

DROP TABLE IF EXISTS `tiporetardo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiporetardo` (
  `id_tipoRetardo` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipoRetardo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiporetardo`
--

LOCK TABLES `tiporetardo` WRITE;
/*!40000 ALTER TABLE `tiporetardo` DISABLE KEYS */;
INSERT INTO `tiporetardo` VALUES (1,'Menor 1-10 min'),(2,'Medio 11-16 min'),(3,'Mayor 16-30 min'),(4,'Falta');
/*!40000 ALTER TABLE `tiporetardo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'nomina'
--
/*!50003 DROP PROCEDURE IF EXISTS `actualizarEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarEmpleado`(
IN Acurp varchar(18),
IN calle varchar(25),
IN no_exterior int(11), 
IN colonia varchar(25),
IN codigo_postal int(11), 
IN telefono bigint(10),
IN correo varchar(40),
IN no_empleadoN varchar(10),
IN no_empleadoA varchar(10),
IN tipo_empleado varchar(15),
IN id_area int(11),
IN id_puesto int(11),
IN tipo_nomina varchar(30),
IN sueldo decimal(10,3),
IN estado varchar(20)

)
BEGIN
 declare estadoA varchar(10);
 declare fecha Date;
 set estadoA=(select estado from detalleempleado where curp=Acurp);
 set fecha = now();
 
 update empleado  set calle=calle,no_exterior=no_exterior,colonia=colonia,codigo_postal=codigo_postal,telefono=telefono,correo=correo 
 WHERE curp=Acurp;
 
 if ( estadoA = 'Activo') then 

		 update detalleempleado SET tipo_empleado=tipo_empleado,id_area=id_area,id_puesto=id_puesto,
								estado=estado,sueldo=CAST(sueldo AS DECIMAL(10,3)),tipo_nomina=tipo_nomina where no_empleado = no_empleadoA;
		 
		 insert into movimientoempleado (no_empleado,descripcion_mov,fecha)
								 values (no_empleadoA,'Modificación',fecha);
                                 
elseif (estadoA != estado) then
	insert into detalleempleado (no_empleado,curp,tipo_empleado,id_area,id_puesto,estado,sueldo,tipo_nomina)
						  values (no_empleadoN,Acurp,tipo_empleado,id_area,id_puesto,estado,CAST(sueldo AS DECIMAL(10,3)),tipo_nomina);
	 
	 insert into movimientoempleado (no_empleado,descripcion_mov,fecha)
							 values (no_empleadoN,'Reingreso',fecha);
	 
	 insert into nomina(no_empleado)
				values (no_empleadoN);
 
end if;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `capturaConcepto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `capturaConcepto`(
in no_empleadoC varchar(10),
in porcentaje int(2),
in numero_periodos int(11),
in montoC decimal(10,3),
in cve_cpto varchar(6),
in Cve_tipo_cpto varchar (6),
in descripcion varchar(120)

)
BEGIN
declare estado varchar(15);
declare no_recibo int;
declare fecha Date;
declare id_nomina int;

set fecha= now();
set estado='Activo';
##
	insert into capturaconcepto (cve_cpto,no_empleado,porcentaje,numero_periodos,estado)
			values(cve_cpto,no_empleadoC,porcentaje,numero_periodos,estado);
			
	set id_nomina = (select nomina.id_nomina from nomina where no_empleado=no_empleadoC order by id_nomina desc limit 1);

	insert into detallenomina(id_nomina,monto,fechaCaptura)
			values (id_nomina,CAST(montoC AS DECIMAL(10,3)),fecha);
			
	set no_recibo = LAST_INSERT_ID();

	insert into concepto (Cve_tipo_cpto,descripcion,no_recibo,cve_cpto)
			values(Cve_tipo_cpto,descripcion,no_recibo,cve_cpto);
            



       
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `capturaFondoAhorro` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `capturaFondoAhorro`(
in no_empleadoC varchar(10),
in porcentaje int(2),
in numero_periodos int(11),
in montoC decimal(10,3)
)
BEGIN
	declare no_recibo int;
	declare id_nomina int;
    declare no_recibo1 int;
	declare id_nomina1 int;
    declare no_recibo2 int;
	declare id_nomina2 int;
declare estado varchar(15);
declare fecha Date;

set estado='Activo';
set fecha= now();

# captura Fondo ahorro    
	insert into capturaconcepto (cve_cpto,no_empleado,porcentaje,numero_periodos,estado)
			values('D',no_empleadoC,porcentaje,numero_periodos,estado);
			
	set id_nomina = (select nomina.id_nomina from nomina where no_empleado=no_empleadoC order by id_nomina desc limit 1);

	insert into detallenomina(id_nomina,monto,fechaCaptura)
			values (id_nomina,CAST(montoC AS DECIMAL(10,3)),fecha);
			
	set no_recibo = LAST_INSERT_ID();

	insert into concepto (Cve_tipo_cpto,descripcion,no_recibo,cve_cpto)
			values('DFA','Deducción Fondo Ahorro',no_recibo,'D');
# Fondo Ahorro Empresa
	    
	insert into capturaconcepto (cve_cpto,no_empleado,porcentaje,numero_periodos,estado)
			values('P',no_empleadoC,porcentaje,numero_periodos,estado);
			
	set id_nomina1 = (select nomina.id_nomina from nomina where no_empleado=no_empleadoC order by id_nomina desc limit 1);

	insert into detallenomina(id_nomina,monto,fechaCaptura)
			values (id_nomina1,CAST(montoC AS DECIMAL(10,3)),fecha);
			
	set no_recibo1 = LAST_INSERT_ID();

	insert into concepto (Cve_tipo_cpto,descripcion,no_recibo,cve_cpto)
			values('FAE','Percepción Fondo Ahorro Empresa',no_recibo1,'P');
# Fondo Ahorro Empresa Deducción
	    
	insert into capturaconcepto (cve_cpto,no_empleado,porcentaje,numero_periodos,estado)
			values('D',no_empleadoC,porcentaje,numero_periodos,estado);
			
	set id_nomina2 = (select nomina.id_nomina from nomina where no_empleado=no_empleadoC order by id_nomina desc limit 1);

	insert into detallenomina(id_nomina,monto,fechaCaptura)
			values (id_nomina2,CAST(montoC AS DECIMAL(10,3)),fecha);
			
	set no_recibo2 = LAST_INSERT_ID();

	insert into concepto (Cve_tipo_cpto,descripcion,no_recibo,cve_cpto)
			values('FAED','Deduccion Fondo Ahorro Empresa',no_recibo2,'D');
            
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `capturaRetardo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `capturaRetardo`(
IN no_empleadoC varchar(10),
IN id_tipoRetardo INT(11),
IN montoC decimal(10,3)
)
BEGIN
declare estado varchar(15);
declare no_recibo int(11);
declare fecha Date;
declare id_nomina int(11);
set estado='Activo';
set fecha= now();
IF(id_tipoRetardo = 4) THEN

	##call nomina.capturaConcepto(no_empleadoC,0,1,montoC, 'D', 'DFAL', 'Falta');

	insert into capturaconcepto (cve_cpto,no_empleado,numero_periodos,estado)
			values('D',no_empleadoC,1,estado);
			
	set id_nomina = (select nomina.id_nomina from nomina where no_empleado=no_empleadoC order by id_nomina desc limit 1);

	insert into detallenomina(id_nomina,monto,fechaCaptura)
			values (id_nomina,CAST(montoC AS DECIMAL(10,3)),fecha);
			
	set no_recibo = LAST_INSERT_ID();

	insert into concepto (Cve_tipo_cpto,descripcion,no_recibo,cve_cpto)
			values('DFAL','Falta',no_recibo,'D');

else
	
    insert into retardo (id_tipoRetardo,estado,fecha,detalleempleado_no_empleado)
			values (id_tipoRetardo,estado,fecha,no_empleadoC);
            
end if;



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `eliminarEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarEmpleado`(IN no_empleadoB varchar(10),IN estado varchar(20))
BEGIN
 declare fecha Date;
 set fecha = now();
 
 UPDATE detalleempleado SET estado='Inactivo' WHERE no_empleado=no_empleadoB;
 UPDATE nomina SET estado='Inactivo' WHERE no_empleado=no_empleadoB;
 
  if estado != 'Inactivo' then
 	insert into movimientoempleado (no_empleado,descripcion_mov,fecha)
						 values (no_empleadoB,'Baja',fecha);
end if;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `horaExtra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `horaExtra`(
IN no_empleadoC varchar(10),
In horasExtra int(11)
)
BEGIN
declare fecha date;
set fecha = now();

Insert into horaextra(no_empleado,fechaCaptura,horas)
		values(no_empleadoC,fecha,horasExtra);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarEmpleado`(
IN curp varchar(18),
IN rfc varchar(15),
IN nombre varchar(25),
IN ap_paterno varchar(15),
IN ap_materno varchar(15),
IN calle varchar(25),
IN no_exterior int(11), 
IN colonia varchar(25),
IN codigo_postal int(11), 
IN telefono bigint(10),
IN correo varchar(40),
IN no_empleado varchar(10),
IN tipo_empleado varchar(15),
IN id_area int(11),
IN id_puesto int(11),
IN descripcion_mov varchar(45),
IN tipo_nomina varchar(30),
IN sueldo decimal(10,3)

)
BEGIN
 declare fecha Date;
 set fecha = now();
 insert into empleado (curp,rfc,nombre,ap_paterno,ap_materno,calle,no_exterior,colonia,codigo_postal,telefono,correo)
			   values (curp,rfc,nombre,ap_paterno,ap_materno,calle,no_exterior,colonia,codigo_postal,telefono,correo);
 
 insert into detalleempleado (no_empleado,curp,tipo_empleado,id_area,id_puesto,estado,sueldo,tipo_nomina)
					  values (no_empleado,curp,tipo_empleado,id_area,id_puesto,'Activo',CAST(sueldo AS DECIMAL(10,3)),tipo_nomina);
 
 insert into movimientoempleado (no_empleado,descripcion_mov,fecha)
						 values (no_empleado,descripcion_mov,fecha);
 
 insert into nomina(no_empleado)
			values (no_empleado);
 


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-17 22:26:51
