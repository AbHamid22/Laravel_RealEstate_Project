
--
-- Definition of table `core_academy_batches`
--

DROP TABLE IF EXISTS `core_academy_batches`;
CREATE TABLE `core_academy_batches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_academy_batches`
--

/*!40000 ALTER TABLE `core_academy_batches` DISABLE KEYS */;
INSERT INTO `core_academy_batches` (`id`,`name`) VALUES 
 (1,'Batch1'),
 (2,'Batch2');
/*!40000 ALTER TABLE `core_academy_batches` ENABLE KEYS */;


--
-- Definition of table `core_academy_students`
--

DROP TABLE IF EXISTS `core_academy_students`;
CREATE TABLE `core_academy_students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `fathers_name` varchar(45) NOT NULL,
  `mothers_name` varchar(45) NOT NULL,
  `academy_batch_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dob` date DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_academy_students`
--

/*!40000 ALTER TABLE `core_academy_students` DISABLE KEYS */;
INSERT INTO `core_academy_students` (`id`,`name`,`fathers_name`,`mothers_name`,`academy_batch_id`,`created_at`,`dob`,`photo`,`contact_no`,`address`) VALUES 
 (1,'Jahidul Islam','Habibur Rahama','Najma Akter',2,'0000-00-00 00:00:00','2000-03-19','1.jpg','45435436565','Rampura');
/*!40000 ALTER TABLE `core_academy_students` ENABLE KEYS */;


--
-- Definition of table `core_assets`
--

DROP TABLE IF EXISTS `core_assets`;
CREATE TABLE `core_assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `purchased_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_assets`
--

/*!40000 ALTER TABLE `core_assets` DISABLE KEYS */;
INSERT INTO `core_assets` (`id`,`name`,`price`,`purchased_at`) VALUES 
 (1,'Computer',50000,'2025-01-01 00:00:00'),
 (2,'Laptop',60000,'2025-01-01 00:00:00');
/*!40000 ALTER TABLE `core_assets` ENABLE KEYS */;


--
-- Definition of table `core_booking_details`
--

DROP TABLE IF EXISTS `core_booking_details`;
CREATE TABLE `core_booking_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(10) unsigned NOT NULL,
  `room_id` int(10) unsigned NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_booking_details`
--

/*!40000 ALTER TABLE `core_booking_details` DISABLE KEYS */;
INSERT INTO `core_booking_details` (`id`,`booking_id`,`room_id`,`from_date`,`to_date`,`price`) VALUES 
 (1,1,1,'2024-02-10','2024-02-11',500),
 (2,6,2,'2024-05-01','2024-05-03',500),
 (3,6,1,'2024-05-01','2024-05-03',2000),
 (4,7,2,'2024-05-29','2024-05-30',500),
 (5,7,1,'2024-05-29','2024-05-30',2000);
/*!40000 ALTER TABLE `core_booking_details` ENABLE KEYS */;


--
-- Definition of table `core_bookings`
--

DROP TABLE IF EXISTS `core_bookings`;
CREATE TABLE `core_bookings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `order_total` float NOT NULL,
  `paid_total` float NOT NULL,
  `remark` text DEFAULT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_bookings`
--

/*!40000 ALTER TABLE `core_bookings` DISABLE KEYS */;
INSERT INTO `core_bookings` (`id`,`created_at`,`order_total`,`paid_total`,`remark`,`customer_id`) VALUES 
 (1,'2024-05-22 00:00:00',1000,1000,'Test',7),
 (2,'2024-05-24 00:00:00',700,700,'Test Update Api',3),
 (3,'2024-05-25 00:00:00',3544,3544,'Test',2),
 (4,'2024-05-23 00:00:00',500,500,'Test Api',3),
 (5,'0000-00-00 00:00:00',446,446,'Test',2),
 (6,'0000-00-00 00:00:00',344,455,'test',1),
 (7,'0000-00-00 00:00:00',5000,2000,'NT',1);
/*!40000 ALTER TABLE `core_bookings` ENABLE KEYS */;


--
-- Definition of table `core_cache`
--

DROP TABLE IF EXISTS `core_cache`;
CREATE TABLE `core_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_cache`
--

/*!40000 ALTER TABLE `core_cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_cache` ENABLE KEYS */;


--
-- Definition of table `core_cache_locks`
--

DROP TABLE IF EXISTS `core_cache_locks`;
CREATE TABLE `core_cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_cache_locks`
--

/*!40000 ALTER TABLE `core_cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_cache_locks` ENABLE KEYS */;


--
-- Definition of table `core_cattle_categories`
--

DROP TABLE IF EXISTS `core_cattle_categories`;
CREATE TABLE `core_cattle_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_cattle_categories`
--

/*!40000 ALTER TABLE `core_cattle_categories` DISABLE KEYS */;
INSERT INTO `core_cattle_categories` (`id`,`name`) VALUES 
 (1,'Cow'),
 (2,'Goat');
/*!40000 ALTER TABLE `core_cattle_categories` ENABLE KEYS */;


--
-- Definition of table `core_cattles`
--

DROP TABLE IF EXISTS `core_cattles`;
CREATE TABLE `core_cattles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `color` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `gender` tinyint(1) unsigned DEFAULT NULL,
  `cattle_category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_cattles`
--

/*!40000 ALTER TABLE `core_cattles` DISABLE KEYS */;
INSERT INTO `core_cattles` (`id`,`name`,`region`,`dob`,`color`,`description`,`photo`,`gender`,`cattle_category_id`) VALUES 
 (2,'Black and White','Indian','2021-05-07','White','','2.webp',1,2),
 (3,'BlackCow','Indian','2021-05-07','Black','','3.jpeg',1,1),
 (19,'Goat 25','Deshi','2024-05-01','Red','','19.png',0,1),
 (24,'Goat 25','Deshi','2021-05-07','Red','Test','1-925-webp.webp',1,2);
/*!40000 ALTER TABLE `core_cattles` ENABLE KEYS */;


--
-- Definition of table `core_contact_categories`
--

DROP TABLE IF EXISTS `core_contact_categories`;
CREATE TABLE `core_contact_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_contact_categories`
--

/*!40000 ALTER TABLE `core_contact_categories` DISABLE KEYS */;
INSERT INTO `core_contact_categories` (`id`,`name`) VALUES 
 (1,'Family'),
 (2,'Relative'),
 (3,'Friend'),
 (4,'Student');
/*!40000 ALTER TABLE `core_contact_categories` ENABLE KEYS */;


--
-- Definition of table `core_contacts`
--

DROP TABLE IF EXISTS `core_contacts`;
CREATE TABLE `core_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `contact_category_id` int(10) unsigned NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_contacts`
--

/*!40000 ALTER TABLE `core_contacts` DISABLE KEYS */;
INSERT INTO `core_contacts` (`id`,`name`,`contact_category_id`,`contact_no`,`email`) VALUES 
 (1,'Mehedi',4,'01797993131','mehedihasandb0@gmail.com'),
 (2,'Jahid',1,'3423423','jahid1@yahoo.com');
/*!40000 ALTER TABLE `core_contacts` ENABLE KEYS */;


--
-- Definition of table `core_customers`
--

DROP TABLE IF EXISTS `core_customers`;
CREATE TABLE `core_customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `address` text DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_customers`
--

/*!40000 ALTER TABLE `core_customers` DISABLE KEYS */;
INSERT INTO `core_customers` (`id`,`name`,`mobile`,`email`,`created_at`,`updated_at`,`address`,`photo`) VALUES 
 (1,'Md. Jahidul Islam','999999999','jahid1@yahoo.com','0000-00-00 00:00:00','0000-00-00 00:00:00','',''),
 (2,'Rejaul Karim','4353445546','Reza@yahoo.com','2023-12-05 16:27:02','2023-12-05 16:27:02','','2.jpg'),
 (3,'Niyamot','3434343','niyamot@yahoo.com','2023-12-05 16:27:19','2023-12-05 16:27:19','Mirpur','3.png'),
 (4,'Kamrul','23432432423','kamrul@gmail.com','2023-12-05 16:43:37','2023-12-05 16:43:37','Dhanmondi','4.png'),
 (5,'Silvia','34324232','silvia@gmail.com','2023-12-05 16:43:49','2023-12-05 16:43:49','Rampura','5.jpg'),
 (6,'Jahidul Islam','34324324','mehedihasandb0@gmail.com','2023-12-05 16:28:16','2023-12-05 16:28:16','333','beetroot-hummus-23bae4e-jpg.jpg'),
 (7,'Jahidul2','34324324','mehedihasandb0@gmail.com','2023-12-05 16:43:59','2023-12-05 16:43:59','343','7.jpg'),
 (8,'Mehedi3','34324324','mehedihasandb0@gmail.com','2023-12-05 16:31:09','2023-12-05 16:31:09','','34324324.jpg'),
 (9,'Sabbir Ahmed','34343434','sabbir3@gmail.com','2023-12-30 15:30:13','2023-12-30 15:30:13','NA',NULL),
 (10,'Abdur Rahman','35443434','abrahman@gmail.com','2023-12-30 15:32:00','2023-12-30 15:32:00','Rampua',NULL),
 (11,'Mahedi Hassan','9433442','mahedi@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','Testing Address','11.jpeg'),
 (12,'Mahedi Hassanere','9433442sfds','mah3edi@gmail.com','2023-12-30 15:59:14','2023-12-30 15:59:14','NA',NULL),
 (15,'Siam','44444444','siam@yahoo.com','0000-00-00 00:00:00','0000-00-00 00:00:00','','');
/*!40000 ALTER TABLE `core_customers` ENABLE KEYS */;


--
-- Definition of table `core_departments`
--

DROP TABLE IF EXISTS `core_departments`;
CREATE TABLE `core_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_departments`
--

/*!40000 ALTER TABLE `core_departments` DISABLE KEYS */;
INSERT INTO `core_departments` (`id`,`code`,`name`) VALUES 
 (1,'10','Accounts'),
 (2,'20','IT'),
 (3,'30','HR'),
 (4,'40','Sales and Marketing');
/*!40000 ALTER TABLE `core_departments` ENABLE KEYS */;


--
-- Definition of table `core_districts`
--

DROP TABLE IF EXISTS `core_districts`;
CREATE TABLE `core_districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `division_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_districts`
--

/*!40000 ALTER TABLE `core_districts` DISABLE KEYS */;
INSERT INTO `core_districts` (`id`,`name`,`division_id`) VALUES 
 (1,'Narayangang',1),
 (2,'Nonakhali',3),
 (3,'Feni',3),
 (4,'Tingile',1),
 (5,'Gajipur',1),
 (6,'Potuakhali',2),
 (7,'Dhaka',1);
/*!40000 ALTER TABLE `core_districts` ENABLE KEYS */;


--
-- Definition of table `core_divisions`
--

DROP TABLE IF EXISTS `core_divisions`;
CREATE TABLE `core_divisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_divisions`
--

/*!40000 ALTER TABLE `core_divisions` DISABLE KEYS */;
INSERT INTO `core_divisions` (`id`,`name`) VALUES 
 (1,'Dhaka'),
 (2,'Borishal'),
 (3,'Chottrogram');
/*!40000 ALTER TABLE `core_divisions` ENABLE KEYS */;


--
-- Definition of table `core_failed_jobs`
--

DROP TABLE IF EXISTS `core_failed_jobs`;
CREATE TABLE `core_failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_failed_jobs`
--

/*!40000 ALTER TABLE `core_failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_failed_jobs` ENABLE KEYS */;


--
-- Definition of table `core_hms_appointments`
--

DROP TABLE IF EXISTS `core_hms_appointments`;
CREATE TABLE `core_hms_appointments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) unsigned NOT NULL,
  `doctor_id` int(10) unsigned NOT NULL,
  `appointment_at` datetime NOT NULL,
  `cc` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_hms_appointments`
--

/*!40000 ALTER TABLE `core_hms_appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_hms_appointments` ENABLE KEYS */;


--
-- Definition of table `core_hms_consultants`
--

DROP TABLE IF EXISTS `core_hms_consultants`;
CREATE TABLE `core_hms_consultants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `hms_department_id` int(10) unsigned NOT NULL,
  `designation` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_consultants`
--

/*!40000 ALTER TABLE `core_hms_consultants` DISABLE KEYS */;
INSERT INTO `core_hms_consultants` (`id`,`name`,`hms_department_id`,`designation`) VALUES 
 (1,'Dr. Moshaidul Islam',1,'MBBS');
/*!40000 ALTER TABLE `core_hms_consultants` ENABLE KEYS */;


--
-- Definition of table `core_hms_departments`
--

DROP TABLE IF EXISTS `core_hms_departments`;
CREATE TABLE `core_hms_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_departments`
--

/*!40000 ALTER TABLE `core_hms_departments` DISABLE KEYS */;
INSERT INTO `core_hms_departments` (`id`,`name`) VALUES 
 (1,'Medicine');
/*!40000 ALTER TABLE `core_hms_departments` ENABLE KEYS */;


--
-- Definition of table `core_hms_medicine_categories`
--

DROP TABLE IF EXISTS `core_hms_medicine_categories`;
CREATE TABLE `core_hms_medicine_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_medicine_categories`
--

/*!40000 ALTER TABLE `core_hms_medicine_categories` DISABLE KEYS */;
INSERT INTO `core_hms_medicine_categories` (`id`,`name`) VALUES 
 (1,'Antibiotic'),
 (2,'Vitamin'),
 (3,'Painkiller'),
 (4,'Antacids');
/*!40000 ALTER TABLE `core_hms_medicine_categories` ENABLE KEYS */;


--
-- Definition of table `core_hms_medicine_types`
--

DROP TABLE IF EXISTS `core_hms_medicine_types`;
CREATE TABLE `core_hms_medicine_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_medicine_types`
--

/*!40000 ALTER TABLE `core_hms_medicine_types` DISABLE KEYS */;
INSERT INTO `core_hms_medicine_types` (`id`,`name`) VALUES 
 (1,'Tab'),
 (2,'Inj'),
 (3,'Syr'),
 (4,'Cap');
/*!40000 ALTER TABLE `core_hms_medicine_types` ENABLE KEYS */;


--
-- Definition of table `core_hms_medicines`
--

DROP TABLE IF EXISTS `core_hms_medicines`;
CREATE TABLE `core_hms_medicines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `hms_medicine_category_id` int(10) unsigned NOT NULL,
  `hms_medicine_type_id` int(10) unsigned NOT NULL,
  `generic_name` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_medicines`
--

/*!40000 ALTER TABLE `core_hms_medicines` DISABLE KEYS */;
INSERT INTO `core_hms_medicines` (`id`,`name`,`hms_medicine_category_id`,`hms_medicine_type_id`,`generic_name`,`description`) VALUES 
 (1,'Napa 500mg',4,1,'Paracitamal','Na'),
 (2,'Seclo 20mg',3,4,'Antacid','Na');
/*!40000 ALTER TABLE `core_hms_medicines` ENABLE KEYS */;


--
-- Definition of table `core_hms_patients`
--

DROP TABLE IF EXISTS `core_hms_patients`;
CREATE TABLE `core_hms_patients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `mob_ext` int(10) unsigned NOT NULL,
  `gender` tinyint(3) unsigned NOT NULL,
  `profession` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_patients`
--

/*!40000 ALTER TABLE `core_hms_patients` DISABLE KEYS */;
INSERT INTO `core_hms_patients` (`id`,`name`,`mobile`,`dob`,`mob_ext`,`gender`,`profession`) VALUES 
 (1,'Jahidul Islam','038403423','2000-01-01',1,0,'student'),
 (2,'Jamuna','034343345','2023-01-02',1,1,'na'),
 (3,'Abdur Rahman','23432432','2000-01-20',1,1,'Student');
/*!40000 ALTER TABLE `core_hms_patients` ENABLE KEYS */;


--
-- Definition of table `core_hms_prescription_details`
--

DROP TABLE IF EXISTS `core_hms_prescription_details`;
CREATE TABLE `core_hms_prescription_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prescription_id` int(10) unsigned NOT NULL,
  `medicine_id` int(10) unsigned NOT NULL,
  `dose` varchar(20) NOT NULL,
  `days` double NOT NULL,
  `suggestion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_prescription_details`
--

/*!40000 ALTER TABLE `core_hms_prescription_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_hms_prescription_details` ENABLE KEYS */;


--
-- Definition of table `core_hms_prescriptions`
--

DROP TABLE IF EXISTS `core_hms_prescriptions`;
CREATE TABLE `core_hms_prescriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) unsigned NOT NULL,
  `consultant_id` int(10) unsigned NOT NULL,
  `cc` text NOT NULL,
  `rf` text NOT NULL,
  `investigation` text NOT NULL,
  `advice` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_prescriptions`
--

/*!40000 ALTER TABLE `core_hms_prescriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_hms_prescriptions` ENABLE KEYS */;


--
-- Definition of table `core_job_batches`
--

DROP TABLE IF EXISTS `core_job_batches`;
CREATE TABLE `core_job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_job_batches`
--

/*!40000 ALTER TABLE `core_job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_job_batches` ENABLE KEYS */;


--
-- Definition of table `core_jobs`
--

DROP TABLE IF EXISTS `core_jobs`;
CREATE TABLE `core_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `core_jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_jobs`
--

/*!40000 ALTER TABLE `core_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_jobs` ENABLE KEYS */;


--
-- Definition of table `core_manufacturers`
--

DROP TABLE IF EXISTS `core_manufacturers`;
CREATE TABLE `core_manufacturers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_manufacturers`
--

/*!40000 ALTER TABLE `core_manufacturers` DISABLE KEYS */;
INSERT INTO `core_manufacturers` (`id`,`name`) VALUES 
 (1,'APCL'),
 (2,'ISL'),
 (3,'IDB');
/*!40000 ALTER TABLE `core_manufacturers` ENABLE KEYS */;


--
-- Definition of table `core_mfg_bom_details`
--

DROP TABLE IF EXISTS `core_mfg_bom_details`;
CREATE TABLE `core_mfg_bom_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bom_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `cost` float NOT NULL,
  `uom_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_mfg_bom_details`
--

/*!40000 ALTER TABLE `core_mfg_bom_details` DISABLE KEYS */;
INSERT INTO `core_mfg_bom_details` (`id`,`bom_id`,`product_id`,`qty`,`cost`,`uom_id`) VALUES 
 (1,1,400,200,100,1),
 (2,1,401,100,10,2),
 (3,1,402,10,50,3),
 (4,3,49,13,30,1),
 (5,3,17,14,2500,1);
/*!40000 ALTER TABLE `core_mfg_bom_details` ENABLE KEYS */;


--
-- Definition of table `core_mfg_bom_secondary_products`
--

DROP TABLE IF EXISTS `core_mfg_bom_secondary_products`;
CREATE TABLE `core_mfg_bom_secondary_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `uom` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_mfg_bom_secondary_products`
--

/*!40000 ALTER TABLE `core_mfg_bom_secondary_products` DISABLE KEYS */;
INSERT INTO `core_mfg_bom_secondary_products` (`id`,`product_id`,`qty`,`price`,`uom`) VALUES 
 (1,500,5,400,5);
/*!40000 ALTER TABLE `core_mfg_bom_secondary_products` ENABLE KEYS */;


--
-- Definition of table `core_mfg_boms`
--

DROP TABLE IF EXISTS `core_mfg_boms`;
CREATE TABLE `core_mfg_boms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` varchar(45) NOT NULL,
  `labour_cost` float NOT NULL,
  `date` datetime DEFAULT NULL,
  `remark` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_mfg_boms`
--

/*!40000 ALTER TABLE `core_mfg_boms` DISABLE KEYS */;
INSERT INTO `core_mfg_boms` (`id`,`code`,`name`,`product_id`,`qty`,`labour_cost`,`date`,`remark`) VALUES 
 (1,'100','T-Shirt',1,'100',2000,NULL,NULL),
 (2,'343','BM-3',47,'3',45,NULL,NULL),
 (3,'3532','BM93',47,'34',432,NULL,NULL);
/*!40000 ALTER TABLE `core_mfg_boms` ENABLE KEYS */;


--
-- Definition of table `core_mfg_production_details`
--

DROP TABLE IF EXISTS `core_mfg_production_details`;
CREATE TABLE `core_mfg_production_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `production_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `uom_id` int(10) unsigned NOT NULL,
  `cost` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_mfg_production_details`
--

/*!40000 ALTER TABLE `core_mfg_production_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_mfg_production_details` ENABLE KEYS */;


--
-- Definition of table `core_mfg_productions`
--

DROP TABLE IF EXISTS `core_mfg_productions`;
CREATE TABLE `core_mfg_productions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `production_datetime` datetime NOT NULL,
  `bom_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `labor_cost` float NOT NULL,
  `manager_id` int(10) unsigned NOT NULL,
  `total_cost` float NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `uom_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_mfg_productions`
--

/*!40000 ALTER TABLE `core_mfg_productions` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_mfg_productions` ENABLE KEYS */;


--
-- Definition of table `core_migrations`
--

DROP TABLE IF EXISTS `core_migrations`;
CREATE TABLE `core_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_migrations`
--

/*!40000 ALTER TABLE `core_migrations` DISABLE KEYS */;
INSERT INTO `core_migrations` (`id`,`migration`,`batch`) VALUES 
 (6,'2014_10_12_000000_create_users_table',1),
 (7,'2014_10_12_100000_create_password_reset_tokens_table',1),
 (8,'2014_10_12_100000_create_password_resets_table',1),
 (9,'2019_08_19_000000_create_failed_jobs_table',1),
 (10,'2019_12_14_000001_create_personal_access_tokens_table',1),
 (17,'2024_07_02_044553_create_personal_access_tokens_table',3),
 (18,'0001_01_01_000000_create_users_table',4),
 (19,'0001_01_01_000001_create_cache_table',4),
 (20,'0001_01_01_000002_create_jobs_table',4);
/*!40000 ALTER TABLE `core_migrations` ENABLE KEYS */;


--
-- Definition of table `core_money_receipt_details`
--

DROP TABLE IF EXISTS `core_money_receipt_details`;
CREATE TABLE `core_money_receipt_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `money_receipt_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_money_receipt_details`
--

/*!40000 ALTER TABLE `core_money_receipt_details` DISABLE KEYS */;
INSERT INTO `core_money_receipt_details` (`id`,`money_receipt_id`,`product_id`,`price`,`qty`) VALUES 
 (1,1,36,100,1),
 (2,7,0,2500,2),
 (3,7,0,180,1),
 (4,7,0,999,1),
 (5,8,36,2500,1),
 (6,25,0,180,2),
 (7,25,0,999,1),
 (8,26,46,180,2),
 (9,26,47,999,1),
 (10,27,46,180,2),
 (11,27,47,999,1),
 (12,28,46,180,2),
 (13,28,47,999,1),
 (14,29,46,180,2),
 (15,29,47,999,1);
/*!40000 ALTER TABLE `core_money_receipt_details` ENABLE KEYS */;


--
-- Definition of table `core_money_receipts`
--

DROP TABLE IF EXISTS `core_money_receipts`;
CREATE TABLE `core_money_receipts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `remark` text DEFAULT NULL,
  `receipt_total` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_money_receipts`
--

/*!40000 ALTER TABLE `core_money_receipts` DISABLE KEYS */;
INSERT INTO `core_money_receipts` (`id`,`created_at`,`updated_at`,`customer_id`,`remark`,`receipt_total`) VALUES 
 (1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,'Na',100),
 (2,'2023-12-27 13:57:23','2023-12-27 13:57:23',0,'NA',0),
 (3,'2023-12-27 13:59:35','2023-12-27 13:59:35',0,'NA',0),
 (4,'2023-12-27 14:00:07','2023-12-27 14:00:07',0,'NA',0),
 (5,'2023-12-27 14:00:27','2023-12-27 14:00:27',0,'NA',0),
 (6,'2023-12-27 14:02:47','2023-12-27 14:02:47',2,'',3673.95),
 (7,'2023-12-27 14:04:33','2023-12-27 14:04:33',3,'',6487.95),
 (8,'2023-12-27 14:06:11','2023-12-27 14:06:11',1,'',2625),
 (9,'2023-12-28 09:59:35','2023-12-28 09:59:35',0,'NA',0),
 (10,'2023-12-28 10:00:38','2023-12-28 10:00:38',1,'NA',200),
 (11,'2023-12-28 10:03:17','2023-12-28 10:03:17',0,'NA',0),
 (12,'2023-12-28 10:14:49','2023-12-28 10:14:49',0,'NA',0),
 (13,'2023-12-28 10:15:57','2023-12-28 10:15:57',0,'NA',0),
 (14,'2023-12-28 10:21:16','2023-12-28 10:21:16',0,'NA',0),
 (15,'2023-12-28 10:22:41','2023-12-28 10:22:41',0,'NA',0),
 (16,'2023-12-28 10:25:03','2023-12-28 10:25:03',0,'NA',0),
 (17,'2023-12-28 10:26:13','2023-12-28 10:26:13',0,'NA',0),
 (18,'2023-12-28 10:26:23','2023-12-28 10:26:23',0,'NA',0),
 (19,'2023-12-28 10:26:34','2023-12-28 10:26:34',0,'NA',0),
 (20,'2023-12-28 10:31:35','2023-12-28 10:31:35',1,'Test',200),
 (21,'2023-12-28 10:34:39','2023-12-28 10:34:39',1,'NA',200),
 (22,'2023-12-28 10:34:48','2023-12-28 10:34:48',1,'NA',200),
 (23,'2024-01-03 12:50:54','2024-01-03 12:50:54',0,'',12304.95),
 (24,'2024-01-03 12:53:38','2024-01-03 12:53:38',0,'',1426.95),
 (25,'2024-01-03 12:57:41','2024-01-03 12:57:41',0,'',1426.95),
 (26,'2024-01-03 13:01:07','2024-01-03 13:01:07',0,'',1426.95),
 (27,'2024-01-03 13:04:23','2024-01-03 13:04:23',1,'',1426.95),
 (28,'2024-01-03 13:07:18','2024-01-03 13:07:18',1,'',1426.95),
 (29,'2024-01-03 13:09:58','2024-01-03 13:09:58',1,'',1426.95);
/*!40000 ALTER TABLE `core_money_receipts` ENABLE KEYS */;


--
-- Definition of table `core_order_details`
--

DROP TABLE IF EXISTS `core_order_details`;
CREATE TABLE `core_order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_order_details`
--

/*!40000 ALTER TABLE `core_order_details` DISABLE KEYS */;
INSERT INTO `core_order_details` (`id`,`order_id`,`product_id`,`qty`,`price`,`vat`,`discount`,`created_at`,`updated_at`) VALUES 
 (1,1,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (2,1,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (3,2,18,4,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (4,2,17,2,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (5,3,17,2,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (6,3,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (7,4,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (8,4,18,1,40,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (9,5,17,1,16,0,0,'2021-12-14 12:45:23','2021-12-14 12:45:23'),
 (10,14,18,1,30,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (11,14,17,1,15,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (12,15,18,1,40,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (13,15,17,2,16,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (14,16,28,1,5000,0,0,'2022-01-06 12:39:11','2022-01-06 12:39:11'),
 (15,16,29,1,342,0,0,'2022-01-06 12:39:11','2022-01-06 12:39:11'),
 (16,17,29,1,342,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (17,17,28,1,5000,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (18,17,20,1,110,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (19,18,28,10,5000,0,0,'2022-01-06 15:14:42','2022-01-06 15:14:42'),
 (20,19,30,1,7999,0,0,'2022-01-08 09:05:54','2022-01-08 09:05:54'),
 (21,19,31,1,4444,0,0,'2022-01-08 09:05:54','2022-01-08 09:05:54'),
 (22,19,20,1,110,0,0,'2022-01-08 09:05:55','2022-01-08 09:05:55'),
 (23,20,29,1,342,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (24,20,20,1,110,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (25,20,30,1,7999,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (26,20,32,1,5555,0,0,'2022-01-08 09:06:58','2022-01-08 09:06:58'),
 (27,21,29,1,342,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (28,21,28,1,5000,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (29,21,31,1,4444,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (30,21,32,2,5555,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (31,21,30,1,7999,0,0,'2022-01-08 09:07:27','2022-01-08 09:07:27'),
 (32,21,20,1,110,0,0,'2022-01-08 09:07:28','2022-01-08 09:07:28'),
 (40,25,18,1,180,0,0,'2024-03-13 08:26:34','2024-03-13 08:26:34'),
 (41,25,17,1,2500,0,0,'2024-03-13 08:26:34','2024-03-13 08:26:34'),
 (42,26,18,1,180,0,0,'2024-03-13 08:40:15','2024-03-13 08:40:15'),
 (43,26,17,1,2500,0,0,'2024-03-13 08:40:15','2024-03-13 08:40:15'),
 (44,32,17,1,100,0,0,'2024-05-12 12:40:03','2024-05-12 12:40:03');
/*!40000 ALTER TABLE `core_order_details` ENABLE KEYS */;


--
-- Definition of table `core_orders`
--

DROP TABLE IF EXISTS `core_orders`;
CREATE TABLE `core_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_total` double NOT NULL DEFAULT 0,
  `paid_amount` double NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT 1,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_orders`
--

/*!40000 ALTER TABLE `core_orders` DISABLE KEYS */;
INSERT INTO `core_orders` (`id`,`customer_id`,`order_date`,`delivery_date`,`shipping_address`,`order_total`,`paid_amount`,`remark`,`status_id`,`discount`,`vat`,`created_at`,`updated_at`) VALUES 
 (2,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (3,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (4,2,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (5,1,'2021-12-13 00:00:00','2021-12-13 00:00:00','na',0,0,'Na',1,0,0,'2021-12-14 12:40:41','2021-12-14 12:40:41'),
 (6,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,'',2,0,0,'2023-12-05 17:54:41','2023-12-05 17:54:41'),
 (7,3,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,NULL,NULL,'2021-12-14 07:02:07','2021-12-14 07:02:07'),
 (8,2,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:03:51','2021-12-14 07:03:51'),
 (9,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:05:32','2021-12-14 07:05:32'),
 (10,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:06:21','2021-12-14 07:06:21'),
 (11,3,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:07:13','2021-12-14 07:07:13'),
 (12,2,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:10:25','2021-12-14 07:10:25'),
 (13,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:13:06','2021-12-14 07:13:06'),
 (14,1,'2021-12-14 00:00:00','2021-12-14 00:00:00','Mirpur',0,0,NULL,1,0,0,'2021-12-14 07:14:27','2021-12-14 07:14:27'),
 (15,3,'2021-12-15 00:00:00','2021-12-15 00:00:00','Rampura',0,0,'Testing',1,0,0,'2021-12-15 18:48:59','2021-12-15 18:48:59'),
 (16,1,'2022-01-06 00:00:00','2022-01-06 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-06 12:39:11','2022-01-06 12:39:11'),
 (17,1,'2022-01-06 00:00:00','2022-01-06 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-06 12:43:37','2022-01-06 12:43:37'),
 (18,1,'2022-01-06 00:00:00','2022-01-06 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-06 15:14:42','2022-01-06 15:14:42'),
 (19,1,'2022-01-08 00:00:00','2022-01-08 00:00:00','Rampura',0,0,'NA',1,0,0,'2022-01-08 09:05:54','2022-01-08 09:05:54'),
 (20,1,'2022-01-08 00:00:00','2022-01-08 00:00:00','Rampura',0,0,'NA',3,0,0,'2023-12-05 18:07:44','2023-12-05 18:07:44'),
 (21,1,'2022-01-08 00:00:00','2022-01-08 00:00:00','Rampura',0,0,'NA',4,0,0,'2023-12-05 18:06:48','2023-12-05 18:06:48'),
 (22,8,'2023-12-24 00:00:00','2023-12-24 00:00:00','Mohammadpur',1636.95,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (23,1,'2023-12-27 00:00:00','2023-12-27 00:00:00','Rampura, Banasree',1426.95,0,'Na',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (24,4,'2024-01-03 00:00:00','2024-01-03 00:00:00','Dhanmondi, Dhaka',12304.95,0,'Test',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (25,1,'2024-03-13 00:00:00','2024-03-13 00:00:00','na',0,0,NULL,1,0,0,'2024-03-13 08:26:34','2024-03-13 08:26:34'),
 (26,2,'2024-03-13 00:00:00','2024-03-13 00:00:00','na',0,0,NULL,1,0,0,'2024-03-13 08:40:15','2024-03-13 08:40:15'),
 (27,23,'2024-03-21 00:00:00','2024-03-24 00:00:00','Rampura',0,0,NULL,1,0,0,'2024-05-12 11:46:43','2024-05-12 11:46:43'),
 (28,23,'2024-03-21 00:00:00','2024-03-24 00:00:00','Rampura',100,0,NULL,1,0,0,'2024-05-12 11:48:18','2024-05-12 11:48:18'),
 (29,23,'2024-03-21 00:00:00','2024-03-24 00:00:00','Rampura',100,0,NULL,1,0,0,'2024-05-12 11:48:50','2024-05-12 11:48:50'),
 (30,23,'2024-03-21 00:00:00','2024-03-24 00:00:00','Rampura',100,0,NULL,1,0,0,'2024-05-12 11:48:54','2024-05-12 11:48:54'),
 (31,23,'2024-03-21 00:00:00','2024-03-24 00:00:00','Rampura',100,0,NULL,1,0,0,'2024-05-12 11:48:57','2024-05-12 11:48:57'),
 (32,1,'2024-05-14 00:00:00','2024-05-14 00:00:00','Rampura',100,0,NULL,1,0,0,'2024-05-12 12:40:03','2024-05-12 12:40:03');
/*!40000 ALTER TABLE `core_orders` ENABLE KEYS */;


--
-- Definition of table `core_password_reset_tokens`
--

DROP TABLE IF EXISTS `core_password_reset_tokens`;
CREATE TABLE `core_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_password_reset_tokens`
--

/*!40000 ALTER TABLE `core_password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_password_reset_tokens` ENABLE KEYS */;


--
-- Definition of table `core_personal_access_tokens`
--

DROP TABLE IF EXISTS `core_personal_access_tokens`;
CREATE TABLE `core_personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_personal_access_tokens_token_unique` (`token`),
  KEY `core_personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_personal_access_tokens`
--

/*!40000 ALTER TABLE `core_personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_personal_access_tokens` ENABLE KEYS */;


--
-- Definition of table `core_persons`
--

DROP TABLE IF EXISTS `core_persons`;
CREATE TABLE `core_persons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `position_id` int(10) unsigned NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_persons`
--

/*!40000 ALTER TABLE `core_persons` DISABLE KEYS */;
INSERT INTO `core_persons` (`id`,`name`,`position_id`,`sex`,`dob`,`doj`,`mobile`,`address`,`inactive`) VALUES 
 (1,'Jahidul Islam',1,0,'2000-01-01','2021-01-01','677657657567','Rampura',0);
/*!40000 ALTER TABLE `core_persons` ENABLE KEYS */;


--
-- Definition of table `core_positions`
--

DROP TABLE IF EXISTS `core_positions`;
CREATE TABLE `core_positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `grade` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_positions`
--

/*!40000 ALTER TABLE `core_positions` DISABLE KEYS */;
INSERT INTO `core_positions` (`id`,`name`,`grade`,`department_id`) VALUES 
 (1,'Programmer',6,2),
 (2,'System Analyst',3,1);
/*!40000 ALTER TABLE `core_positions` ENABLE KEYS */;


--
-- Definition of table `core_product_brands`
--

DROP TABLE IF EXISTS `core_product_brands`;
CREATE TABLE `core_product_brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_product_brands`
--

/*!40000 ALTER TABLE `core_product_brands` DISABLE KEYS */;
INSERT INTO `core_product_brands` (`id`,`name`) VALUES 
 (1,'RFL'),
 (2,'Bengal');
/*!40000 ALTER TABLE `core_product_brands` ENABLE KEYS */;


--
-- Definition of table `core_product_categories`
--

DROP TABLE IF EXISTS `core_product_categories`;
CREATE TABLE `core_product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_product_categories`
--

/*!40000 ALTER TABLE `core_product_categories` DISABLE KEYS */;
INSERT INTO `core_product_categories` (`id`,`name`,`section_id`,`created_at`,`updated_at`) VALUES 
 (2,'Vegetables',3,'2022-01-11 12:46:24',NULL),
 (3,'Fish',3,'2022-01-11 12:46:24',NULL),
 (4,'Drugs',3,'2022-01-11 12:46:24',NULL),
 (5,'Cameras',1,'2022-01-11 12:46:24',NULL),
 (6,'Computers, Tablets & Laptops',1,'2022-01-11 12:46:24',NULL),
 (7,'Mobile Phone',1,'2022-01-11 12:46:24',NULL),
 (8,'Sound & Vision',1,'2022-01-11 12:46:24',NULL),
 (9,'Women\'s',2,'2022-01-11 12:46:24',NULL),
 (10,'Men\'s',2,'2022-01-11 12:46:24',NULL),
 (11,'Kids',2,'2022-01-11 12:46:24',NULL),
 (12,'Cosmatics',4,'2022-01-11 12:46:24',NULL),
 (13,'T-Shirt',2,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `core_product_categories` ENABLE KEYS */;


--
-- Definition of table `core_product_sections`
--

DROP TABLE IF EXISTS `core_product_sections`;
CREATE TABLE `core_product_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `unit_id` int(10) unsigned DEFAULT NULL,
  `photo` varchar(145) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_product_sections`
--

/*!40000 ALTER TABLE `core_product_sections` DISABLE KEYS */;
INSERT INTO `core_product_sections` (`id`,`name`,`unit_id`,`photo`,`icon`) VALUES 
 (1,'Electronices',1,NULL,NULL),
 (2,'Clothings',1,NULL,NULL),
 (3,'Food and Beverages',1,NULL,NULL),
 (4,'Health & Beauty',1,NULL,NULL),
 (5,'Sports & Leisure',1,NULL,NULL),
 (6,'Books & Entertainments',1,NULL,NULL);
/*!40000 ALTER TABLE `core_product_sections` ENABLE KEYS */;


--
-- Definition of table `core_product_types`
--

DROP TABLE IF EXISTS `core_product_types`;
CREATE TABLE `core_product_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_product_types`
--

/*!40000 ALTER TABLE `core_product_types` DISABLE KEYS */;
INSERT INTO `core_product_types` (`id`,`name`) VALUES 
 (1,'Finished Goods'),
 (2,'Raw Materials'),
 (3,'Consumable Materials');
/*!40000 ALTER TABLE `core_product_types` ENABLE KEYS */;


--
-- Definition of table `core_product_units`
--

DROP TABLE IF EXISTS `core_product_units`;
CREATE TABLE `core_product_units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_product_units`
--

/*!40000 ALTER TABLE `core_product_units` DISABLE KEYS */;
INSERT INTO `core_product_units` (`id`,`name`,`photo`,`icon`) VALUES 
 (1,'Electronics',NULL,NULL),
 (2,'Grocery',NULL,NULL);
/*!40000 ALTER TABLE `core_product_units` ENABLE KEYS */;


--
-- Definition of table `core_products`
--

DROP TABLE IF EXISTS `core_products`;
CREATE TABLE `core_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `offer_price` double DEFAULT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `regular_price` double NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `product_category_id` int(10) unsigned NOT NULL,
  `product_section_id` int(10) unsigned NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `star` int(10) unsigned DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT 0,
  `offer_discount` float DEFAULT 0,
  `uom_id` int(10) unsigned NOT NULL,
  `weight` float DEFAULT NULL,
  `barcode` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `product_type_id` int(10) unsigned NOT NULL,
  `product_unit_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_barcode` (`barcode`),
  UNIQUE KEY `uni_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_products`
--

/*!40000 ALTER TABLE `core_products` DISABLE KEYS */;
INSERT INTO `core_products` (`id`,`name`,`offer_price`,`manufacturer_id`,`regular_price`,`description`,`photo`,`product_category_id`,`product_section_id`,`is_featured`,`star`,`is_brand`,`offer_discount`,`uom_id`,`weight`,`barcode`,`created_at`,`updated_at`,`product_type_id`,`product_unit_id`) VALUES 
 (17,'Brown Borka',2500,3,4000,'','17.jpg',5,1,1,0,1,0,1,0,'4456342342','0000-00-00 00:00:00','0000-00-00 00:00:00',2,2),
 (50,'Apple',345,1,400,'NA','default.jpg',1,1,0,5,1,0,1,0,'1002','2024-03-20 09:57:44','2024-03-20 09:57:44',1,0);
/*!40000 ALTER TABLE `core_products` ENABLE KEYS */;


--
-- Definition of table `core_purchase_details`
--

DROP TABLE IF EXISTS `core_purchase_details`;
CREATE TABLE `core_purchase_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_purchase_details`
--

/*!40000 ALTER TABLE `core_purchase_details` DISABLE KEYS */;
INSERT INTO `core_purchase_details` (`id`,`purchase_id`,`product_id`,`qty`,`price`,`vat`,`discount`,`created_at`,`updated_at`) VALUES 
 (1,1,17,50,200,0,0,NULL,NULL),
 (2,1,18,30,250,0,0,NULL,NULL),
 (3,2,17,20,210,0,0,NULL,NULL),
 (4,2,40,70,240,0,0,NULL,NULL),
 (5,3,39,10,202,0,0,NULL,NULL),
 (6,4,40,30,300,0,0,NULL,NULL),
 (7,10,1,4,200,0,0,NULL,NULL),
 (8,15,18,1,180,0,0,NULL,NULL),
 (9,15,50,1,345,0,0,NULL,NULL),
 (10,15,17,1,2500,0,0,NULL,NULL),
 (11,16,50,1,345,0,0,NULL,NULL),
 (12,16,17,1,2500,0,0,NULL,NULL),
 (13,17,17,14,2500,0,0,NULL,NULL),
 (14,17,50,15,345,0,0,NULL,NULL);
/*!40000 ALTER TABLE `core_purchase_details` ENABLE KEYS */;


--
-- Definition of table `core_purchases`
--

DROP TABLE IF EXISTS `core_purchases`;
CREATE TABLE `core_purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned NOT NULL,
  `purchase_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `purchase_total` double NOT NULL,
  `paid_amount` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_purchases`
--

/*!40000 ALTER TABLE `core_purchases` DISABLE KEYS */;
INSERT INTO `core_purchases` (`id`,`supplier_id`,`purchase_date`,`delivery_date`,`shipping_address`,`purchase_total`,`paid_amount`,`remark`,`status_id`,`discount`,`vat`,`created_at`,`updated_at`) VALUES 
 (1,1,'2023-12-24 00:00:00','2023-12-24 00:00:00','Rangpur',18375,0,'Na',1,0,0,'2024-03-31 16:17:58','2024-03-31 16:17:42'),
 (2,2,'2023-12-24 00:00:00','2023-12-24 00:00:00','',22050,0,'',1,0,0,'2024-03-31 16:17:58','2024-03-31 16:17:42'),
 (3,1,'2023-12-24 00:00:00','2023-12-24 00:00:00','',2121,0,'',1,0,0,'2024-03-31 16:17:58','2024-03-31 16:17:42'),
 (4,1,'2023-12-24 00:00:00','2023-12-24 00:00:00','',9450,0,'',1,0,0,'2024-03-31 16:17:58','2024-03-31 16:17:42'),
 (5,1,'2024-03-10 00:00:00','2024-03-10 00:00:00','Rampura',0,0,NULL,1,0,0,'2024-03-31 10:20:36','2024-03-31 10:20:36'),
 (6,1,'2024-03-10 00:00:00','2024-03-10 00:00:00','Rampura',0,0,NULL,1,0,0,'2024-03-31 10:25:03','2024-03-31 10:25:03'),
 (7,1,'2024-03-10 00:00:00','2024-03-10 00:00:00','Rampura',0,0,NULL,1,0,0,'2024-03-31 10:26:17','2024-03-31 10:26:17'),
 (8,1,'2024-03-10 00:00:00','2024-03-10 00:00:00','Rampura',0,0,NULL,1,0,0,'2024-04-01 09:52:29','2024-04-01 09:52:29'),
 (9,1,'2024-03-10 00:00:00','2024-03-10 00:00:00','Rampura',0,0,NULL,1,0,0,'2024-04-01 09:53:48','2024-04-01 09:53:48'),
 (10,1,'2024-03-10 00:00:00','2024-03-10 00:00:00','Rampura',0,0,NULL,1,0,0,'2024-04-01 09:56:29','2024-04-01 09:56:29'),
 (11,1,'2024-03-10 00:00:00','2024-03-10 00:00:00','Rampura',0,0,NULL,1,0,0,'2024-04-01 10:22:59','2024-04-01 10:22:59'),
 (12,2,'2024-04-03 00:00:00','2024-04-03 00:00:00','Test',0,0,NULL,1,0,0,'2024-04-02 09:48:06','2024-04-02 09:48:06'),
 (13,2,'2024-04-03 00:00:00','2024-04-03 00:00:00','Test',0,0,NULL,1,0,0,'2024-04-02 09:49:37','2024-04-02 09:49:37'),
 (14,2,'2024-04-03 00:00:00','2024-04-03 00:00:00','Test',0,0,NULL,1,0,0,'2024-04-02 09:50:35','2024-04-02 09:50:35'),
 (15,2,'2024-04-03 00:00:00','2024-04-03 00:00:00','Test',0,0,NULL,1,0,0,'2024-04-02 09:51:47','2024-04-02 09:51:47'),
 (16,1,'2024-06-04 00:00:00','2024-06-04 00:00:00','Test',2987.25,0,'  NA',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (17,2,'2024-06-05 00:00:00','2024-06-05 00:00:00','',42183.75,0,'',1,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (18,1,'2024-01-01 00:00:00','2024-01-05 00:00:00','Rampura',100,1000,'NA',1,0,0,'2024-07-10 12:27:24','2024-07-10 12:27:24'),
 (19,1,'2024-01-01 00:00:00','2024-01-05 00:00:00','Rampura',100,1000,'NA',1,0,0,'2024-07-14 12:46:30','2024-07-14 12:46:30'),
 (20,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',3621.45,3621.45,'NA',1,0,0,'2024-07-14 12:58:16','2024-07-14 12:58:16'),
 (21,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',3622.5,3622.5,'NA',1,0,0,'2024-07-14 13:01:43','2024-07-14 13:01:43'),
 (22,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:04:31','2024-07-14 13:04:31'),
 (23,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:07:02','2024-07-14 13:07:02'),
 (24,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:08:00','2024-07-14 13:08:00'),
 (25,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:08:10','2024-07-14 13:08:10'),
 (26,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:08:20','2024-07-14 13:08:20'),
 (27,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:09:04','2024-07-14 13:09:04'),
 (28,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:09:31','2024-07-14 13:09:31'),
 (29,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:09:52','2024-07-14 13:09:52'),
 (30,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:10:11','2024-07-14 13:10:11'),
 (31,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:10:14','2024-07-14 13:10:14'),
 (32,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',3622.5,3622.5,'NA',1,0,0,'2024-07-14 13:10:31','2024-07-14 13:10:31'),
 (33,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',3622.5,3622.5,'NA',1,0,0,'2024-07-14 13:10:55','2024-07-14 13:10:55'),
 (34,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',37117.5,37117.5,'NA',1,0,0,'2024-07-14 13:14:34','2024-07-14 13:14:34'),
 (35,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',37117.5,37117.5,'NA',1,0,0,'2024-07-14 13:15:05','2024-07-14 13:15:05'),
 (36,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',37117.5,37117.5,'NA',1,0,0,'2024-07-14 13:15:07','2024-07-14 13:15:07'),
 (37,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',37117.5,37117.5,'NA',1,0,0,'2024-07-14 13:15:31','2024-07-14 13:15:31'),
 (38,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',37117.5,37117.5,'NA',1,0,0,'2024-07-14 13:15:33','2024-07-14 13:15:33'),
 (39,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',37117.5,37117.5,'NA',1,0,0,'2024-07-14 13:16:00','2024-07-14 13:16:00'),
 (40,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',37117.5,37117.5,'NA',1,0,0,'2024-07-14 13:16:01','2024-07-14 13:16:01'),
 (41,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',37117.5,37117.5,'NA',1,0,0,'2024-07-14 13:16:02','2024-07-14 13:16:02'),
 (42,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',37117.5,37117.5,'NA',1,0,0,'2024-07-14 13:16:05','2024-07-14 13:16:05'),
 (43,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',3622.5,3622.5,'NA',1,0,0,'2024-07-14 13:16:20','2024-07-14 13:16:20'),
 (44,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',3622.5,3622.5,'NA',1,0,0,'2024-07-14 13:17:23','2024-07-14 13:17:23'),
 (45,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',3622.5,3622.5,'NA',1,0,0,'2024-07-14 13:17:31','2024-07-14 13:17:31'),
 (46,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',3622.5,3622.5,'NA',1,0,0,'2024-07-14 13:18:13','2024-07-14 13:18:13'),
 (47,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',3622.5,3622.5,'NA',1,0,0,'2024-07-14 13:18:22','2024-07-14 13:18:22'),
 (48,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:18:42','2024-07-14 13:18:42'),
 (49,1,'2024-07-14 00:00:00','2024-07-14 00:00:00','na',29872.5,29872.5,'NA',1,0,0,'2024-07-14 13:19:35','2024-07-14 13:19:35');
/*!40000 ALTER TABLE `core_purchases` ENABLE KEYS */;


--
-- Definition of table `core_roles`
--

DROP TABLE IF EXISTS `core_roles`;
CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_roles`
--

/*!40000 ALTER TABLE `core_roles` DISABLE KEYS */;
INSERT INTO `core_roles` (`id`,`name`,`updated_at`,`created_at`) VALUES 
 (1,'Admin','2024-03-02 04:59:14','2024-03-02 10:59:14'),
 (2,'Manager','2024-02-28 12:10:59','2024-02-28 12:10:59'),
 (4,'Guest','2024-03-07 10:24:21','2024-03-07 10:24:21'),
 (5,'Demo1','2024-03-07 12:25:34','2024-06-09 12:38:21'),
 (12,'Dem34','2024-06-11 05:29:21','2024-06-11 05:29:21');
/*!40000 ALTER TABLE `core_roles` ENABLE KEYS */;


--
-- Definition of table `core_room_types`
--

DROP TABLE IF EXISTS `core_room_types`;
CREATE TABLE `core_room_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_room_types`
--

/*!40000 ALTER TABLE `core_room_types` DISABLE KEYS */;
INSERT INTO `core_room_types` (`id`,`name`) VALUES 
 (1,'Single'),
 (2,'Double');
/*!40000 ALTER TABLE `core_room_types` ENABLE KEYS */;


--
-- Definition of table `core_rooms`
--

DROP TABLE IF EXISTS `core_rooms`;
CREATE TABLE `core_rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `room_type_id` int(10) unsigned NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_rooms`
--

/*!40000 ALTER TABLE `core_rooms` DISABLE KEYS */;
INSERT INTO `core_rooms` (`id`,`name`,`code`,`room_type_id`,`price`) VALUES 
 (1,'Double South Side 200sft 2nd floor- 322','322',2,2000),
 (2,'Single 100sft non ac -324','324',1,500);
/*!40000 ALTER TABLE `core_rooms` ENABLE KEYS */;


--
-- Definition of table `core_round63`
--

DROP TABLE IF EXISTS `core_round63`;
CREATE TABLE `core_round63` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `roll` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_round63`
--

/*!40000 ALTER TABLE `core_round63` DISABLE KEYS */;
INSERT INTO `core_round63` (`id`,`name`,`contact`,`email`,`roll`) VALUES 
 (1,'Naiyem','01515618932','mdnaiyem@gmail.com','1286770');
/*!40000 ALTER TABLE `core_round63` ENABLE KEYS */;


--
-- Definition of table `core_sections`
--

DROP TABLE IF EXISTS `core_sections`;
CREATE TABLE `core_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_sections`
--

/*!40000 ALTER TABLE `core_sections` DISABLE KEYS */;
INSERT INTO `core_sections` (`id`,`name`) VALUES 
 (1,'Electronices'),
 (2,'Clothings'),
 (3,'Food and Beverages'),
 (4,'Health & Beauty'),
 (5,'Sports & Leisure'),
 (6,'Books & Entertainments');
/*!40000 ALTER TABLE `core_sections` ENABLE KEYS */;


--
-- Definition of table `core_sessions`
--

DROP TABLE IF EXISTS `core_sessions`;
CREATE TABLE `core_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `core_sessions_user_id_index` (`user_id`),
  KEY `core_sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_sessions`
--

/*!40000 ALTER TABLE `core_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_sessions` ENABLE KEYS */;


--
-- Definition of table `core_site_album_details`
--

DROP TABLE IF EXISTS `core_site_album_details`;
CREATE TABLE `core_site_album_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_album_id` int(10) unsigned NOT NULL,
  `photo` varchar(245) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `inactive` tinyint(3) unsigned DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_album_details`
--

/*!40000 ALTER TABLE `core_site_album_details` DISABLE KEYS */;
INSERT INTO `core_site_album_details` (`id`,`site_album_id`,`photo`,`name`,`description`,`inactive`) VALUES 
 (1,1,'./uploads/posts/1548841158.jpg','Intellect Software Ltd','Leading Software Company',0),
 (2,1,'1548843065.jpg','Intellect Cloud POS','Intellect Enterprise Resource Planning (ERP) is business management&#8230;',0),
 (3,1,'1548841332.jpg','Education and Training','For many people, gaining new skills through accredited&#8230;',0),
 (4,2,'1548867137.svg','Food and Beverage',NULL,0),
 (5,2,'1548867301.svg','Retail Goods',NULL,0),
 (6,2,'1548867424.svg','Energy, Oil and Gas',NULL,0),
 (7,2,'1548867363.svg','Chemical Goods',NULL,0),
 (8,2,'1548867453.svg','Consumer Packaged Goods',NULL,0),
 (9,3,'15488786820.jpg','Screenshot1',NULL,0),
 (10,3,'15488786821.jpg','Screenshot2',NULL,0),
 (11,4,'15488797600.jpg','POS1',NULL,0),
 (12,4,'15488797601.jpg','POS2',NULL,0),
 (13,4,'15488797602.jpg','POS3',NULL,0);
/*!40000 ALTER TABLE `core_site_album_details` ENABLE KEYS */;


--
-- Definition of table `core_site_albums`
--

DROP TABLE IF EXISTS `core_site_albums`;
CREATE TABLE `core_site_albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_albums`
--

/*!40000 ALTER TABLE `core_site_albums` DISABLE KEYS */;
INSERT INTO `core_site_albums` (`id`,`name`,`created_at`,`description`,`photo`) VALUES 
 (1,'Main Slider',NULL,'Na',NULL),
 (2,'INDUSTRY SECTORS',NULL,'We cover different industry sectors, from food and beverage, chemical, retail, durable goods and more. Check the full list.',NULL),
 (3,'Screenshot - Home Page',NULL,NULL,NULL),
 (4,'POS',NULL,NULL,NULL);
/*!40000 ALTER TABLE `core_site_albums` ENABLE KEYS */;


--
-- Definition of table `core_site_attributes`
--

DROP TABLE IF EXISTS `core_site_attributes`;
CREATE TABLE `core_site_attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(245) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_attributes`
--

/*!40000 ALTER TABLE `core_site_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_site_attributes` ENABLE KEYS */;


--
-- Definition of table `core_site_clients`
--

DROP TABLE IF EXISTS `core_site_clients`;
CREATE TABLE `core_site_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_clients`
--

/*!40000 ALTER TABLE `core_site_clients` DISABLE KEYS */;
INSERT INTO `core_site_clients` (`id`,`name`,`photo`,`review`,`website`) VALUES 
 (1,'Karnaphuli Group','1548871087-png.png','Na','https://www.karnaphuli.com/'),
 (2,'Doreen','1548871127-png.png','Na','https://doreen.com/');
/*!40000 ALTER TABLE `core_site_clients` ENABLE KEYS */;


--
-- Definition of table `core_site_menu_sub_details`
--

DROP TABLE IF EXISTS `core_site_menu_sub_details`;
CREATE TABLE `core_site_menu_sub_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `site_menu_sub_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_menu_sub_details`
--

/*!40000 ALTER TABLE `core_site_menu_sub_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_site_menu_sub_details` ENABLE KEYS */;


--
-- Definition of table `core_site_menu_subs`
--

DROP TABLE IF EXISTS `core_site_menu_subs`;
CREATE TABLE `core_site_menu_subs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_menu_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `has_child` tinyint(3) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_menu_subs`
--

/*!40000 ALTER TABLE `core_site_menu_subs` DISABLE KEYS */;
INSERT INTO `core_site_menu_subs` (`id`,`site_menu_id`,`name`,`link`,`has_child`) VALUES 
 (1,2,'POS ERP','pos-erp',0),
 (2,2,'ERP-Garments','garment-erp',0),
 (3,2,'ERP-General Insurance','general-insurance-erp',0),
 (4,2,'ERP-Education','education-erp',0),
 (5,2,'ERP Manufacturing','manufacturing-erp',0),
 (6,2,'ERP Hospital','hospital-erp',0),
 (7,2,'ERP Texttile','texttile-erp',0),
 (8,2,'ERP Real Estate','real-estate-erp',0),
 (9,8,'Web publising','webpublishing',0),
 (10,8,'Javascript Library','javascript-library',0),
 (11,8,'Server Side','server-side',0);
/*!40000 ALTER TABLE `core_site_menu_subs` ENABLE KEYS */;


--
-- Definition of table `core_site_menus`
--

DROP TABLE IF EXISTS `core_site_menus`;
CREATE TABLE `core_site_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `has_child` tinyint(3) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_menus`
--

/*!40000 ALTER TABLE `core_site_menus` DISABLE KEYS */;
INSERT INTO `core_site_menus` (`id`,`name`,`link`,`has_child`) VALUES 
 (1,'Home','/',0),
 (2,'Software','./software.html',1),
 (3,'Service','./service.html',0),
 (4,'Partner','./partner.html',0),
 (5,'Client','./client.html',0),
 (6,'About','./about.html',0),
 (7,'Contact','/contact.html',0),
 (8,'Blog','./blog.html',1);
/*!40000 ALTER TABLE `core_site_menus` ENABLE KEYS */;


--
-- Definition of table `core_site_pages`
--

DROP TABLE IF EXISTS `core_site_pages`;
CREATE TABLE `core_site_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) unsigned DEFAULT 0,
  `slug` varchar(145) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_pages`
--

/*!40000 ALTER TABLE `core_site_pages` DISABLE KEYS */;
INSERT INTO `core_site_pages` (`id`,`name`,`link`,`inactive`,`slug`,`description`,`photo`) VALUES 
 (1,'POS ERP','http',0,NULL,'Integrated solution from production to point of sale for any retials business including\r\n                                supershop, clothing, pharmacy, restaurant/food, electronics, library, jewellery,\r\n                                furniture, tiles &amp; sanitary etc',NULL);
/*!40000 ALTER TABLE `core_site_pages` ENABLE KEYS */;


--
-- Definition of table `core_site_post_categories`
--

DROP TABLE IF EXISTS `core_site_post_categories`;
CREATE TABLE `core_site_post_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_post_categories`
--

/*!40000 ALTER TABLE `core_site_post_categories` DISABLE KEYS */;
INSERT INTO `core_site_post_categories` (`id`,`name`) VALUES 
 (1,'Business'),
 (2,'Software');
/*!40000 ALTER TABLE `core_site_post_categories` ENABLE KEYS */;


--
-- Definition of table `core_site_post_details`
--

DROP TABLE IF EXISTS `core_site_post_details`;
CREATE TABLE `core_site_post_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_post_id` int(10) unsigned NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(245) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_post_details`
--

/*!40000 ALTER TABLE `core_site_post_details` DISABLE KEYS */;
INSERT INTO `core_site_post_details` (`id`,`site_post_id`,`description`,`photo`,`name`) VALUES 
 (1,1,'Product multi-dimensional measurement unit',NULL,NULL),
 (2,1,'Convenience of buying and selling products according to batch / lot\r\n                                        number',NULL,NULL),
 (3,1,'Advantages of Product Metrics',NULL,NULL),
 (4,1,'Business data will never be lost or ',NULL,NULL),
 (5,1,'Buying from multiple branches can be sold through the same software',NULL,NULL),
 (6,1,'The software will never slow down, if the data is high or even from the remote\r\n                                        location.',NULL,NULL),
 (7,2,'Accounting Management',NULL,NULL),
 (8,2,'Payroll Management',NULL,NULL),
 (9,2,' Inventory Management',NULL,NULL),
 (10,2,'Purchase Management',NULL,NULL),
 (11,2,'Production & Distribution Management',NULL,NULL),
 (12,2,' Human Resource Management',NULL,NULL),
 (13,2,' Customer Relationship Management',NULL,NULL),
 (14,2,'Sales Management',NULL,NULL),
 (15,2,'Barcode Creator',NULL,NULL),
 (16,2,'Cloud Backup Server',NULL,NULL),
 (17,4,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos\r\n                                        himenaeos. Nulla nunc dui, tristique in semper vel.',NULL,'Super Design Layout '),
 (18,4,'Intellect Cloud pos software can be automated update after the release new\r\n                                        version of software. Update for the better performace and better userfriendly.',NULL,'Regular Updates & Support'),
 (19,4,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos\r\n                                        himenaeos nulla nunc dui.',NULL,'Responsive Web Design');
/*!40000 ALTER TABLE `core_site_post_details` ENABLE KEYS */;


--
-- Definition of table `core_site_posts`
--

DROP TABLE IF EXISTS `core_site_posts`;
CREATE TABLE `core_site_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(245) DEFAULT NULL,
  `site_album_id` int(10) unsigned DEFAULT NULL,
  `inactive` tinyint(3) unsigned DEFAULT 0,
  `post_category_id` int(10) unsigned DEFAULT NULL,
  `post_page_id` int(10) unsigned DEFAULT NULL,
  `photo` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_posts`
--

/*!40000 ALTER TABLE `core_site_posts` DISABLE KEYS */;
INSERT INTO `core_site_posts` (`id`,`name`,`description`,`slug`,`site_album_id`,`inactive`,`post_category_id`,`post_page_id`,`photo`) VALUES 
 (1,'Explain why its best','There are several kind of information we have for why we are best. Some the best features\r\n                                we provide for you that are the world wide challenging features. Some best features are\r\n                                given below.',NULL,3,0,1,1,NULL),
 (2,'Great way to Include with POS','With integrated POS software, the following business software is listed together.',NULL,4,0,1,1,NULL),
 (3,'ERP - POS','Integrated solution from production to point of sale for any retials business including\r\n                                supershop, clothing, pharmacy, restaurant/food, electronics, library, jewellery,\r\n                                furniture, tiles &amp; sanitary etc',NULL,5,0,1,1,'1548843653.jpg'),
 (4,'Intellect Cloud POS Software - features','Responsive & optimized for mobile devices. Completely without coding skills!',NULL,NULL,0,NULL,NULL,'15488780820.jpg');
/*!40000 ALTER TABLE `core_site_posts` ENABLE KEYS */;


--
-- Definition of table `core_site_product_categories`
--

DROP TABLE IF EXISTS `core_site_product_categories`;
CREATE TABLE `core_site_product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_product_categories`
--

/*!40000 ALTER TABLE `core_site_product_categories` DISABLE KEYS */;
INSERT INTO `core_site_product_categories` (`id`,`name`) VALUES 
 (1,'ERP'),
 (2,'OTHER SOFTWARES');
/*!40000 ALTER TABLE `core_site_product_categories` ENABLE KEYS */;


--
-- Definition of table `core_site_product_uoms`
--

DROP TABLE IF EXISTS `core_site_product_uoms`;
CREATE TABLE `core_site_product_uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_product_uoms`
--

/*!40000 ALTER TABLE `core_site_product_uoms` DISABLE KEYS */;
INSERT INTO `core_site_product_uoms` (`id`,`name`) VALUES 
 (1,'Piece');
/*!40000 ALTER TABLE `core_site_product_uoms` ENABLE KEYS */;


--
-- Definition of table `core_site_products`
--

DROP TABLE IF EXISTS `core_site_products`;
CREATE TABLE `core_site_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `site_product_category_id` int(10) unsigned NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(345) DEFAULT NULL,
  `regular_price` float DEFAULT NULL,
  `offer_price` float DEFAULT NULL,
  `inactive` tinyint(3) unsigned DEFAULT NULL,
  `current_stock` float DEFAULT NULL,
  `site_product_uom_id` int(10) unsigned DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_products`
--

/*!40000 ALTER TABLE `core_site_products` DISABLE KEYS */;
INSERT INTO `core_site_products` (`id`,`name`,`site_product_category_id`,`description`,`photo`,`regular_price`,`offer_price`,`inactive`,`current_stock`,`site_product_uom_id`,`slug`,`icon`) VALUES 
 (1,'POS ERP',1,' Integrated solution from production to point of sale for any retials business including supershop, clothing, pharmacy, restaurant/food, electronics, library, jewellery, furniture, tiles & sanitary etc','1548843653.jpg',0,0,0,0,1,'pos-erp',''),
 (2,'ERP - GARMENTS',1,'Intellect Garments ERP is one of the leading ERP solution provider, especially for Garments industries which is integrated with different modules that cover all the…','1548855465.jpg',0,0,0,0,1,'garments-erp',NULL),
 (3,'ERP - GENERAL INSURANCE',1,'Our Insurance software so flexible that you will reach your business goals in no time. Stop struggling with legacy systems! Our intellect software will help…','1548855650.jpg',0,0,0,0,1,'genaral-insurance-erp',NULL),
 (4,'ERP - EDUCATION',1,'Intellect education management software is used by teachers, students, and school/college/university administrators for organization and collaboration, and to facilitate learning. School software is','1548856590.jpg',0,0,0,0,1,'education-erp',NULL),
 (5,'ERP - MANUFACTURING',1,'Intellect ERP gives a company an integrated real-time view of its core business processes such as production, order processing, and inventory management, tied together by…','1548856850.jpg',0,0,0,0,1,'manufacturing-erp',NULL),
 (6,'ERP - HOSPITAL',1,'Intellect Hospital Management Software is a comprehensive and integrated hospital management software, designed to manage all aspects of hospital operations.(i.e. Outpatient and Inpatient management, Patient…','1548857774.jpg',0,0,0,0,1,'hospital-erp',NULL),
 (7,'ERP - MERCHANDISING',1,'Merchandising, CONTROL Retail Management System and POS also takes care of Retail CRM, Inventory Management, online trading, Sales & Profit Analysis, Order Entry & Invoicing,…','1548858095.jpg',0,0,0,0,1,'merchandising-erp',NULL),
 (8,'ERP - TEXTILE',1,'The Intellect ERP (enterprise resource planning) software solutions - seek to integrate the business processes involving eight critical areas in the textile production planning which…','1548858372.jpg',0,0,0,0,1,'texttile-erp',NULL),
 (9,'ERP - REAL ESTATE',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater','1548858645.jpg',0,0,0,0,1,'real-estate-erp',NULL),
 (10,'Accounting',2,'Accounting Software includes general journal, creating bill & invoice, all financial reports (Trial Balance, Income Statement, Balance Sheet) and so on.','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M19 2H5c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zM5 20V4h14l.001 16H5z\"></path><path d=\"M7 12h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zM7 6h10v4H7zm4 10h2v2h-2zm4-4h2v6h-2z\"></path>',0,0,0,0,1,'accounting',NULL),
 (11,'HR & Accounting',2,'Human Resource Management System includes person management, payroll, attendance, leave & holiday, shift & schedule, accounting and so on.','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2-2 .849-2 2 .848 2 2 2z\"></path><path d=\"M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4zm0 14-16-.011V6',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (12,'Diagnostic Application',2,'Diagnostic Application includes pharmacy management, radioloy reporting management, sample collection and reporting management and so on','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M15.794 11.09c.332-.263.648-.542.947-.84l.136-.142c.283-.293.552-.598.801-.919l.062-.075c.255-.335.486-.688.702-1.049l.128-.22c.205-.364.395-.737.559-1.123.02-.047.035-.095.055-.142.147-.361.274-.731.383-1.109.02',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (13,'Doctors Prescription',2,'Doctors Prescription Application includes appointment scheduling, visit fee collection, create and print prescription and so on..','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M8.434 20.566c1.335 0 2.591-.52 3.535-1.464l7.134-7.133a5.008 5.008 0 0 0-.001-7.072 4.969 4.969 0 0 0-3.536-1.463c-1.335 0-2.59.52-3.534 1.464l-7.134 7.133a5.01 5.01 0 0 0-.001 7.072 4.971 4.971 0 0 0 3.537 1.46',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (14,'Asset Management',2,'Asset Management System includes asset and components, operation schedule, material & service requisition and so on.','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"m20.772 13.155-1.368-4.104A2.995 2.995 0 0 0 16.559 7H7.441a2.995 2.995 0 0 0-2.845 2.051l-1.368 4.104A2.001 2.001 0 0 0 2 15v3c0 .738.404 1.376 1 1.723V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1h12v1a1 1 0 0 0 1 1h1a1 ',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (15,'Inventory Management',2,'Inventory Management System includes stock management, warehouse management, stock adjustment, requisition management, stock reporting and so on.','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M21.993 7.95a.96.96 0 0 0-.029-.214c-.007-.025-.021-.049-.03-.074-.021-.057-.04-.113-.07-.165-.016-.027-.038-.049-.057-.075-.032-.045-.063-.091-.102-.13-.023-.022-.053-.04-.078-.061-.039-.032-.075-.067-.12-.094-.',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (16,'RealTime Attendance System',2,'Biometric System Application includes registration with finger print and webcam device, Bio-Metric verification, real time data storage, system & security and so on.','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M5.962 17.674C7 19.331 7 20.567 7 22h2c0-1.521 0-3.244-1.343-5.389l-1.695 1.063zM16.504 3.387C13.977 1.91 7.55.926 4.281 4.305c-3.368 3.481-2.249 9.072.001 11.392.118.122.244.229.369.333.072.061.146.116.205.184l1',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (17,'Project Management',2,'Project Management Application includes person management, task & team management, asset management, costing, reporting and so o','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M5 22h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-2a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H5c-1.103 0-2 .897-2 2v15c0 1.103.897 2 2 2zM5 5h2v2h10V5h2v15H5V5z\"></path><path d=\"m11 13.586-1.793-1.793-1.414 1.414L11 16.414l5',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (18,'Logistics Management',2,'Logistics Management System includes procurement & delivery management, transportation & route management, storage of goods & transportation flow, navigation, billing and so on.','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M14.844 20H6.5C5.121 20 4 18.879 4 17.5S5.121 15 6.5 15h7c1.93 0 3.5-1.57 3.5-3.5S15.43 8 13.5 8H8.639a9.812 9.812 0 0 1-1.354 2H13.5c.827 0 1.5.673 1.5 1.5s-.673 1.5-1.5 1.5h-7C4.019 13 2 15.019 2 17.5S4.019 22 ',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (19,'E-Commerce Solution',2,'E-Commerce Solution includes website, management of product, order, purchase, warehouse, customer, supplier, payment gateway and so on.','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M4 20h2V10a1 1 0 0 1 1-1h12V7a1 1 0 0 0-1-1h-3.051c-.252-2.244-2.139-4-4.449-4S6.303 3.756 6.051 6H3a1 1 0 0 0-1 1v11a2 2 0 0 0 2 2zm6.5-16c1.207 0 2.218.86 2.45 2h-4.9c.232-1.14 1.243-2 2.45-2z\"></path><path d=\"',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (20,'Visa Processing Software',2,'Our Visa Processing Software includes customer registration, deed and document management, visa & ticket processing step management, invoice & payment, status report and so on.','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M3 18h18v2H3zm18.509-9.473a1.61 1.61 0 0 0-2.036-1.019L15 9 7 6 5 7l6 4-4 2-4-2-1 1 4 4 14.547-5.455a1.611 1.611 0 0 0 .962-2.018z\"></path></svg>',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `core_site_products` ENABLE KEYS */;


--
-- Definition of table `core_site_routes`
--

DROP TABLE IF EXISTS `core_site_routes`;
CREATE TABLE `core_site_routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `src` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `site_menu_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_route` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_routes`
--

/*!40000 ALTER TABLE `core_site_routes` DISABLE KEYS */;
INSERT INTO `core_site_routes` (`id`,`name`,`src`,`inactive`,`site_menu_id`) VALUES 
 (1,'pos-erp','views/pages/ERP-POS.php',0,2),
 (2,'garment-erp','views/pages/ERP-Garments.php',0,2),
 (3,'education-erp','views/pages/ERP-Education.php',0,2),
 (4,'general-insurance-erp','views/pages/ERP-General-Insurance.php',0,2),
 (5,'manufacturing-erp','views/pages/ERP-Manufacturing.php',0,2),
 (6,'hospital-erp','views/pages/ERP-Hospital.php',0,2),
 (7,'texttile-erp','views/pages/ERP-Textitle.php',0,2),
 (8,'real-estate-erp','views/pages/ERP-Real-Estate.php',0,2);
/*!40000 ALTER TABLE `core_site_routes` ENABLE KEYS */;


--
-- Definition of table `core_site_service_categories`
--

DROP TABLE IF EXISTS `core_site_service_categories`;
CREATE TABLE `core_site_service_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_service_categories`
--

/*!40000 ALTER TABLE `core_site_service_categories` DISABLE KEYS */;
INSERT INTO `core_site_service_categories` (`id`,`name`) VALUES 
 (1,'Software Enable Service');
/*!40000 ALTER TABLE `core_site_service_categories` ENABLE KEYS */;


--
-- Definition of table `core_site_services`
--

DROP TABLE IF EXISTS `core_site_services`;
CREATE TABLE `core_site_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `description` text DEFAULT NULL,
  `regular_price` float DEFAULT 0,
  `offer_price` float DEFAULT 0,
  `icon` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) unsigned DEFAULT 0,
  `photo` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_services`
--

/*!40000 ALTER TABLE `core_site_services` DISABLE KEYS */;
INSERT INTO `core_site_services` (`id`,`name`,`category_id`,`description`,`regular_price`,`offer_price`,`icon`,`inactive`,`photo`) VALUES 
 (1,'Software Quality Assurance',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'1548863121.png'),
 (2,'Software forensic',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'1548863180.png'),
 (3,'Database Migration',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'1548863362.png'),
 (4,'Setup Own Hosting',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'1548863484.png'),
 (5,'Cloud Backup Service',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greate',0,0,NULL,0,'1548862800.png'),
 (6,'Software Upgrade and Maintenance',1,'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater',0,0,NULL,0,'1548863512.png'),
 (7,'Incredibly Responsive',2,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.',0,0,'<i class=\"fa fa-laptop v-icon\"></i>',0,NULL),
 (8,'Fully Customizible',2,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.',0,0,'<i class=\"fa fa-leaf v-icon\"></i>',0,NULL),
 (9,'Interactive Elements',2,'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.',0,0,'<i class=\"fa fa-scissors v-icon\"></i>',0,NULL);
/*!40000 ALTER TABLE `core_site_services` ENABLE KEYS */;


--
-- Definition of table `core_status`
--

DROP TABLE IF EXISTS `core_status`;
CREATE TABLE `core_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_status`
--

/*!40000 ALTER TABLE `core_status` DISABLE KEYS */;
INSERT INTO `core_status` (`id`,`name`) VALUES 
 (1,'Processing'),
 (2,'Shifted'),
 (3,'Delivered'),
 (4,'Invoiced');
/*!40000 ALTER TABLE `core_status` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustment_details`
--

DROP TABLE IF EXISTS `core_stock_adjustment_details`;
CREATE TABLE `core_stock_adjustment_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adjustment_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stock_adjustment_details`
--

/*!40000 ALTER TABLE `core_stock_adjustment_details` DISABLE KEYS */;
INSERT INTO `core_stock_adjustment_details` (`id`,`adjustment_id`,`product_id`,`qty`,`price`) VALUES 
 (1,2,20,5,400),
 (2,3,20,50,400),
 (3,4,28,70,6650),
 (4,4,20,30,300);
/*!40000 ALTER TABLE `core_stock_adjustment_details` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustment_types`
--

DROP TABLE IF EXISTS `core_stock_adjustment_types`;
CREATE TABLE `core_stock_adjustment_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `factor` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stock_adjustment_types`
--

/*!40000 ALTER TABLE `core_stock_adjustment_types` DISABLE KEYS */;
INSERT INTO `core_stock_adjustment_types` (`id`,`name`,`factor`) VALUES 
 (1,'Is Outdated',-1),
 (2,'Is Damaged',-1),
 (3,'Material Missing',-1),
 (4,'Product Is Obsolete',-1),
 (5,'Existing Inventory',1),
 (6,'Fixed/Found Inventory',1);
/*!40000 ALTER TABLE `core_stock_adjustment_types` ENABLE KEYS */;


--
-- Definition of table `core_stock_adjustments`
--

DROP TABLE IF EXISTS `core_stock_adjustments`;
CREATE TABLE `core_stock_adjustments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adjustment_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) unsigned NOT NULL,
  `remark` text NOT NULL,
  `adjustment_type_id` int(10) unsigned NOT NULL,
  `werehouse_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stock_adjustments`
--

/*!40000 ALTER TABLE `core_stock_adjustments` DISABLE KEYS */;
INSERT INTO `core_stock_adjustments` (`id`,`adjustment_at`,`user_id`,`remark`,`adjustment_type_id`,`werehouse_id`) VALUES 
 (1,'2021-12-28 00:00:00',1,'ddd',2,1),
 (2,'2021-12-28 00:00:00',1,'ddd',2,1),
 (3,'2021-12-28 00:00:00',1,'ddddfd',6,1),
 (4,'2021-12-28 00:00:00',1,'NA',6,2);
/*!40000 ALTER TABLE `core_stock_adjustments` ENABLE KEYS */;


--
-- Definition of table `core_stocks`
--

DROP TABLE IF EXISTS `core_stocks`;
CREATE TABLE `core_stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `qty` float NOT NULL,
  `transaction_type_id` int(10) unsigned NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warehouse_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stocks`
--

/*!40000 ALTER TABLE `core_stocks` DISABLE KEYS */;
INSERT INTO `core_stocks` (`id`,`product_id`,`qty`,`transaction_type_id`,`remark`,`created_at`,`warehouse_id`) VALUES 
 (14,50,1,3,'Purchase','2024-06-04 12:47:19',1),
 (15,17,1,3,'Purchase','2024-06-04 12:47:19',1),
 (16,17,14,3,'Purchase','2024-06-05 09:22:00',1),
 (17,50,15,3,'Purchase','2024-06-05 09:22:00',1),
 (18,17,-1,6,'Damage','0000-00-00 00:00:00',1),
 (19,50,2,4,'selse return','0000-00-00 00:00:00',1),
 (20,50,2,2,'yj','0000-00-00 00:00:00',1),
 (21,17,2,1,'ytjk','0000-00-00 00:00:00',1);
/*!40000 ALTER TABLE `core_stocks` ENABLE KEYS */;


--
-- Definition of table `core_students`
--

DROP TABLE IF EXISTS `core_students`;
CREATE TABLE `core_students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `fathers_name` varchar(45) NOT NULL,
  `mothers_name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_students`
--

/*!40000 ALTER TABLE `core_students` DISABLE KEYS */;
INSERT INTO `core_students` (`id`,`name`,`fathers_name`,`mothers_name`,`dob`,`contact_no`,`address`,`photo`) VALUES 
 (1,'Mahedi Hassan','Abdur Rahman','Amena Akter','2024-01-19','','Rampura ','1.png');
/*!40000 ALTER TABLE `core_students` ENABLE KEYS */;


--
-- Definition of table `core_suppliers`
--

DROP TABLE IF EXISTS `core_suppliers`;
CREATE TABLE `core_suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_suppliers`
--

/*!40000 ALTER TABLE `core_suppliers` DISABLE KEYS */;
INSERT INTO `core_suppliers` (`id`,`name`,`mobile`,`email`) VALUES 
 (1,'Md. Shahin','34223423455444','shahin@yahoo.com'),
 (2,'Tauhid Imdad','343254354235433','tauhid@gmail.com');
/*!40000 ALTER TABLE `core_suppliers` ENABLE KEYS */;


--
-- Definition of table `core_tailor_dress_parameters`
--

DROP TABLE IF EXISTS `core_tailor_dress_parameters`;
CREATE TABLE `core_tailor_dress_parameters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `dress_id` int(10) unsigned NOT NULL,
  `default_size` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_dress_parameters`
--

/*!40000 ALTER TABLE `core_tailor_dress_parameters` DISABLE KEYS */;
INSERT INTO `core_tailor_dress_parameters` (`id`,`name`,`dress_id`,`default_size`) VALUES 
 (1,'Chest',1,NULL),
 (2,'Waist',1,NULL),
 (3,'Seat',1,NULL),
 (4,'Bicep',1,NULL),
 (5,'Shirt Length',1,NULL),
 (6,'Shoulder Width',1,NULL),
 (7,'Sleeve Length',1,NULL),
 (8,'Cuff Circumference',1,NULL),
 (9,'Collar Size',2,NULL);
/*!40000 ALTER TABLE `core_tailor_dress_parameters` ENABLE KEYS */;


--
-- Definition of table `core_tailor_dresses`
--

DROP TABLE IF EXISTS `core_tailor_dresses`;
CREATE TABLE `core_tailor_dresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_dresses`
--

/*!40000 ALTER TABLE `core_tailor_dresses` DISABLE KEYS */;
INSERT INTO `core_tailor_dresses` (`id`,`name`,`price`) VALUES 
 (1,'Shirt',1000),
 (2,'Kamiz',1200),
 (3,'Pants',1100),
 (4,'Borka',2500),
 (5,'Panjabi',1300);
/*!40000 ALTER TABLE `core_tailor_dresses` ENABLE KEYS */;


--
-- Definition of table `core_tailor_order_details`
--

DROP TABLE IF EXISTS `core_tailor_order_details`;
CREATE TABLE `core_tailor_order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dress_id` int(10) unsigned NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL,
  `discount` double NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_order_details`
--

/*!40000 ALTER TABLE `core_tailor_order_details` DISABLE KEYS */;
INSERT INTO `core_tailor_order_details` (`id`,`dress_id`,`price`,`qty`,`discount`,`order_id`) VALUES 
 (1,1,1000,1,0,1);
/*!40000 ALTER TABLE `core_tailor_order_details` ENABLE KEYS */;


--
-- Definition of table `core_tailor_order_measurements`
--

DROP TABLE IF EXISTS `core_tailor_order_measurements`;
CREATE TABLE `core_tailor_order_measurements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `measurement_id` int(10) unsigned NOT NULL,
  `size` varchar(10) NOT NULL,
  `uom_id` int(10) unsigned NOT NULL,
  `dress_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_order_measurements`
--

/*!40000 ALTER TABLE `core_tailor_order_measurements` DISABLE KEYS */;
INSERT INTO `core_tailor_order_measurements` (`id`,`order_id`,`measurement_id`,`size`,`uom_id`,`dress_id`) VALUES 
 (1,1,1,'34',1,1),
 (2,1,2,'33',1,1),
 (3,1,5,'22',1,1);
/*!40000 ALTER TABLE `core_tailor_order_measurements` ENABLE KEYS */;


--
-- Definition of table `core_tailor_orders`
--

DROP TABLE IF EXISTS `core_tailor_orders`;
CREATE TABLE `core_tailor_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(20) NOT NULL,
  `paid_amount` double DEFAULT NULL,
  `order_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_datetime` datetime NOT NULL,
  `order_total` double DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_orders`
--

/*!40000 ALTER TABLE `core_tailor_orders` DISABLE KEYS */;
INSERT INTO `core_tailor_orders` (`id`,`customer_name`,`paid_amount`,`order_datetime`,`delivery_datetime`,`order_total`,`shipping_address`,`remark`,`mobile`,`discount`) VALUES 
 (1,'Jahidul Islam',500,'0000-00-00 00:00:00','2024-01-20 00:00:00',950,'Rampura','','3434343234',50);
/*!40000 ALTER TABLE `core_tailor_orders` ENABLE KEYS */;


--
-- Definition of table `core_tailor_uoms`
--

DROP TABLE IF EXISTS `core_tailor_uoms`;
CREATE TABLE `core_tailor_uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `abbr` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `inactive` tinyint(3) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_uoms`
--

/*!40000 ALTER TABLE `core_tailor_uoms` DISABLE KEYS */;
INSERT INTO `core_tailor_uoms` (`id`,`abbr`,`name`,`inactive`) VALUES 
 (1,'inc','Inch',0),
 (2,'ft','Foot',0),
 (3,'yd','yard',0),
 (4,'piece','piece',0);
/*!40000 ALTER TABLE `core_tailor_uoms` ENABLE KEYS */;


--
-- Definition of table `core_thanas`
--

DROP TABLE IF EXISTS `core_thanas`;
CREATE TABLE `core_thanas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `district_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_thanas`
--

/*!40000 ALTER TABLE `core_thanas` DISABLE KEYS */;
INSERT INTO `core_thanas` (`id`,`name`,`district_id`) VALUES 
 (1,'Chatkhil',2),
 (2,'Ramgonj',2),
 (3,'Mijdi Sadar',2),
 (4,'Begomganj',2);
/*!40000 ALTER TABLE `core_thanas` ENABLE KEYS */;


--
-- Definition of table `core_transaction_types`
--

DROP TABLE IF EXISTS `core_transaction_types`;
CREATE TABLE `core_transaction_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_transaction_types`
--

/*!40000 ALTER TABLE `core_transaction_types` DISABLE KEYS */;
INSERT INTO `core_transaction_types` (`id`,`name`) VALUES 
 (1,'Sales Order'),
 (2,'Sales Return'),
 (3,'Purchase Order'),
 (4,'Purchase Return'),
 (5,'Positive Stock Adjustment'),
 (6,'Negative Stock Adjustment');
/*!40000 ALTER TABLE `core_transaction_types` ENABLE KEYS */;


--
-- Definition of table `core_uoms`
--

DROP TABLE IF EXISTS `core_uoms`;
CREATE TABLE `core_uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_uoms`
--

/*!40000 ALTER TABLE `core_uoms` DISABLE KEYS */;
INSERT INTO `core_uoms` (`id`,`name`) VALUES 
 (1,'Piece'),
 (2,'Kg'),
 (3,'Pack'),
 (4,'Litter'),
 (5,'Gram'),
 (6,'Ton');
/*!40000 ALTER TABLE `core_uoms` ENABLE KEYS */;


--
-- Definition of table `core_user_deposits`
--

DROP TABLE IF EXISTS `core_user_deposits`;
CREATE TABLE `core_user_deposits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_at` datetime DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_user_deposits`
--

/*!40000 ALTER TABLE `core_user_deposits` DISABLE KEYS */;
INSERT INTO `core_user_deposits` (`id`,`user_id`,`amount`,`created_at`,`transaction_at`,`note`,`created_by`) VALUES 
 (1,158,100,'2024-04-04 11:22:32','2024-04-04 00:00:00','NA',127),
 (2,186,10000,'2024-04-04 11:22:39','1970-01-01 06:00:00','',186),
 (3,160,-5e17,'2024-04-04 11:23:50','1970-01-01 06:00:00','',186),
 (4,194,1009,'2024-04-04 11:44:18','1970-01-01 06:00:00','NA',194),
 (5,197,10000,'2024-04-04 11:56:20','1970-01-01 06:00:00','',197),
 (6,199,1,'2024-04-04 11:56:29','1970-01-01 06:00:00','Na',199),
 (7,196,1000,'2024-04-04 11:56:49','1970-01-01 06:00:00','',196),
 (8,197,-1,'2024-04-04 11:57:17','1970-01-01 06:00:00','',197),
 (9,196,150,'2024-04-04 11:57:31','1970-01-01 06:00:00','',127),
 (10,203,5000,'2024-04-04 11:57:52','2024-04-04 00:00:00','Eid Gift',203),
 (11,204,0,'2024-04-04 11:58:09','2024-04-04 00:00:00','xero_xero',91),
 (12,200,9999,'2024-04-04 11:58:26','1970-01-01 06:00:00','',200),
 (13,199,4000,'2024-04-15 10:48:13','2024-04-15 00:00:00','',127),
 (14,201,3000,'2024-04-15 10:48:32','1970-01-01 06:00:00','',127),
 (15,191,500,'2024-12-19 18:42:46','1970-01-01 06:00:00','',207),
 (16,192,500,'2024-12-19 18:43:01','1970-01-01 06:00:00','',207),
 (17,191,100,'2024-12-19 18:43:52','1970-01-01 06:00:00','',207),
 (18,213,2000,'2024-12-19 18:44:52','1970-01-01 06:00:00','',207),
 (19,208,3555,'2024-12-19 18:45:04','1970-01-01 06:00:00','',207),
 (20,204,344,'2024-12-19 18:45:11','1970-01-01 06:00:00','',207),
 (21,206,456,'2024-12-19 18:45:16','1970-01-01 06:00:00','',207),
 (22,207,4555,'2024-12-19 18:45:21','1970-01-01 06:00:00','',207),
 (23,209,456,'2024-12-19 18:45:26','1970-01-01 06:00:00','',207),
 (24,210,455,'2024-12-19 18:45:34','1970-01-01 06:00:00','',207),
 (25,211,4322,'2024-12-19 18:45:39','1970-01-01 06:00:00','',207),
 (26,212,3556,'2024-12-19 18:45:49','1970-01-01 06:00:00','',207);
/*!40000 ALTER TABLE `core_user_deposits` ENABLE KEYS */;


--
-- Definition of table `core_users`
--

DROP TABLE IF EXISTS `core_users`;
CREATE TABLE `core_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) unsigned DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_users`
--

/*!40000 ALTER TABLE `core_users` DISABLE KEYS */;
INSERT INTO `core_users` (`id`,`name`,`role_id`,`password`,`email`,`full_name`,`created_at`,`photo`,`verify_code`,`inactive`,`mobile`,`updated_at`,`ip`,`email_verified_at`,`remember_token`) VALUES 
 (191,'Dola',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','samdola81@gmail.com','Samsunnahar','2025-01-18 18:36:54',NULL,NULL,0,'01832482305',NULL,'192.168.150.38',NULL,NULL),
 (192,'samira',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','samira@gmail.com','Samira Akter','2025-01-18 18:36:54',NULL,NULL,0,'01881432313',NULL,'192.168.150.59',NULL,NULL),
 (194,'dibbo',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','jkp.jakaria@gmail.com','jkp','2025-01-18 18:36:54',NULL,NULL,0,'01642527454',NULL,'192.168.150.47',NULL,NULL),
 (196,'akhi',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','akhi26713@gmail.cm','Aminur Rahman','2025-01-18 18:36:54',NULL,NULL,0,'01946357571',NULL,'192.168.150.49',NULL,NULL),
 (197,'tasmin',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','tanim@gmail.com','Rifat Ahammed Tanim','2025-01-18 18:36:54',NULL,NULL,0,'01900000000',NULL,'192.168.150.50',NULL,NULL),
 (199,'MD. HAFIJUL ISLAM',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','imdhafijul453@gmail.com','Md.Hafijul Islam','2025-01-18 18:36:54',NULL,NULL,0,'01755747048',NULL,'192.168.150.55',NULL,NULL),
 (200,'kamruzzaman',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','olba@gmail.com','Javed ','2025-01-18 18:36:54',NULL,NULL,0,'01869546555',NULL,'192.168.150.22',NULL,NULL),
 (201,'Tasmin Jahan',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','Tasminjahan875@gmail.com','Tasmin Jahan','2025-01-18 18:36:54',NULL,NULL,0,'01623578437',NULL,'192.168.150.50',NULL,NULL),
 (204,'sabbir',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','sabbir.001@outlook.com','Sabbir Ahmed','2025-01-18 18:36:54',NULL,NULL,0,'01752485143',NULL,'192.168.150.53',NULL,NULL),
 (206,'jahid',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','jahid1@yahoo.com','Jahidul Islam','2024-12-19 18:27:25',NULL,NULL,0,NULL,'2024-07-04 05:52:52','::1',NULL,NULL),
 (207,'admin',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','towhid1@outlook.com','Towhidul Islam','2024-12-19 18:25:39',NULL,NULL,0,NULL,'2024-07-04 06:03:13','::1',NULL,NULL),
 (208,'didar',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','mddidar199911@gmail.com','Didar','2025-01-18 18:36:54',NULL,NULL,0,'01315451430',NULL,'192.168.150.52',NULL,NULL),
 (209,'alifa',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','alifa@yahoo.com','Alifa','2025-01-18 18:36:54',NULL,NULL,0,'01758917270',NULL,'192.168.150.57',NULL,NULL),
 (210,'hasan',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','hasanmd993@gmail.com','Md Hasan','2025-01-18 17:48:36',NULL,NULL,0,'01822304694',NULL,'192.168.150.7',NULL,NULL),
 (211,'Hamid',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','hamidyahoo22@gmail.com',' Abdul Hamid','2025-01-18 18:36:54',NULL,NULL,0,'01764577191',NULL,'192.168.150.47',NULL,NULL),
 (212,'anayet',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','anayetmd2018@gmail.com','Md. Anayet Hossain','2025-01-18 18:36:54',NULL,NULL,0,'01622737936',NULL,'192.168.150.47',NULL,NULL),
 (213,'azmir',1,'$2y$10$5wp0Z4ssl5zEdSbjLrdZ8exgNZR5HjP7XxzMp7qzsjShbWQujJfHG','azmir@yahoo.com','Azmir','2025-01-18 18:36:54',NULL,NULL,0,'3432432',NULL,'192.168.150.47',NULL,NULL);
/*!40000 ALTER TABLE `core_users` ENABLE KEYS */;


--
-- Definition of table `core_users0`
--

DROP TABLE IF EXISTS `core_users0`;
CREATE TABLE `core_users0` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_users0`
--

/*!40000 ALTER TABLE `core_users0` DISABLE KEYS */;
INSERT INTO `core_users0` (`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'admin','jahid1@yahoo.com',NULL,'$2y$10$02LIGz04kyyFni4VVy619ehpI4JmYcDu9TGziPZwvSOxquyb.kFzC',NULL,'2024-06-12 04:46:24','2024-06-12 04:46:24');
/*!40000 ALTER TABLE `core_users0` ENABLE KEYS */;


--
-- Definition of table `core_vendors`
--

DROP TABLE IF EXISTS `core_vendors`;
CREATE TABLE `core_vendors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `photo` varchar(45) NOT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_vendors`
--

/*!40000 ALTER TABLE `core_vendors` DISABLE KEYS */;
INSERT INTO `core_vendors` (`id`,`name`,`mobile`,`photo`,`address`) VALUES 
 (1,'Abdur Rahman','23432432','1.jpeg','Testsa fsa fsdaf'),
 (2,'Jahidul Islam','23432432342','2.png','Test');
/*!40000 ALTER TABLE `core_vendors` ENABLE KEYS */;


--
-- Definition of table `core_warehouses`
--

DROP TABLE IF EXISTS `core_warehouses`;
CREATE TABLE `core_warehouses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_warehouses`
--

/*!40000 ALTER TABLE `core_warehouses` DISABLE KEYS */;
INSERT INTO `core_warehouses` (`id`,`name`,`city`,`contact`) VALUES 
 (1,'Tajgon','Dhaka','4543534534'),
 (2,'Rangpur','Rangpur','324242342'),
 (3,'Badda','Rampura','3434334324');
/*!40000 ALTER TABLE `core_warehouses` ENABLE KEYS */;


--
-- Definition of table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE `manufacturer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `contact` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturer`
--

/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` (`id`,`name`,`contact`) VALUES 
 (2,'ISL','2345454'),
 (3,'IDB','9390033'),
 (5,'APCL','23432432');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;


--
-- Definition of trigger `ad_manufacturer`
--

DROP TRIGGER /*!50030 IF EXISTS */ `ad_manufacturer`;

DELIMITER $$

CREATE DEFINER = `root`@`localhost` TRIGGER `ad_manufacturer` AFTER DELETE ON `manufacturer` FOR EACH ROW begin
  delete from product where manufacturer_id=old.id;
end $$

DELIMITER ;

--
-- Definition of table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `manufacturer_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`,`name`,`price`,`manufacturer_id`) VALUES 
 (3,'HRM',100000,2),
 (4,'ERP',3000000,2),
 (5,'Car',900000,3),
 (7,'Headphone',2000,5);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


--
-- Definition of table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
CREATE TABLE `receipts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipts`
--

/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
INSERT INTO `receipts` (`id`,`student_id`,`amount`,`created_at`) VALUES 
 (1,1,2000,'2025-02-03 11:28:00'),
 (2,3,3000,'2025-02-03 11:28:00'),
 (3,1,2000,'2025-02-03 11:28:00');
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;


--
-- Definition of table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`,`name`) VALUES 
 (1,'Admin'),
 (2,'Manager'),
 (3,'User');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


--
-- Definition of table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`,`name`,`mobile`) VALUES 
 (1,'Jahid','3434333'),
 (2,'Rahim','4543434'),
 (3,'Karim','4343432');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`name`,`password`,`role_id`) VALUES 
 (1,'jahid2','111111',1),
 (2,'Test333','333333',2),
 (3,'rahim','111111',3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `users1`
--

DROP TABLE IF EXISTS `users1`;
CREATE TABLE `users1` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

/*!40000 ALTER TABLE `users1` DISABLE KEYS */;
INSERT INTO `users1` (`id`,`name`,`created_at`,`password`,`inactive`) VALUES 
 (1,'jahid','2025-02-01 10:50:26','111111',0),
 (2,'rasel','2025-02-01 10:50:26','444444',0),
 (3,'karim','2025-02-01 10:50:26','222222',0);
/*!40000 ALTER TABLE `users1` ENABLE KEYS */;


--
-- Definition of procedure `add_manufacturer`
--

DROP PROCEDURE IF EXISTS `add_manufacturer`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_manufacturer`(name varchar(20),contact varchar(20))
begin
  insert into manufacturer(name,contact)values(name,contact);
end $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of view `v_product_list1`
--

DROP TABLE IF EXISTS `v_product_list1`;
DROP VIEW IF EXISTS `v_product_list1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_product_list1` AS select `p`.`id` AS `id`,`p`.`name` AS `product_name`,`m`.`name` AS `mfg_name` from (`product` `p` join `manufacturer` `m`) where `m`.`id` = `p`.`manufacturer_id` and `p`.`price` > 5000;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
