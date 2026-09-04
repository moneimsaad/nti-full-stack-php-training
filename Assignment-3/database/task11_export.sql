-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: task11
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `manger` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Ahmed','Hassan','Male',12500.00,'China','aH7#kL9$mN','Omar'),(2,'Sara','Mohamed','Female',16200.50,'Norway','sM4>xQ8&wR','Hana'),(3,'Youssef','Ali','Male',5100.75,'Morocco','yA2!pT6*cB','Tarek'),(4,'Nadia','Ibrahim','Female',15800.30,'China','nI5|zK3@dF','Layla'),(10,'Khaled','Mahmoud','Male',26000.00,'Azerbaijan','kM8~vJ1#gH','Amr'),(11,'Fatma','Abdelrahman','Female',4800.60,'Tanzania','fA3<bN7!oP','Mona'),(12,'Tamer','Saad','Male',13900.80,'Norway','tS6^rW2$eY','Sherif'),(13,'Rania','Othman','Female',23400.00,'China','rO1+hX5%uI','Dina'),(14,'Mostafa','Fouad','Male',16500.20,'Syria','mF9}cL4&jA','Waleed'),(15,'Heba','Saleh','Female',21500.00,'United States','hS7<gM2!nK','Noha'),(16,'Amir','Gamal','Male',3500.40,'Indonesia','aG4>pR8@tB','Samy'),(17,'Dalia','Nasser','Female',7200.55,'Portugal','dN6/xE1#wF','Aya'),(18,'Hazem','Adel','Male',14100.65,'Poland','hA3{kU7$cQ','Bassem'),(19,'Mariam','Youssef','Female',17500.30,'Sweden','mY8$vI2}gN','Reem'),(20,'Karim','Reda','Male',14000.75,'Slovenia','kR5%tO9~jL','Hassan'),(21,'Noura','Essam','Female',12200.90,'China','nE1{wA6\"bH','Samir'),(22,'Tarek','Hamdi','Male',17200.40,'Sweden','tH4{mP3#dX','Amira'),(23,'Yasmin','Farouk','Female',4300.15,'Russia','yF7+rK1|cG','Mahmoud'),(24,'Wael','Shaker','Male',10500.60,'Georgia','wS2}hN8?eT','Ashraf'),(25,'Lamia','Magdy','Female',14200.25,'Saudi Arabia','lM9_xB5,gJ','Kareem'),(26,'Omar','Zaki','Male',15700.80,'Mexico','oZ3|\"vR7#dA','Hossam'),(27,'Iman','Fathy','Female',9500.35,'Indonesia','iF6_#=pQ4W','Yasser'),(28,'Sherif','Lotfy','Male',14500.70,'Indonesia','sL8}cK1$hN','Adel'),(29,'Ghada','Sayed','Female',15300.55,'United Kingdom','gS5#mT2%rJ','Nabil'),(30,'Amr','Helal','Male',2000.90,'China','aH1<@wF7_B','Ehab'),(31,'Salma','Barakat','Female',4500.45,'Poland','sB9)xK3>gL','Ramy'),(32,'Bassem','Tawfik','Male',900.20,'China','bT2%*+<hN','Sameh'),(33,'Hany','Wahba','Male',6100.80,'Thailand','hW5$rA1#kP','Ayman'),(34,'Maha','Kamal','Female',3900.35,'China','mK7#(+wG2E','Dalal'),(35,'Emad','Sobhy','Male',11500.60,'Ukraine','eS3%xN8&cJ','Fady'),(36,'Rana','Gabr','Female',1800.40,'Comoros','rG9/hA2>+iL','Maged'),(37,'Hoda','Mansour','Female',1900.55,'Philippines','hM6|xT4#bR','Saeed'),(38,'Nermeen','Badawy','Female',3400.70,'Indonesia','nB8>kW1#pF','Abeer'),(39,'Alaa','Shehab','Male',12100.90,'China','aS4_hN7!cK','Hesham'),(40,'Sahar','Rizk','Female',17400.25,'Indonesia','sR1&vM3$gB','Maher'),(41,'Reem','Nassar','Female',13500.80,'Slovenia','rN7}+pL2{dH','Ola'),(42,'Fady','Hennawy','Male',22800.00,'New Caledonia','fH2+}xK8%cA','Tamer'),(43,'Waleed','Gaber','Male',17300.90,'Tajikistan','wG6.hP4+mR','Moataz'),(44,'Samy','Darwish','Male',2100.40,'China','sD9>nL3}bF','Magdy'),(45,'Hossam','Shawky','Male',24500.00,'Lithuania','hS5!kR8)gJ','Taha'),(50,'Mona','Atef','Female',14600.70,'Russia','mA3\"_vN7?#hB','Essam'),(51,'Dina','Farid','Female',12400.90,'China','dF8\\_pK2|=xR','Nada'),(52,'Yasser','Hafez','Male',700.25,'Bulgaria','yH1*mT6|#B','Reda'),(53,'Ashraf','Wagdy','Male',12500.80,'Indonesia','aW9_hF3&cL','Khaled'),(54,'Sameh','Fawzy','Male',2500.35,'Canada','sF4(kN7=gP','Gamal'),(55,'Mahmoud','Sabry','Male',16100.70,'Bulgaria','mS1,&xJ5$rH','Adham'),(56,'Abeer','Soliman','Female',3100.90,'Poland','aS8>vB2#kT','Wafaa'),(57,'Ehab','Morsy','Male',5200.40,'Poland','eM3.<hR7#wN','Ragab');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `pecies` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Cheese Pizza Rolls','4.99',95),(2,'Laptop Sleeve Case','12.99',72),(3,'Mozzarella Cheese Block','4.49',215),(4,'Garlic Parmesan Wings','6.49',128),(5,'Orange Juice Fresh','3.99',88),(6,'Electric Spiralizer','24.99',156),(7,'Folding Camp Chair','44.99',131),(8,'Tablet Stand Holder','18.49',49),(9,'Green Beans Frozen','2.29',195),(10,'Sriracha Hot Sauce','4.49',176),(11,'Monitor Cleaning Wipes','12.99',58),(12,'Wireless Earbuds Pro','89.99',142),(13,'Green Tea Matcha','3.99',201),(14,'Crispy Chicken Strips','7.49',192),(15,'Kids Art Supply Set','19.99',75),(16,'Blueberry Waffle Mix','5.49',118),(17,'Kids Science Lab Kit','54.99',91),(18,'Vanilla Oat Milk','3.29',137),(19,'Habanero Hot Sauce','4.49',264),(20,'Cajun Spice Blend','3.49',53),(21,'Mediterranean Quinoa Bowl','6.49',177),(22,'Yoga Mat Premium','29.99',145),(23,'Italian Herb Mix','2.99',158),(24,'Alfredo Pasta Sauce','4.49',231),(25,'Chamomile Tea Box','14.99',190),(26,'String Cheese Pack','3.49',218),(27,'Granola Bar Variety','4.79',139),(28,'Cinnamon Roll Mix','3.99',229),(29,'Mini Bluetooth Speaker','59.99',247),(30,'Tahini Dressing','4.49',162),(31,'Roasted Sweet Potatoes','4.49',133),(32,'USB C Charging Hub','34.99',98),(33,'Rechargeable Flashlight','22.99',198),(34,'Greek Salad Kit','5.49',235),(35,'Solar String Lights','29.99',285),(36,'Bamboo Shoe Organizer','39.99',64),(37,'Swiss Cheese Slices','4.49',78),(38,'Honey BBQ Sauce','4.49',48),(39,'Smart Home Camera','179.99',82),(40,'Instant Hot Water Kettle','54.99',165),(41,'Rechargeable Hand Warmer','29.99',102),(42,'Basmati Rice Premium','3.49',121),(43,'Pepperoni Pizza Bagels','7.99',96),(44,'Leather Card Holder','19.99',148),(45,'Burr Coffee Grinder','27.99',115),(46,'Cherry Pie Filling','3.99',213),(47,'Athletic Jogger Pants','34.99',161),(48,'Kids Coloring Workbook','9.99',152),(49,'Apple Walnut Salad','6.49',108),(50,'Insulated Water Bottle','18.99',126),(51,'RGB Gaming Mouse','64.99',93),(52,'Rain Shower Head Chrome','44.99',79),(53,'Raw Organic Honey','6.99',214),(54,'Chipotle Salsa','3.99',71),(55,'Almond Milk Unsweetened','2.99',254),(56,'Roasted Chickpea Snack','3.49',175),(57,'Immersion Blender Set','74.99',199),(58,'Passport Travel Wallet','18.99',227),(59,'Thai Coconut Soup','8.99',116),(60,'Deep Tissue Massager','84.99',105),(61,'Herb Butter Spread','3.79',259),(62,'Almond Flour Organic','3.49',86),(63,'Foldable Wireless Keyboard','44.99',232),(64,'Pet Travel Water Bowl','14.99',189),(65,'Maple Granola Clusters','4.29',207),(66,'Glass Food Storage Set','29.99',168),(67,'Broccoli Cheddar Soup','3.49',101),(68,'Smart LED Light Strip','24.99',144),(69,'Gelato Maker Machine','64.99',61),(70,'Coconut Flour Bag','5.49',134),(71,'Banana Nut Pancake Mix','5.49',197),(72,'Noise Cancel Headphones','84.99',69),(73,'Sea Salt Pita Chips','3.99',117),(74,'Chia Pudding Cup','3.49',52),(75,'Herb Grilled Salmon','11.99',159),(76,'Ginger Wellness Shots','4.49',83),(77,'Baked Parmesan Crisps','4.49',154),(78,'Drip Coffee Machine','94.99',185),(79,'Veggie Noodle Spirals','4.49',87),(80,'Over Ear Headphones','74.99',219),(81,'Faux Leather Jacket','119.99',46),(82,'HEPA Air Filter','139.99',224),(83,'Straight Leg Jeans','49.99',268),(84,'Silicone Colander Set','17.99',62),(85,'Pet Auto Water Feeder','44.99',196),(86,'Almond Biscotti Pack','4.69',187),(87,'Soft Serve Ice Cream Maker','84.99',76),(88,'Baby Gate Extra Wide','12.99',124),(89,'Blackout Window Shades','54.99',191),(90,'Teak Bath Tray','39.99',238),(91,'Boho Maxi Dress','44.99',44),(92,'Sunrise Alarm Clock','24.99',89),(93,'Kids Puzzle Book','11.99',216),(94,'Coconut Yogurt Cups','3.49',262),(95,'Turkey Breakfast Sausage','7.49',155),(96,'UV Phone Sanitizer','22.99',241),(97,'Peanut Butter Cookies','3.99',73),(98,'Beef Jerky Original','8.49',147),(99,'Ergonomic Laptop Riser','34.99',246),(100,'Lemon Garlic Shrimp','9.49',129);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `orders` int(11) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Layla','Khoury','Female',312,'Syria','123456'),(2,'Wei','Zhang','Male',245,'China','123456'),(3,'Katarzyna','Nowak','Female',891,'Poland','123456'),(4,'Somchai','Prasert','Male',302,'Thailand','123456'),(5,'Mikko','Virtanen','Male',498,'Finland','123456'),(6,'Joao','Silva','Male',311,'Portugal','123456'),(7,'Yuki','Tanaka','Female',654,'Japan','123456'),(8,'Agnieszka','Kowalska','Female',389,'Poland','123456'),(9,'Liam','Campbell','Male',157,'Canada','123456'),(10,'Baraka','Mwangi','Male',472,'Tanzania','123456'),(11,'Nong','Srisai','Female',398,'Thailand','123456'),(12,'Maria','Santos','Female',276,'Philippines','123456'),(13,'Rosa','Gutierrez','Female',923,'Peru','123456'),(14,'Pierre','Dubois','Male',561,'France','123456'),(15,'Bolormaa','Bat','Female',487,'Mongolia','123456'),(16,'Hassan','Omar','Male',372,'Djibouti','123456'),(17,'Andrei','Popov','Male',758,'Russia','123456'),(18,'Olga','Smirnova','Female',945,'Russia','123456'),(19,'Ani','Harutyunyan','Female',683,'Armenia','123456'),(20,'Lusine','Grigoryan','Female',598,'Armenia','123456'),(21,'Emma','Wilson','Female',912,'Canada','123456'),(22,'Budi','Santoso','Male',645,'Indonesia','123456'),(23,'Gunel','Mammadova','Female',791,'Azerbaijan','123456'),(24,'Igor','Petrov','Male',521,'Russia','123456'),(25,'Rafael','Costa','Male',748,'Brazil','123456'),(26,'Jean','Rakoto','Male',338,'Madagascar','123456'),(27,'Karin','Tamm','Female',401,'Estonia','123456'),(28,'Ana','Ferreira','Female',219,'Brazil','123456'),(29,'Amira','Saeed','Female',452,'Egypt','123456'),(30,'Min','Li','Female',334,'China','123456'),(31,'Isata','Kamara','Female',253,'Sierra Leone','123456'),(32,'Reyna','Cruz','Female',381,'Philippines','123456'),(33,'Ruta','Kazlauskas','Female',312,'Lithuania','123456'),(34,'Hong','Chen','Male',556,'China','123456'),(35,'Ilze','Berzins','Female',251,'Latvia','123456'),(36,'Faisal','Al-Rashid','Male',858,'Kuwait','123456'),(37,'Juliana','Oliveira','Female',953,'Brazil','123456'),(38,'Dmitri','Volkov','Male',391,'Russia','123456'),(39,'Jing','Wang','Female',907,'China','123456'),(40,'Antoine','Martin','Male',876,'France','123456'),(41,'Miguel','Rodrigues','Male',602,'Portugal','123456'),(42,'Xiu','Liu','Female',751,'China','123456'),(43,'Isabel','Correia','Female',563,'Portugal','123456'),(44,'Camila','Souza','Female',508,'Brazil','123456'),(45,'Marek','Wisniewski','Male',721,'Poland','123456'),(46,'Tuan','Nguyen','Male',198,'Vietnam','123456'),(47,'Rizal','Purnama','Male',967,'Philippines','123456'),(48,'Astrid','Lindberg','Female',803,'Sweden','123456'),(49,'Erik','Johansson','Male',405,'Sweden','123456'),(50,'Mei','Huang','Female',625,'China','123456'),(51,'Siti','Rahayu','Female',382,'Indonesia','123456'),(52,'Sakura','Yamamoto','Female',844,'Japan','123456'),(53,'Pascal','Ndayisaba','Male',746,'Burundi','123456'),(54,'Natalia','Kozlova','Female',243,'Russia','123456'),(55,'Pawel','Lewandowski','Male',804,'Poland','123456'),(56,'Sergei','Kuznetsov','Male',765,'Russia','123456'),(57,'Lan','Zhao','Female',742,'China','123456'),(58,'Eko','Wibowo','Male',562,'Indonesia','123456'),(59,'Tomasz','Zielinski','Male',194,'Poland','123456'),(60,'Feng','Wu','Male',749,'China','123456'),(61,'Ingrid','Eriksson','Female',621,'Sweden','123456'),(62,'Fernanda','Lima','Female',798,'Brazil','123456'),(63,'Carlos','Hernandez','Male',227,'Mexico','123456'),(64,'Agus','Prasetyo','Male',248,'Indonesia','123456'),(65,'Lorna','Reyes','Female',249,'Philippines','123456'),(66,'Anna','Kaminska','Female',752,'Poland','123456'),(67,'Viktor','Morozov','Male',848,'Russia','123456'),(68,'Hamza','Mejri','Male',871,'Tunisia','123456'),(69,'Valentina','Ramirez','Female',911,'Colombia','123456'),(70,'Nour','Abbas','Female',463,'Syria','123456'),(71,'Ling','Sun','Female',698,'China','123456'),(72,'Beatriz','Almeida','Female',853,'Brazil','123456'),(73,'Chioma','Okafor','Female',882,'Nigeria','123456'),(74,'Dewi','Sulistyo','Female',680,'Indonesia','123456'),(75,'Tuya','Dorj','Female',859,'Mongolia','123456'),(76,'Sofia','Mendoza','Female',473,'Argentina','123456'),(77,'Hua','Yang','Female',741,'China','123456'),(78,'Wulan','Permata','Female',406,'Indonesia','123456'),(79,'Louis','Bernard','Male',761,'France','123456'),(80,'Xia','Zhou','Female',303,'China','123456'),(81,'Putri','Lestari','Female',403,'Indonesia','123456'),(82,'Jun','Garcia','Male',789,'Philippines','123456'),(83,'Lars','Andersson','Male',234,'Sweden','123456'),(84,'Yun','Ma','Female',640,'China','123456'),(85,'Chao','Xu','Male',826,'China','123456'),(86,'Bao','Lin','Male',504,'China','123456'),(87,'Rahim','Hossain','Male',955,'Bangladesh','123456'),(88,'Marco','Castillo','Male',698,'Nicaragua','123456'),(89,'Chloe','Thompson','Female',226,'Canada','123456'),(90,'Rina','Kusuma','Female',251,'Indonesia','123456'),(91,'Diego','Flores','Male',681,'Peru','123456'),(92,'Alexei','Ivanov','Male',611,'Russia','123456'),(93,'Kenji','Nakamura','Male',337,'Japan','123456'),(94,'Claire','Leroy','Female',648,'France','123456'),(95,'Jakub','Kowalczyk','Male',327,'Poland','123456'),(96,'Tao','Guo','Male',654,'China','123456'),(97,'Fatimah','Hassan','Female',473,'Afghanistan','123456'),(98,'Yelena','Orlova','Female',908,'Russia','123456'),(99,'Lucia','Paredes','Female',356,'Colombia','123456'),(100,'Mathieu','Lefebvre','Male',901,'France','123456');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'task11'
--

--
-- Dumping routines for database 'task11'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-04 21:59:16
