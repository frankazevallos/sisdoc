/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.31 : Database - sisdoc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sisdoc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `sisdoc`;

/*Table structure for table `archivadores` */

DROP TABLE IF EXISTS `archivadores`;

CREATE TABLE `archivadores` (
  `idarch` int(11) NOT NULL,
  `arch_iddependencia` int(11) DEFAULT NULL,
  `arch_idusuario` int(11) DEFAULT NULL,
  `arch_nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arch_periodo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arch_idusuarioa` int(11) DEFAULT NULL,
  `arch_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idarch`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `archivadores` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tram_archivador` */

DROP TABLE IF EXISTS `tram_archivador`;

CREATE TABLE `tram_archivador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_archivador` */

/*Table structure for table `tram_dependencia` */

DROP TABLE IF EXISTS `tram_dependencia`;

CREATE TABLE `tram_dependencia` (
  `iddependencia` int(11) NOT NULL AUTO_INCREMENT,
  `depe_nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_abreviado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_siglaxp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_representante` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_cargo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_tipo` int(11) DEFAULT NULL,
  `depe_estado` int(11) DEFAULT NULL,
  `depe_idadmin` int(11) DEFAULT NULL,
  `depe_fecharegistro` date DEFAULT NULL,
  PRIMARY KEY (`iddependencia`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_dependencia` */

insert  into `tram_dependencia`(`iddependencia`,`depe_nombre`,`depe_abreviado`,`depe_siglaxp`,`depe_representante`,`depe_cargo`,`depe_tipo`,`depe_estado`,`depe_idadmin`,`depe_fecharegistro`) values 
(1,'Contabilidad','cont','c','anthony','gerente',0,1,1,'2021-05-11');

/*Table structure for table `tram_operacion` */

DROP TABLE IF EXISTS `tram_operacion`;

CREATE TABLE `tram_operacion` (
  `idoperacion` int(11) NOT NULL AUTO_INCREMENT,
  `oper_iddocumento` int(11) DEFAULT NULL,
  `oper_iddependencia` int(11) DEFAULT NULL,
  `oper_idadmin` int(11) DEFAULT NULL,
  `oper_idtope` int(11) DEFAULT NULL,
  `oper_forma` int(11) DEFAULT NULL,
  `oper_depeid_d` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oper_usuid_d` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oper_detalledestino` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oper_idprocesado` int(11) DEFAULT NULL,
  `oper_procesado` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oper_fecha` date DEFAULT NULL,
  PRIMARY KEY (`idoperacion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_operacion` */

/*Table structure for table `tram_prioridad` */

DROP TABLE IF EXISTS `tram_prioridad`;

CREATE TABLE `tram_prioridad` (
  `idprioridad` int(11) NOT NULL AUTO_INCREMENT,
  `prio_descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prio_abreviado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prio_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idprioridad`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_prioridad` */

insert  into `tram_prioridad`(`idprioridad`,`prio_descripcion`,`prio_abreviado`,`prio_estado`) values 
(1,'Urgente','U',1),
(2,'Emergencia','E',1),
(3,'Normal','N',1);

/*Table structure for table `tram_tipodocumento` */

DROP TABLE IF EXISTS `tram_tipodocumento`;

CREATE TABLE `tram_tipodocumento` (
  `idtipodocumento` int(11) NOT NULL AUTO_INCREMENT,
  `tdoc_descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tdoc_abreviado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idtipodocumento`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_tipodocumento` */

insert  into `tram_tipodocumento`(`idtipodocumento`,`tdoc_descripcion`,`tdoc_abreviado`) values 
(1,'Solicitud','SOL'),
(2,'Oficio','OFI'),
(3,'Carta','CAR');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `idadmin` int(8) NOT NULL AUTO_INCREMENT,
  `adm_nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_apellido` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_inicial` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_dni` int(11) DEFAULT NULL,
  `adm_cumpleanos` date DEFAULT NULL,
  `adm_telefono` int(11) DEFAULT NULL,
  `adm_iddependencia` int(11) DEFAULT NULL,
  `adm_sisgedo` int(11) DEFAULT NULL,
  `password` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_estado` int(11) DEFAULT NULL,
  `adm_cargo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_tipousuario` int(11) DEFAULT NULL,
  `adm_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`idadmin`,`adm_nombre`,`adm_apellido`,`adm_inicial`,`adm_dni`,`adm_cumpleanos`,`adm_telefono`,`adm_iddependencia`,`adm_sisgedo`,`password`,`adm_estado`,`adm_cargo`,`adm_tipousuario`,`adm_email`) values 
(1,'Anthony','Zevallos','A',74032034,'1993-04-24',957503377,1,74032034,'$2y$10$Mq3UtJIsVlAoYZCJVi8b7uvfxsTVo6JtCis9lHO9GNIrnz3FS.q82',1,'GERENTE',1,'anthony@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
