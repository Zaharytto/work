-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `message_sections`
--

DROP TABLE IF EXISTS `message_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_sections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `color_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_user_id_idx` (`user_id`),
  KEY `c_color_id_idx` (`color_id`),
  CONSTRAINT `c_color_id` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `c_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_sections`
--

LOCK TABLES `message_sections` WRITE;
/*!40000 ALTER TABLE `message_sections` DISABLE KEYS */;
INSERT INTO `message_sections` VALUES (1,'1.1','Основные','2008-10-23 10:37:22',1,1),(2,'1.2','Оповещения','2008-10-23 10:37:22',1,1),(3,'1.3','Спам','2008-10-23 10:37:22',1,1),(4,'1.1.1','По работе','2008-10-23 10:37:22',1,1),(5,'1.1.2','Личные','2008-10-23 10:37:22',1,1),(6,'1.2.1','Магазины','2008-10-23 10:37:22',1,1),(7,'1.2.2','Подписки','2008-10-23 10:37:22',1,1),(8,'1.2.2.1','Подписка на лекции по PHP','2008-10-23 10:37:22',1,1),(9,'1.2.2.2','Подписка на другие лекции ','2008-10-23 10:37:22',1,1),(10,'1.2.3','Форумы','2008-10-23 10:37:22',1,1);
/*!40000 ALTER TABLE `message_sections` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-22  0:10:37
