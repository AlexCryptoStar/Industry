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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `data_record` */

insert  into `data_record`(`id`,`img_url`,`name`,`amount_change`,`standard`,`material`,`count`,`weight`,`length`,`manufacture`,`parent_id`,`created_at`,`updated_at`) values (1,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','KDKDKD',1,'DKKFJ','FDIFDJI',222,22,22,'DFKDJFK',1,'2019-03-20 08:32:54','2019-03-20 08:32:54'),(2,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','DUDUUDUDUDU',1,'HDHFH','FJDJF',22,22,22,'DJFKLDFJL',2,'2019-03-21 08:38:54','2019-03-21 08:38:54'),(3,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','DUDUUDUDUDU',2,'HDHFH','FJDJF',12,12,12,'DJFKLDFJL',2,'2019-03-21 08:39:06','2019-03-21 08:39:06'),(4,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','品名品名品名',1,'规格规格规格','规格规格规格',122,33,33,'生产生产生产生产',3,'2019-03-21 08:41:02','2019-03-21 08:41:02'),(5,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','DIDIIDID',1,'fdjjdjfj','fskflsafsl',333,33,333,'kdifisdifisdif',4,'2019-03-21 12:53:50','2019-03-21 12:53:50'),(6,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','NFNENENEN',1,'DNKDFDKFNN','DFMDMFDM',555,555,555,'DKDKDKK',5,'2019-03-21 15:40:25','2019-03-21 15:40:25'),(7,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','HHHFHFHFHH',1,'fhfhh','fhfh',8,8,8,'fvnvnnv',6,'2019-03-23 10:17:48','2019-03-23 10:17:48'),(8,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-OGeUSgJsI2kWcppXFfQk-1.png','DKDKDK',1,'dkk','dkdk',333,33,33,'dkdkdk',7,'2019-03-23 10:22:30','2019-03-23 10:22:30'),(9,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-oO225n7cjT4GVqxzKtsN-2.png','IIDIDIEIEIIEIE',1,'dkdk','dd',22,22,22,'ffff',8,'2019-03-23 10:25:25','2019-03-23 10:25:25'),(10,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-oO225n7cjT4GVqxzKtsN-2.png','ddd',1,'dd','dd',11,1,1,'dd',9,'2019-03-23 10:38:26','2019-03-23 10:38:26'),(11,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-KcfcZiRSaoyjdpcebuVX-1.png','BKBKK',1,'BKBK','BKB',33,33,33,'BKBKBK',10,'2019-03-23 12:40:03','2019-03-23 12:40:03'),(12,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-updated-xaxgFRgn82UwP3afnCcA-2.png','BKBKK',2,'BKBK','BKB',11,11,11,'BKBKBK',10,'2019-03-23 13:05:45','2019-03-23 13:05:45'),(13,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-x8XV80nEWv3SmsgFC67s-1.png','FNFNNFNF',1,'fnfn','ddkkdk',222,22,22,'dkdkdkkd',11,'2019-03-23 13:36:01','2019-03-23 13:36:01'),(14,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-updated-QSeawe77BQ40r0qiGolG-2.png','FNFNNFNF',2,'fnfn','ddkkdk',22,11,11,'dkdkdkkd',11,'2019-03-23 13:36:24','2019-03-23 13:36:24'),(15,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-updated-iBSK4jeRel9sjbFv5K4Z-1.png','FNFNNFNF',1,'fnfn','ddkkdk',1,1,1,'dkdkdkkd',11,'2019-03-23 13:36:48','2019-03-23 13:36:48'),(16,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-D6eMVDpFuRvmhOuF2KbX-3.png','EEEIEIIEI',1,'eiei','eiei',33,33,33,'dkdkdkdk',12,'2019-03-23 14:31:32','2019-03-23 14:31:32'),(17,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-updated-KyRZikVpHRTgxQm0kSHk-1.png','BKBKK',2,'BKBK','BKB',11,11,11,'BKBKBK',10,'2019-03-23 14:38:24','2019-03-23 14:38:24'),(18,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-38cTaQ3VNCJMLBuFG22Q-1.png','DKDKDKDK',1,'dKKD','dkdkd',1111,1.222,11111,'DKDKDKKD',13,'2019-03-23 15:03:09','2019-03-23 15:03:09'),(19,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-updated-OtHJuYFvfefGlMifKHQ2-2.png','DKDKDKDK',2,'dKKD','dkdkd',111,1.2,111,'DKDKDKKD',13,'2019-03-23 15:03:37','2019-03-23 15:03:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `data_registry` */

insert  into `data_registry`(`id`,`img_url`,`name`,`amount_change`,`standard`,`material`,`count`,`weight`,`length`,`manufacture`,`created_at`,`updated_at`) values (1,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BkJnZ2WRDjKnohlyNox9-test5.png','KDKDKD',1,'DKKFJ','FDIFDJI',222,22,22,'DFKDJFK','2019-03-20 08:32:54','2019-03-20 08:32:54'),(2,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-FummnB0d7ZaBjdBFAcLk-test5.png','DUDUUDUDUDU',1,'HDHFH','FJDJF',10,10,10,'DJFKLDFJL','2019-03-21 08:38:54','2019-03-21 08:39:06'),(3,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','品名品名品名',1,'规格规格规格','规格规格规格',122,33,33,'生产生产生产生产','2019-03-21 08:41:02','2019-03-21 08:41:02'),(4,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','DIDIIDID',1,'fdjjdjfj','fskflsafsl',333,33,333,'kdifisdifisdif','2019-03-21 12:53:50','2019-03-21 12:53:50'),(5,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','NFNENENEN',1,'DNKDFDKFNN','DFMDMFDM',555,555,555,'DKDKDKK','2019-03-21 15:40:25','2019-03-21 15:40:25'),(6,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-BYaoSdogYT2YDXhsQh2L-test5.png','HHHFHFHFHH',1,'fhfhh','fhfh',8,8,8,'fvnvnnv','2019-03-23 10:17:48','2019-03-23 10:17:48'),(7,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-OGeUSgJsI2kWcppXFfQk-1.png','DKDKDK',1,'dkk','dkdk',333,33,33,'dkdkdk','2019-03-23 10:22:30','2019-03-23 10:22:30'),(8,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-oO225n7cjT4GVqxzKtsN-2.png','IIDIDIEIEIIEIE',1,'dkdk','dd',22,22,22,'ffff','2019-03-23 10:25:25','2019-03-23 10:25:25'),(9,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-oO225n7cjT4GVqxzKtsN-2.png','ddd',1,'dd','dd',11,1,1,'dd','2019-03-23 10:38:26','2019-03-23 10:38:26'),(10,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-updated-KyRZikVpHRTgxQm0kSHk-1.png','BKBKK',1,'BKBK','BKB',11,11,11,'BKBKBK','2019-03-23 12:40:03','2019-03-23 14:38:24'),(11,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-updated-iBSK4jeRel9sjbFv5K4Z-1.png','FNFNNFNF',1,'fnfn','ddkkdk',201,12,12,'dkdkdkkd','2019-03-23 13:36:01','2019-03-23 13:36:48'),(12,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-D6eMVDpFuRvmhOuF2KbX-3.png','EEEIEIIEI',1,'eiei','eiei',33,33,33,'dkdkdkdk','2019-03-23 14:31:32','2019-03-23 14:31:32'),(13,'sergey-1251028544.cos.ap-guangzhou.myqcloud.com/proof-updated-OtHJuYFvfefGlMifKHQ2-2.png','DKDKDKDK',1,'dKKD','dkdkd',1000,0.02200000000000002,11000,'DKDKDKKD','2019-03-23 15:03:09','2019-03-23 15:03:37');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
