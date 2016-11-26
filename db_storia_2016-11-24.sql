# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: db_storia
# Generation Time: 2016-11-24 10:52:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dinastia
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dinastia`;

CREATE TABLE `dinastia` (
  `personaggio_id` int(10) unsigned NOT NULL,
  `nome_dinastia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `padre_id` int(11) NOT NULL,
  `madre_id` int(11) NOT NULL,
  `coniuge1_id` int(11) NOT NULL,
  `coniuge2_id` int(11) NOT NULL,
  `coniuge3_id` int(11) NOT NULL,
  KEY `dinastia_personaggio_id_foreign` (`personaggio_id`),
  CONSTRAINT `dinastia_personaggio_id_foreign` FOREIGN KEY (`personaggio_id`) REFERENCES `personaggio` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table evento
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evento`;

CREATE TABLE `evento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_evento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `denominazione_evento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origine_luogo_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nuovo_luogo_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descrizione_evento` text COLLATE utf8_unicode_ci,
  `anno_evento` int(11) DEFAULT NULL,
  `descrizione_movimento_opera` text COLLATE utf8_unicode_ci,
  `tipo_sub_evento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ulteriore_caratterizzazione` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;

INSERT INTO `evento` (`id`, `tipo_evento`, `denominazione_evento`, `origine_luogo_id`, `nuovo_luogo_id`, `descrizione_evento`, `anno_evento`, `descrizione_movimento_opera`, `tipo_sub_evento`, `ulteriore_caratterizzazione`)
VALUES
	(1,'PRimo evento','',NULL,NULL,NULL,NULL,NULL,'SUB EVENTO1',''),
	(2,'Secondo evento','',NULL,NULL,NULL,NULL,NULL,NULL,''),
	(3,'TERZO EVENTO','QUI 1990',NULL,NULL,'',NULL,'','',''),
	(4,'1','1','17','1','11',NULL,'1','2','1'),
	(5,'PRimo evento','Den','17','22','122',NULL,'22','SUB EVENTO1',''),
	(6,'PRimo evento','Den','17','111','122',NULL,'','SUB EVENTO1',''),
	(7,'PRimo evento','Den','17','1','122',NULL,'','SUB EVENTO1',''),
	(8,'TERZO EVENTO','Luci D\'artista','2','2','',NULL,'','null',''),
	(9,'PRimo evento','OOOOAAUUII','17','24','11',NULL,'11','',''),
	(10,'PRimo evento','AAA','24','24','',NULL,'','SUB EVENTO1',''),
	(11,'PRimo evento','AAA','24','24','',NULL,'','SUB EVENTO1',''),
	(12,'PRimo evento','COLOSSEO','','','',NULL,'','SUB EVENTO1',''),
	(13,'','','','','',NULL,'','',''),
	(14,'','','','','',NULL,'','',''),
	(15,'','saSasaSasaSa','','','',NULL,'','',''),
	(16,'','Raff','','','',NULL,'','',''),
	(17,'PRimo evento','CICCIO CIOCCIO',NULL,NULL,'',NULL,'','',''),
	(18,'','santa antonio','','','',NULL,'','',''),
	(19,'','','','','',NULL,'','',''),
	(20,'','','','','',NULL,'','',''),
	(21,'','','','','',NULL,'','',''),
	(22,'','','','','',NULL,'','',''),
	(23,'','','','','',NULL,'','',''),
	(24,'','','','','',NULL,'','',''),
	(25,'','ss','','','',NULL,'','',''),
	(26,'PRimo evento','QUIIII E CAMBIATO',NULL,NULL,'',NULL,'','',''),
	(27,'Nuovo tipo','Nuovo evento 10','5','','',NULL,'','nuovo sub tipo',''),
	(28,'Nuovo tipo','nuovo evento2',NULL,NULL,'',NULL,'','',''),
	(29,'Nuovo tipo','evento senza replace','','','',NULL,'','neww',''),
	(30,'sdadasda','EVENTO RAF',NULL,NULL,'',NULL,'','',''),
	(31,'fasfdasdas','EVENTO RAF NUOVO',NULL,NULL,'',NULL,'','','');

/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table evento_personaggio
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evento_personaggio`;

CREATE TABLE `evento_personaggio` (
  `evento_id` int(10) unsigned DEFAULT NULL,
  `personaggio_id` int(10) unsigned DEFAULT NULL,
  KEY `evento_personaggio_idevento_foreign` (`evento_id`),
  KEY `evento_personaggio_idpersonaggio_foreign` (`personaggio_id`),
  CONSTRAINT `evento_personaggio_idevento_foreign` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evento_personaggio_idpersonaggio_foreign` FOREIGN KEY (`personaggio_id`) REFERENCES `personaggio` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `evento_personaggio` WRITE;
/*!40000 ALTER TABLE `evento_personaggio` DISABLE KEYS */;

INSERT INTO `evento_personaggio` (`evento_id`, `personaggio_id`)
VALUES
	(1,2),
	(28,17),
	(9,17),
	(1,1),
	(1,17),
	(31,16),
	(31,8),
	(31,17),
	(31,11),
	(30,11),
	(17,23),
	(17,22);

/*!40000 ALTER TABLE `evento_personaggio` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table luogo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `luogo`;

CREATE TABLE `luogo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `denominazione_luogo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anno_costruzione` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descrizione_monumento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localizzazione_luogo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_luogo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ulteriore_caratterizzazione` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_sub_luogo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `luogo` WRITE;
/*!40000 ALTER TABLE `luogo` DISABLE KEYS */;

INSERT INTO `luogo` (`id`, `denominazione_luogo`, `anno_costruzione`, `descrizione_monumento`, `localizzazione_luogo`, `tipo_luogo`, `ulteriore_caratterizzazione`, `tipo_sub_luogo`)
VALUES
	(1,'Milano','1990','','sa','Cittta','',''),
	(2,'Salerno','1990','','viaa','Citta','',''),
	(3,'Napoli','1888','','dasd','Citta','',''),
	(4,'Roma','2112','','sad','citta','',''),
	(5,'Catania1','11','','SS','CITT','','Scegli sub tipo luogo'),
	(17,'Avellino','1990','re','Av','Castello','','Scegli sub tipo luogo'),
	(18,'Firenze','333','222','222','Castello','ww','Chiesa'),
	(19,'Rimini','333','222','222','Castello','','Chiesa'),
	(20,'Prova ','Reset','22','ss','Nuovo luogo','','Nuovo sub luogo'),
	(21,'REWQQQ','q222','11','11','Nuovo luogo','11','Nuovo sub 2'),
	(22,'podajf','fapjfapo','fad','daos','re','dakdda dsd,dadad','oadd'),
	(23,'dasd','dasda','','asdas','Castello','','Scegli sub tipo luogo'),
	(24,'asaaa222','aaa','aaa','aaaa','CITT','','Scegli sub tipo luogo'),
	(25,'Baronissdsa','890','booo','baronissi','Castello','sss','Scegli sub tipo luogo'),
	(26,'Lancusi','333','','sss','Scegli tipo luogo','','Scegli sub tipo luogo'),
	(27,'aaaa','aaa','aaa','aaa','Nuovo luogo','aaa','Scegli sub tipo luogo'),
	(28,'','','','','Scegli tipo luogo','','Scegli sub tipo luogo'),
	(29,'Avellino1111','1990','re','Av','Castello','','Scegli sub tipo luogo');

/*!40000 ALTER TABLE `luogo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2016_10_20_160930_personaggio',1),
	(4,'2016_10_21_000101_create_evento_table',1),
	(9,'2016_10_21_003437_create_evento_personaggio_table',2),
	(12,'2016_10_21_221518_create_luogos_table',3),
	(13,'2016_10_25_232959_create_dinastia_table',4),
	(14,'2016_10_26_092135_add_columns_personaggio',5),
	(15,'2016_10_26_182245_change_columns_personaggio_evento',6),
	(16,'2016_10_28_115324_add_columns_evento',7),
	(17,'2016_10_29_232151_add_column_evento',8);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table personaggio
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personaggio`;

CREATE TABLE `personaggio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cognome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascita` date DEFAULT NULL,
  `luogo_nascita` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_morte` date DEFAULT NULL,
  `luogo_morte` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descrizione` text COLLATE utf8_unicode_ci,
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome_dinastia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `padre_id` int(10) unsigned DEFAULT NULL,
  `madre_id` int(10) unsigned DEFAULT NULL,
  `coniuge1_id` int(10) unsigned DEFAULT NULL,
  `coniuge2_id` int(10) unsigned DEFAULT NULL,
  `coniuge3_id` int(10) unsigned DEFAULT NULL,
  `dinastia` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `personaggio` WRITE;
/*!40000 ALTER TABLE `personaggio` DISABLE KEYS */;

INSERT INTO `personaggio` (`id`, `nome`, `cognome`, `data_nascita`, `luogo_nascita`, `data_morte`, `luogo_morte`, `descrizione`, `tipo`, `nome_dinastia`, `padre_id`, `madre_id`, `coniuge1_id`, `coniuge2_id`, `coniuge3_id`, `dinastia`)
VALUES
	(1,'Raff','Schiavone',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,'Raf','sasa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL),
	(7,'Vincenzo','Trimarco',NULL,NULL,NULL,NULL,NULL,NULL,NULL,22,NULL,NULL,NULL,NULL,NULL),
	(8,'Silvana ','Di landri',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(9,'Pasquale','Trimarco',NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL,NULL,NULL),
	(10,'Katia','Siniscalchi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(11,' RAFFAELE11111','Ciancio','0001-11-11','18','0001-11-11','1','ssw','www@ss',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(12,'Riccardo','ssa','0001-11-11','5','0011-11-11','1','','',NULL,NULL,NULL,NULL,NULL,NULL,'Dinastia'),
	(13,'sdadas','dasdad','0011-11-11','17','0001-11-11','23','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(14,'Giovanni','Guarino','0001-11-11','3','0001-11-11','4','Giangiulio Rovazzi','Ualleron@w',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(15,'peppe','sorre','0001-11-11','2','0001-11-11','3','Peppe sorre è gay','CAntantefrocio@a',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(16,'dsasdsadas','dasdasdasdas','0022-02-22','24','0022-02-22','5','2222','',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(17,'Ginozzo','Farisano','0011-11-11','25','0001-11-11','5','','',NULL,2,15,10,9,14,'Potentini'),
	(18,'Ginozzuzzooo','Farisano','0011-11-11','25','0001-11-11','5','','',NULL,2,15,NULL,NULL,NULL,NULL),
	(19,' Giovanni','Ciancio','0001-11-11','18','0001-11-11','1','ssw','www@ss',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(20,'dassad','dasdasdd','0001-11-11','','0011-11-11','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(21,'DAII GIUDA','GIUDA','0011-11-11','','0011-11-11','','','','Rafilucc',NULL,NULL,NULL,NULL,NULL,NULL),
	(22,'qqqqqqqqqq','qqqqq','0022-02-22','','0011-11-11','','','','Rafilucc',NULL,NULL,NULL,NULL,NULL,NULL),
	(23,'rerewewe','rereweqw','0011-11-11','','0001-11-11','','','','Rafilucc',NULL,NULL,NULL,NULL,NULL,NULL),
	(24,'Raffaele','Schi','0001-11-11','','0001-11-11','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(25,'Alfonso','Guarino','0011-11-11','','0011-11-11','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(26,'Giorgio','Giangiulio','0001-11-11','','0001-11-11','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `personaggio` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
