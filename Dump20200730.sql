CREATE DATABASE  IF NOT EXISTS `chibipro` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `chibipro`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: chibipro
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.13-MariaDB

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
-- Table structure for table `confirmofpainter`
--

DROP TABLE IF EXISTS `confirmofpainter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `confirmofpainter` (
  `idConfirmOfPainter` int(11) NOT NULL AUTO_INCREMENT,
  `idPicture` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `DateExpiry` datetime NOT NULL,
  `DateApprove` datetime NOT NULL,
  `idPainter` int(11) NOT NULL,
  PRIMARY KEY (`idConfirmOfPainter`),
  KEY `idPicture_1` (`idPicture`),
  CONSTRAINT `idPainter` FOREIGN KEY (`idConfirmOfPainter`) REFERENCES `painter` (`idpainter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idPicture_1` FOREIGN KEY (`idPicture`) REFERENCES `pictures` (`idPictures`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `confirmofpainter`
--

LOCK TABLES `confirmofpainter` WRITE;
/*!40000 ALTER TABLE `confirmofpainter` DISABLE KEYS */;
/*!40000 ALTER TABLE `confirmofpainter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `painter`
--

DROP TABLE IF EXISTS `painter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `painter` (
  `idpainter` int(11) NOT NULL,
  `Name` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Address` varchar(60) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Password` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Description` varchar(335) CHARACTER SET utf8mb4 DEFAULT NULL,
  `IDConfirmOfPainter` int(11) NOT NULL,
  `Email` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`idpainter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `painter`
--

LOCK TABLES `painter` WRITE;
/*!40000 ALTER TABLE `painter` DISABLE KEYS */;
/*!40000 ALTER TABLE `painter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pictures` (
  `idPictures` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idStatusPicture` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `NumberLike` int(10) unsigned DEFAULT 0,
  `DateUp` datetime NOT NULL,
  `StatusSendEmail` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`idPictures`),
  KEY `idUser_1` (`idUser`),
  KEY `idstatusPicture_1` (`idStatusPicture`),
  CONSTRAINT `idUser_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idstatusPicture_1` FOREIGN KEY (`idStatusPicture`) REFERENCES `statuspicture` (`idStatusPicture`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sendemail`
--

DROP TABLE IF EXISTS `sendemail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sendemail` (
  `idSendEmail` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL,
  `Content` varchar(300) DEFAULT NULL,
  `SendDate` datetime NOT NULL,
  `Note` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idSendEmail`),
  KEY `idUser_2` (`idUser`),
  KEY `idPicture_2` (`idPicture`),
  CONSTRAINT `idPicture_2` FOREIGN KEY (`idPicture`) REFERENCES `pictures` (`idPictures`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idUser_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sendemail`
--

LOCK TABLES `sendemail` WRITE;
/*!40000 ALTER TABLE `sendemail` DISABLE KEYS */;
/*!40000 ALTER TABLE `sendemail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuspicture`
--

DROP TABLE IF EXISTS `statuspicture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statuspicture` (
  `idStatusPicture` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL DEFAULT 'Chờ báo giá',
  PRIMARY KEY (`idStatusPicture`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuspicture`
--

LOCK TABLES `statuspicture` WRITE;
/*!40000 ALTER TABLE `statuspicture` DISABLE KEYS */;
INSERT INTO `statuspicture` VALUES (1,'chờ xác nhận của họa sĩ');
/*!40000 ALTER TABLE `statuspicture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Permission` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Address` varchar(65) DEFAULT NULL,
  `Password` varchar(555) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-30  9:11:34
