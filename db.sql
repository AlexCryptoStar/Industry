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
  `img_url` text NOT NULL COMMENT 'Product Proof Image Url',
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

/*Data for the table `data_record` */

/*Table structure for table `data_registry` */

DROP TABLE IF EXISTS `data_registry`;

CREATE TABLE `data_registry` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `img_url` text NOT NULL COMMENT 'Product Proof Url',
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `data_registry` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
