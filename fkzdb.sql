-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: fkzdb
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `accountID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`accountID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `productid` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` text,
  `image` varchar(45) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Taylor 552e',3338,'Players who find the traditionally bigger size of a 12-string body unwieldy will love the playing comfort of the 552ce 12-Fret.','Taylor/Taylor-522e-TF-fr-2016.png','Taylor'),(2,'Taylor 712e',3898,'On Taylor’s 12-fret Grand Concert models, the shorter neck meets the body at the 12th fret rather than the 14th, and the bridge position is shifted closer to the center of the lower bout. The result is a boost in tonal warmth and power.','Taylor/Taylor-712e-TF-fr-2015.png','Taylor'),(3,'Taylor 812ce',5298,'Taylor’s rosewood/spruce Grand Concert is all about articulation and intimacy. It’s a fingerstyle favorite for its balanced and focused response and makes a perfect recording guitar, as it fits well with other instruments.','Taylor/Taylor-812ce-TF-fr-2015-2.png','Taylor'),(4,'Martin DC-15ME',2249,'The Martin DC-15ME Acoustic-Electric Guitar with Case is constructed of genuine solid mahogany for a warm, full tone with distinctive character. This Martin D 14-fret dreadnought with cutaway also features a bone nut and saddle, diamond & square fingerboard inlays, and a satin finish. The mahogany neck with solid East Indian rosewood fingerboard adds to the guitar\'s acoustic warmth.','Martin/dc-15me.png','Martin'),(5,'Martin GPCAPA4 Shaded',2299,'The GPCPA4 Shaded Grand Performance cutaway is a warmly shaded top version of the Performing Artist Series GPCPA4 model. This model includes sustainable wood certified parts.','Martin/gpc12pa4.png','Martin'),(6,'Martin OMCPA5 Black',999,'The Martin Performing Artist Series OMCPA5 Orchestra Model Acoustic-Electric Guitar combines that world-famous Martin sound with the contemporary playability of an electric guitar. Martin’s OM body has been around since 1929. It is famous for defining the balanced acoustic guitar tone, with the right amount of bass, midrange, and treble frequencies.','Martin/omcpa5-black.png','Martin'),(7,'Takamine CP3DC-OV',1749.99,'Elegantly appointed with resonant tonewoods, decorative touches and state-of-the-art electronics. An exquisite acoustic experience onstage and off.','Takamine/cp3dc-ov_thumbnail.png','Takamine'),(8,'Takamine P5DC',1649.99,'Takamine’s stylish P5DC dreadnought cutaway combines tradition with contemporary refinements, including a resonant solid spruce top with “X” top bracing for superior clarity and projection, and a solid rosewood back with rosewood sides for a rich, warm sound.','Takamine/p5dc_thumbnail.png','Takamine'),(9,'Takamine EF250TK',2239.86,'Takamine is very proud to introduce the EF250TK Toby Keith Signature model, designed in cooperation with the top-selling country superstar and crafted to his exacting specs. Based on his longtime workhorse acoustic, the Takamine TF250SMCSB, it features a full-sounding jumbo body with a convenient cutaway, solid spruce top with “X” bracing, and beautiful flame maple back and sides. ','Takamine/ef250tk_thumbnail.png','Takamine'),(10,'Epiphone DR100LE',118,'For decades, the DR-100 has been Epiphone’s best selling acoustic guitar with the look, sound, and build quality that first time players and professionals expect when they play an Epiphone. The dreadnought profile is considered to be the classic go-to shape for every kind of music including rock, bluegrass, folk, country, and everything in-between.','Epiphone/DR100LE_Thumb.png','Epiphone'),(11,'Epiphone PR-150',159.99,'For such an easy-to-afford guitar, the Epiphone PR-150 is a standout -- a perfect instrument to get started on. It is a dreadnought and features a spruce top, mahogany back and sides, and a mahogany neck with rosewood fretboard. The PR-150 sounds great and this Epiphone\'s sunburst finish gives it the look of a far more expensive guitar.','Epiphone/PR-150_Thumb.png','Epiphone'),(12,'Epiphone PRO1 PLUS',249,'The PRO-1 Plus comes with a Solid Spruce top for superior sound with beautiful 5-layer Ivory and Black binding just like Epiphone’s vintage classics and features all of the PRO Collection\'s breakthrough innovations. Epiphone, one of the world’s oldest and most respected guitar makers, has just made playing and learning guitar easy for everyone. ','Epiphone/Pro1Plus_Thumb.png','Epiphone');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-28  3:23:01
