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
  `Note` varchar(355) DEFAULT NULL,
  `Confirflg` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idConfirmOfPainter`),
  KEY `idPicture_1` (`idPicture`),
  KEY `idPainter_3` (`idPainter`),
  CONSTRAINT `idPainter_3` FOREIGN KEY (`idPainter`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idPicture_1` FOREIGN KEY (`idPicture`) REFERENCES `pictures` (`idPictures`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `idlikes` int(11) NOT NULL,
  `idPicture` varchar(45) DEFAULT NULL,
  `idUser` varchar(45) DEFAULT NULL,
  `Likesflg` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idlikes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `Name` varchar(200) NOT NULL,
  `chibiFileName` varchar(200) NOT NULL,
  `NumberLike` int(10) unsigned DEFAULT 0,
  `DateUp` datetime NOT NULL,
  `StatusSendEmail` tinyint(4) DEFAULT 0,
  `StandarPrice` decimal(10,2) DEFAULT 0,
  `PriceOfUser` decimal(10,2) DEFAULT 0,
  `BackgroundPicture` varchar(255) DEFAULT NULL,
  `Note` varchar(355) DEFAULT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `ExtraDetail` varchar(45) DEFAULT NULL,
  `MaxPrice` decimal(10,2) DEFAULT NULL,
  `DateExpiry` datetime DEFAULT current_timestamp(),
  `Editdate` datetime DEFAULT current_timestamp(),
  `Picturesflg` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idPictures`),
  KEY `idUser_1` (`idUser`),
  KEY `idstatusPicture_1` (`idStatusPicture`),
  CONSTRAINT `idUser_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idstatusPicture_1` FOREIGN KEY (`idStatusPicture`) REFERENCES `statuspicture` (`idStatusPicture`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `Sendemailflg` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idSendEmail`),
  KEY `idUser_2` (`idUser`),
  KEY `idPicture_2` (`idPicture`),
  CONSTRAINT `idPicture_2` FOREIGN KEY (`idPicture`) REFERENCES `pictures` (`idPictures`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idUser_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `statuspicture`
--

DROP TABLE IF EXISTS `statuspicture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statuspicture` (
  `idStatusPicture` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL DEFAULT 'Chờ báo giá',
  `Statusflg` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idStatusPicture`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `Phone` varchar(15) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Password` varchar(555) NOT NULL,
  `Gender` varchar(10),
  `Logtime` datetime,
  `Editdate` datetime DEFAULT current_timestamp(),
  `DatePasschange` datetime,
  `Userflg` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `content` varchar(500) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `problem` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `statuspicture` VALUES (1, 'New', NULL);
INSERT INTO `statuspicture` VALUES (2, 'Chờ báo giá 1', NULL);
INSERT INTO `statuspicture` VALUES (3, 'Commit Giá', NULL);
INSERT INTO `statuspicture` VALUES (4, 'Đang Vẽ', NULL);
INSERT INTO `statuspicture` VALUES (5, 'User Reject', NULL);
INSERT INTO `statuspicture` VALUES (6, 'Painter Reject', NULL);
INSERT INTO `statuspicture` VALUES (7, 'Admin Reject', NULL);
INSERT INTO `statuspicture` VALUES (8, 'Public', NULL);
INSERT INTO `statuspicture` VALUES (9, 'Private', NULL);
INSERT INTO `statuspicture` VALUES (10, 'Finish', NULL);
INSERT INTO `users` VALUES (40, 'AdminD', 0, 'furusato.d2n@gmail.com', 0, '', '26e8917ff90617d093344705f0704d72', '2', NULL, '2020-11-20 10:34:37', NULL, NULL);

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) UNSIGNED NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `contact` ADD PRIMARY KEY (`id`);
ALTER TABLE `contact` MODIFY `id` INT AUTO_INCREMENT;
ALTER TABLE `comment` ADD PRIMARY KEY (`id`);
ALTER TABLE `comment` MODIFY `id` INT AUTO_INCREMENT;
ALTER TABLE `contact` ADD COLUMN `idUser` int(11) DEFAULT NULL AFTER `id`;

ALTER TABLE `users` ADD COLUMN `Painter_request` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `Permission`;
ALTER TABLE `pictures` ADD COLUMN `NumberHeart` int(10) UNSIGNED NULL DEFAULT 0 AFTER `NumberLike`;
ALTER TABLE `pictures` ADD COLUMN `NumberShare` int(10) UNSIGNED NULL DEFAULT 0 AFTER `NumberLike`;
