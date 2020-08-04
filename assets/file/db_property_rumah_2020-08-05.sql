# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_property_rumah
# Generation Time: 2020-08-04 17:55:22 +0000
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
	(2,1,'AD2','29',989644999,14900000,157,'160',5,2),
	(3,1,'AD3','3',989644999,14900000,157,'160',5,1),
	(4,1,'AD3','8',1489644999,18700000,157,'218-HK',5,1),
	(5,1,'AD4','6',989644999,14900000,157,'160',5,1),
	(6,1,'AD4','12',1489644999,18700000,157,'218-HK',5,1),
	(7,1,'AD5','9',989644999,14900000,157,'160',5,1),
	(9,1,'AD5','15',989644999,14900000,157,'160',5,1),
	(10,1,'AD6','1',1489644999,18700000,157,'218-HK',5,1),
	(11,1,'AD6','3',989644999,14900000,157,'84',5,1),
	(12,2,'AC2','27',1139644999,56982250,170,'160',5,1),
	(13,2,'AC3','35',1139644999,56982250,170,'160',5,1),
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
  `id_trx` int(11) DEFAULT NULL,
  `status_document` enum('1','2','3') DEFAULT '1' COMMENT '1 = lengkap, 2 = belum lengkap, 3 = di acc',
  PRIMARY KEY (`id`),
  KEY `trx` (`id_trx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_document` WRITE;
/*!40000 ALTER TABLE `app_document` DISABLE KEYS */;

INSERT INTO `app_document` (`id`, `ktp`, `kk`, `npwp`, `mutasi_rekening`, `surat_keterangan_karyawan`, `slip_gaji`, `id_trx`, `status_document`)
VALUES
	(37,'1595603975-Capture5.PNG','1595603975-WhatsApp Image 2020-07-18 at 14.00.05.jpeg','1595603975-WhatsApp Image 2020-07-18 at 14.00.27.jpeg','1595603975-WhatsApp Image 2020-07-18 at 13.40.26.jpeg','1595603975-WhatsApp Image 2020-07-18 at 14.08.15.jpeg','1595603975-cetak laporan - berhasil.PNG',7,'2'),
	(38,'1595604585-WhatsApp Image 2020-07-18 at 14.00.05 (1).jpeg','1595604585-WhatsApp Image 2020-07-18 at 14.00.05.jpeg','1595604585-WhatsApp Image 2020-07-18 at 14.07.27.jpeg','1595604585-WhatsApp Image 2020-07-18 at 14.07.27.jpeg','1595604585-WhatsApp Image 2020-07-18 at 14.08.53.jpeg','1595604585-WhatsApp Image 2020-07-18 at 14.01.42.jpeg',8,'2');

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
  `status_pembayaran` enum('1','2','3','4') DEFAULT '1' COMMENT '1 = pending, 2 = konfirmasi, 3 = diterima, 4 = di acc',
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
	(7,12,2,4,'3','1595604664-WhatsApp Image 2020-07-18 at 14.00.05 (1).jpeg','12121212121','33333333',1,'2020-07-24'),
	(8,12,1,5,'3','1595604664-WhatsApp Image 2020-07-18 at 14.00.05 (1).jpeg','4444444','666666',2,'2020-07-24');

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
	(2,'manager 12','manager12@gmail.com',2147483647,'202cb962ac59075b964b07152d234b70','manager'),
	(12,'evae','evaagustin94@gmail.com',1234,'202cb962ac59075b964b07152d234b70','customer'),
	(14,'idin','nuridin50@gmail.com',2147483647,'202cb962ac59075b964b07152d234b70','customer'),
	(15,'alda','alda@gmail.com',2147483647,'202cb962ac59075b964b07152d234b70','admin'),
	(16,'admin','admin@gmail.com',2147483647,'202cb962ac59075b964b07152d234b70','admin');

/*!40000 ALTER TABLE `app_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
