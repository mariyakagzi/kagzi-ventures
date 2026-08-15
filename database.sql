
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `kagzi_ventures_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `kagzi_ventures_db`;
DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `show_on_home` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `parent_id`, `status`, `show_on_home`, `created_at`, `updated_at`) VALUES (1,'Sling Bags','sling-bags','Sling Bags','assets/images/demoes/demo1/cats/cat-1.jpg',0,1,0,'2026-08-14 04:30:31','2026-08-15 11:40:36'),(2,'Laundry Bags','laundry-bags','Laundry Bags','assets/images/demoes/demo1/cats/cat-2.jpg',0,1,0,'2026-08-14 04:30:31','2026-08-15 11:40:50'),(3,'Envelopes','envelopes','Envelopes','assets/images/demoes/demo1/cats/cat-3.jpg',0,1,0,'2026-08-14 04:30:31','2026-08-15 09:59:54'),(4,'Jute Bags','jute-bags','Jute Bags','assets/images/demoes/demo1/cats/cat-4.jpg',0,1,0,'2026-08-14 04:30:31','2026-08-15 11:41:05'),(5,'Wardrobe Clothes Storage','wardrobe-clothes-storage','Transform your closet into a clutter-free sanctuary with Kagzi Ventures’ premium wardrobe clothes storage collection, thoughtfully designed to maximize space and protect your garments. Explore an extensive range of durable garment bags, multi-tier hanging shelves, foldable organizer boxes, and protective covers, all crafted from high-grade materials to guarantee long-lasting quality. Each space-saving solution is engineered for peak utility and everyday convenience, ensuring your seasonal attire and daily essentials remain fresh, organized, and effortlessly accessible. Upgrade your home organization today with our expertly curated, dependable storage essentials.','assets/images/demoes/demo1/cats/cat-5.jpg',0,1,0,'2026-08-14 04:30:31','2026-08-15 09:56:30'),(6,'Gowns','gowns','Gowns','assets/images/demoes/demo1/cats/cat-1.jpg',0,1,0,'2026-08-15 10:01:52','2026-08-15 10:01:52'),(7,'Transparent PVC Storages','transparent-pvc-storages','Transparent PVC Storages','assets/images/demoes/demo1/cats/cat-1.jpg',0,1,0,'2026-08-15 10:02:49','2026-08-15 10:02:49'),(8,'Crochets','crochets','Crochets','assets/images/demoes/demo1/cats/cat-1.jpg',0,1,0,'2026-08-15 10:03:57','2026-08-15 10:03:57');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (2,'2026-08-14-000001','App\\Database\\Migrations\\CreateEcommerceTables','default','App',1786681831,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(50) NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `shipping_address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL DEFAULT 'cod',
  `status` enum('pending','processing','completed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_number` (`order_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int unsigned NOT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sale_price` decimal(10,2) DEFAULT NULL,
  `stock_quantity` int NOT NULL DEFAULT '100',
  `short_description` text,
  `features` text,
  `specifications` text,
  `description` text,
  `main_image` varchar(255) DEFAULT NULL,
  `images` text,
  `video` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_trending` tinyint(1) NOT NULL DEFAULT '0',
  `is_home_category` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sku`, `price`, `sale_price`, `stock_quantity`, `short_description`, `features`, `specifications`, `description`, `main_image`, `images`, `video`, `featured`, `is_trending`, `is_home_category`, `status`, `created_at`, `updated_at`) VALUES (1,'Wireless Over-Ear Headphones','wireless-over-ear-headphones',2,'HD-WIR-001',199.00,149.00,50,'High fidelity wireless bluetooth headset with deep bass surround sound.','ÔÇó Active Noise Cancellation (ANC) up to 35dB\nÔÇó 40-Hour Battery Life with Quick Charge (10 min charge = 4 hrs)\nÔÇó Soft Memory Foam Earcups for All-day Ergonomic Comfort\nÔÇó Bluetooth 5.2 Low Latency Wireless Connectivity\nÔÇó Built-in Dual HD Microphones for Crystal Clear Calls','Brand: Kagzi Audio\nDriver Size: 40mm Neodymium\nFrequency Response: 20Hz - 20kHz\nBluetooth Range: 15 Meters\nWarranty: 1 Year Manufacturer Warranty','Experience crystal clear high audio precision with 360-degree surround sound technology, active noise cancellation rating, and 40-hour battery life.','assets/images/demoes/demo1/products/product-1.jpg','[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-1-2.jpg\"]','https://www.w3schools.com/html/mov_bbb.mp4',1,1,1,1,'2026-08-14 04:30:31','2026-08-14 04:30:31'),(2,'Portable Battery Charger','portable-battery-charger',2,'CHG-BAT-002',49.00,29.00,35,'Fast charging power bank compatible with all smart devices.','ÔÇó 20,000mAh Ultra High Capacity Battery Pack\nÔÇó 22.5W Fast Charge PD 3.0 & QuickCharge Technology\nÔÇó Dual USB-A + Type-C Output/Input Ports\nÔÇó Intelligent LED Digital Battery Level Indicator\nÔÇó Overcharge, Short Circuit & Thermal Protection','Brand: Kagzi Power\nCapacity: 20,000mAh 3.7V (74Wh)\nInput: Type-C 5V/3A, 9V/2A\nOutput: 5V/4.5A, 9V/2.25A Max\nWeight: 340g','High capacity 20,000mAh portable charger with dual USB fast-charge ports and intelligent safety cut-off protection.','assets/images/demoes/demo1/products/product-2.jpg','[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-2.jpg\"]',NULL,1,1,1,1,'2026-08-14 04:30:31','2026-08-14 04:30:31'),(3,'Brown Women Casual Handbag','brown-women-casual-handbag',4,'BAG-BRN-003',129.00,89.00,40,'Premium genuine leather handbag for daily travel and elegance.','ÔÇó 100% Genuine Grain Italian Leather Finish\nÔÇó Reinforced Stitching & Antique Gold Brass Hardware\nÔÇó Spacious Zippered Main Compartment + Internal Pockets\nÔÇó Detachable & Adjustable Leather Shoulder Strap\nÔÇó Protective Metal Feet Base Studs','Material: Genuine Grain Leather\nDimensions: 32cm x 24cm x 14cm\nClosure: Heavy Duty YKK Zipper\nColor: Dark Saddle Brown','Crafted with top-grain leather, spacious compartments, durable brass zippers, and detachable shoulder strap.','assets/images/demoes/demo1/products/product-3.jpg','[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-3-2.jpg\"]',NULL,1,1,1,1,'2026-08-14 04:30:31','2026-08-14 04:30:31'),(4,'Casual Travel Note Bag','casual-travel-note-bag',4,'BAG-NTE-004',79.00,59.00,60,'Waterproof lightweight shoulder notebook bag with padded laptop sleeve.','ÔÇó High-Density 900D Water-Repellent Nylon Construction\nÔÇó Padded Shockproof Compartment Fits up to 15.6 Inch Laptops\nÔÇó Hidden Rear Anti-Theft Zipper Pocket\nÔÇó Ergonomic Air-Mesh Shoulder Strap Padding\nÔÇó Integrated USB Charging Pass-Through Port','Laptop Fit: Up to 15.6 Inch\nVolume Capacity: 22 Liters\nWater Resistance: Splash Proof Hydro-Shield','Sleek modern design engineered with water-resistant fabric and multiple organizer pockets.','assets/images/demoes/demo1/products/product-4.jpg','[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-4-2.jpg\"]',NULL,1,1,1,1,'2026-08-14 04:30:31','2026-08-14 04:30:31'),(5,'Porto Extended HD Camera','porto-extended-hd-camera',2,'CAM-EXT-005',399.00,299.00,25,'Professional 4K Ultra HD digital camera with optical zoom lens.','ÔÇó 4K 60FPS Ultra HD Video & 48MP Still Photos\nÔÇó 16X Digital Optical Zoom with Optical Image Stabilization (OIS)\nÔÇó 3.0 Inch 180-Degree Flip Touchscreen LCD\nÔÇó Built-in Wi-Fi & Live Streaming Webcam Functionality\nÔÇó Dual Battery Pack Included in Retail Box','Sensor Type: CMOS 24.2MP Sensor\nVideo Resolution: 4K 3840x2160\nLens Aperture: F/2.0 f=7.36mm','Capture stunning high-resolution video and photos with advanced autofocus, night vision, and Wi-Fi streaming.','assets/images/demoes/demo1/products/product-5.jpg','[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-5-2.jpg\"]',NULL,1,1,1,1,'2026-08-14 04:30:31','2026-08-14 04:30:31'),(6,'Casual Women Winter Jacket','casual-women-winter-jacket',1,'JKT-WM-006',159.00,119.00,45,'Insulated lightweight hooded jacket designed for warmth and style.','ÔÇó Windproof Thermal Insulation Layer\nÔÇó Detachable Fleece Lined Hood with Drawstrings\nÔÇó Zippered Hand Pockets + Internal Security Pocket\nÔÇó Machine Washable Premium Durable Polyester Fabric','Outer Fabric: 100% Wind-Shield Polyester\nLining: Thermal Fleece Blend\nCare: Machine Wash Cold','Features windproof outer shell, cozy interior lining, zippered pockets, and tailored fit.','assets/images/products/product-1.jpg','[\"assets\\/images\\/products\\/product-1-2.jpg\"]',NULL,1,1,1,1,'2026-08-14 04:30:31','2026-08-14 04:30:31'),(7,'Clothes Storage Bags Jumbo Size with Transparent Window (46 x 40 x 30 cm)','clothes-storage-bags-jumbo-size-with-transparent-window-46-x-40-x-30-cm',5,'LMP-MOD-007',120.00,100.00,30,'','','','','uploads/products/1786789356_6c33196ee846de9c73ab.png','[\"assets\\/images\\/products\\/product-17.jpg\"]',NULL,1,1,1,1,'2026-08-14 04:30:31','2026-08-15 10:22:36'),(8,'Transparent Clothes Storage Bags with Zip','transparent-clothes-storage-bags-with-zip',5,'SH-BRN-008',180.00,160.00,48,'Keep your wardrobe organized and visible with our Transparent Clothes Storage Bags featuring secure zip closures that protect your garments from dust and moisture. These crystal-clear bags make it easy to identify contents at a glance while maximizing your storage space. Perfect for seasonal clothing, accessories, or everyday wardrobe organization.','• **Crystal Clear Visibility** - Premium transparent material allows easy identification of contents without opening, featuring reinforced seams and thickened construction for long-term durability\r\n\r\n• **Secure Zip Closure System** - Heavy-duty double-zipper design with smooth glide functionality prevents dust, moisture, and pests while maintaining airtight protection for seasonal clothing storage\r\n\r\n• **Versatile Size Options** - Available in multiple dimensions to accommodate various garment types from delicate lingerie to bulky sweaters, with reinforced handles for easy transport and hanging storage\r\n\r\n• **Space-Saving Compression Design** - Innovative foldable structure maximizes wardrobe organization by reducing storage volume while maintaining garment shape and preventing wrinkles during long-term storage\r\n\r\n• **Premium Material Construction** - Made from durable, non-toxic PVC or polypropylene materials that resist tearing, yellowing, and cracking, ensuring years of reliable use for seasonal wardrobe management\r\n\r\n• **Multi-Purpose Storage Solution** - Ideal for travel luggage organization, attic storage, or closet organization with stackable design that optimizes vertical space utilization in any wardrobe setup','Product Name: Transparent Clothes Storage Bags with Zip\r\nCategory: Wardrobe Clothes Storage\r\nMaterial: Premium Material\r\nDimensions: Standard Size\r\nWeight: 300g\r\nCountry of Origin: India','# Transparent Clothes Storage Bags with Zip - Ultimate Wardrobe Organization Solution\r\n\r\n## **PRODUCT OVERVIEW**\r\nTransform your cluttered closet into a perfectly organized wardrobe with our premium Transparent Clothes Storage Bags with Zip. These professional-grade storage solutions are designed to maximize your storage space while keeping your clothing collections visible, accessible, and beautifully organized. Available in multiple sizes to accommodate everything from delicate lingerie to seasonal outerwear, these crystal-clear bags eliminate the guesswork from wardrobe management and help you maintain an effortlessly tidy living space.\r\n\r\n## **EXCEPTIONAL DESIGN CRAFTSMANSHIP**\r\n\r\n### **Premium Transparent Material**\r\nCrafted from high-quality, crystal-clear vinyl that maintains its transparency even after extended use, allowing you to see your contents at a glance without opening multiple bags. The material is specifically engineered to be thick enough for durability while remaining flexible for easy storage and removal.\r\n\r\n### **Secure Zip Closure System**\r\nFeatures a robust double-zipper mechanism that creates an airtight seal, protecting your garments from dust, moisture, and pests while maintaining easy access. The smooth-gliding zippers are designed for thousands of open/close cycles without sticking or breaking.\r\n\r\n### **Reinforced Construction**\r\nEach bag includes reinforced stress points at all corners and zipper junctions, with additional stitching that can withstand regular handling and long-term storage. The sealed edges prevent snagging and ensure longevity even with frequent use.\r\n\r\n### **Versatile Size Options**\r\nAvailable in multiple dimensions to accommodate various wardrobe needs - from compact sizes perfect for scarves and lingerie to large formats suitable for winter coats and bulky seasonal items.\r\n\r\n## **EVERYDAY USAGE SCENARIOS**\r\n\r\n### **Seasonal Wardrobe Rotation**\r\nPerfect for storing off-season clothing including winter coats, summer dresses, and seasonal accessories. Simply zip, stack, and store vertically in closets or under-bed spaces.\r\n\r\n### **Travel Organization**\r\nIdeal for travel protection of delicate items, formal wear, or just keeping clean clothes separate from dirty laundry during extended trips.\r\n\r\n### **Small Space Solutions**\r\nMaximize compact living spaces by utilizing vertical storage - these bags compress efficiently and can be safely stacked without damaging contents.\r\n\r\n### **Children\'s Clothing Management**\r\nStore outgrown clothing, seasonal kids\' wear, or special occasion outfits in sizes that make retrieval simple and damage-free.\r\n\r\n### **Professional Wardrobe Maintenance**\r\nPerfect for business professionals who need to store suits, blazers, and formal attire while maintaining their pristine condition between wears.\r\n\r\n## **WHY CUSTOMERS ABSOLUTELY LOVE THESE BAGS**\r\n\r\n### **INSTANT VISIBILITY & ORGANIZATION**\r\nNo more rummaging through dark boxes or forgotten bags - the crystal-clear design lets you identify contents instantly, saving valuable time during outfit selection or seasonal wardrobe changes.\r\n\r\n### **DURABLE PROTECTION**\r\nUnlike flimsy alternatives, our bags provide superior protection against dust, moisture, insects, and fabric damage while allowing your clothes to \"breathe\" and preventing musty odors.\r\n\r\n### **SPACE-EFFICIENT DESIGN**\r\nThe flexible material allows for compression storage, and the flat-stackable design maximizes every inch of your available space while maintaining easy access.\r\n\r\n### **COST-EFFECTIVE WARDROBE MANAGEMENT**\r\nExtend the life of your clothing by protecting garments from damage, reducing the need for frequent replacements and making your wardrobe investment go further.\r\n\r\n### **UNIVERSAL APPLICABILITY**\r\nWhether you\'re a busy professional, a parent managing children\'s rapidly-growing wardrobes, a student in a dormitory, or someone living in a small apartment, these bags solve real storage challenges effectively.\r\n\r\n### **PEACE OF MIND GUARANTEE**\r\nBacked by our satisfaction guarantee - if these bags don\'t revolutionize your wardrobe organization within 30 days, we\'ll provide a full refund, no questions asked.\r\n\r\n## **TECHNICAL SPECIFICATIONS**\r\n- **Material:** Premium transparent vinyl\r\n- **Closure Type:** Heavy-duty double zipper\r\n- **Transparency:** Crystal clear for full visibility\r\n- **Durability:** Reinforced corners and stress points\r\n- **Sizes Available:** Multiple options from small to extra-large\r\n- **Maintenance:** Easy wipe-clean surface\r\n\r\n## **TRANSFORM YOUR WARDROBE TODAY**\r\n\r\nReady to say goodbye to wardrobe chaos and hello to effortless organization? Our Transparent Clothes Storage Bags with Zip represent the perfect fusion of practical functionality and smart design thinking. These aren\'t just storage bags – they\'re your personal wardrobe assistant, helping you see exactly what you own, access items quickly, and maintain your clothing in pristine condition.\r\n\r\nJoin thousands of satisfied customers who have already transformed their storage experience. Click \"Add to Cart\" now and discover why these premium storage bags are becoming the essential wardrobe accessory for organized living!\r\n\r\n**Limited-time offer: Free shipping on orders over $50 + 30-day money-back guarantee**\r\n\r\n---\r\n*Order yours today and experience the difference that professional-grade wardrobe organization makes in your daily life.*','uploads/products/1786788747_da0f01ab4bc04768475d.png','[\"assets\\/images\\/products\\/product-2.jpg\"]','uploads/products/videos/1786788635_e7d824c7327de2e9a822.mp4',1,1,1,1,'2026-08-14 04:30:31','2026-08-15 10:34:00');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `updated_at`) VALUES (1,'Kagzi Admin','admin@kagziventures.com','$2y$10$2Pi.mpVjLhAE1LKtYpBG3eABZiKhi2EP0mb0mxbUvO4B/JhJ0EbBy','+123 456 7890','123 Enterprise Way, Business Park','admin','2026-08-14 04:30:31','2026-08-14 04:30:31'),(2,'John Doe','customer@example.com','$2y$10$6POpSpJhRCWzhdsadDIk/uSubr1H179tsitiyHSKdVwfEAcJg1Ngm','+987 654 3210','456 Main Street, Cityville','customer','2026-08-14 04:30:31','2026-08-14 04:30:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
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

