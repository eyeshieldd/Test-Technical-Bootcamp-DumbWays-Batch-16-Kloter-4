/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.11-MariaDB : Database - web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`web` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `web`;

/*Table structure for table `Director` */

DROP TABLE IF EXISTS `Director`;

CREATE TABLE `Director` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Director` */

insert  into `Director`(`id`,`name`) values (7,'kusumaningsih');

/*Table structure for table `Film` */

DROP TABLE IF EXISTS `Film`;

CREATE TABLE `Film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `id_writer` int(11) NOT NULL,
  `id_director` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `rating` float NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_genre` (`id_genre`),
  KEY `id_writer` (`id_writer`),
  KEY `id_director` (`id_director`),
  CONSTRAINT `Film_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `Genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Film_ibfk_2` FOREIGN KEY (`id_writer`) REFERENCES `Writer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Film_ibfk_3` FOREIGN KEY (`id_director`) REFERENCES `Director` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Film` */

insert  into `Film`(`id`,`title`,`durasi`,`id_genre`,`id_writer`,`id_director`,`photo`,`rating`,`deskripsi`) values (25,'Narnia','120 menit',6,3,7,'78-index.jpeg',8.8,'bercerita tentang perjalanan'),(26,'God Of War','120 menit',6,3,7,'568-images.jpeg',4.4,'menceritakan tentang perjalanan seorang dewa');

/*Table structure for table `Genre` */

DROP TABLE IF EXISTS `Genre`;

CREATE TABLE `Genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Genre` */

insert  into `Genre`(`id`,`name`) values (5,'horor'),(6,'action');

/*Table structure for table `Writer` */

DROP TABLE IF EXISTS `Writer`;

CREATE TABLE `Writer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Writer` */

insert  into `Writer`(`id`,`name`) values (3,'jokosusilo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
