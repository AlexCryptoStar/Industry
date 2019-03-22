/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.34-MariaDB : Database - industry
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`industry` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `industry`;

/*Table structure for table `data_record` */

DROP TABLE IF EXISTS `data_record`;

CREATE TABLE `data_record` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` text NOT NULL COMMENT 'Product Name',
  `amount_change` int(10) unsigned NOT NULL COMMENT 'Product Reason',
  `standard` varchar(500) NOT NULL COMMENT 'Product Standard',
  `material` varchar(500) NOT NULL COMMENT 'Product Material',
  `count` bigint(20) unsigned DEFAULT NULL COMMENT 'Product Count',
  `weight` double unsigned DEFAULT NULL COMMENT 'Product Weight',
  `length` double unsigned DEFAULT NULL COMMENT 'Product Length',
  `manufacture` text NOT NULL COMMENT 'Product Manufacture',
  `parent_id` bigint(20) unsigned DEFAULT NULL COMMENT 'data_registry table Id',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `data_record` */

insert  into `data_record`(`id`,`name`,`amount_change`,`standard`,`material`,`count`,`weight`,`length`,`manufacture`,`parent_id`,`created_at`,`updated_at`) values (1,'KDKDKD',1,'DKKFJ','FDIFDJI',222,22,22,'DFKDJFK',1,'2019-03-21 08:32:54','2019-03-21 08:32:54'),(2,'DUDUUDUDUDU',1,'HDHFH','FJDJF',22,22,22,'DJFKLDFJL',2,'2019-03-21 08:38:54','2019-03-21 08:38:54'),(3,'DUDUUDUDUDU',2,'HDHFH','FJDJF',12,12,12,'DJFKLDFJL',2,'2019-03-21 08:39:06','2019-03-21 08:39:06');

/*Table structure for table `data_registry` */

DROP TABLE IF EXISTS `data_registry`;

CREATE TABLE `data_registry` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` text NOT NULL COMMENT 'Product Name',
  `amount_change` int(10) unsigned DEFAULT NULL COMMENT 'Product Reason',
  `standard` varchar(500) NOT NULL COMMENT 'Product Standard',
  `material` varchar(500) NOT NULL COMMENT 'Product Material',
  `count` bigint(20) unsigned DEFAULT NULL COMMENT 'Product Count',
  `weight` double unsigned DEFAULT NULL COMMENT 'Product Weight',
  `length` double unsigned DEFAULT NULL COMMENT 'Product Length',
  `manufacture` text NOT NULL COMMENT 'Product Manufacture',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `data_registry` */

insert  into `data_registry`(`id`,`name`,`amount_change`,`standard`,`material`,`count`,`weight`,`length`,`manufacture`,`created_at`,`updated_at`) values (1,'KDKDKD',1,'DKKFJ','FDIFDJI',222,22,22,'DFKDJFK','2019-03-21 08:32:54','2019-03-21 08:32:54'),(2,'DUDUUDUDUDU',1,'HDHFH','FJDJF',10,10,10,'DJFKLDFJL','2019-03-21 08:38:54','2019-03-21 08:39:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
