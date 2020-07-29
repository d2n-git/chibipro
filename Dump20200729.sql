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
-- Dumping data for table `confirmofpainter`
--
-- ORDER BY:  `idConfirmOfPainter`

LOCK TABLES `confirmofpainter` WRITE;
/*!40000 ALTER TABLE `confirmofpainter` DISABLE KEYS */;
/*!40000 ALTER TABLE `confirmofpainter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `painter`
--
-- ORDER BY:  `idpainter`

LOCK TABLES `painter` WRITE;
/*!40000 ALTER TABLE `painter` DISABLE KEYS */;
/*!40000 ALTER TABLE `painter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pictures`
--
-- ORDER BY:  `idPictures`

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sendemail`
--
-- ORDER BY:  `idSendEmail`

LOCK TABLES `sendemail` WRITE;
/*!40000 ALTER TABLE `sendemail` DISABLE KEYS */;
/*!40000 ALTER TABLE `sendemail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `statuspicture`
--
-- ORDER BY:  `idStatusPicture`

LOCK TABLES `statuspicture` WRITE;
/*!40000 ALTER TABLE `statuspicture` DISABLE KEYS */;
INSERT INTO `statuspicture` VALUES (1,'chờ xác nhận của họa sĩ');
/*!40000 ALTER TABLE `statuspicture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--
-- ORDER BY:  `idUser`

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

-- Dump completed on 2020-07-29 22:35:54
