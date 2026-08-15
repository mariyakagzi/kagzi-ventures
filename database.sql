-- Kagzi Ventures Full Database Export
-- Generated: 2026-08-14 06:39:20

CREATE DATABASE IF NOT EXISTS `kagzi_ventures_db`;
USE `kagzi_ventures_db`;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES ('1', 'Fashion', 'fashion', 'Trendy apparel, jackets, and outfits for all seasons.', 'assets/images/demoes/demo1/cats/cat-1.jpg', '0', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES ('2', 'Electronics', 'electronics', 'Latest smart gadgets, audio, and accessories.', 'assets/images/demoes/demo1/cats/cat-2.jpg', '0', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES ('3', 'Home & Garden', 'home-garden', 'Premium home decor, lighting, and living essentials.', 'assets/images/demoes/demo1/cats/cat-3.jpg', '0', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES ('4', 'Accessories', 'accessories', 'Bags, belts, sunglasses, and stylish add-ons.', 'assets/images/demoes/demo1/cats/cat-4.jpg', '0', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES ('5', 'Shoes', 'shoes', 'Comfortable sneakers, formal shoes, and boots.', 'assets/images/demoes/demo1/cats/cat-5.jpg', '0', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');

DROP TABLE IF EXISTS `migrations`;
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

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES ('2', '2026-08-14-000001', 'App\\Database\\Migrations\\CreateEcommerceTables', 'default', 'App', '1786681831', '1');

DROP TABLE IF EXISTS `order_items`;
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


DROP TABLE IF EXISTS `orders`;
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


DROP TABLE IF EXISTS `products`;
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
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_trending` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sku`, `price`, `sale_price`, `stock_quantity`, `short_description`, `features`, `specifications`, `description`, `main_image`, `images`, `featured`, `is_trending`, `status`, `created_at`, `updated_at`) VALUES ('1', 'Wireless Over-Ear Headphones', 'wireless-over-ear-headphones', '2', 'HD-WIR-001', '199.00', '149.00', '50', 'High fidelity wireless bluetooth headset with deep bass surround sound.', '• Active Noise Cancellation (ANC) up to 35dB\n• 40-Hour Battery Life with Quick Charge (10 min charge = 4 hrs)\n• Soft Memory Foam Earcups for All-day Ergonomic Comfort\n• Bluetooth 5.2 Low Latency Wireless Connectivity\n• Built-in Dual HD Microphones for Crystal Clear Calls', 'Brand: Kagzi Audio\nDriver Size: 40mm Neodymium\nFrequency Response: 20Hz - 20kHz\nBluetooth Range: 15 Meters\nWarranty: 1 Year Manufacturer Warranty', 'Experience crystal clear high audio precision with 360-degree surround sound technology, active noise cancellation rating, and 40-hour battery life.', 'assets/images/demoes/demo1/products/product-1.jpg', '[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-1-2.jpg\"]', '1', '1', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sku`, `price`, `sale_price`, `stock_quantity`, `short_description`, `features`, `specifications`, `description`, `main_image`, `images`, `featured`, `is_trending`, `status`, `created_at`, `updated_at`) VALUES ('2', 'Portable Battery Charger', 'portable-battery-charger', '2', 'CHG-BAT-002', '49.00', '29.00', '35', 'Fast charging power bank compatible with all smart devices.', '• 20,000mAh Ultra High Capacity Battery Pack\n• 22.5W Fast Charge PD 3.0 & QuickCharge Technology\n• Dual USB-A + Type-C Output/Input Ports\n• Intelligent LED Digital Battery Level Indicator\n• Overcharge, Short Circuit & Thermal Protection', 'Brand: Kagzi Power\nCapacity: 20,000mAh 3.7V (74Wh)\nInput: Type-C 5V/3A, 9V/2A\nOutput: 5V/4.5A, 9V/2.25A Max\nWeight: 340g', 'High capacity 20,000mAh portable charger with dual USB fast-charge ports and intelligent safety cut-off protection.', 'assets/images/demoes/demo1/products/product-2.jpg', '[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-2.jpg\"]', '1', '1', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sku`, `price`, `sale_price`, `stock_quantity`, `short_description`, `features`, `specifications`, `description`, `main_image`, `images`, `featured`, `is_trending`, `status`, `created_at`, `updated_at`) VALUES ('3', 'Brown Women Casual Handbag', 'brown-women-casual-handbag', '4', 'BAG-BRN-003', '129.00', '89.00', '40', 'Premium genuine leather handbag for daily travel and elegance.', '• 100% Genuine Grain Italian Leather Finish\n• Reinforced Stitching & Antique Gold Brass Hardware\n• Spacious Zippered Main Compartment + Internal Pockets\n• Detachable & Adjustable Leather Shoulder Strap\n• Protective Metal Feet Base Studs', 'Material: Genuine Grain Leather\nDimensions: 32cm x 24cm x 14cm\nClosure: Heavy Duty YKK Zipper\nColor: Dark Saddle Brown', 'Crafted with top-grain leather, spacious compartments, durable brass zippers, and detachable shoulder strap.', 'assets/images/demoes/demo1/products/product-3.jpg', '[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-3-2.jpg\"]', '1', '1', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sku`, `price`, `sale_price`, `stock_quantity`, `short_description`, `features`, `specifications`, `description`, `main_image`, `images`, `featured`, `is_trending`, `status`, `created_at`, `updated_at`) VALUES ('4', 'Casual Travel Note Bag', 'casual-travel-note-bag', '4', 'BAG-NTE-004', '79.00', '59.00', '60', 'Waterproof lightweight shoulder notebook bag with padded laptop sleeve.', '• High-Density 900D Water-Repellent Nylon Construction\n• Padded Shockproof Compartment Fits up to 15.6 Inch Laptops\n• Hidden Rear Anti-Theft Zipper Pocket\n• Ergonomic Air-Mesh Shoulder Strap Padding\n• Integrated USB Charging Pass-Through Port', 'Laptop Fit: Up to 15.6 Inch\nVolume Capacity: 22 Liters\nWater Resistance: Splash Proof Hydro-Shield', 'Sleek modern design engineered with water-resistant fabric and multiple organizer pockets.', 'assets/images/demoes/demo1/products/product-4.jpg', '[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-4-2.jpg\"]', '1', '1', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sku`, `price`, `sale_price`, `stock_quantity`, `short_description`, `features`, `specifications`, `description`, `main_image`, `images`, `featured`, `is_trending`, `status`, `created_at`, `updated_at`) VALUES ('5', 'Porto Extended HD Camera', 'porto-extended-hd-camera', '2', 'CAM-EXT-005', '399.00', '299.00', '25', 'Professional 4K Ultra HD digital camera with optical zoom lens.', '• 4K 60FPS Ultra HD Video & 48MP Still Photos\n• 16X Digital Optical Zoom with Optical Image Stabilization (OIS)\n• 3.0 Inch 180-Degree Flip Touchscreen LCD\n• Built-in Wi-Fi & Live Streaming Webcam Functionality\n• Dual Battery Pack Included in Retail Box', 'Sensor Type: CMOS 24.2MP Sensor\nVideo Resolution: 4K 3840x2160\nLens Aperture: F/2.0 f=7.36mm', 'Capture stunning high-resolution video and photos with advanced autofocus, night vision, and Wi-Fi streaming.', 'assets/images/demoes/demo1/products/product-5.jpg', '[\"assets\\/images\\/demoes\\/demo1\\/products\\/product-5-2.jpg\"]', '1', '1', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sku`, `price`, `sale_price`, `stock_quantity`, `short_description`, `features`, `specifications`, `description`, `main_image`, `images`, `featured`, `is_trending`, `status`, `created_at`, `updated_at`) VALUES ('6', 'Casual Women Winter Jacket', 'casual-women-winter-jacket', '1', 'JKT-WM-006', '159.00', '119.00', '45', 'Insulated lightweight hooded jacket designed for warmth and style.', '• Windproof Thermal Insulation Layer\n• Detachable Fleece Lined Hood with Drawstrings\n• Zippered Hand Pockets + Internal Security Pocket\n• Machine Washable Premium Durable Polyester Fabric', 'Outer Fabric: 100% Wind-Shield Polyester\nLining: Thermal Fleece Blend\nCare: Machine Wash Cold', 'Features windproof outer shell, cozy interior lining, zippered pockets, and tailored fit.', 'assets/images/products/product-1.jpg', '[\"assets\\/images\\/products\\/product-1-2.jpg\"]', '1', '1', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sku`, `price`, `sale_price`, `stock_quantity`, `short_description`, `features`, `specifications`, `description`, `main_image`, `images`, `featured`, `is_trending`, `status`, `created_at`, `updated_at`) VALUES ('7', 'Modern Living Room Decor Lamp', 'modern-living-room-decor-lamp', '3', 'LMP-MOD-007', '85.00', NULL, '30', 'Adjustable touch control LED desk lamp with wireless phone charger base.', '• 10W Fast Qi Wireless Charging Base Pad\n• 5 Color Temperatures (2700K - 6500K) + 5 Brightness Levels\n• Touch Control Panel with 45-Minute Auto-Off Timer\n• Flexible Gooseneck Arm with 360-Degree Rotation', 'Light Source: LED 12W (800 Lumens)\nInput Voltage: DC 12V/2A\nBulb Life: 50,000 Hours', 'Features 5 brightness levels, 3 color temperatures, and energy-saving eye protection LED bulbs.', 'assets/images/products/product-17.jpg', '[\"assets\\/images\\/products\\/product-17.jpg\"]', '1', '1', '1', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `sku`, `price`, `sale_price`, `stock_quantity`, `short_description`, `features`, `specifications`, `description`, `main_image`, `images`, `featured`, `is_trending`, `status`, `created_at`, `updated_at`) VALUES ('8', 'Brown Casual Leather Shoes', 'brown-casual-leather-shoes', '5', 'SH-BRN-008', '89.00', '70.00', '20', 'Handcrafted genuine leather shoes for smart casual wear.', '• Hand-Burnished Full Grain Genuine Cowhide Leather\r\n• Ergonomic Cushioned Memory Foam Insole\r\n• Anti-Slip Flexible Rubber Grip Outsole\r\n• Breathable Moisture-Wicking Leather Lining', 'Upper: Full Grain Cowhide Leather\r\nOutsole: Vulcanized Non-Slip Rubber\r\nSole Construction: Goodyear Welted', 'Constructed with premium full-grain leather, cushioned insoles for all-day comfort, and non-slip rubber outsoles.', 'assets/images/products/product-2.jpg', '[\"assets\\/images\\/products\\/product-2.jpg\"]', '1', '1', '1', '2026-08-14 04:30:31', '2026-08-14 04:36:06');

DROP TABLE IF EXISTS `users`;
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

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `updated_at`) VALUES ('1', 'Kagzi Admin', 'admin@kagziventures.com', '$2y$10$2Pi.mpVjLhAE1LKtYpBG3eABZiKhi2EP0mb0mxbUvO4B/JhJ0EbBy', '+123 456 7890', '123 Enterprise Way, Business Park', 'admin', '2026-08-14 04:30:31', '2026-08-14 04:30:31');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `updated_at`) VALUES ('2', 'John Doe', 'customer@example.com', '$2y$10$6POpSpJhRCWzhdsadDIk/uSubr1H179tsitiyHSKdVwfEAcJg1Ngm', '+987 654 3210', '456 Main Street, Cityville', 'customer', '2026-08-14 04:30:31', '2026-08-14 04:30:31');

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


SET FOREIGN_KEY_CHECKS = 1;
