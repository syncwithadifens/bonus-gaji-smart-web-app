-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: spk-smart
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alternatif`
--

DROP TABLE IF EXISTS `alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` bigint(16) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `hasil_alternatif` double NOT NULL,
  `ket_alternatif` varchar(12) NOT NULL,
  PRIMARY KEY (`id_alternatif`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternatif`
--

LOCK TABLES `alternatif` WRITE;
/*!40000 ALTER TABLE `alternatif` DISABLE KEYS */;
INSERT INTO `alternatif` VALUES (27,1001,'Afiv',4.7,'Layak'),(28,1002,'Idam',4.1000000000000005,'Tidak Layak'),(29,1003,'Mita',3.7000000000000006,'Tidak Layak'),(30,1004,'Riangga',4.2,'Tidak Layak'),(31,1005,'Sofi',4.3500000000000005,'Tidak Layak');
/*!40000 ALTER TABLE `alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alternatif_kriteria`
--

DROP TABLE IF EXISTS `alternatif_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alternatif_kriteria` (
  `id_alternatif_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_alternatif_kriteria` double NOT NULL,
  `bobot_alternatif_kriteria` double NOT NULL,
  PRIMARY KEY (`id_alternatif_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternatif_kriteria`
--

LOCK TABLES `alternatif_kriteria` WRITE;
/*!40000 ALTER TABLE `alternatif_kriteria` DISABLE KEYS */;
INSERT INTO `alternatif_kriteria` VALUES (223,27,120,5,1.25),(224,27,121,5,0.75),(225,27,122,5,0.5),(226,27,123,5,0.5),(227,27,124,5,0.5),(228,27,125,5,0.25),(229,27,126,4,0.6),(230,27,127,4,0.2),(231,27,128,3,0.15),(232,28,120,4,1),(233,28,121,4,0.6),(234,28,122,5,0.5),(235,28,123,4,0.4),(236,28,124,4,0.4),(237,28,125,4,0.2),(238,28,126,4,0.6),(239,28,127,4,0.2),(240,28,128,4,0.2),(241,29,120,4,1),(242,29,121,3,0.45),(243,29,122,4,0.4),(244,29,123,4,0.4),(245,29,124,4,0.4),(246,29,125,4,0.2),(247,29,126,3,0.45),(248,29,127,4,0.2),(249,29,128,4,0.2),(250,30,120,5,1.25),(251,30,121,4,0.6),(252,30,122,4,0.4),(253,30,123,4,0.4),(254,30,124,4,0.4),(255,30,125,3,0.15),(256,30,126,4,0.6),(257,30,127,4,0.2),(258,30,128,4,0.2),(259,31,120,5,1.25),(260,31,121,5,0.75),(261,31,122,4,0.4),(262,31,123,4,0.4),(263,31,124,4,0.4),(264,31,125,4,0.2),(265,31,126,4,0.6),(266,31,127,3,0.15),(267,31,128,4,0.2);
/*!40000 ALTER TABLE `alternatif_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `bobot_normalisasi` double NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kriteria`
--

LOCK TABLES `kriteria` WRITE;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` VALUES (120,'Disiplin Kerja',25,0.25),(121,'Tanggung Jawab',15,0.15),(122,'Inisiatif',10,0.1),(123,'Kreatifitas',10,0.1),(124,'Kemampuan mempertimbangkan dan mengambil keputusan',10,0.1),(125,'Kemampuan Adaptasi',5,0.05),(126,'Sikap terhadap atasan',15,0.15),(127,'Sikap terhadap teman kerja',5,0.05),(128,'Kesan dari tingkah laku',5,0.05);
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_kriteria`
--

DROP TABLE IF EXISTS `sub_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sub_kriteria` varchar(50) NOT NULL,
  `nilai_sub_kriteria` double NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  PRIMARY KEY (`id_sub_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_kriteria`
--

LOCK TABLES `sub_kriteria` WRITE;
/*!40000 ALTER TABLE `sub_kriteria` DISABLE KEYS */;
INSERT INTO `sub_kriteria` VALUES (2,'Kontrak',50,9),(4,'Tidak Menentu',100,9),(6,'> 3 juta',50,1),(9,'< 2 juta',100,1),(11,'> 4 juta',0,1),(12,'Tetap',0,9),(13,'Roda dua',100,11),(14,'Roda empat',0,11),(19,'Anjay',25,16),(20,'Lebih dari 4',100,17),(21,'2 sampai 4',50,17),(22,'0 sampai 1',0,17),(25,'2 juta sampai 4 juta',50,40),(26,'Kurang dari 2 juta',100,40),(34,'Lebih dari 4 juta',0,40),(35,'Tanah 1 hektar',0,106),(36,'Tidak ada',100,106),(38,'Pribadi',0,118),(39,'Kontrak',100,118),(40,'Sangat baik',5,120),(41,'Baik',4,120),(42,'Cukup',3,120),(43,'Sedang',2,120),(44,'Kurang',1,120),(45,'Sangat baik',5,122),(46,'Baik',4,122),(47,'Cukup',3,122),(48,'Sedang',2,122),(49,'Kurang',1,122),(50,'Sangat baik',5,125),(51,'Baik',4,125),(52,'Cukup',3,125),(53,'Kurang',1,125),(54,'Sedang',2,125),(55,'Sangat baik',5,124),(56,'Sangat baik',5,128),(57,'Sangat baik',5,123),(58,'Sangat baik',5,126),(59,'Sangat baik',5,127),(60,'Sangat baik',5,121),(61,'Baik',4,124),(62,'Baik',4,128),(63,'Baik',4,123),(64,'Baik',4,126),(65,'Baik',4,127),(66,'Baik',4,121),(67,'Cukup',3,124),(68,'Cukup',3,128),(69,'Cukup',3,123),(70,'Cukup',3,126),(71,'Cukup',3,127),(72,'Cukup',3,121),(73,'Sedang',2,124),(74,'Sedang',2,128),(75,'Sedang',2,123),(76,'Sedang',2,126),(77,'Sedang',2,127),(78,'Sedang',2,121),(79,'Kurang',1,124),(80,'Kurang',1,128),(81,'Kurang',1,123),(82,'Kurang',1,126),(83,'Kurang',1,127),(84,'Kurang',1,121);
/*!40000 ALTER TABLE `sub_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (24,'Panji Bangun Pangestu','panji','default.png','$2y$10$fyqiPXV2IgMarnA5Hqt1JeVtVN7taoD6MslrIXL7ZWK7/nbd9ewW6',1607590045),(25,'Admin','admin','killua2.jpg','$2y$10$wyLstqg/.5FZKA8m0zIVneMIl7hnA8DMVml4iM8CRuIYDQhcEVhiC',1658417006);
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

-- Dump completed on 2022-07-22  1:48:15
