# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_property_rumah
# Generation Time: 2020-07-16 14:53:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table app_blok
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_blok`;

CREATE TABLE `app_blok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_property` int(11) DEFAULT NULL,
  `blok` varchar(20) DEFAULT NULL,
  `no_kavling` varchar(50) DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `dp` double DEFAULT NULL,
  `luas_bangunan` int(11) DEFAULT NULL,
  `luas_tanah` char(11) DEFAULT NULL,
  `suku_bunga` int(11) DEFAULT NULL,
  `status_blok` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `property list` (`id_property`),
  CONSTRAINT `property list` FOREIGN KEY (`id_property`) REFERENCES `app_list_property` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_blok` WRITE;
/*!40000 ALTER TABLE `app_blok` DISABLE KEYS */;

INSERT INTO `app_blok` (`id`, `id_property`, `blok`, `no_kavling`, `harga_jual`, `dp`, `luas_bangunan`, `luas_tanah`, `suku_bunga`, `status_blok`)
VALUES
	(1,1,'AD1','20',989644999,14900000,157,'160',5,2),
	(2,1,'AD2','29',989644999,14900000,157,'160',5,1),
	(3,1,'AD3','3',989644999,14900000,157,'160',5,2),
	(4,1,'AD3','8',1489644999,18700000,157,'218-HK',5,2),
	(5,1,'AD4','6',989644999,14900000,157,'160',5,2),
	(6,1,'AD4','12',1489644999,18700000,157,'218-HK',5,2),
	(7,1,'AD5','9',989644999,14900000,157,'160',5,2),
	(9,1,'AD5','15',989644999,14900000,157,'160',5,2),
	(10,1,'AD6','1',1489644999,18700000,157,'218-HK',5,2),
	(11,1,'AD6','3,6',989644999,14900000,157,'84',5,1),
	(12,2,'AC2','27',1139644999,56982250,170,'160',5,2),
	(13,2,'AC3','35',1139644999,56982250,170,'160',5,2),
	(14,2,'AC4','4',1139644999,56982250,170,'160',5,2);

/*!40000 ALTER TABLE `app_blok` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_document
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_document`;

CREATE TABLE `app_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ktp` varchar(200) DEFAULT NULL,
  `kk` varchar(200) DEFAULT NULL,
  `npwp` varchar(200) DEFAULT NULL,
  `mutasi_rekening` varchar(200) DEFAULT NULL,
  `surat_keterangan_karyawan` varchar(200) DEFAULT NULL,
  `slip_gaji` varchar(200) DEFAULT NULL,
  `id_trx` int(11) DEFAULT NULL,
  `status_document` enum('1','2') DEFAULT '1' COMMENT '1 = lengkap, 2 = belum lengkap',
  PRIMARY KEY (`id`),
  KEY `trx` (`id_trx`),
  CONSTRAINT `trx` FOREIGN KEY (`id_trx`) REFERENCES `app_trx` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_document` WRITE;
/*!40000 ALTER TABLE `app_document` DISABLE KEYS */;

INSERT INTO `app_document` (`id`, `ktp`, `kk`, `npwp`, `mutasi_rekening`, `surat_keterangan_karyawan`, `slip_gaji`, `id_trx`, `status_document`)
VALUES
	(28,'1594633606-Capture9.PNG','1594633606-Capturel.PNG','1594633606-Capture5.PNG','1594633606-Capture4.PNG','1594633606-Capturee.PNG','1594633606-Capturem.PNG',33,'2'),
	(29,'1594687851-Capture8.PNG','1594687851-Capture3.PNG','1594687851-Capture9.PNG','1594687851-Capture6.PNG','1594687851-Capturem.PNG','1594687851-Capture9.PNG',34,'2'),
	(30,'1594865560-WhatsApp Image 2020-06-08 at 15.09.31.jpeg','1594865560-WhatsApp Image 2020-06-22 at 08.52.01.jpeg','1594865560-IMG20200714112520.jpg','1594865560-IMG20200714112551.jpg','1594865560-kendil.png','1594865560-Screenshot_20200308-164637_Settings_5232.jpg',35,'1');

/*!40000 ALTER TABLE `app_document` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_gallery`;

CREATE TABLE `app_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_property` int(11) DEFAULT NULL,
  `img_1` varchar(50) DEFAULT NULL,
  `img_2` varchar(50) DEFAULT NULL,
  `img_3` varchar(50) DEFAULT NULL,
  `img_4` varchar(50) DEFAULT NULL,
  `img_5` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property gallery` (`id_property`),
  CONSTRAINT `property gallery` FOREIGN KEY (`id_property`) REFERENCES `app_list_property` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_gallery` WRITE;
/*!40000 ALTER TABLE `app_gallery` DISABLE KEYS */;

INSERT INTO `app_gallery` (`id`, `id_property`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`)
VALUES
	(1,1,'jasmine_1.jpeg','jasmine_2.jpeg','jasmine_3.jpeg','jasmine_4.jpeg','jasmine_5.jpeg'),
	(2,2,'paris_1.jpeg','paris_2.jpeg','paris_3.jpeg','paris_4.jpeg','paris_5.jpeg');

/*!40000 ALTER TABLE `app_gallery` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_list_property
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_list_property`;

CREATE TABLE `app_list_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(50) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `booking_fee` double DEFAULT NULL,
  `type` char(10) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_list_property` WRITE;
/*!40000 ALTER TABLE `app_list_property` DISABLE KEYS */;

INSERT INTO `app_list_property` (`id`, `property_name`, `harga`, `keterangan`, `booking_fee`, `type`, `image`, `deskripsi`)
VALUES
	(1,'Cluster Jasmine',1450000000,'Bebas Banjir',3500000,'45/72','cover-jasmine.jpeg','Cluster Jasmine merupakan cluster kedua yang dikembangkan di kawasan baru Taman Puri Cendana yang hadir sebagai hunian yang mendukung gaya hidup modern yang seimbang. Cluster Baru di Taman Puri Cendana, Tambun Selatan ini bergaya arsitektur modern kontemporer dengan citra yang natural dan elegant serta dilengkapi dengan berbagai fasilitas yang menunjang.'),
	(2,'Cluster Parise',1500000000,'Bebas Banjir',3500000,'45/72','cover-paris.jpeg','PARIS RESIDENCE merupakan cluster kedua yang dikembangkan di kawasan baru Taman Puri Cendana yang hadir sebagai hunian yang mendukung gaya hidup modern yang seimbang. Cluster Baru di Taman Puri Cendana, Tambun Selatan ini bergaya arsitektur modern dengan citra yang natural dan elegant serta dilengkapi dengan berbagai fasilitas yang menunjang.');

/*!40000 ALTER TABLE `app_list_property` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_role`;

CREATE TABLE `app_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_role` WRITE;
/*!40000 ALTER TABLE `app_role` DISABLE KEYS */;

INSERT INTO `app_role` (`id`, `kategori`)
VALUES
	(1,'admin'),
	(2,'customer'),
	(3,'manager');

/*!40000 ALTER TABLE `app_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_tenor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_tenor`;

CREATE TABLE `app_tenor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah_tenor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_tenor` WRITE;
/*!40000 ALTER TABLE `app_tenor` DISABLE KEYS */;

INSERT INTO `app_tenor` (`id`, `jumlah_tenor`)
VALUES
	(1,5),
	(2,10),
	(3,15),
	(4,20),
	(5,0);

/*!40000 ALTER TABLE `app_tenor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_trx
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_trx`;

CREATE TABLE `app_trx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_blok` int(11) DEFAULT NULL,
  `id_tenor` int(11) DEFAULT NULL,
  `status_pembayaran` enum('1','2') DEFAULT '1' COMMENT '1 = pending, 2 = konfirmasi',
  `bukti_pembayaran` text,
  `no_ktp` char(50) DEFAULT NULL,
  `no_npwp` char(50) DEFAULT NULL,
  `tipe_pembayaran` int(11) DEFAULT '1' COMMENT '1 = kpr, 2 = cash keras, 3 = cash bertahap',
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_role_id` (`id_user`),
  KEY `id blok` (`id_blok`),
  KEY `tenor` (`id_tenor`),
  CONSTRAINT `id blok` FOREIGN KEY (`id_blok`) REFERENCES `app_blok` (`id`),
  CONSTRAINT `tenor` FOREIGN KEY (`id_tenor`) REFERENCES `app_tenor` (`id`),
  CONSTRAINT `user_role_id` FOREIGN KEY (`id_user`) REFERENCES `app_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_trx` WRITE;
/*!40000 ALTER TABLE `app_trx` DISABLE KEYS */;

INSERT INTO `app_trx` (`id`, `id_user`, `id_blok`, `id_tenor`, `status_pembayaran`, `bukti_pembayaran`, `no_ktp`, `no_npwp`, `tipe_pembayaran`, `created_at`)
VALUES
	(20,4,1,1,'2','1594107558-bukti_pembayaran.jpg',NULL,NULL,1,'2020-07-07'),
	(21,1,1,1,'2','1594107558-bukti_pembayaran.jpg',NULL,NULL,1,'2020-07-07'),
	(22,7,7,4,'2','hubungi kami.png',NULL,NULL,1,'2020-07-09'),
	(23,7,14,1,'2',NULL,NULL,NULL,1,'2020-07-09'),
	(24,9,2,4,'1',NULL,'124324324234','324234234234',2,'2020-07-11'),
	(27,9,9,5,'1',NULL,'5423411111111','0898234234',3,'2020-07-12'),
	(28,9,6,5,'2',NULL,'5423411111111','0898234234',2,'2020-07-12'),
	(29,9,12,2,'2','bukti_pembayaran.jpg','9999999999','0898234234',1,'2020-07-12'),
	(30,12,3,5,'2','Capturem.PNG','1234567890','4545454545',3,'2020-07-13'),
	(31,12,13,2,'2','Capturem.PNG','1111111','2222222222',1,'2020-07-13'),
	(32,12,13,2,'2','Capturem.PNG','1111111','2222222222',1,'2020-07-13'),
	(33,12,10,4,'2','1594633661-Capturem.PNG','12121212','131313131',1,'2020-07-13'),
	(34,12,4,3,'2',NULL,'89834543543','2222223333',1,'2020-07-14'),
	(35,15,1,5,'2','unnamed.jpg','232323','23232323111',3,'2020-07-16');

/*!40000 ALTER TABLE `app_trx` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_user`;

CREATE TABLE `app_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` int(13) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `user_role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_user` WRITE;
/*!40000 ALTER TABLE `app_user` DISABLE KEYS */;

INSERT INTO `app_user` (`id`, `name`, `email`, `phone_number`, `password`, `user_role`)
VALUES
	(1,'gleneng','glen@gmail.com',12345,'cc03e747a6afbbcbf8be7668acfebee5','customer'),
	(2,'manager','manager@gmail.com',878345345,'202cb962ac59075b964b07152d234b70','manager'),
	(3,'admin','admin@gmail.com',878345345,'202cb962ac59075b964b07152d234b70','admin'),
	(4,'dewi','dewi@gmail.com',878345345,'202cb962ac59075b964b07152d234b70','customer'),
	(6,'deka123','deka@gmail.com',2147483647,'cc03e747a6afbbcbf8be7668acfebee5','customer'),
	(7,'aaaaaa11','aaa@gmail.com',123456678,'202cb962ac59075b964b07152d234b70','customer'),
	(9,'idin','nuridin50@gmail.com',2147483647,'202cb962ac59075b964b07152d234b70','customer'),
	(12,'evae','evaagustin94@gmail.com',1234,'202cb962ac59075b964b07152d234b70','customer'),
	(14,'lele','evaagustin94@gmail.com',11111,'202cb962ac59075b964b07152d234b70','customer'),
	(15,'yuyu','nuridin.mu23@gmail.com',222233,'202cb962ac59075b964b07152d234b70','customer');

/*!40000 ALTER TABLE `app_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
