# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_property_rumah
# Generation Time: 2020-07-02 20:06:24 +0000
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
  `luast_tanah` char(11) DEFAULT NULL,
  `suku_bunga` int(11) DEFAULT NULL,
  `status_blok` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `property list` (`id_property`),
  CONSTRAINT `property list` FOREIGN KEY (`id_property`) REFERENCES `app_list_property` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_blok` WRITE;
/*!40000 ALTER TABLE `app_blok` DISABLE KEYS */;

INSERT INTO `app_blok` (`id`, `id_property`, `blok`, `no_kavling`, `harga_jual`, `dp`, `luas_bangunan`, `luast_tanah`, `suku_bunga`, `status_blok`)
VALUES
	(1,1,'AD1','20,22,23,25,26,27',989644999,14900000,157,'160',5,1),
	(2,1,'AD2','29,30,31,32,33,35',989644999,14900000,157,'160',5,1),
	(3,1,'AD3','3',989644999,14900000,157,'160',5,1),
	(4,1,'AD3','8',1489644999,18700000,157,'218-HK',5,1),
	(5,1,'AD4','6,1',989644999,14900000,157,'160',5,1),
	(6,1,'AD4','12',1489644999,18700000,157,'218-HK',5,1),
	(7,1,'AD5','6,7,9',989644999,14900000,157,'160',5,1),
	(9,1,'AD5','15,16,17',989644999,14900000,157,'160',5,1),
	(10,1,'AD6','1',1489644999,18700000,157,'218-HK',5,1),
	(11,1,'AD6','36',989644999,14900000,157,'84',5,1),
	(12,2,'AC2','20,22,23,25,26,27',1139644999,56982250,170,'160',5,1),
	(13,2,'AC3','29,30,31,32,33,35',1139644999,56982250,170,'160',5,1),
	(14,2,'AC4','4',1139644999,56982250,170,'160',5,1);

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
  `id_blok` int(11) DEFAULT NULL,
  `status_document` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
	(1,1,'jasmine/1.jpeg','jasmine/2.jpeg','jasmine/3.jpeg','jasmine/4.jpeg','jasmine/5.jpeg'),
	(2,2,'paris/1.jpeg','paris/2.jpeg','paris/3.jpeg','paris/4.jpeg','paris/5.jpeg');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_list_property` WRITE;
/*!40000 ALTER TABLE `app_list_property` DISABLE KEYS */;

INSERT INTO `app_list_property` (`id`, `property_name`, `harga`, `keterangan`, `booking_fee`, `type`, `image`)
VALUES
	(1,'Cluster Jasmine',1450000000,'Bebas Banjir',2500000,'45/72','cover-jasmine.jpeg'),
	(2,'Cluster Paris',1500000000,'Bebas Banjir',2500000,'45/72','cover-paris.jpeg');

/*!40000 ALTER TABLE `app_list_property` ENABLE KEYS */;
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
	(4,20);

/*!40000 ALTER TABLE `app_tenor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_trx
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_trx`;

CREATE TABLE `app_trx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_blok` int(11) DEFAULT NULL,
  `status_pembayaran` enum('1','2') DEFAULT '1' COMMENT '1 = pending, 2 = konfirmasi',
  PRIMARY KEY (`id`),
  KEY `user_role_id` (`id_user`),
  KEY `id blok` (`id_blok`),
  CONSTRAINT `id blok` FOREIGN KEY (`id_blok`) REFERENCES `app_blok` (`id`),
  CONSTRAINT `user_role_id` FOREIGN KEY (`id_user`) REFERENCES `app_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_trx` WRITE;
/*!40000 ALTER TABLE `app_trx` DISABLE KEYS */;

INSERT INTO `app_trx` (`id`, `id_user`, `id_blok`, `status_pembayaran`)
VALUES
	(1,1,1,'1'),
	(2,4,12,'2');

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
	(1,'cs','cs@gmail.com',878345345,'123','customer'),
	(2,'manager','manager@gmail.com',878345345,'123','manager'),
	(3,'admin','admin@gmail.com',878345345,'123','admin'),
	(4,'dewi','dewi@gmail.com',878345345,'123','customer');

/*!40000 ALTER TABLE `app_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
