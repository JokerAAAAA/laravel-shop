-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laravel-shop
-- ------------------------------------------------------
-- Server version	8.0.21

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
INSERT INTO `admin_menu` VALUES (1,0,1,'仪表盘','fa-bar-chart','/',NULL,NULL,NULL),(2,0,10,'系统管理','fa-tasks',NULL,NULL,NULL,'2020-08-28 01:50:04'),(3,2,11,'管理员管理','fa-users','auth/users',NULL,NULL,'2020-08-28 01:50:04'),(4,2,12,'角色管理','fa-user','auth/roles',NULL,NULL,'2020-08-28 01:50:04'),(5,2,13,'权限管理','fa-ban','auth/permissions',NULL,NULL,'2020-08-28 01:50:04'),(6,2,14,'菜单管理','fa-bars','auth/menu',NULL,NULL,'2020-08-28 01:50:04'),(7,2,15,'操作日志','fa-history','auth/logs',NULL,NULL,'2020-08-28 01:50:04'),(8,0,2,'用户管理','fa-users','/users',NULL,NULL,NULL),(9,0,4,'商品管理','fa-cubes',NULL,NULL,NULL,'2020-08-28 01:50:04'),(10,0,8,'订单管理','fa-rmb','/orders',NULL,NULL,'2020-08-28 01:50:04'),(11,0,9,'优惠券','fa-tags','/coupon_codes',NULL,NULL,'2020-08-28 01:50:04'),(12,0,3,'类目管理','fa-bars','/categories',NULL,'2020-08-14 15:00:29','2020-08-28 01:58:13'),(13,9,5,'普通商品','fa-cube','/products',NULL,'2020-08-14 15:01:55','2020-08-28 01:50:04'),(14,9,6,'众筹商品','fa-flag-checkered','/crowdfunding_products',NULL,'2020-08-20 05:52:43','2020-08-28 01:50:04'),(15,9,7,'秒杀商品','fa-bolt','/seckill_products',NULL,'2020-08-21 01:49:41','2020-08-28 01:58:13');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'所有权限','*','','*',NULL,NULL),(2,'仪表盘','dashboard','GET','/',NULL,NULL),(3,'登录','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'用户设置','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'验证管理','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'用户管理','users','','/users*',NULL,NULL),(7,'商品管理','products','','/products*',NULL,NULL),(8,'订单管理','orders','','/orders*',NULL,NULL),(9,'优惠码','coupon_codes','','/coupon_codes*',NULL,NULL);
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
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator',NULL,NULL);
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
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$z62lUE5JqdqmFVBTuSGNz.a8jmrWUpQUTOz/4LVey76FifJU.6U3C','管理员',NULL,'heevqPfGr3HxGiE35kbVEW78iKbi7WCcEausJlS9Ajc8HkRFe0RzcdmWkHxE','2020-08-14 14:31:46','2020-08-14 14:31:46');
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

-- Dump completed on 2020-08-28 10:00:50
