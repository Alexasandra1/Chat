-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: chatuser
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'lera','email@mail.ru','smth text','2024-12-22 18:45:38',''),(2,'alex','alex@example.com','message 1','2024-12-24 14:15:45',NULL),(3,'emma','emma@example.com','message 2','2024-12-24 14:15:45',NULL),(4,'liam','liam@example.com','message 3','2024-12-24 14:15:45',NULL),(5,'sophia','sophia@example.com','message 4','2024-12-24 14:15:45',NULL),(6,'noah','noah@example.com','message 5','2024-12-24 14:15:45',NULL),(7,'ava','ava@example.com','message 6','2024-12-24 14:15:45',NULL),(8,'oliver','oliver@example.com','message 7','2024-12-24 14:15:45',NULL),(9,'mia','mia@example.com','message 8','2024-12-24 14:15:45',NULL),(10,'elijah','elijah@example.com','message 9','2024-12-24 14:15:45',NULL),(11,'amelia','amelia@example.com','message 10','2024-12-24 14:15:45',NULL),(12,'lucas','lucas@example.com','message 11','2024-12-24 14:15:45',NULL),(13,'harper','harper@example.com','message 12','2024-12-24 14:15:45',NULL),(14,'ethan','ethan@example.com','message 13','2024-12-24 14:15:45',NULL),(15,'evelyn','evelyn@example.com','message 14','2024-12-24 14:15:45',NULL),(16,'james','james@example.com','message 15','2024-12-24 14:15:45',NULL),(17,'abigail','abigail@example.com','message 16','2024-12-24 14:15:45',NULL),(18,'benjamin','benjamin@example.com','message 17','2024-12-24 14:15:45',NULL),(19,'ella','ella@example.com','message 18','2024-12-24 14:15:45',NULL),(20,'henry','henry@example.com','message 19','2024-12-24 14:15:45',NULL),(21,'sofia','sofia@example.com','message 20','2024-12-24 14:15:45',NULL),(22,'jack','jack@example.com','message 21','2024-12-24 14:15:45',NULL),(23,'scarlett','scarlett@example.com','message 22','2024-12-24 14:15:45',NULL),(24,'aiden','aiden@example.com','message 23','2024-12-24 14:15:45',NULL),(25,'layla','layla@example.com','message 24','2024-12-24 14:15:45',NULL),(26,'logan','logan@example.com','message 25','2024-12-24 14:15:45',NULL),(27,'zxc','emailzxc@mail.ru','interesting text','2024-12-23 17:34:05',''),(28,'zxc2','emailzxc@mail.ru','interesting text','2024-12-23 17:35:19','uploads/67699f5763fdf4.89517046.png'),(29,'zxc2','emailzxc@mail.ru','interesting text','2024-12-23 17:38:18','uploads/6769a00a328485.50488603.txt'),(30,'zxc3','emailzxc@mail.ru','interesting text','2024-12-23 17:50:23','uploads/6769a2df1716d5.09909105.png'),(31,'aaaaa','aaaa@mail.ru','nothing','2024-12-23 17:53:48',''),(32,'aaaaa','aaaa@mail.ru','nothing','2024-12-23 17:54:11',''),(33,'newuser','newuser@mail.ru','smth text','2024-12-24 14:42:14','');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `browser_info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'zxc','123',NULL,NULL),(2,'zxcaaaa','123',NULL,NULL),(3,'zxcaaaa','123',NULL,NULL),(4,'kto-to','11111',NULL,NULL),(5,'lera','123123','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0');
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

-- Dump completed on 2024-12-24 18:04:40
