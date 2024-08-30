-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: monapplisymf
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `distributeur`
--

DROP TABLE IF EXISTS `distributeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distributeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distributeur`
--

LOCK TABLES `distributeur` WRITE;
/*!40000 ALTER TABLE `distributeur` DISABLE KEYS */;
INSERT INTO `distributeur` VALUES (1,'HP'),(2,'Logitech'),(3,'Dell'),(4,'Acer'),(5,'Epson'),(6,'ddddd'),(7,'gggg'),(8,'sssss');
/*!40000 ALTER TABLE `distributeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20200404101708','2020-04-04 13:51:20'),('20200405094432','2020-04-05 09:47:48'),('20200405172518','2020-04-05 17:26:06'),('20200405174856','2020-04-05 17:49:24'),('20200406070838','2020-04-06 07:09:39'),('20200406072335','2020-04-06 07:23:59'),('20200410072311','2020-04-10 07:23:37'),('20200410072651','2020-04-10 07:27:06'),('20200502174051','2020-05-02 17:44:11');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `quantite` int(11) NOT NULL,
  `rupture` tinyint(1) NOT NULL,
  `lien_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_29A5EC271645DEA9` (`reference_id`),
  CONSTRAINT `FK_29A5EC271645DEA9` FOREIGN KEY (`reference_id`) REFERENCES `reference` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (19,'imprimantes',999,10,0,'imprimante.jpg',13),(20,'cartouches encre',80,50,0,'cartouches.jpg',14),(21,'ordinateurs',1700,3,0,'ordinateur.jpg',15),(22,'écrans',500,100,0,'ecran.jpg',16),(23,'claviers',110,10,1,'clavier.jpg',17),(24,'souris',5,200,0,'souris.jpg',18),(28,'Scanner',700,23,1,'scanner.jpg',20),(29,'ddd',12,10,0,'TraitementduFormulaire.JPG',NULL),(30,'dddddd',12,10,0,'TraitementduFormulaire.JPG',NULL),(31,'ddddddddddd',12,10,0,'TraitementduFormulaire.JPG',NULL);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit_distributeur`
--

DROP TABLE IF EXISTS `produit_distributeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit_distributeur` (
  `produit_id` int(11) NOT NULL,
  `distributeur_id` int(11) NOT NULL,
  PRIMARY KEY (`produit_id`,`distributeur_id`),
  KEY `IDX_E3D5370CF347EFB` (`produit_id`),
  KEY `IDX_E3D5370C29EB7ACA` (`distributeur_id`),
  CONSTRAINT `FK_E3D5370C29EB7ACA` FOREIGN KEY (`distributeur_id`) REFERENCES `distributeur` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_E3D5370CF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit_distributeur`
--

LOCK TABLES `produit_distributeur` WRITE;
/*!40000 ALTER TABLE `produit_distributeur` DISABLE KEYS */;
INSERT INTO `produit_distributeur` VALUES (19,1),(19,5),(20,5),(21,1),(21,3),(21,4),(22,1),(22,3),(23,1),(23,2);
/*!40000 ALTER TABLE `produit_distributeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference`
--

DROP TABLE IF EXISTS `reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference`
--

LOCK TABLES `reference` WRITE;
/*!40000 ALTER TABLE `reference` DISABLE KEYS */;
INSERT INTO `reference` VALUES (13,1705177587),(14,616848380),(15,109996081),(16,177113200),(17,743278352),(18,1321251638),(19,22222),(20,44444),(21,1233),(22,1),(23,111),(24,1111),(25,1111);
/*!40000 ALTER TABLE `reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Dupont','[]','$argon2id$v=19$m=65536,t=4,p=1$VFNTeWdRLzN0eWZtZmVSMg$hNPkvb0FtNqyShYqMfGWuSnfxrBns8oZ9aiXFz2yifM'),(2,'toto','[]','$argon2id$v=19$m=65536,t=4,p=1$eGdxOU42NVVmTEpmS3BCMA$8KhfmE+cfSV4yN5WlOY6b9R8cmEayy2FnJDIQulwmyY'),(3,'john','[\"ROLE_USER\", \"ROLE_ADMIN\"]','$argon2id$v=19$m=65536,t=4,p=1$blA3U2FOVTRwOUJQQ095Qw$8HQ1IoaWWVbNyrpCZTzZJSSVtz/cpqWtQII+0xiP6Q0'),(4,'tata','[\"ROLE_USER\"]','$argon2id$v=19$m=65536,t=4,p=1$VERrVnVTR2M4eFdSZnRBRQ$0fc1FCxqXHXVsNY7XoJvrXmF22j8r6LBuDSfcxknOec'),(5,'roger','[\"ROLE_USER\"]','$argon2id$v=19$m=65536,t=4,p=1$V2RXTHQ4SWtQVFAuSGZ4bA$Lid76HDklBJsC3m7y4ind1wMcz/PJCZK2mQVf307NtI');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-30 13:25:07
