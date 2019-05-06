/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.19-MariaDB : Database - fashion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fashion` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `fashion`;

/*Table structure for table `follows` */

DROP TABLE IF EXISTS `follows`;

CREATE TABLE `follows` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_notify` tinyint(3) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `follows` */

/*Table structure for table `new_categories` */

DROP TABLE IF EXISTS `new_categories`;

CREATE TABLE `new_categories` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `position` tinyint(3) NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `new_categories` */

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `news_category_id` int(11) DEFAULT NULL,
  `small_image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `new_category_id` (`news_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `news` */

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) DEFAULT NULL COMMENT '1.Comments 2.Reviews 3.Orders',
  `is_new` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1.True 2.False',
  `id_data` bigint(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `notifications` */

/*Table structure for table `order_details` */

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `order_details` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(11) DEFAULT NULL,
  `name_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1.Waiting 2.Confirm 3.Success 4.Cancel',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `orders` */

/*Table structure for table `p_categories` */

DROP TABLE IF EXISTS `p_categories`;

CREATE TABLE `p_categories` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` bigint(11) DEFAULT NULL,
  `level` tinyint(3) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `p_categories` */

insert  into `p_categories`(`id`,`name`,`description`,`parent_id`,`level`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values (1,'Áo Phông','Áo Phông',NULL,1,'2017-11-27 16:15:08','2017-11-27 16:15:10',NULL,1,1,NULL),(2,'Áo Dài Tay','Áo Dài Tay',NULL,1,'2017-11-27 16:15:45','2017-11-27 16:15:47',NULL,1,1,NULL),(3,'Áo Phông Không Cổ','Áo Phông Không Cổ',1,2,'2017-11-29 16:05:44','2017-11-29 16:05:46',NULL,1,1,NULL),(4,'Áo Phông Có Cổ','Áo Phông Có Cổ',1,2,'2017-11-29 16:06:11','2017-11-29 16:06:13',NULL,1,1,NULL),(5,'Áo Phông Cổ Tròn','Áo Phông Cổ Tròn',3,3,'2017-11-29 16:12:45','2017-11-29 16:12:47',NULL,1,1,NULL);

/*Table structure for table `p_comments` */

DROP TABLE IF EXISTS `p_comments`;

CREATE TABLE `p_comments` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_product_id` bigint(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `p_comments` */

/*Table structure for table `p_product_images` */

DROP TABLE IF EXISTS `p_product_images`;

CREATE TABLE `p_product_images` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_product_id` bigint(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_thumb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_show` tinyint(3) NOT NULL DEFAULT '1',
  `is_main` tinyint(3) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `p_product_images` */

/*Table structure for table `p_product_options` */

DROP TABLE IF EXISTS `p_product_options`;

CREATE TABLE `p_product_options` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_product_id` bigint(11) DEFAULT NULL,
  `display_type` tinyint(3) DEFAULT NULL COMMENT '1.CheckBox 2.SelectBox 3.RadioBox',
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci COMMENT '{"name":"checkbox1","value":"value1"}',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `p_product_options` */

/*Table structure for table `p_products` */

DROP TABLE IF EXISTS `p_products`;

CREATE TABLE `p_products` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_category_id` bigint(11) NOT NULL,
  `p_vendor_id` bigint(11) DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_new` tinyint(3) NOT NULL DEFAULT '0',
  `is_sale` tinyint(3) NOT NULL DEFAULT '0',
  `is_show` tinyint(3) NOT NULL DEFAULT '1',
  `price` bigint(11) DEFAULT NULL,
  `price_sale` bigint(11) DEFAULT NULL,
  `unit` tinyint(3) DEFAULT NULL COMMENT '1.VND 2.USD 3.EURO',
  `quantity` int(10) NOT NULL DEFAULT '0',
  `short_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `p_products` */

/*Table structure for table `p_reviews` */

DROP TABLE IF EXISTS `p_reviews`;

CREATE TABLE `p_reviews` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_product_id` bigint(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `rating_number` tinyint(3) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `p_reviews` */

/*Table structure for table `p_vendors` */

DROP TABLE IF EXISTS `p_vendors`;

CREATE TABLE `p_vendors` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `p_vendors` */

/*Table structure for table `staffs` */

DROP TABLE IF EXISTS `staffs`;

CREATE TABLE `staffs` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_type` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1.Admin 2.Staff',
  `remember_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_token_expired` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `staffs` */

insert  into `staffs`(`id`,`alias`,`username`,`password`,`email`,`first_name`,`last_name`,`full_name`,`author_type`,`remember_token`,`reset_password_token`,`reset_password_token_expired`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values (2,'19c7fba9083b62ee317f3f46e4e894e2f81761cc','admin','$2y$10$1ACB9rEmjxg/Efd6hfXqG.sK8KYtisnznOdjP72ddDUIkQnLIrMbC','lenhhoxung3193@gmail.com','Lenh Ho','Xung','Lenh Ho Xung',1,'T1JwY648PEqYkBtDVoOHyUeYD45RfLwslm3fa34I5AvICJqcGDpHZmIVvt7P',NULL,NULL,'2017-10-16 01:33:37','2017-10-16 01:33:37',NULL,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1.Register 2.Confirm 3.Unregister',
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_access_at` datetime DEFAULT NULL,
  `remember_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_token_expired` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `deleted_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`alias`,`first_name`,`last_name`,`full_name`,`email`,`password`,`status`,`photo`,`phone_number`,`address`,`description`,`last_access_at`,`remember_token`,`reset_password_token`,`reset_password_token_expired`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values (1,'f1ce153b5ff07ffbcc03278383b9efff21ecb2cc','Pham','Tam','Pham Tam','phamtam3193@gmail.com','$2y$10$1ACB9rEmjxg/Efd6hfXqG.sK8KYtisnznOdjP72ddDUIkQnLIrMbC',1,NULL,'0962493756',NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-28 18:23:41','2017-10-28 18:23:43',NULL,1,1,NULL),(2,'021e464835503f111b36653d62a0c23f14d83902','Lenh Ho','Xung','Lenh Ho Xung','lenhhoxung3193@gmail.com','$2y$10$1ACB9rEmjxg/Efd6hfXqG.sK8KYtisnznOdjP72ddDUIkQnLIrMbC',1,NULL,'0962584368','Ninh Giang-Hai Dương',NULL,NULL,NULL,NULL,NULL,'2017-10-28 18:24:46','2017-10-28 18:24:47',NULL,2,2,NULL);

/* Trigger structure for table `p_products` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `p_products` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `p_products` BEFORE INSERT ON `p_products` FOR EACH ROW BEGIN
	SET NEW.`alias`=SHA1(UUID());
    END */$$


DELIMITER ;

/* Trigger structure for table `staffs` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `staffs` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `staffs` BEFORE INSERT ON `staffs` FOR EACH ROW BEGIN
	SET NEW.`alias`=SHA1(UUID());
    END */$$


DELIMITER ;

/* Trigger structure for table `users` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `users` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `users` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
	SET NEW.`alias`=SHA1(UUID());
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
