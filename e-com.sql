/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.31-MariaDB : Database - e-com
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`e-com` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `e-com`;

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` bigint(20) NOT NULL,
  `vehicle_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cities` */

insert  into `cities`(`id`,`city_id`,`vehicle_id`,`name`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,30,'Hà Nội','quanvt','quanvt','quanvt',NULL,NULL,NULL),(6,2,23,'Hà Giang','quanvt','quanvt','quanvt',NULL,NULL,NULL),(7,4,11,'Cao Bằng','quanvt','quanvt','quanvt',NULL,NULL,NULL),(8,6,97,'Bắc Cạn','quanvt','quanvt','quanvt',NULL,NULL,NULL),(9,10,24,'Lào Cai','quanvt','quanvt','quanvt',NULL,NULL,NULL),(10,11,27,'Điện Biên','quanvt','quanvt','quanvt',NULL,NULL,NULL),(11,12,25,'Lai Châu','quanvt','quanvt','quanvt',NULL,NULL,NULL);

/*Table structure for table `follows` */

DROP TABLE IF EXISTS `follows`;

CREATE TABLE `follows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_notify` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '0: false, 1: true',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `follows` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2018_09_14_085910_create_table_users',1),(2,'2018_09_14_090750_create_table_staffs',1),(3,'2018_09_14_091621_create_table_settings',1),(4,'2018_09_14_092051_create_table_p_vendors',1),(5,'2018_09_14_092423_create_table_p_categories',1),(6,'2018_09_14_093621_create_table_p_products',1),(7,'2018_09_14_094943_create_table_p_reviews',1),(8,'2018_09_14_095539_create_table_p_product_options',1),(9,'2018_09_14_095944_create_table_p_product_images',1),(10,'2018_09_14_100256_create_table_p_comments',1),(11,'2018_09_14_100723_create_table_orders',1),(12,'2018_09_14_101118_create_table_order_details',1),(13,'2018_09_14_101426_create_table_notifications',1),(14,'2018_09_14_102657_create_table_follows',1),(15,'2018_09_14_103117_create_table_news_categories',1),(16,'2018_09_14_104556_create_table_news',1),(17,'2018_09_14_105731_create_trigger_table_users',1),(18,'2018_09_14_110408_create_trigger_table_staffs',1),(19,'2018_09_14_110615_create_trigger_table_p_products',1),(20,'2018_09_16_010004_create_trigger_table_news_categories',1),(21,'2019_05_06_064153_add_column_table_users',2),(22,'2019_05_06_071224_create_table_cities',3);

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_category_id` bigint(20) NOT NULL,
  `small_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '0: false, 1: true',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `news` */

/*Table structure for table `news_categories` */

DROP TABLE IF EXISTS `news_categories`;

CREATE TABLE `news_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(3) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci,
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '0: false, 1: true',
  `is_show_on_menu` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '0: false, 1: true',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `news_categories` */

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT NULL COMMENT '1.Comments 2.Reviews 3.Orders',
  `is_new` tinyint(4) NOT NULL COMMENT '0. false, 1. true',
  `id_data` bigint(20) NOT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `notifications` */

/*Table structure for table `order_details` */

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_details` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1.Waiting 2.Confirm 3.Success 4.Cancel',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

/*Table structure for table `p_categories` */

DROP TABLE IF EXISTS `p_categories`;

CREATE TABLE `p_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `p_categories` */

insert  into `p_categories`(`id`,`name`,`description`,`parent_id`,`level`,`en_name`,`en_description`,`slug`,`url_banner`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`,`deleted_at`) values (1,'Biên','Biên',NULL,1,'Biên','Biên','bien',NULL,1,1,NULL,'2019-05-07 07:26:24','2019-05-07 07:26:24',NULL),(2,'Yếm','Yếm',NULL,1,NULL,NULL,'yem',NULL,1,1,NULL,'2019-05-07 07:30:00','2019-05-07 07:30:00',NULL);

/*Table structure for table `p_comments` */

DROP TABLE IF EXISTS `p_comments`;

CREATE TABLE `p_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_product_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `p_comments` */

/*Table structure for table `p_product_images` */

DROP TABLE IF EXISTS `p_product_images`;

CREATE TABLE `p_product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_product_id` bigint(20) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0. false, 1: true',
  `is_main` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0. false, 1: true',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `p_product_images` */

/*Table structure for table `p_product_options` */

DROP TABLE IF EXISTS `p_product_options`;

CREATE TABLE `p_product_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_product_id` bigint(20) unsigned NOT NULL,
  `display_type` tinyint(4) DEFAULT NULL COMMENT '1.CheckBox 2.SelectBox 3.RadioBox 4...',
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `p_product_options` */

/*Table structure for table `p_products` */

DROP TABLE IF EXISTS `p_products`;

CREATE TABLE `p_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_category_id` bigint(20) unsigned NOT NULL,
  `p_vendor_id` bigint(20) unsigned DEFAULT NULL,
  `product_code_fake` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_checkout` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: false, 1: true',
  `is_sale` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: false, 1: true',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0: false, 1: true',
  `price` bigint(20) DEFAULT '0',
  `price_agency1` bigint(20) DEFAULT '0',
  `price_agency2` bigint(20) DEFAULT '0',
  `price_sale` bigint(20) DEFAULT '0',
  `unit` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: VND, 2: USD, 3: EURO',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `image_main_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `en_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`name`,`is_sale`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `p_products` */

insert  into `p_products`(`id`,`alias`,`p_category_id`,`p_vendor_id`,`product_code_fake`,`product_code`,`name`,`name_checkout`,`is_new`,`is_sale`,`is_show`,`price`,`price_agency1`,`price_agency2`,`price_sale`,`unit`,`quantity`,`image_main_url`,`short_description`,`description`,`en_name`,`en_short_description`,`en_description`,`slug`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`,`deleted_at`) values (1,'49df742b84ae4abfcbc5512ee30a24cac9fae7db',2,1,NULL,'13000GGE900','Biên Lead 110',NULL,0,0,0,100,0,0,0,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'bien-lead-110',1,1,NULL,'2019-05-07 08:37:55','2019-05-07 08:58:01','2019-05-07 08:58:01'),(2,'a64a63157a0cfb0ccc8f77f0d31c12ffabf27f3d',1,1,'MTMwMDBHR0U5MDAxMg==','13000GGE90012','Biên Lead 110','Trục khuỷu',0,0,0,100,2300,400,0,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'bien-lead-110-1',1,1,NULL,'2019-05-07 08:47:24','2019-05-07 14:47:14','2019-05-07 14:47:14'),(3,'0d8ba9059af247226d8f266455d633561c42623c',2,1,'MTMwMDBHR0U5MDA=','13000GGE900','Biên Lead 110','Trục khuỷu',0,0,0,100,200,300,0,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'bien-lead-110',1,1,NULL,'2019-05-08 01:38:05','2019-05-08 01:38:05',NULL);

/*Table structure for table `p_reviews` */

DROP TABLE IF EXISTS `p_reviews`;

CREATE TABLE `p_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_product_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `rating_number` tinyint(4) NOT NULL DEFAULT '5' COMMENT 'min: 1 star, max: 5 star',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `p_reviews` */

/*Table structure for table `p_vendors` */

DROP TABLE IF EXISTS `p_vendors`;

CREATE TABLE `p_vendors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `p_vendors` */

insert  into `p_vendors`(`id`,`name`,`phone_number`,`address`,`contact_email`,`description`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`,`deleted_at`) values (1,'Honda','0388587941','44 Kham Thien','honda@gmail.com','Nha cung cap Vinh Phuc',1,1,NULL,'2019-05-07 07:23:35','2019-05-07 07:23:35',NULL);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en' COMMENT 'en: English, vi: Vietnamese',
  `using_for_admin` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0.false, 1.true',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`language`,`using_for_admin`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`,`deleted_at`) values (1,'en',0,1,1,NULL,'2019-05-06 04:14:21','2019-05-06 04:14:21',NULL);

/*Table structure for table `staffs` */

DROP TABLE IF EXISTS `staffs`;

CREATE TABLE `staffs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_type` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '1.Admin 2.Staff',
  `remember_token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_token_expired` datetime DEFAULT NULL,
  `last_access_at` datetime DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `staffs` */

insert  into `staffs`(`id`,`alias`,`username`,`password`,`email`,`first_name`,`last_name`,`full_name`,`author_type`,`remember_token`,`reset_password_token`,`reset_password_token_expired`,`last_access_at`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`,`deleted_at`) values (1,'67e771af6e4f686a87e20f6d1c24fd1ffc9123b1','admin','$2y$10$fxR9/BXD73q8AGVBkPKtFemeFJr48gvUxMbQ5sbeSIWSVLJsLLGsm','lenhhoxung3193@gmail.com','Lenh Ho','Xung','Lenh Ho Xung',1,'6pXSgg0KJ0bmB935VN2Chu5wB6hGxPz4iGjQy09a0Eeo0W3eNrY2vaBIj53I',NULL,NULL,NULL,NULL,1,NULL,'2019-05-06 03:55:55','2019-05-07 01:43:16',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1.Register 2.Confirm 3.Unregister',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_token_expired` datetime DEFAULT NULL,
  `last_access_at` datetime DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`alias`,`first_name`,`last_name`,`full_name`,`email`,`password`,`status`,`photo`,`phone_number`,`address`,`description`,`remember_token`,`reset_password_token`,`city`,`reset_password_token_expired`,`last_access_at`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`,`deleted_at`) values (1,'3d5fca28cc4fae0835c7a17c45854e77c29a49df',NULL,NULL,NULL,'quanvt2@ominext.com','$2y$10$jb1fQ0xQhBNRTSAaPGfM.O2zjQaD7dn1KaN6/HE2SUVs4NJ4H6006',1,NULL,'016887941',NULL,NULL,NULL,NULL,'23',NULL,NULL,1,1,NULL,'2019-05-06 08:02:27','2019-05-06 12:57:45',NULL),(2,'0e034fb8c042c655e849e38bad8272e0e82cc8bf',NULL,NULL,NULL,'quanvt1@ominext.com','$2y$10$RW04ZKFEUQ/WG.Sx3NDYzu7A4aUkOzhYYMOpUp4oNC81j0DMSSZDy',1,NULL,'123',NULL,NULL,NULL,NULL,'25',NULL,NULL,1,1,NULL,'2019-05-06 08:56:18','2019-05-06 13:09:32','2019-05-06 13:09:32'),(3,'ecd4eec1f2c8f2c616461e0023c582e7a0f23ab0',NULL,NULL,NULL,'quanvt2@ominext.com','$2y$10$j/VCKHiS1Pqj4i2F/ioULuPmnh4Du1zttFnLV.h4yEA71Piu4ku8u',1,NULL,NULL,NULL,NULL,NULL,NULL,'30',NULL,NULL,1,1,NULL,'2019-05-06 08:56:59','2019-05-06 13:09:24','2019-05-06 13:09:24'),(4,'2a9a649a2065ced1ef48ad47d25f5acd6b2e3443',NULL,NULL,NULL,'quanvt3@ominext.com','$2y$10$075cAHT3YH5WkIFOrVgBG.FHKusBoXMPbVkUe13qulAxR9YMlWPES',1,NULL,'123123',NULL,NULL,NULL,NULL,'30',NULL,NULL,1,1,NULL,'2019-05-06 10:46:21','2019-05-06 13:09:36','2019-05-06 13:09:36'),(5,'7f5059997d8dbfe56e3e0739939ad8b210f7ac1e',NULL,NULL,NULL,'quanvt4@ominext.com','$2y$10$tnyChgPs7mEiGmFwqVeBu.cC8zTaz1B7788zzSe2EUXOichePwI6K',1,NULL,'123123',NULL,NULL,NULL,NULL,'97',NULL,NULL,1,1,NULL,'2019-05-06 10:53:28','2019-05-06 12:57:49',NULL),(6,'5821315faa989c540517d43b6c4cb7d53a3e5197',NULL,NULL,NULL,'quanvt@ominext.com','$2y$10$tJcqFCRw2xiCQWS1HEIKL.9bMDaa91Lo2/Vxy8kxQGzztEl4kjsJy',1,NULL,'123123',NULL,NULL,NULL,NULL,'30',NULL,NULL,1,1,NULL,'2019-05-06 13:56:25','2019-05-06 13:56:25',NULL),(7,'d75ec32e5184675b3d5ab6b264149d17f4ef7e98',NULL,NULL,NULL,'tampv@gmail.com','$2y$10$pHOol3RKAyU.87CaE60n1.Syka9s1HIN2OxEZKxWDVZEwD4kfGId6',1,NULL,'03587941',NULL,NULL,NULL,NULL,'97',NULL,NULL,1,1,NULL,'2019-05-07 01:42:48','2019-05-07 01:42:48',NULL);

/* Trigger structure for table `news_categories` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `news_categories` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `news_categories` BEFORE INSERT ON `news_categories` FOR EACH ROW BEGIN SET NEW.`alias`=SHA1(UUID()); END */$$


DELIMITER ;

/* Trigger structure for table `p_products` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `p_products` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `p_products` BEFORE INSERT ON `p_products` FOR EACH ROW BEGIN SET NEW.`alias`=SHA1(UUID()); END */$$


DELIMITER ;

/* Trigger structure for table `staffs` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `staffs` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `staffs` BEFORE INSERT ON `staffs` FOR EACH ROW BEGIN SET NEW.`alias`=SHA1(UUID()); END */$$


DELIMITER ;

/* Trigger structure for table `users` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `users` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `users` BEFORE INSERT ON `users` FOR EACH ROW BEGIN SET NEW.`alias`=SHA1(UUID()); END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
