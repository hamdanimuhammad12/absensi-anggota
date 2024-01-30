/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.14-MariaDB : Database - absen_anggota
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`absen_anggota` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `absen_anggota`;

/*Table structure for table `absen` */

DROP TABLE IF EXISTS `absen`;

CREATE TABLE `absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `absen` */

insert  into `absen`(`id`,`tanggal`,`anggota_id`,`status`,`ket`,`create_at`,`update_at`) values (1,'2024-01-30',1,'Piket Hadir','','2024-01-30 10:39:06','2024-01-30 10:39:06'),(2,'2024-01-30',7,'Piket Hadir','','2024-01-30 10:39:06','2024-01-30 10:39:06'),(3,'2024-01-30',4,'Tidak Hadir','asa','2024-01-30 10:39:06','2024-01-30 10:39:06'),(4,'2024-01-30',5,'Cadangan Piket','','2024-01-30 10:39:06','2024-01-30 10:39:06'),(5,'2024-01-30',2,'Cadangan Piket','','2024-01-30 10:39:06','2024-01-30 10:39:06'),(6,'2024-01-30',8,'Cadangan Piket','','2024-01-30 10:39:06','2024-01-30 10:39:06'),(7,'2024-01-30',3,'Lepas Piket','','2024-01-30 10:39:06','2024-01-30 10:39:06'),(8,'2024-01-30',9,'Lepas Piket','','2024-01-30 10:39:06','2024-01-30 10:39:06'),(9,'2024-01-30',6,'Lepas Piket','','2024-01-30 10:39:06','2024-01-30 10:39:06');

/*Table structure for table `active` */

DROP TABLE IF EXISTS `active`;

CREATE TABLE `active` (
  `id_is_active` int(11) NOT NULL AUTO_INCREMENT,
  `is_active` smallint(5) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `active` */

insert  into `active`(`id_is_active`,`is_active`,`status`) values (1,0,'Tidak Active'),(2,1,'Active');

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `group` char(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `anggota` */

insert  into `anggota`(`id`,`nama`,`jabatan`,`group`) values (1,'Iman','Anggota','A'),(2,'Maulana','Anggota','B'),(3,'Agus','Anggota','C'),(4,'Adon','Anggota','A'),(5,'Adi','Anggota','B'),(6,'Zaki','Anggota','C'),(7,'Yoga','Anggota','A'),(8,'Budi','Anggota','B'),(9,'Yuda','Anggota','C');

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `group` char(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jadwal` */

insert  into `jadwal`(`id`,`tanggal`,`group`) values (1,'2024-01-29','A'),(2,'2024-01-30','B'),(3,'2024-01-31','C'),(4,'2024-02-01','A'),(5,'2024-02-02','B'),(6,'2024-02-03','C');

/*Table structure for table `status_absen` */

DROP TABLE IF EXISTS `status_absen`;

CREATE TABLE `status_absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  `group` char(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `status_absen` */

insert  into `status_absen`(`id`,`status`,`group`) values (1,'Piket Hadir','A'),(2,'Cadangan Piket','B'),(3,'Lepas Piket','C'),(4,'Tidak Hadir','-');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('apel','kelompok') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama`,`username`,`email`,`no_telp`,`role`,`password`,`created_at`,`foto`,`is_active`) values (1,'Pemimpin Aple','pemimpin.apel','pemimpin.apel@gmail.com','080000001','apel','$2y$10$Qiv3i4ddw49Jt/X4Pk3V7O1WQ0Dx92VZQASqkVawRNTRQrbZTK1VC',1627327322,'user.png',1),(2,'Pemimpin Kelompok','pemimpin.kelompok','pemimpin.kelompok@gmail.com','080000002','kelompok','$2y$10$Qiv3i4ddw49Jt/X4Pk3V7O1WQ0Dx92VZQASqkVawRNTRQrbZTK1VC',1627327322,'user.png',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
