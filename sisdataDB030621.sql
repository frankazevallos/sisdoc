/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.13-MariaDB : Database - sisdata2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sisdata2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `sisdata2`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `adm_nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_apellido` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_inicial` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_dni` int(11) DEFAULT NULL,
  `adm_cumpleanos` date DEFAULT NULL,
  `adm_telefono` int(11) DEFAULT NULL,
  `adm_iddependencia` int(11) DEFAULT NULL,
  `adm_sisgedo` int(11) DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_estado` int(11) DEFAULT NULL,
  `adm_cargo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adm_tipousuario` int(11) DEFAULT NULL,
  `adm_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin` */

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_archivador` */

insert  into `tram_archivador`(`idarch`,`arch_iddependencia`,`arch_idusuario`,`arch_nombre`,`arch_periodo`,`arch_idusuarioa`,`arch_estado`,`created_at`,`updated_at`,`arch_idadmin`) values 
(1,1,1,'ARCHIVADOR CONTABILIDAD','2021',NULL,1,'2021-05-13 02:14:02','2021-05-13 02:14:02',NULL),
(2,1,1,'ARCHIVADOR FINANZAS','2021',NULL,1,'2021-05-13 23:43:30','2021-05-13 23:43:30',NULL),
(3,6,1,'ARCHIVADOR S. G. DE TRÁMITE DOCUMENTARIO Y ARCHIVO','2021',1,1,'2021-05-23 17:17:07','2021-05-23 17:17:07',NULL);

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

insert  into `tram_archivos`(`id_archivos`,`created_at`,`updated_at`,`file_archivo`) values 
(1,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_dependencia` */

insert  into `tram_dependencia`(`iddependencia`,`depe_nombre`,`depe_abreviado`,`depe_siglaxp`,`depe_representante`,`depe_cargo`,`depe_tipo`,`depe_estado`,`depe_idadmin`,`depe_fecharegistro`,`depe_depende`,`created_at`,`updated_at`) values 
(1,'SUB GERENCIA DE PLANIFICACIÓN Y MODERNIZACIÓN INSTITUCIONAL','SGPMI','SGPMI','S. G. DE PLANIFICACIÓN Y MODERNIZACIÓN INSTITUCIONAL','S. G. DE PLANIFICACIÓN Y MODERNIZACIÓN INSTITUCIONAL',1,1,1,'2021-05-11','10','2021-05-13 01:52:21','2021-06-03 13:38:08'),
(2,'GERENCIA DE DESARROLLO ECONÓMICO','GGEL','GGEL','GERENTE DE DESARROLLO ECONÓMICO','GERENTE DE DESARROLLO ECONÓMICO',0,1,1,'2021-05-13','2','2021-05-13 23:42:22','2021-06-03 14:00:05'),
(3,'SUB GERENCIA DE COMUNICACIONES E IMAGEN','SGRPEI','SGRPEI','S. G. DE COMUNICACIONES E IMAGEN','S. G. DE COMUNICACIONES E IMAGEN',1,1,1,'2021-05-13','5','2021-05-13 23:55:26','2021-06-03 13:50:20'),
(4,'CONTRALORIA','CR','CR','ANDREA MOLINA','GERENTE PLANIFICACION',2,1,3,'2021-05-19',NULL,'2021-05-19 12:46:35','2021-05-19 12:46:35'),
(5,'GERENCIA DE SECRETARIA GENERAL','GSG','GSG','GERENTE DE SECRETARIA GENERAL','GERENTE DE SECRETARIA GENERAL',0,1,1,'2021-05-20',NULL,'2021-05-20 16:39:15','2021-06-03 12:35:34'),
(6,'SUB GERENCIA  DE TRÁMITE  DOCUMENTARIO Y  ARCHIVO CENTRAL','SGTDAC','SGTDAC','S. G. DE TRÁMITE DOCUMENTARIO Y ARCHIVO CENTRAL','S. G. DE TRÁMITE DOCUMENTARIO Y ARCHIVO CENTRAL',1,1,1,'2021-05-20','5','2021-05-20 16:41:23','2021-06-03 12:44:09'),
(7,'ANTHONY ZEVALLOS GUZMAN','74032034','AZG','ANTHONY ZEVALLOS GUZMAN','CIUDADANO',2,1,3,'2021-05-30',NULL,'2021-05-30 22:47:01','2021-05-30 22:47:01'),
(8,'GERENCIA DE ADMINISTRACION FINANCIERA','GDA','GDA','GERENTE DE ADMINISTRACION FINANCIERA','GERENTE DE ADMINISTRACION FINANCIERA',0,1,1,'2021-06-03',NULL,'2021-06-03 12:29:51','2021-06-03 12:29:51'),
(9,'GERENCIA DE  ASESORIA JURIDICA','GAJ','GAJ','GERENTE DE ASESORIA JURIDICA','GERENTE DE ASESORIA JURIDICA',0,1,1,'2021-06-03',NULL,'2021-06-03 12:30:44','2021-06-03 12:30:44'),
(10,'GERENCIA DE PLANEAMIENTO Y PRESUPUESTO','GPP','GPP','GERENTE DE PLANEAMIENTO Y PRESUPUESTO','GERENTE DE PLANEAMIENTO Y PRESUPUESTO',0,1,1,'2021-06-03',NULL,'2021-06-03 12:32:28','2021-06-03 12:32:28'),
(11,'GERENCIA DE DESARROLLO URBANO Y RURAL','GDUR','GDUR','GERENTE DE DESARROLLO URBANO Y RURAL','GERENTE DE DESARROLLO URBANO Y RURAL',0,1,1,'2021-06-03',NULL,'2021-06-03 12:33:38','2021-06-03 12:33:38'),
(12,'GERENCIA DE DESARROLLO SOCIAL','GDS','GDS','GERENTE DE DESARROLLO SOCIAL','GERENTE DE DESARROLLO SOCIAL',0,1,1,'2021-06-03',NULL,'2021-06-03 12:34:31','2021-06-03 12:34:31'),
(13,'GERENCIA DE SOSTENIBILIDAD AMBIENTAL','GMADE','GMADE','GERENTE DE SOSTENIBILIDAD AMBIENTAL','GERENTE DE SOSTENIBILIDAD AMBIENTAL',0,1,1,'2021-06-03',NULL,'2021-06-03 12:37:04','2021-06-03 13:57:08'),
(14,'GERENCIA DE ADMINISTRACIÓN TRIBUTARIA','GATR','GATR','GERENTE DE ADMINISTRACIÓN TRIBUTARIA','GERENTE DE ADMINISTRACIÓN TRIBUTARIA',0,1,1,'2021-06-03',NULL,'2021-06-03 12:38:18','2021-06-03 13:59:25'),
(15,'GERENCIA DE SEGURIDAD CIUDADANA','GSC','GSC','GERENTE DE SEGURIDAD CIUDADANA','GERENTE DE SEGURIDAD CIUDADANA',0,1,1,'2021-06-03',NULL,'2021-06-03 12:39:12','2021-06-03 12:39:12'),
(16,'SUB GERENCIA DE  PRESUPUESTO','SGP','SGP','S. G. DE  PRESUPUESTO','S. G. DE  PRESUPUESTO',1,1,1,'2021-06-03','10','2021-06-03 12:49:08','2021-06-03 12:49:08'),
(17,'SUB GERENCIA DE PROGRAMACIÓN MUTIANUAL DE INVERSIONES','SGPMI','SGPMI','S. G. DE PROGRAMACIÓN MUTIANUAL DE INVERSIONES','S. G. DE PROGRAMACIÓN MUTIANUAL DE INVERSIONES',1,1,1,'2021-06-03','10','2021-06-03 12:50:41','2021-06-03 12:50:41'),
(18,'SUB GERENCIA DE FORMULACIÓN DE PROYECTOS DE INVERSION PÚBLICA','SGFPIP','SGFPIP','S. G. DE FORMULACIÓN DE PROYECTOS DE INVERSION PÚBLICA','S. G. DE FORMULACIÓN DE PROYECTOS DE INVERSION PÚBLICA',1,1,1,'2021-06-03','10','2021-06-03 12:52:17','2021-06-03 12:52:17'),
(19,'SUB GERENCIA DE RECURSOS HUMANOS','SGRH','SGRH','S. G. DE RECURSOS HUMANOS','S. G. DE RECURSOS HUMANOS',1,1,1,'2021-06-03','8','2021-06-03 13:37:46','2021-06-03 13:37:46'),
(20,'SUB GERENCIA DE CONTABILIDAD','SGC','SGC','S. G. DE CONTABILIDAD','S. G. DE CONTABILIDAD',1,1,1,'2021-06-03','8','2021-06-03 13:39:29','2021-06-03 13:39:29'),
(21,'SUB GERENCIA DE TESORERÍA','SGT','SGT','S. G. DE TESORERÍA','S. G. DE TESORERÍA',1,1,1,'2021-06-03','8','2021-06-03 13:40:15','2021-06-03 13:40:15'),
(22,'SUB GERENCIA DE ABASTECIMIENTOS','SGA','SGA','S. G. DE ABASTECIMIENTOS','S. G. DE ABASTECIMIENTOS',1,1,1,'2021-06-03','8','2021-06-03 13:41:21','2021-06-03 13:41:21'),
(23,'SUB GERENCIA DE CONTROL PATRIMONIAL Y SERVICIOS GENERALES','SGCPSG','SGCPSG','S.G. DE CONTROL PATRIMONIAL Y SERVICIOS GENERALES','S.G. DE CONTROL PATRIMONIAL Y SERVICIOS GENERALES',1,1,1,'2021-06-03','8','2021-06-03 13:42:35','2021-06-03 13:42:35'),
(24,'SUB GERENCIA DE OBRAS Y MAQUINARIA','SGOM','SGOM','S. G. DE OBRAS Y MAQUINARIA','S. G. DE OBRAS Y MAQUINARIA',1,1,1,'2021-06-03','11','2021-06-03 13:44:19','2021-06-03 13:44:19'),
(25,'SUB GERENCIA DE ESTUDIOS Y PROYECTOS','SGEP','SGEP','S. G. DE ESTUDIOS Y PROYECTOS','S. G. DE ESTUDIOS Y PROYECTOS',1,1,1,'2021-06-03','11','2021-06-03 13:45:16','2021-06-03 13:45:16'),
(26,'SUB GERENCIA DE PLANIFICACIÓN URBANA Y CATASTRO','SGPUC','SGPUC','S. G. DE PLANIFICACIÓN URBANA Y CATASTRO','S. G. DE PLANIFICACIÓN URBANA Y CATASTRO',1,1,1,'2021-06-03','11','2021-06-03 13:46:21','2021-06-03 13:46:21'),
(27,'SUB GERENCIA DE GESTIÓN DE RIESGOS Y DESASTRES','SGGRD','SGGRD','S. G. DE GESTIÓN DE RIESGOS Y DESASTRES','S. G. DE GESTIÓN DE RIESGOS Y DESASTRES',1,1,1,'2021-06-03','11','2021-06-03 13:47:20','2021-06-03 13:47:20'),
(28,'SUB GERENCIA DE DESARROLLO HUMANO, EDUCACIÓN Y SALUD','SGDHES','SGDHES','S. G. DE DESARROLLO HUMANO, EDUCACIÓN Y SALUD','S. G. DE DESARROLLO HUMANO, EDUCACIÓN Y SALUD',1,1,1,'2021-06-03','12','2021-06-03 13:48:52','2021-06-03 13:48:52'),
(29,'SUB GERENCIA DE PROGRAMAS SOCIALES E INCLUSIÓN SOCIAL','SGPSIS','SGPSIS','S. G. DE PROGRAMAS SOCIALES E INCLUSIÓN SOCIAL','S. G. DE PROGRAMAS SOCIALES E INCLUSIÓN SOCIAL',1,1,1,'2021-06-03','12','2021-06-03 13:52:16','2021-06-03 13:52:16'),
(30,'SUB GERENCIA DE PROMOCIÓN SOCIAL Y PARTICIPACIÓN VECINAL','SGPSPV','SGPSPV','S. G. DE PROMOCIÓN SOCIAL Y PARTICIPACIÓN VECINAL','S. G. DE PROMOCIÓN SOCIAL Y PARTICIPACIÓN VECINAL',1,1,1,'2021-06-03','12','2021-06-03 13:54:27','2021-06-03 13:54:27'),
(31,'SUB GERENCIA DE GESTIÓN INTEGRAL DE RESIDUOS MUNICIPALES','SGGIRM','SGGIRM','S. G. DE GESTIÓN INTEGRAL DE RESIDUOS MUNICIPALES','S. G. DE GESTIÓN INTEGRAL DE RESIDUOS MUNICIPALES',1,1,1,'2021-06-03','13','2021-06-03 14:02:57','2021-06-03 14:02:57'),
(32,'SUB GERENCIA DE MANEJO Y GESTIÓN AMBIENTAL','SGMGA','SGMGA','S. G. DE MANEJO Y GESTIÓN AMBIENTAL','S. G. DE MANEJO Y GESTIÓN AMBIENTAL',1,1,1,'2021-06-03','13','2021-06-03 14:04:11','2021-06-03 14:04:11'),
(33,'SUB GERENCIA DE ÁREAS VERDES Y RECURSOS NATURALES','SGAVRN','SGAVRN','S. G. DE ÁREAS VERDES Y RECURSOS NATURALES','S. G. DE ÁREAS VERDES Y RECURSOS NATURALES',1,1,1,'2021-06-03','13','2021-06-03 14:05:24','2021-06-03 14:05:24'),
(34,'SUB GERENCIA DE PROMOCIÓN EMPRESARIAL Y TURISMO','SGPET','SGPET','S. G. DE PROMOCIÓN EMPRESARIAL Y TURISMO','S. G. DE PROMOCIÓN EMPRESARIAL Y TURISMO',1,1,1,'2021-06-03','2','2021-06-03 14:07:24','2021-06-03 14:07:24'),
(35,'SUB GERENCIA DE FISCALIZACIÓN Y CONTROL','SGFC','SGFC','S. G. DE FISCALIZACIÓN Y CONTROL','S. G. DE FISCALIZACIÓN Y CONTROL',1,1,1,'2021-06-03','2','2021-06-03 14:08:12','2021-06-03 14:08:12'),
(36,'SUB GERENCIA DE TRANSPORTE TERRESTRE','SGTT','SGTT','S. G. DE TRANSPORTE TERRESTRE','S. G. DE TRANSPORTE TERRESTRE',1,1,1,'2021-06-03','2','2021-06-03 14:08:57','2021-06-03 14:08:57'),
(37,'SUB GERENCIA DE REGISTRO Y ORIENTACIÓN TRIBUTARIA','SGROT','SGROT','S. G. DE REGISTRO Y ORIENTACIÓN TRIBUTARIA','S. G. DE REGISTRO Y ORIENTACIÓN TRIBUTARIA',1,1,1,'2021-06-03','14','2021-06-03 14:11:08','2021-06-03 14:11:08'),
(38,'SUB GERENCIA DE RECAUDACIÓN Y CONTROL TRIBUTARIO','SGRCT','SGRCT','S. G. DE RECAUDACIÓN Y CONTROL TRIBUTARIO','S. G. DE RECAUDACIÓN Y CONTROL TRIBUTARIO',1,1,1,'2021-06-03','14','2021-06-03 14:12:11','2021-06-03 14:12:11'),
(39,'SUB GERENCIA DE FISCALIZACIÓN TRIBUTARIA','SGFT','SGFT','S. G. DE FISCALIZACIÓN TRIBUTARIA','S. G. DE FISCALIZACIÓN TRIBUTARIA',1,1,1,'2021-06-03','14','2021-06-03 14:13:12','2021-06-03 14:13:12'),
(40,'SUB GERENCIA DE EJECUCIÓN COACTIVA','SGEC','SGEC','S. G. DE EJECUCIÓN COACTIVA','S. G. DE EJECUCIÓN COACTIVA',1,1,1,'2021-06-03','14','2021-06-03 14:14:05','2021-06-03 14:14:05'),
(41,'SUB GERENCIA DE PREVENCIÓN CIUDADANA','SGPC','SGPC','S. G. DE PREVENCIÓN CIUDADANA','S. G. DE PREVENCIÓN CIUDADANA',1,1,1,'2021-06-03','15','2021-06-03 14:15:10','2021-06-03 14:15:10'),
(42,'SUB GERENCIA DE SERENAZGO','SGS','SGS','S. G. SERENAZGO','S. G. SERENAZGO',1,1,1,'2021-06-03','15','2021-06-03 14:15:54','2021-06-03 14:15:54');

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
  PRIMARY KEY (`iddocumento`),
  KEY `doc_idadmin` (`docu_idadmin`),
  CONSTRAINT `doc_idadmin` FOREIGN KEY (`docu_idadmin`) REFERENCES `users` (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_documento` */

insert  into `tram_documento`(`iddocumento`,`docu_idorigen`,`docu_tipo`,`docu_iddependencia`,`docu_firma`,`docu_cargo`,`docu_detalle`,`docu_ext_nombre`,`docu_ext_dni`,`docu_idtipodocumento`,`docu_numero_doc`,`docu_siglas_doc`,`docu_idprioridad`,`docu_folios`,`docu_asunto`,`docu_idadmin`,`docu_idusuariodependencia`,`docu_archivo`,`docu_fecharegistro`,`docu_forma`,`created_at`,`updated_at`) values 
(1,1,NULL,1,'ANTHONY','GERENTE',NULL,NULL,NULL,1,'OFI','MDM/2022',1,3,'LICENCIA COMERCIAL',1,1,'1620970086_esquema tesis.PDF','2021-05-14',0,'2021-05-14 00:28:06','2021-05-14 00:28:06'),
(2,1,'1',1,'ANTHONY ZEVALLOS GUZMÁN','GERENTE FINANZAS',NULL,NULL,NULL,4,'mem','MDM/2021',3,2,'PRUEBA',1,1,'1621039702_1_133_183_86_1214.pdf','2021-05-14',0,'2021-05-14 19:48:23','2021-05-14 19:48:23'),
(3,1,'1',1,'ROXANA MENDEZ CUEVA','GERENTE CONTABILIDAD',NULL,NULL,NULL,4,'123','MDM/',1,1,'ASUNTO PRUEBA',3,1,'1621446692_1_133_183_86_1214.pdf','2021-05-19',0,'2021-05-19 12:51:33','2021-05-19 12:51:33'),
(4,2,NULL,4,NULL,NULL,'PRUEBA','LICENCIA',23232323,2,'OFI','MDM/2021',3,3,'PRUEBA LICENCIA',3,2,'1621547604_1_133_183_86_1214.pdf','2021-05-20',0,'2021-05-20 16:53:25','2021-05-20 16:53:25'),
(5,2,NULL,4,NULL,NULL,'PRUEBA','TRAMITANTE DE RUEBA',12345678,1,'sol','mda202105',1,6,'ASUNTO PRUEBA',3,2,'1621554120_1_133_183_86_1214.pdf','2021-05-20',0,'2021-05-20 18:42:00','2021-05-20 18:42:00'),
(6,1,'1',1,'ANTHONY ZEVALLOS GUZMÁN','GERENTE FINANZAS',NULL,NULL,NULL,1,'123','MDA/123',1,6,'PRUEBA',1,1,'1621699993_1_133_183_86_1214.pdf','2021-05-22',0,'2021-05-22 11:13:14','2021-05-22 11:13:14'),
(7,1,'1',5,'ADMINISTRADOR ADMINISTRADOR','GERENTE FINANZAS',NULL,NULL,NULL,1,'1122','MDA/111',3,2,'2222',1,5,'1621708586_1_133_183_86_1214.pdf','2021-05-22',0,'2021-05-22 13:36:26','2021-05-22 13:36:26'),
(8,2,NULL,7,NULL,NULL,'PRUEBA','ANTHONY ZEVALLOS GUZMAN',74032034,1,'sol','MDA/12322',1,4,'PRUEBA LICENCIA',3,2,'1622432936_bases-de-datos-documentales-2015.pdf','2021-05-30',0,'2021-05-30 22:48:56','2021-05-30 22:48:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tram_operacion` */

insert  into `tram_operacion`(`idoperacion`,`oper_iddocumento`,`oper_iddependencia`,`oper_idadmin`,`oper_idarchivador`,`oper_idtope`,`oper_forma`,`oper_acciones`,`oper_idprocesado`,`oper_procesado`,`oper_tarchi_id`,`oper_depeid_d`,`oper_usuid_d`,`oper_detalledestino`,`oper_fecha`,`created_at`,`updated_at`) values 
(1,1,1,1,NULL,1,'0',NULL,NULL,'t',NULL,NULL,NULL,NULL,'2021-05-14','2021-05-14 00:28:06','2021-05-14 00:29:44'),
(2,1,1,1,NULL,2,'0',NULL,1,'t',NULL,1,3,'REVISAR','2021-05-14','2021-05-14 00:29:44','2021-05-19 12:40:39'),
(3,2,1,1,NULL,1,'0',NULL,NULL,'t',NULL,NULL,NULL,NULL,'2021-05-14','2021-05-14 19:48:23','2021-05-19 12:43:25'),
(4,1,1,3,NULL,5,NULL,'',2,'t',NULL,NULL,NULL,NULL,'2021-05-19','2021-05-19 12:40:39','2021-05-19 12:41:46'),
(5,1,1,3,NULL,6,NULL,'ATENDIDO',4,'f',NULL,NULL,NULL,NULL,'2021-05-19','2021-05-19 12:41:46','2021-05-19 12:41:46'),
(6,2,1,3,NULL,2,'0',NULL,3,'t',NULL,1,2,'REVISAR EL DETALLE','2021-05-19','2021-05-19 12:43:25','2021-05-20 17:28:15'),
(7,3,1,3,NULL,1,'0',NULL,NULL,'t',NULL,NULL,NULL,NULL,'2021-05-19','2021-05-19 12:51:33','2021-05-20 17:29:06'),
(8,4,2,3,NULL,1,'0',NULL,NULL,'t',NULL,NULL,NULL,NULL,'2021-05-20','2021-05-20 16:53:25','2021-05-20 17:17:00'),
(9,4,2,3,NULL,2,'0',NULL,8,'t',NULL,6,4,'DOCUMENTO EXTERNO','2021-05-20','2021-05-20 17:17:00','2021-05-20 17:18:06'),
(10,4,6,4,NULL,5,NULL,'',9,'t',NULL,NULL,NULL,NULL,'2021-05-20','2021-05-20 17:18:06','2021-05-22 13:41:51'),
(11,2,1,2,NULL,5,NULL,'',6,'f',NULL,NULL,NULL,NULL,'2021-05-20','2021-05-20 17:28:15','2021-05-20 17:28:15'),
(12,3,1,2,1,4,'0','PRUEBA ARCHIVO',7,'f',2,NULL,NULL,NULL,'2021-05-20','2021-05-20 17:29:06','2021-05-20 17:29:06'),
(13,5,2,3,NULL,1,'0',NULL,NULL,'f',NULL,NULL,NULL,NULL,'2021-05-20','2021-05-20 18:42:00','2021-05-20 18:42:00'),
(14,6,1,1,NULL,1,'0',NULL,NULL,'f',NULL,NULL,NULL,NULL,'2021-05-22','2021-05-22 11:13:14','2021-05-22 11:13:14'),
(15,7,5,1,NULL,1,'0',NULL,NULL,'t',NULL,NULL,NULL,NULL,'2021-05-22','2021-05-22 13:36:26','2021-05-22 13:40:38'),
(16,7,5,1,NULL,2,'0',NULL,15,'t',NULL,6,4,'REVISAR EL DETALLE','2021-05-22','2021-05-22 13:40:38','2021-06-03 14:25:14'),
(17,4,6,1,NULL,1,'0',NULL,10,'t',NULL,NULL,NULL,NULL,'2021-05-22','2021-05-22 13:41:51','2021-05-23 17:19:43'),
(18,4,6,1,3,4,'0','PRUEBA ARCHIVO',17,'t',2,NULL,NULL,NULL,'2021-05-23','2021-05-23 17:19:43','2021-05-23 17:21:32'),
(19,4,6,1,NULL,7,'0',NULL,18,'t',NULL,NULL,NULL,NULL,'2021-05-23','2021-05-23 17:21:32','2021-05-23 17:22:05'),
(20,4,6,1,NULL,6,NULL,'PRUEBA',19,'t',NULL,NULL,NULL,NULL,'2021-05-23','2021-05-23 17:22:05','2021-05-23 17:22:33'),
(21,4,6,1,3,4,'0','PRUEBA ATENDIDO ARCHIVO',20,'f',2,NULL,NULL,NULL,'2021-05-23','2021-05-23 17:22:33','2021-05-23 17:22:33'),
(22,8,2,3,NULL,1,'0',NULL,NULL,'t',NULL,NULL,NULL,NULL,'2021-05-30','2021-05-30 22:48:56','2021-05-30 22:49:26'),
(23,8,2,3,NULL,2,'0',NULL,22,'t',NULL,6,1,'REVISAR EL DETALLE','2021-05-30','2021-05-30 22:49:26','2021-05-30 22:50:16'),
(24,8,6,1,NULL,5,NULL,'',23,'t',NULL,NULL,NULL,NULL,'2021-05-30','2021-05-30 22:50:16','2021-05-30 22:50:50'),
(25,8,6,1,NULL,6,NULL,'RECOGER LA RESOLUCION EN OFICINA',24,'f',NULL,NULL,NULL,NULL,'2021-05-30','2021-05-30 22:50:50','2021-05-30 22:50:50'),
(26,7,5,4,NULL,5,NULL,'',16,'t',NULL,NULL,NULL,NULL,'2021-06-03','2021-06-03 14:25:14','2021-06-03 14:27:39'),
(27,7,5,4,NULL,5,NULL,'',16,'t',NULL,NULL,NULL,NULL,'2021-06-03','2021-06-03 14:25:14','2021-06-03 14:30:20'),
(28,7,5,4,NULL,2,'0',NULL,26,'t',NULL,6,3,'REVISAR EL DETALLE','2021-06-03','2021-06-03 14:27:39','2021-06-03 14:28:49'),
(29,7,6,3,NULL,5,NULL,'',28,'t',NULL,NULL,NULL,NULL,'2021-06-03','2021-06-03 14:28:49','2021-06-03 14:30:55'),
(30,7,5,4,NULL,2,'0',NULL,27,'t',NULL,6,3,'FALTA DNI','2021-06-03','2021-06-03 14:30:20','2021-06-03 14:30:43'),
(31,7,6,3,NULL,5,NULL,'',30,'t',NULL,NULL,NULL,NULL,'2021-06-03','2021-06-03 14:30:43','2021-06-03 14:31:01'),
(32,7,6,3,NULL,6,NULL,'',29,'f',NULL,NULL,NULL,NULL,'2021-06-03','2021-06-03 14:30:55','2021-06-03 14:30:55'),
(33,7,6,3,NULL,6,NULL,'',31,'f',NULL,NULL,NULL,NULL,'2021-06-03','2021-06-03 14:31:01','2021-06-03 14:31:01');

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
(1,'SOLICITUD','SOL','1',NULL,'2021-05-12','2021-05-13 01:52:21','2021-05-12 21:21:46'),
(2,'OFICIO','OFI','1',NULL,'2021-05-12','2021-05-13 01:52:21','2021-05-12 21:21:51'),
(3,'CARTA','CAR','1',NULL,'2021-05-12','2021-05-13 01:52:21','2021-05-12 21:21:55'),
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`idadmin`,`adm_nombre`,`adm_apellido`,`adm_inicial`,`adm_dni`,`adm_cumpleanos`,`adm_telefono`,`adm_iddependencia`,`adm_sisgedo`,`password`,`adm_estado`,`adm_cargo`,`adm_tipousuario`,`adm_email`,`remember_token`,`verification_token`,`created_at`,`updated_at`) values 
(1,'ADMINISTRADOR','ADMIN','ADMIN',74032028,'1993-04-24',999999999,6,12345678,'$2y$10$CZvYQ37gaJOQBP0v3lyJkuTaFlP2gug.6WL0hFGkfXjy9eJeRShuu',1,'JEFE MESA DE PARTES',1,'admin@gmail.com','JtpmS5mplnt2Eyrz0BBLBItOBl6Z9bfTXiTcDnnBH336joVrEpugV3ilsVYY','mmepTn4WSIXC3ADsnlLn0ztJmzlbMv0Y7SC7fNCF','2021-05-13 23:20:25','2021-06-03 14:19:50'),
(2,'WILLIAM','ALBORNOZ VARGAS','WALBORNOZ',77788899,'1992-11-02',999888777,12,77788899,'$2y$10$M4FeqkrLkHwvqXsoo6iaxeEZl40z7E5mpLQruu5qr3SZcyZlpfCVu',1,'G. DESARROLLO SOCIAL',2,'willy@gmail.com','DhizfwzcAv8DjNGIVVLdB6BazFuuPbPmFsrIonvWpwnKHvozb6fhkskY2L9U',NULL,'2021-05-13 01:59:40','2021-06-03 14:22:51'),
(3,'ROXANA','MENDEZ CUEVA','RMENDEZ',77799977,'2000-01-01',999999999,6,77799977,'$2y$10$bETtuKz5T1hSButIgY/LnOtBh4pnd5Ch7aYx7q85vEADGmOloHSYq',1,'ASISTENTE DE TRAMITE DOCUMENTARIO',2,'roxanamc@gmail.com','9e33kWhyeOw9I8sx8PTkabHC20tc1CXJc8PJXWtklj2z9vnXalP0f9dhUM6w',NULL,'2021-05-13 02:13:01','2021-06-03 14:21:58'),
(4,'FELIPE','CARRION LOPEZ','FCARRION',99999998,'2000-12-12',999999998,5,99999998,'$2y$10$Ln3mAuzpuHTAPWaxIwWJ5etPecoZ7huPMoBjN4aDDH82Snj/rNH7W',1,'G. SECRETARIA GENERAL',2,'FELIPE@GMAIL.COM','COnt9JdXEI8RwLDz35clIXxHXn5bRgVYRBNN7isdVoS0hL80rm3RJZfEvJfL',NULL,'2021-05-20 16:44:05','2021-06-03 14:21:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
