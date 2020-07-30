-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laravel-shop
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'仪表盘','fa-bar-chart','/',NULL,NULL,'2020-06-14 10:41:45'),(2,0,9,'系统管理','fa-tasks',NULL,NULL,NULL,'2020-07-30 05:25:22'),(3,2,10,'管理员管理','fa-users','auth/users',NULL,NULL,'2020-07-30 05:25:22'),(4,2,11,'角色管理','fa-user','auth/roles',NULL,NULL,'2020-07-30 05:25:22'),(5,2,12,'权限管理','fa-ban','auth/permissions',NULL,NULL,'2020-07-30 05:25:22'),(6,2,13,'菜单管理','fa-bars','auth/menu',NULL,NULL,'2020-07-30 05:25:22'),(7,2,14,'操作日志','fa-history','auth/logs',NULL,NULL,'2020-07-30 05:25:22'),(8,0,2,'用户管理','fa-users','/users',NULL,'2020-06-18 02:02:09','2020-06-18 02:02:15'),(9,0,4,'商品管理','fa-cubes',NULL,NULL,'2020-06-18 03:35:45','2020-07-30 05:23:03'),(10,0,7,'订单管理','fa-rmb','/orders',NULL,'2020-07-08 09:43:51','2020-07-30 05:25:22'),(11,0,8,'优惠券','fa-tags','/coupon_codes',NULL,'2020-07-16 05:51:46','2020-07-30 05:25:22'),(12,0,3,'商品类目','fa-bars','/categories',NULL,'2020-07-29 07:04:44','2020-07-29 07:05:06'),(13,9,5,'普通商品','fa-cube','/products',NULL,'2020-07-30 05:24:20','2020-07-30 05:25:22'),(14,9,6,'众筹商品','fa-flag-checkered','/crowdfunding_products',NULL,'2020-07-30 05:25:09','2020-07-30 05:25:22');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'所有权限','*','','*',NULL,'2020-07-25 06:51:44'),(2,'仪表盘','dashboard','GET','/',NULL,'2020-07-25 06:51:53'),(3,'登录','auth.login','','/auth/login\r\n/auth/logout',NULL,'2020-07-25 06:52:08'),(4,'用户设置','auth.setting','GET,PUT','/auth/setting',NULL,'2020-07-25 06:50:40'),(5,'验证管理','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,'2020-07-25 06:52:29'),(6,'用户管理','users','','/users*','2020-07-25 06:49:47','2020-07-25 06:49:47'),(7,'商品管理','products','','/products*','2020-07-25 06:53:12','2020-07-25 06:53:12'),(8,'订单管理','orders','','/orders*','2020-07-25 06:53:43','2020-07-25 06:53:43'),(9,'优惠码','coupon_codes','','/coupon_codes*','2020-07-25 06:54:17','2020-07-25 06:54:17');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2020-06-14 04:22:43','2020-06-14 04:22:43');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$HQCv8CrGnIJcYAYUjIeRWeQvR/KNU/hKsIMvzwi4xxXJG7gmLIZE.','Administrator',NULL,'MgKKIFgOnUYxJvyubAr0sPf1aUrXYTR77GKitqK17XhSAJec8Xdsxr6XWiHk','2020-06-14 04:22:42','2020-06-14 04:22:42');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-30 14:12:42
