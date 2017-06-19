-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: ps
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (2,1,2,4,0,'2016-11-07'),(3,2,1,0,0,'2016-11-30');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Shoes'),(2,'Choth'),(3,'Accessory');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorytype`
--

DROP TABLE IF EXISTS `categorytype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorytype` (
  `categorytypeid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`categorytypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorytype`
--

LOCK TABLES `categorytype` WRITE;
/*!40000 ALTER TABLE `categorytype` DISABLE KEYS */;
INSERT INTO `categorytype` VALUES (1,'Man'),(2,'Woman'),(3,'Kid');
/*!40000 ALTER TABLE `categorytype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `featureproduct`
--

DROP TABLE IF EXISTS `featureproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `featureproduct` (
  `order` int(11) NOT NULL,
  `code` varchar(64) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featureproduct`
--

LOCK TABLES `featureproduct` WRITE;
/*!40000 ALTER TABLE `featureproduct` DISABLE KEYS */;
INSERT INTO `featureproduct` VALUES (5,'AI8437'),(1,'AQ5929'),(4,'AY5130'),(9,'AY5909'),(10,'AY8330'),(8,'AY8558'),(6,'AY8660'),(11,'AZ1482'),(12,'B47529'),(2,'BB3910'),(3,'S75830'),(7,'S76314');
/*!40000 ALTER TABLE `featureproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `image_hash` varchar(32) NOT NULL,
  `caption` varchar(256) NOT NULL,
  `productid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `shortname` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `stockqty` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `categorytypeid` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'AH4584','NZRU MINI RUGBY BALL','NZRU MINI RUGBY BALL','With its miniature size, you can chuck and kick this mini rugby ball around just about anywhere you go. Made in the style of official New Zealand Rugby Union balls. Features a rubber cover that stands up to the sport\'s tough conditions.',15.00,10,3,3,'AH4584_01.jpg,AH4584_02.jpg,AH4584_03.jpg,AH4584_04.jpg,AH4584_05.jpg'),(2,'AI8435','RUN CLIMA CHILL SHORT','RUN CLIMA CHILL SHORT','These adidas by Stella McCartney Running Climachill Shorts feature meshlike fabric with titanium threads to channel heat off your skin so long runs are comfortable. Their tight fit lets you wear them solo or layer them under shorts.',70.00,10,2,2,'AI8435_01.jpg,AI8435_02.jpg,AI8435_03.jpg,AI8435_04.jpg,AI8435_05.jpg,AI8435_06.jpg'),(3,'AI8437','CLIMACHILL CROP TOP','CLIMACHILL CROP TOP','A Stella favourite this season, the adidas by Stella McCartney Running Climachill Crop Top is designed for distance runs. It features her signature \"miracle\" curving cut lines and climachill™ to guide sweat and heat away from your skin.',70.00,10,2,2,'AI8437_01.jpg,AI8437_02.jpg,AI8437_03.jpg,AI8437_04.jpg,AI8437_05.jpg,AI8437_06.jpg'),(4,'AJ4839','CLIMACHILL TANK','CLIMACHILL TANK','There are many secrets to a successful workout routine. To start with, you need reliable training clothes that feel good every time you put them on. This women\'s tank top is designed to help you feel cool and comfortable at the gym with climachill™. The knit structure releases heat and allows air to flow. On the inner surface, a print of heat-conductive raised aluminium dots pulls heat away from your skin for a cool-on-contact feel.',50.00,10,2,2,'AJ4839_01.jpg,AJ4839_02.jpg,AJ4839_03.jpg,AJ4839_04.jpg,AJ4839_05.jpg,AJ4839_06.jpg'),(5,'AJ8830','TREFOIL TEE','TREFOIL TEEA CASUAL TEE WITH A BOLD TREFOIL LOGO FRONT AND CENTR','The adidas Originals Trefoil Tee puts the Trefoil logo front and centre in a bold contrast colour to show off adidas pride. This men\'s t-shirt has a regular fit and a cotton single jersey build for a comfy fit and feel.',40.00,10,2,1,'AJ8830_01.jpg,AJ8830_02.jpg,AJ8830_03.jpg,AJ8830_04.jpg,AJ8830_05.jpg,AJ8830_06.jpg'),(6,'AO0238','ANKLE SOCKS 3 PAIRS','ANKLE SOCKS 3 PAIRS','These soft, comfortable workout socks keep you comfortable while you get your heart pumping. They come in a three-pair pack.',15.00,10,3,3,'AO0238_01.jpg'),(7,'AP6305','RUN BELT','RUN BELTA RUNNING ACCESSORY TO HOLD YOUR ESSENTIALS, DESIGNED BY','The adidas by Stella McCartney Running Belt is just big enough to hold a key, an energy bar and media player. Includes a holster for your water bottle.',80.00,10,3,2,'AP6305_01.jpg,AP6305_02.jpg,AP6305_03.jpg,AP6305_04.jpg,AP6305_05.jpg,AP6305_06.jpg'),(8,'AP7041','GHOST SHIN GUARDS','GHOST SHIN GUARDSFOOTBALL SHIN GUARDS DESIGNED TO LET YOU MAKE A','Complete your kit with these junior football shin guards designed to let you make aggressive moves with confidence. A hook-and-loop strap closure offers adjustable ankle protection, while soft synthetic lining provides maximum comfort.',20.00,10,3,3,'AP7041_01.jpg,AP7041_02.jpg,AP7041_03.jpg,AP7041_04.jpg'),(9,'AQ2186','COSMIC SHOES','COSMIC SHOES','Run long and hard with these men\'s running shoes built for maximum comfort. The air mesh upper and mesh lining provide superior ventilation, and a cloudfoam midsole gives them responsive cushioning with every stride. Made for natural runners, they\'re cut with a wide fit.',100.00,10,1,1,'AQ2186_01.jpg,AQ2186_02.jpg,AQ2186_03.jpg,AQ2186_04.jpg,AQ2186_05.jpg,AQ2186_06.jpg'),(10,'AQ5929','ULTRA BOOST SHOES','ULTRA BOOST SHOESCOMFORTABLE ENERGY-RETURNING SHOES MADE FOR NAT','Strength and endurance build with each run. Designed for natural running, these men\'s shoes blend a sock-like adidas Primeknit upper with an energy-returning boost™ midsole. They offer midfoot support and heel stability through every phase of the gait cycle. A Continental™ Rubber outsole provides all-weather grip.',240.00,10,1,1,'AQ5929_01.jpg,AQ5929_02.jpg,AQ5929_03.jpg,AQ5929_04.jpg,AQ5929_05.jpg,AQ5929_06.jpg'),(11,'AQ6105','RESPONSE 3 SHOES','RESPONSE 3 SHOES','Ready to log kilometres, these women\'s running shoes are built for distance. They\'re designed with boost™ to charge each step with light, fast energy so you can keep going toward your goal and beyond. An adaptive STRETCHWEB outsole increases stability and offers great flexibility.',160.00,10,1,2,'AQ6105_01.jpg,AQ6105_02.jpg,AQ6105_03.jpg,AQ6105_04.jpg,AQ6105_05.jpg,AQ6105_06.jpg'),(12,'AW4838','V JOG SHOES I','V JOG SHOES I','Made for little joggers. These infants\' shoes show off a high-energy look with playful colour. Built with a nubuck-like upper and a cushioned midsole to keep active feet comfy.',50.00,10,1,3,'AW4838_01.jpg,AW4838_02.jpg,AW4838_03.jpg,AW4838_04.jpg,AW4838_05.jpg,AW4838_06.jpg'),(13,'AY5130','VERSATILE BACKPACK','VERSATILE BACKPACKA BACKPACK FOR HAULING ESSENTIAL TRAINING GEAR','Pack your training kit for the road with this backpack. The zip main compartment handles essential gear, while two zip pockets on the front hold smaller stuff for quick access. Padded, ventilated straps protect your shoulders, and a durable base handles daily wear and tear.',35.00,10,3,1,'AY5130_01.jpg,AY5130_02.jpg,AY5130_03.jpg,AY5130_04.jpg,AY5130_05.jpg,AY5130_06.jpg'),(14,'AY5134','VERSATILE BACKPACK','VERSATILE BACKPACKA KIDS\' BACKPACK DESIGNED TO GET THEIR GEAR TO','This kids\' backpack does the heavy lifting for them. A roomy main compartment holds their big stuff, while two front pockets take care of the rest. Built for comfort, with ergonomically shaped adjustable shoulder straps.',30.00,10,3,3,'AY5134_01.jpg,AY5134_02.jpg,AY5134_03.jpg,AY5134_04.jpg,AY5134_05.jpg,AY5134_06.jpg'),(15,'AY5135','VERSATILE BACKPACK','VERSATILE BACKPACKA KIDS\' BACKPACK DESIGNED TO GET THEIR GEAR TO','This kids\' backpack does the heavy lifting for them. A roomy main compartment holds their big stuff, while two front pockets take care of the rest. Built for comfort, with ergonomically shaped adjustable shoulder straps.',30.00,10,3,3,'AY5135_01.jpg,AY5135_02.jpg,AY5135_03.jpg,AY5135_04.jpg,AY5135_05.jpg,AY5135_06.jpg'),(16,'AY5909','MINI AIRLINER BAG','MINI AIRLINER BAGWITH A UNIQUE 3D MESH DESIGN, THIS MINI BAG HAS','This handbag is a miniature, modernised version of luggage from the era when flying was an event to dress up for. It has a 3D mesh accent panel and plenty of organised storage. Carry it via the top handle or the detachable shoulder strap.',80.00,10,3,1,'AY5909_01.jpg,AY5909_02.jpg'),(17,'AY6162','3/4 TIGHT','3/4 TIGHTMOISTURE-WICKING TIGHTS FOR EVERYDAY WORKOUTS.','This women\'s jacket updates an authentic bomber style in soft, sporty waffle knit. The jacket\'s woven sleeves have a tonal moonwashed look. Cut for a relaxed fit.',80.00,10,2,2,'AY6162_01.jpg,AY6162_02.jpg,AY6162_03.jpg,AY6162_04.jpg,AY6162_05.jpg,AY6162_06.jpg'),(18,'AY6199','D ROSE 5 SNAP-BACK CAP','D ROSE 5 SNAP-BACK CAP','With superior ball-handling skills and the ability to score from everywhere on the basketball court, D Rose is always at the top of the class. Celebrate every no-look pass and game-winning shot in this Derrick Rose snap-back cap. Featuring a flat-brim design and an adjustable back strap for a comfortable fit.',60.00,10,3,2,'AY6199_01.jpg,AY6199_02.jpg,AY6199_03.jpg,AY6199_04.jpg,AY6199_05.jpg,AY6199_06.jpg'),(19,'AY7864','CLIMALITE 3-STRIPES HAT','CLIMALITE 3-STRIPES HAT','This training cap blocks out glare without trapping in heat, thanks to fabric that pulls sweat away from your skin. Made with a curved brim, elastic back strap and built-in sun protection. Finished with 3-Stripes on the brim.',20.00,10,3,1,'AY7864_01.jpg,AY7864_02.jpg,AY7864_03.jpg,AY7864_04.jpg,AY7864_05.jpg,AY7864_06.jpg'),(20,'AY7903','A2G HIGH END SHORT','A2G HIGH END SHORTSTRETCHY LIGHTWEIGHT TRAINING SHORTS FOR A COM','Make the most of every minute in the gym with these men\'s lightweight training shorts. Done in stretchy nylon for flexible movement as your workout ramps up, these soft shorts feature CORDURA® fabric on the front.',90.00,10,2,1,'AY7903_01.jpg,AY7903_02.jpg,AY7903_03.jpg,AY7903_04.jpg,AY7903_05.jpg,AY7903_06.jpg'),(21,'AY7990','ESSENTIALS SUMMER TEE','ESSENTIALS SUMMER TEE','This boys\' training t-shirt is ready for practice and everyday wear. Made with 100% cotton and a ribbed crewneck that\'s durable and soft, it\'s finished with a large adidas logo on the front.',25.00,10,2,3,'AY7990_01.jpg,AY7990_02.jpg,AY7990_03.jpg,AY7990_04.jpg,AY7990_05.jpg'),(22,'AY8001','BOYS ESSENTIALS BERMUDA SHORTS','BOYS ESSENTIALS BERMUDA SHORTS','Long and lean, these boys\' Essentials Woven Bermuda Shorts are an easy-to-wear choice for sport or play. A contrast drawcord and 3-Stripes add a pop of colour to these shorts.',30.00,10,2,3,'AY8001_01.jpg,AY8001_02.jpg,AY8001_03.jpg,AY8001_04.jpg,AY8001_05.jpg'),(23,'AY8330','ESSENTIALS LINEAR HOODIE','ESSENTIALS LINEAR HOODIE','Mixing modern sporty lines with cosy fleece, this junior girls\' hoodie is made with climalite® fabric to wick away sweat and keep you dry as you train. Features a lined hood and a big \"adidas\" printed down the front.',70.00,10,2,3,'AY8330_01.jpg,AY8330_02.jpg,AY8330_03.jpg,AY8330_04.jpg,AY8330_05.jpg'),(24,'AY8364','TECHFIT CHILL SHORT SLEEVE TEE','TECHFIT CHILL SHORT SLEEVE TEEA TEE THAT FEATURES MUSCLE COMPRES','Training takes discipline, endurance, setting priorities and sticking to goals. This men\'s t-shirt gives you a great base layer for your workouts. It has a compression fit to support your muscles during intense training, while climachill™ keeps you cool and focused as you turn up your efforts. It features UPF 50+ UV sun protection.',70.00,10,2,1,'AY8364_01.jpg,AY8364_02.jpg,AY8364_03.jpg,AY8364_04.jpg,AY8364_05.jpg,AY8364_06.jpg'),(25,'AY8558','YWF HOODIE SET','YWF HOODIE SETA SET WITH A MIX OF PLAYFUL PRINTS.','Making fun, sporty use of zebra stripes and Dalmatian spots, this infants\' two-piece set is ready to play. Made in soft French terry, the set includes elastic-waist leggings and a roomy pullover hoodie with a droptail hem.',80.00,10,2,3,'AY8558_01.jpg,AY8558_02.jpg,AY8558_03.jpg,AY8558_04.jpg,AY8558_05.jpg,AY8558_06.jpg'),(26,'AY8660','DUFFEL BAG','DUFFEL BAGA FRESH TAKE ON THE DUFFEL BAG, REINVENTED FOR MODERN ','The duffel bag, but better. This modern version has a cylindrical shape, adjustable webbing handles for carrying versatility, and an interior organiser to keep track of the small stuff. Finished with a reflective 3-Stripes logo detail across the front.',90.00,10,3,1,'AY8660_01.jpg,AY8660_02.jpg,AY8660_03.jpg,AY8660_04.jpg,AY8660_05.jpg,AY8660_06.jpg'),(27,'AY9329','FLOWERS AIRLINER CLUTCH','FLOWERS AIRLINER CLUTCH','Zip main compartment; Inside dividerAdjustable detachable shoulder strapEmbossed snakeskin pattern with floral printLarge screenprinted Trefoil logo; Plastic trimDimensions: 21.5 cm x 16.5 cm x 5 cm',45.00,10,3,2,'AY9329_01.jpg,AY9329_02.jpg,AY9329_03.jpg,AY9329_04.jpg,AY9329_05.jpg,AY9329_06.jpg'),(28,'AY9345','FLOWERS CLASSIC BACKPACK','FLOWERS CLASSIC BACKPACKA SIMPLE, CLASSIC BACKPACK MADE IN A FLO','This women\'s backpack takes you back to the \'70s. It has a simple yet effective design, and the floral twill material is reminiscent of wild prints from that era. An interior divider and exterior zip pocket keep things organised.',50.00,10,3,2,'AY9345_01.jpg,AY9345_02.jpg,AY9345_03.jpg,AY9345_04.jpg,AY9345_05.jpg,AY9345_06.jpg'),(29,'AZ1482','MOONWASH BOMBER JACKET','MOONWASH BOMBER JACKET','A BOMBER-STYLE JACKET WITH MODERN DETAILS.',100.00,10,2,2,'AZ1482_01.jpg,AZ1482_02.jpg,AZ1482_03.jpg,AZ1482_04.jpg,AZ1482_05.jpg,AZ1482_06.jpg'),(30,'B10719','FASHION TRACK JACKET','FASHION TRACK JACKET','adidas Originals heritage through and through. This men\'s track jacket zips up in a cotton blend with the iconic 3-Stripes on the sleeves and a Trefoil logo over your heart.',130.00,10,2,1,'B10719_01.jpg,B10719_02.jpg,B10719_03.jpg,B10719_04.jpg,B10719_05.jpg'),(31,'B42744','ALPHABOUNCE SHOES','ALPHABOUNCE SHOES','Weight: 298 g (size UK 8.5)BOUNCE™ provides energised comfort for all sports, all dayFuse mesh upperSock-like construction for snug fitComfortable textile lining; Grippy rubber outsole',150.00,10,1,1,'B42744_01.jpg,B42744_02.jpg,B42744_03.jpg,B42744_04.jpg,B42744_05.jpg,B42744_06.jpg'),(32,'B47529','ESSENTIALS LINEAR 3/4 TIGHT','ESSENTIALS LINEAR 3/4 TIGHTMOISTURE-WICKING TIGHTS DESIGNED FOR ','Take on your daily training with these junior girls\' three-quarter-length tights. With a body-hugging fit, they feature a climalite® design that pulls sweat from your skin to keep you cool and comfortable all workout long.',35.00,10,2,3,'B47529_01.jpg,B47529_02.jpg,B47529_03.jpg,B47529_04.jpg,B47529_05.jpg'),(33,'BB3898','ULTRA BOOST UNCAGED SHOES','ULTRA BOOST UNCAGED SHOES ENERGY-RETURNING SHOES FOR HIGH-PERFOR','Responsive, supportive and flexible, these men\'s running shoes charge every step with endless energy. The shoes have a full-length boost™ midsole that works with the STRETCHWEB outsole to harness and release energy with every step so you can run further with less fatigue. TORSION SYSTEM® in the midfoot pairs with the sock-like fit of the adidas Primeknit upper to support your foot\'s natural flex from heel to toe. With a Continental™ Rubber outsole that provides traction in all conditions.',240.00,10,2,1,'BB3898_01.jpg,BB3898_02.jpg,BB3898_03.jpg,BB3898_04.jpg,BB3898_05.jpg,BB3898_06.jpg'),(34,'BB3910','ULTRA BOOST SHOES','ULTRA BOOST SHOESCOMFORTABLE ENERGY-RETURNING SHOES FOR LONG-DIS','Strength and endurance build with each run. These women\'s running shoes are designed to help you log more kilometres in comfort. The shoes\' efficient boost™ midsole works with the STRETCHWEB outsole to return energy to every step, helping you run farther with less fatigue. A supportive midfoot complements the snug, sock-like fit of the adidas Primeknit upper to give your feet the support long runs demand. A Continental™ Rubber outsole provides sturdy traction in all conditions, wet or dry.',240.00,10,1,2,'BB3910_01.jpg,BB3910_02.jpg,BB3910_03.jpg,BB3910_04.jpg,BB3910_05.jpg,BB3910_06.jpg'),(35,'M19840','ZX FLUX SHOES','ZX FLUX SHOES','With styling inspired by the iconic mid-\'80s ZX runner, these men\'s shoes combine a ZX 8000 outsole with a sleek woven upper, tonal laces and a moulded heel cage.',120.00,10,1,2,'M19840_01.jpg,M19840_02.jpg,M19840_03.jpg,M19840_04.jpg,M19840_05.jpg,M19840_06.jpg'),(36,'S75809','RESPONSE SHOES','RESPONSE SHOESRUNNING SHOES WITH A RUGGED OUTSOLE.','These kids\' running shoes are inspired by the grown-up version. The upper features a 3-Stripes bandage for support, and the outsole has the durability your little athlete needs on the trail.',80.00,10,2,3,'S75809_01.jpg,S75809_02.jpg,S75809_03.jpg,S75809_04.jpg,S75809_05.jpg,S75809_06.jpg'),(37,'S75830','SUPERSTAR 80S DLX SHOES','SUPERSTAR 80S DLX SHOESA DELUXE VERSION OF THE ADIDAS SUPERSTAR ','An all-star for decades, the adidas Superstar sneaker is here to stay. These shoes rewind the look back with a vintage-inspired gum rubber shell toe and outsole. Finished with a golden Trefoil label on the tongue.',170.00,10,2,1,'S75830_01.jpg,S75830_02.jpg,S75830_03.jpg,S75830_04.jpg,S75830_05.jpg,S75830_06.jpg'),(38,'S75836','SUPERSTAR 80S','SUPERSTAR 80SA MODERN UPDATE OF THE ICONIC ADIDAS SUPERSTARS SNE','The adidas Superstar shoe stepped onto basketball courts in 1970, earning a sterling pro reputation before moving to the street. These shoes pair the iconic rubber shell toe and serrated 3-Stripes with a fresh new fishskin-textured leather upper. A chunky rubber cupsole completes the look',160.00,10,1,1,'S75836_01.jpg,S75836_02.jpg,S75836_03.jpg,S75836_04.jpg,S75836_05.jpg,S75836_06.jpg'),(39,'S76314','ZX FLUX SHOES','ZX FLUX SHOESAN INFANT-SIZE ZX FLUX WITH A SILKY ANIMAL-PRINT UP','Just in time for first steps, these shoes for infants bring the premium look and feel of the grownup ZX Flux in a colourful, pint-size package. Elastic laces stretch for easy entry and help the silky, printed satin upper fit snugly. A set of standard laces is included.',70.00,10,1,3,'S76314_01.jpg,S76314_02.jpg,S76314_03.jpg,S76314_04.jpg,S76314_05.jpg,S76314_06.jpg'),(40,'S76664','STAN SMITH SHOES','STAN SMITH SHOESTHE TIMELESS TENNIS SHOE, UPDATED WITH A CRACKLE','These women\'s shoes modernise the tennis-whites style of the Stan Smith with a unique crackled suede heel tab. Perforated 3-Stripes and a Stan Smith tongue label keep the look true to the original.',130.00,10,1,2,'S76664_01.jpg,S76664_02.jpg,S76664_03.jpg,S76664_04.jpg,S76664_05.jpg,S76664_06.jpg'),(41,'S78662','CC SONIC','CC SONICFULLY VENTILATED RUNNERS DESIGNED WITH STELLA MCCARTNEY.','Air-condition your run in the adidas by Stella McCartney Climacool Sonic Shoes. With Stella\'s signature florals on the upper, these runners offer all-around ventilation.',220.00,10,1,2,'S78662_01.jpg,S78662_02.jpg,S78662_03.jpg,S78662_04.jpg,S78662_05.jpg,S78662_06.jpg'),(42,'S79914','ZX FLUX SHOES','ZX FLUX SHOESA FRESH TAKE ON THE ZX FLUX IN SILKY SATIN.','Just for little feet, these infants\' shoes come in fun and playful prints. Showing off a silky satin upper and lined in comfy soft jersey, they keep the welded 3-Stripes and heel cage that are true to the original ZX of the \'80s.',45.00,10,1,3,'S79914_01.jpg,S79914_02.jpg,S79914_03.jpg,S79914_04.jpg,S79914_05.jpg,S79914_06.jpg'),(43,'S94779','WOVEN MIX SHORT','WOVEN MIX SHORT','Made with recycled nylon, these men\'s shorts are cut for a relaxed fit that\'s easy to wear. They\'re finished with zip pockets and subtle blocks of contrasting colour on the back that give them a unique look.',60.00,10,2,1,'S94779_01.jpg,S94779_02.jpg,S94779_03.jpg,S94779_04.jpg,S94779_05.jpg,S94779_06.jpg'),(44,'S95107','MANCHESTER UNITED BOTTLE','MANCHESTER UNITED BOTTLE','Stay hydrated all match long with this BPA-free water bottle. With an easy-to-hold shape and a pull spout for quick access, it features a logo that pays tribute to the Red Devils.',10.00,10,3,1,'S95107_01.jpg,S95107_02.jpg,S95107_03.jpg,S95107_04.jpg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(64) NOT NULL,
  `paymentid` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `password_reset` varchar(256) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'',0,'','go1@555.com','$2y$10$8uF2f1tUx5N7NDmiYCaE8.YqRRhRDZrlMneew9FhilkmWOfj0HAka','','',0,0,'0000-00-00 00:00:00',''),(2,'',1,'','admin@gmail.com','$2y$10$0gDxDCLUttoFPMDpTU4.bOVGWoer5qhPIg50xIkhr5DfeJPKeP9S2','','',0,0,'0000-00-00 00:00:00',''),(3,'',0,'','test@test.com','$2y$10$fQmmB0P7WayoEuQxcCqCTO1PXq7lFpLVVOECL0jaZoX2cxtyGC6rq','','',0,0,'0000-00-00 00:00:00',''),(4,'',0,'','pai@123.com','$2y$10$lWgD2kf0Xw68DX.o2zIK4.w88NLIUPqW5zD3H1SKkjbjyEY1Vy0ta','','',0,0,'0000-00-00 00:00:00',''),(5,'',0,'','jldad@affaf.com','$2y$10$c.VhNzX7LDfO/eLWJvVeHuL8g1Tb0mDHdR8l6Ohj3WtwVkUpYq/fm','','',0,0,'0000-00-00 00:00:00',''),(6,'',0,'','asd@asd.ad','$2y$10$2RAKnf8uvQb1UhF15OymHeMgU9jqRbjUltlMibG3vFVvsnT/dOdCi','','',0,0,'0000-00-00 00:00:00',''),(7,'',0,'','Test3@test.com','$2y$10$Epty6pm5Kf/MWEbmMfNqEOl2Wch8zhgofQjZmWCq8x0zmK28D5/S6','','',0,0,'0000-00-00 00:00:00',''),(8,'',0,'','test4@test.com','$2y$10$ZDm2myh/H5jW82FvrvtfWOXitnJRQQ/ZxgCk/Jjp8ZoSUnVL1GwQ2','','',0,0,'0000-00-00 00:00:00',''),(9,'',0,'','test5@test.com','$2y$10$XLZmUu7lqAtyUwvgJcVH.O1cdp5eVNID44n9bM2oCA1xenxgNVPhe','','',0,0,'0000-00-00 00:00:00',''),(10,'',0,'','pai@pai.com','$2y$10$9vmK0ZKMs2U18kqRkANQluU.1L6gAelKIm0rlmX6SZ88DfGn7Wlny','','',0,0,'0000-00-00 00:00:00',''),(11,'',0,'','test1@test1.com','$2y$10$5wc43IV9PfjTIszDnArbOutGAARqNfM0WB7lATdpvFfz31guHedHy','','',0,0,'0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (18,1,'91cv2gtfldhhouvg3vvonr7l01','2016-09-30 09:57:59'),(19,4,'b97vcksgdpd6og9e2cii372cd0','2016-09-30 09:58:49'),(20,2,'9r0mkvds6e9dgqj0d1vd9hqg71','2016-10-05 14:43:32'),(21,3,'fio1g9bfjb38peggae845p49v4','2016-12-05 16:01:26'),(22,3,'rskeiemeuof764e47bdlomkvl0','2017-01-31 09:50:17');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-24 15:47:09
