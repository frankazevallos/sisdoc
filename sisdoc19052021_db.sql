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

USE `sisdata`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `archivadores` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tram_archivador` */

DROP TABLE IF EXISTS `tram_archivador`;

CREATE TABLE `tram_archivador` (
  `idarch` int(11) NOT NULL AUTO_INCREMENT,
  `arch_iddependencia` int(11) DEFAULT NULL,
  `arch_idusuario` int(11) DEFAULT NULL,
  `arch_nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arch_periodo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arch_idusuarioa` int(11) DEFAULT NULL,
  `arch_estado` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `arch_idadmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idarch`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_archivador` */

insert  into `tram_archivador`(`idarch`,`arch_iddependencia`,`arch_idusuario`,`arch_nombre`,`arch_periodo`,`arch_idusuarioa`,`arch_estado`,`created_at`,`updated_at`,`arch_idadmin`) values 
(1,1,1,'ARCHIVADOR CONTABILIDAD','2021',NULL,1,'2021-05-13 02:14:02','2021-05-13 02:14:02',NULL),
(2,1,1,'ARCHIVADOR FINANZAS','2021',NULL,1,'2021-05-13 23:43:30','2021-05-13 23:43:30',NULL);

/*Table structure for table `tram_archivos` */

DROP TABLE IF EXISTS `tram_archivos`;

CREATE TABLE `tram_archivos` (
  `id_archivos` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `file_archivo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_archivos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_archivos` */

/*Table structure for table `tram_dependencia` */

DROP TABLE IF EXISTS `tram_dependencia`;

CREATE TABLE `tram_dependencia` (
  `iddependencia` int(11) NOT NULL AUTO_INCREMENT,
  `depe_nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_abreviado` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_siglaxp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_representante` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_cargo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depe_tipo` int(11) DEFAULT NULL,
  `depe_estado` int(11) DEFAULT NULL,
  `depe_idadmin` int(11) DEFAULT NULL,
  `depe_fecharegistro` date DEFAULT NULL,
  `depe_depende` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`iddependencia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_dependencia` */

insert  into `tram_dependencia`(`iddependencia`,`depe_nombre`,`depe_abreviado`,`depe_siglaxp`,`depe_representante`,`depe_cargo`,`depe_tipo`,`depe_estado`,`depe_idadmin`,`depe_fecharegistro`,`depe_depende`,`created_at`,`updated_at`) values 
(1,'CONTABILIDAD','CONT','C','ANTHONY','GERENTE',1,1,1,'2021-05-11','2','2021-05-13 01:52:21','2021-05-13 23:56:13'),
(2,'FINANZAS','FIN','F','WILLIAM ALBORNOZ','GERENTE',0,1,1,'2021-05-13','2','2021-05-13 23:42:22','2021-05-13 23:42:22'),
(3,'FINANZAS','FIN','F','CARLOS GONZALES','GERENTE DE CONATIBIIDAD',1,1,1,'2021-05-13','2','2021-05-13 23:55:26','2021-05-13 23:55:26');

/*Table structure for table `tram_documento` */

DROP TABLE IF EXISTS `tram_documento`;

CREATE TABLE `tram_documento` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `docu_idorigen` int(11) DEFAULT NULL,
  `docu_tipo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_iddependencia` int(11) DEFAULT NULL,
  `docu_firma` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_cargo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_detalle` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_ext_nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_ext_dni` int(11) DEFAULT NULL,
  `docu_idtipodocumento` int(11) DEFAULT NULL,
  `docu_numero_doc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_siglas_doc` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_idprioridad` int(11) DEFAULT NULL,
  `docu_folios` int(11) DEFAULT NULL,
  `docu_asunto` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_idadmin` int(11) DEFAULT NULL,
  `docu_idusuariodependencia` int(11) DEFAULT NULL,
  `docu_archivo` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_fecharegistro` date DEFAULT NULL,
  `docu_forma` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`iddocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_documento` */

insert  into `tram_documento`(`iddocumento`,`docu_idorigen`,`docu_tipo`,`docu_iddependencia`,`docu_firma`,`docu_cargo`,`docu_detalle`,`docu_ext_nombre`,`docu_ext_dni`,`docu_idtipodocumento`,`docu_numero_doc`,`docu_siglas_doc`,`docu_idprioridad`,`docu_folios`,`docu_asunto`,`docu_idadmin`,`docu_idusuariodependencia`,`docu_archivo`,`docu_fecharegistro`,`docu_forma`,`created_at`,`updated_at`) values 
(1,1,NULL,1,'ANTHONY','GERENTE',NULL,NULL,NULL,1,'OFI','MDM/2022',1,3,'LICENCIA COMERCIAL',1,1,'1620970086_esquema tesis.PDF','2021-05-14',0,'2021-05-14 00:28:06','2021-05-14 00:28:06'),
(2,1,'1',1,'ANTHONY ZEVALLOS GUZMÁN','GERENTE FINANZAS',NULL,NULL,NULL,4,'mem','MDM/2021',3,2,'PRUEBA',1,1,'1621039702_1_133_183_86_1214.pdf','2021-05-14',0,'2021-05-14 19:48:23','2021-05-14 19:48:23');

/*Table structure for table `tram_operacion` */

DROP TABLE IF EXISTS `tram_operacion`;

CREATE TABLE `tram_operacion` (
  `idoperacion` int(11) NOT NULL AUTO_INCREMENT,
  `oper_iddocumento` int(11) DEFAULT NULL,
  `oper_iddependencia` int(11) DEFAULT NULL,
  `oper_idadmin` int(11) DEFAULT NULL,
  `oper_idarchivador` int(11) DEFAULT NULL,
  `oper_idtope` int(11) DEFAULT NULL,
  `oper_forma` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oper_acciones` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oper_idprocesado` int(11) DEFAULT NULL,
  `oper_procesado` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oper_tarchi_id` int(11) DEFAULT NULL,
  `oper_depeid_d` int(11) DEFAULT NULL,
  `oper_usuid_d` int(11) DEFAULT NULL,
  `oper_detalledestino` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oper_fecha` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idoperacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_operacion` */

insert  into `tram_operacion`(`idoperacion`,`oper_iddocumento`,`oper_iddependencia`,`oper_idadmin`,`oper_idarchivador`,`oper_idtope`,`oper_forma`,`oper_acciones`,`oper_idprocesado`,`oper_procesado`,`oper_tarchi_id`,`oper_depeid_d`,`oper_usuid_d`,`oper_detalledestino`,`oper_fecha`,`created_at`,`updated_at`) values 
(1,1,1,1,NULL,1,'0',NULL,NULL,'t',NULL,NULL,NULL,NULL,'2021-05-14','2021-05-14 00:28:06','2021-05-14 00:29:44'),
(2,1,1,1,NULL,2,'0',NULL,1,'f',NULL,1,3,'REVISAR','2021-05-14','2021-05-14 00:29:44','2021-05-14 00:29:44'),
(3,2,1,1,NULL,1,'0',NULL,NULL,'f',NULL,NULL,NULL,NULL,'2021-05-14','2021-05-14 19:48:23','2021-05-14 19:48:23');

/*Table structure for table `tram_prioridad` */

DROP TABLE IF EXISTS `tram_prioridad`;

CREATE TABLE `tram_prioridad` (
  `idprioridad` int(11) NOT NULL AUTO_INCREMENT,
  `prio_descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prio_abreviado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prio_estado` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idprioridad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_prioridad` */

insert  into `tram_prioridad`(`idprioridad`,`prio_descripcion`,`prio_abreviado`,`prio_estado`,`created_at`,`updated_at`) values 
(1,'URGENTE','URG',1,'2021-05-13 01:52:21','2021-05-13 01:51:18'),
(2,'EMERGENCIA','EMR',0,'2021-05-13 01:52:21','2021-05-13 01:55:47'),
(3,'NORMAL','NOR',1,'2021-05-13 01:52:21','2021-05-13 01:51:56'),
(4,'INMEDIATO','INM',1,'2021-05-13 01:52:21','2021-05-13 01:52:21');

/*Table structure for table `tram_recepcion` */

DROP TABLE IF EXISTS `tram_recepcion`;

CREATE TABLE `tram_recepcion` (
  `idrecepcion` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idrecepcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_recepcion` */

/*Table structure for table `tram_tipodocumento` */

DROP TABLE IF EXISTS `tram_tipodocumento`;

CREATE TABLE `tram_tipodocumento` (
  `idtdoc` int(11) NOT NULL AUTO_INCREMENT,
  `tdoc_descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tdoc_abreviado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tdoc_estado` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tdoc_correlativo` int(11) DEFAULT NULL,
  `tdoc_fecha` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idtdoc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_tipodocumento` */

insert  into `tram_tipodocumento`(`idtdoc`,`tdoc_descripcion`,`tdoc_abreviado`,`tdoc_estado`,`tdoc_correlativo`,`tdoc_fecha`,`created_at`,`updated_at`) values 
(1,'SOLICITUD','SOL','1',NULL,NULL,'2021-05-13 01:52:21','2021-05-12 21:21:46'),
(2,'OFICIO','OFI','1',NULL,NULL,'2021-05-13 01:52:21','2021-05-12 21:21:51'),
(3,'CARTA','CAR','1',NULL,NULL,'2021-05-13 01:52:21','2021-05-12 21:21:55'),
(4,'MEMORANDUM','MEM','1',0,'2021-05-12','2021-05-12 21:21:35','2021-05-12 21:21:35');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`idadmin`,`adm_nombre`,`adm_apellido`,`adm_inicial`,`adm_dni`,`adm_cumpleanos`,`adm_telefono`,`adm_iddependencia`,`adm_sisgedo`,`password`,`adm_estado`,`adm_cargo`,`adm_tipousuario`,`adm_email`,`remember_token`,`verification_token`,`created_at`,`updated_at`) values 
(1,'ANTHONY','ZEVALLOS GUZMÁN','AZEVALLOS',74032034,'1993-04-24',957503377,1,74032034,'$2y$10$Mq3UtJIsVlAoYZCJVi8b7uvfxsTVo6JtCis9lHO9GNIrnz3FS.q82',1,'GERENTE FINANZAS',1,'superantho1993@gmail.com','RlO7ouJEtvKMZl2JQcrscIFcrmXfP9DeDsz4vcRn3OOSwa4ZCmyu5phyJij6','mmepTn4WSIXC3ADsnlLn0ztJmzlbMv0Y7SC7fNCF',NULL,'2021-05-13 23:20:25'),
(2,'WILLIAM','ALBORNOZ VARGAS','WALBORNOZ',77788899,'1992-11-02',999888777,1,77788899,'$2y$10$M4FeqkrLkHwvqXsoo6iaxeEZl40z7E5mpLQruu5qr3SZcyZlpfCVu',1,'SUBGERENTE CONTABILIDAD',2,'willy@gmail.com',NULL,NULL,'2021-05-13 01:59:40','2021-05-13 01:59:40'),
(3,'ROXANA','MENDEZ CUEVA','RMENDEZ',77799977,'2000-01-01',999999999,1,77799977,'$2y$10$bETtuKz5T1hSButIgY/LnOtBh4pnd5Ch7aYx7q85vEADGmOloHSYq',1,'GERENTE CONTABILIDAD',2,'roxana@gmail.com',NULL,NULL,'2021-05-13 02:13:01','2021-05-13 02:13:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
