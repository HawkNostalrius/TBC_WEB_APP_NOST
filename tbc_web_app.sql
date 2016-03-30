-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: tbc_web_app
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gm_level` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'test','toto@gmail.com','3d0d99423e31fcc67a6745ec89d70d700344bc76',0,NULL,'2016-03-18 23:03:27');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2016_03_01_165945_create_account_table',1),('2016_03_12_123956_create_scripts_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scripts`
--

DROP TABLE IF EXISTS `scripts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scripts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` enum('WaitingAdminConfirmForTest','AcceptedForTestStep','Testing','AcceptedAfterTest','RefusedAfterTest') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'WaitingAdminConfirmForTest',
  `updated_admin_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_admin_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scripts`
--

LOCK TABLES `scripts` WRITE;
/*!40000 ALTER TABLE `scripts` DISABLE KEYS */;
INSERT INTO `scripts` VALUES (1,'Title test script 1','Test Content for script',1,'WaitingAdminConfirmForTest',NULL,NULL,NULL,NULL),(2,'Title test script 2','Test Content for script',1,'AcceptedForTestStep',NULL,NULL,NULL,NULL),(3,'Title test script 3','Test Content for script',1,'Testing',NULL,NULL,NULL,NULL),(4,'Title test script 4 toto','Test Content for script content content',1,'AcceptedAfterTest',NULL,NULL,NULL,'2016-03-19 11:00:56'),(5,'Title test script 5','Test Content for script',1,'RefusedAfterTest',NULL,NULL,NULL,NULL),(6,'Title test script 6','Test Content for script',1,'WaitingAdminConfirmForTest',NULL,NULL,NULL,NULL),(7,'toto1','mdr',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:31:41','2016-03-18 21:31:41'),(8,'qsdfgqsdf','qsdfqsdf',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:32:21','2016-03-18 21:32:21'),(9,'toto2','toto2content',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:51:40','2016-03-18 21:51:40'),(10,'toto2','toto2content',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:52:45','2016-03-18 21:52:45'),(11,'toto2','toto2content',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:53:07','2016-03-18 21:53:07'),(12,'toto2','toto2content',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:55:17','2016-03-18 21:55:17'),(13,'toto2','toto2content',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:55:42','2016-03-18 21:55:42'),(14,'toto2','toto2content',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:55:48','2016-03-18 21:55:48'),(15,'toto2','toto2content',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:55:54','2016-03-18 21:55:54'),(16,'toto2','toto2content',1,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:55:58','2016-03-18 21:55:58'),(17,'toto4','tototzdfsd',1,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 21:59:07','2016-03-18 21:59:07'),(18,'toto5','toto5content',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 22:04:30','2016-03-18 22:04:30'),(19,'toto5','toto5content',0,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 22:05:53','2016-03-18 22:05:53'),(20,'toto5','toto5content',1,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 22:12:21','2016-03-18 22:12:21'),(21,'toto6','toto6content',1,'WaitingAdminConfirmForTest',NULL,NULL,'2016-03-18 22:12:33','2016-03-18 22:12:34');
/*!40000 ALTER TABLE `scripts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-28  1:44:13
