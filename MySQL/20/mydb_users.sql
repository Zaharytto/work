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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `is_online` tinyint(1) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_notification` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,0,'Петичкин Иван Николаевич','ivanch','ivan@mail.ru','+7(999) 123-45-01','$2y$10$.vB1woH74N3ypvk.KNb7m.CB0DWj72vt.4h0IxiwecYfoaUhe3Dfq',0),(2,0,'Пупкин Алексей Андреевич','alexxxone','alex@mail.ru','+7(999) 123-45-02','$2y$10$.vB1woH74N3ypvk.KNb7m.CB0DWj72vt.4h0IxiwecYfoaUhe3Dfq',1),(3,0,'Петрушевич Валерий Иванович','vano','vala@mail.ru','+7(999) 123-45-03','$2y$10$.vB1woH74N3ypvk.KNb7m.CB0DWj72vt.4h0IxiwecYfoaUhe3Dfq',0),(4,1,'Зеньцов Максим Викторович','maxik','maxim@mail.ru','+7(999) 123-45-04','$2y$10$.vB1woH74N3ypvk.KNb7m.CB0DWj72vt.4h0IxiwecYfoaUhe3Dfq',0),(5,0,'Васечкин Тарас Фёдорович','tarassio','taras@mail.ru','+7(999) 123-45-05','$2y$10$.vB1woH74N3ypvk.KNb7m.CB0DWj72vt.4h0IxiwecYfoaUhe3Dfq',0),(6,1,'Пономарёв Дмитрий Александрович','dimon','dima@mail.ru','+7(999) 123-45-06','$2y$10$.vB1woH74N3ypvk.KNb7m.CB0DWj72vt.4h0IxiwecYfoaUhe3Dfq',0),(7,1,'Капустин Артём Олегович','artemiy','artem@mail.ru','+7(999) 123-45-07','$2y$10$.vB1woH74N3ypvk.KNb7m.CB0DWj72vt.4h0IxiwecYfoaUhe3Dfq',1),(8,0,'Морковкин Роман Викторович','romanych','roma@mail.ru','+7(999) 123-45-08','$2y$10$.vB1woH74N3ypvk.KNb7m.CB0DWj72vt.4h0IxiwecYfoaUhe3Dfq',1);
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

-- Dump completed on 2022-10-24 19:51:23
