-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: smlib
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `UIET`
--

DROP TABLE IF EXISTS `UIET`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UIET` (
  `sem` char(1) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UIET`
--

LOCK TABLES `UIET` WRITE;
/*!40000 ALTER TABLE `UIET` DISABLE KEYS */;
/*!40000 ALTER TABLE `UIET` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UIETcost`
--

DROP TABLE IF EXISTS `UIETcost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UIETcost` (
  `cost` int(11) DEFAULT NULL,
  `sem` varchar(3) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UIETcost`
--

LOCK TABLES `UIETcost` WRITE;
/*!40000 ALTER TABLE `UIETcost` DISABLE KEYS */;
INSERT INTO `UIETcost` VALUES (1650,'1','IT'),(1650,'2','IT'),(1650,'3','IT'),(1650,'4','IT'),(1650,'5','IT'),(1650,'6','IT'),(1650,'7','IT'),(1650,'8','IT'),(1650,'1','CSE'),(1650,'1','ECE'),(1650,'2','ECE'),(1650,'3','ECE'),(1650,'4','ECE'),(1650,'5','ECE'),(1650,'6','ECE'),(1650,'7','ECE'),(1650,'8','ECE'),(1650,'1','EEE'),(1650,'2','EEE'),(1650,'3','EEE'),(1650,'4','EEE'),(1650,'5','EEE'),(1650,'6','EEE'),(1650,'7','EEE'),(1650,'8','EEE'),(1650,'1','Biotechnology'),(1650,'2','Biotechnology'),(1650,'3','Biotechnology'),(1650,'4','Biotechnology'),(1650,'5','Biotechnology'),(1650,'6','Biotechnology'),(1650,'7','Biotechnology'),(1650,'8','Biotechnology'),(1650,'1','Mechanical'),(1650,'2','Mechanical'),(1650,'3','Mechanical'),(1650,'4','Mechanical'),(1650,'5','Mechanical'),(1650,'6','Mechanical'),(1650,'7','Mechanical'),(1650,'8','Mechanical'),(1650,'1','CSE'),(1650,'2','CSE'),(1650,'3','CSE'),(1650,'4','CSE'),(1650,'5','CSE'),(1650,'6','CSE'),(1650,'7','CSE'),(1650,'8','CSE');
/*!40000 ALTER TABLE `UIETcost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `college` (
  `colname` varchar(200) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `college`
--

LOCK TABLES `college` WRITE;
/*!40000 ALTER TABLE `college` DISABLE KEYS */;
INSERT INTO `college` VALUES ('UIET','CSE'),('UIET','IT'),('UIET','EEE'),('UIET','ECE'),('UIET','Mechanical'),('UIET','BioTech');
/*!40000 ALTER TABLE `college` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `email` varchar(50) DEFAULT NULL,
  `book_name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `referal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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

-- Dump completed on 2016-07-28 10:55:26
