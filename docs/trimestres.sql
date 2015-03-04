/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.36 : Database - sicefaoo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`sicefaoo` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sicefaoo`;

/*Table structure for table `trimestres` */

DROP TABLE IF EXISTS `trimestres`;

CREATE TABLE `trimestres` (
  `tresId` int(11) NOT NULL AUTO_INCREMENT,
  `tresNombre` varchar(30) NOT NULL,
  `tresAnual` int(4) NOT NULL,
  `tresFechaInicio` date NOT NULL,
  `tresFechaFin` date NOT NULL,
  `tresEstado` varchar(1) NOT NULL,
  PRIMARY KEY (`tresId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `trimestres` */

insert  into `trimestres`(tresId,tresNombre,tresAnual,tresFechaInicio,tresFechaFin,tresEstado) values (1,'Primer Trimestre de 2015.',2015,'2015-01-19','2015-04-04','A'),(2,'Segundo Trimestre de 2015',2015,'2015-04-05','2015-06-24','A'),(3,'Tercer Trimestre de 2015',2015,'2015-06-25','2015-09-27','A'),(4,'Cuarto Trimestre de 2015',2015,'2015-09-28','2015-12-19','A'),(5,'Primer Trimestre de 2016',2016,'2016-01-18','2016-04-01','A'),(6,'Segundo Trimestre de 2016',2016,'2016-04-04','2016-06-24','A'),(7,'Tercer Trimestre de 2016',2016,'2016-06-27','2016-09-27','A'),(8,'Cuarto Trimestre de 2016',2016,'2016-09-28','2016-12-23','A');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
