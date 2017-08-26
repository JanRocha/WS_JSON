-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u787190517_ws
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB

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
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alunos` (
  `CODALUNO` char(5) NOT NULL,
  `NOMEALUNO` varchar(30) NOT NULL,
  `SENHAALUNO` varchar(20) NOT NULL,
  PRIMARY KEY (`CODALUNO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES ('A0004','tsetsets','fsadfasdfsd'),('A0002','gerson','1234'),('A0003','RONALDO','3845784455454545'),('A0001','hjgk','143413');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `CODCURSO` char(6) NOT NULL,
  `DESCRICAO` varchar(30) NOT NULL,
  PRIMARY KEY (`CODCURSO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES ('C00001','PROGRAMACAO 1'),('C00002','INTRODUCAO A INFORMATICA'),('C00003','ALGORITIMOS'),('C00004','ESTRUTURAS DE DADOS'),('C00005','BASE DE DADOS 1'),('C00006','BASE DE DADOS 2'),('C00007','ANALISE DE SISTEMA'),('C00008','PDO'),('C00009','DESENVOLVIMENTO MOVEL'),('C00010','DESENVOLVIMENTO WEB'),('C00011','HISTORIA'),('C00012','BASE DE DADOS 3'),('C00013','ANALISE E DESENVOLVIMENTO 2'),('C00014','POO2'),('C00015','DESENVOLVIMENTO MOVEL AVANCADO'),('C00016','DESENVOLVIMENTO WEV COM BOOTST');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodo` (
  `PERIODO` int(11) NOT NULL,
  `DESCRICAO` varchar(15) NOT NULL,
  PRIMARY KEY (`PERIODO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
INSERT INTO `periodo` VALUES (1,'PRIMEIRO'),(2,'SEGUNDO'),(3,'TERCEIRO'),(4,'QUARTO'),(5,'QUINTO'),(6,'SEXTO');
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `CODALUNO` char(5) NOT NULL,
  `CODCURSO` char(6) NOT NULL,
  `PERIODO` int(11) NOT NULL,
  `PROMEDIO` int(11) NOT NULL,
  PRIMARY KEY (`CODALUNO`,`CODCURSO`,`PERIODO`),
  KEY `CODCURSO` (`CODCURSO`),
  KEY `PERIODO` (`PERIODO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES ('A0001','C00001',1,14),('A0001','C00002',1,9),('A0001','C00003',1,14),('A0001','C00004',1,16),('A0001','C00005',1,17),('A0001','C00006',2,14),('A0001','C00007',2,9),('A0001','C00008',2,14),('A0001','C00009',2,16),('A0001','C00010',2,17),('A0001','C00011',2,17),('A0001','C00012',3,14),('A0001','C00013',3,9),('A0001','C00015',3,14),('A0001','C00016',3,16),('A0002','C00001',1,19),('A0002','C00002',1,5),('A0002','C00003',1,8),('A0002','C00004',1,12),('A0002','C00005',1,5),('A0002','C00006',1,8),('A0002','C00007',2,12),('A0002','C00008',2,5),('A0002','C00009',2,8),('A0002','C00010',2,12),('A0003','C00001',1,13),('A0003','C00002',1,14),('A0003','C00003',1,13),('A0003','C00004',1,14),('A0003','C00005',1,13),('A0003','C00006',2,14),('A0003','C00007',2,13),('A0003','C00008',2,14),('A0004','C00001',1,9),('A0004','C00002',1,14),('A0004','C00003',1,16),('A0004','C00004',1,18),('A0004','C00005',1,9),('A0004','C00006',1,14),('A0004','C00007',2,16),('A0004','C00008',2,18),('A0004','C00009',2,9);
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;

--
-- Dumping events for database 'u787190517_ws'
--

--
-- Dumping routines for database 'u787190517_ws'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-26 18:11:55
