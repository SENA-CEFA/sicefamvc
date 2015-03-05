/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.36 : Database - exporurales
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`exporurales` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;

USE `exporurales`;

/*Table structure for table `asistentes` */

DROP TABLE IF EXISTS `asistentes`;

CREATE TABLE `asistentes` (
  `Cedula` bigint(20) NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Correo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Empresa` bigint(20) NOT NULL,
  PRIMARY KEY (`Cedula`),
  KEY `FK_asistentes_empresa` (`Empresa`),
  CONSTRAINT `FK_asistentes_empresa` FOREIGN KEY (`Empresa`) REFERENCES `empresa` (`Nit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `asistentes` */

insert  into `asistentes`(Cedula,Nombre,Telefono,Correo,Empresa) values (234,'Adrian',3456,'7dsfghj',123);

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `categorias` */

insert  into `categorias`(Id,Nombre) values (1,'Aseo Personal'),(2,'Cultivo de Cacao'),(3,'Cultivo de Café Especial'),(4,'Productos Cárnicos '),(5,'Especies Menores'),(6,'Floricultura'),(7,'Frutales'),(8,'Ganadería'),(9,'Hortalizas'),(10,'Producción de lácteos'),(11,'Producción OvinoCaprino'),(12,'Panificación'),(13,'Piscicultura'),(14,'Plátano '),(15,'Productos de Hogar '),(16,'Transformación de Cacao'),(17,'Transformación de Café'),(18,'Transformación de Café Especial'),(19,'Transformación de Frutas');

/*Table structure for table `cita` */

DROP TABLE IF EXISTS `cita`;

CREATE TABLE `cita` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Mesa` int(11) NOT NULL,
  `Comprador` bigint(20) NOT NULL,
  `Vendedor` bigint(20) NOT NULL,
  `Hora` time NOT NULL,
  `Estado` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `Asistente` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_cita_empresa` (`Comprador`),
  CONSTRAINT `FK_cita_empresa` FOREIGN KEY (`Comprador`) REFERENCES `empresa` (`Nit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `cita` */

insert  into `cita`(Id,Mesa,Comprador,Vendedor,Hora,Estado,Asistente) values (1,1,123,123,'00:00:10','A',123);

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `Nit` bigint(20) NOT NULL,
  `TipoEmpresa` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `NombreRepLeg` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `DocumentoRepLeg` bigint(20) NOT NULL,
  `Direccion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `TelefonoFijo` bigint(20) NOT NULL,
  `TelefonoCelular` bigint(20) NOT NULL,
  `Correo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Departamento` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Municipio` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `SectorEconomico` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `RegistroInvima` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Regimen` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `SitioWeb` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Padrino` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Nit`),
  KEY `FK_empresa_padrino` (`Padrino`),
  CONSTRAINT `FK_empresa_padrino` FOREIGN KEY (`Padrino`) REFERENCES `padrino` (`Documento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `empresa` */

insert  into `empresa`(Nit,TipoEmpresa,Nombre,NombreRepLeg,DocumentoRepLeg,Direccion,TelefonoFijo,TelefonoCelular,Correo,Departamento,Municipio,SectorEconomico,RegistroInvima,Regimen,SitioWeb,Padrino) values (123,'Vendedor','Comfa','asdf  ASD  za zdA Z< Xa < Z E< ZQ',1234567,'sada',1234,234,'sadf','asdf','asdd','asdf','1','1','sd',123),(234,'Comprador','dafsd','fghsdfghj',2345,'sdfgh',2345,23454,'dsfghg','sdfgh','sdf','sdf','1','2','df',123);

/*Table structure for table `historialcompra` */

DROP TABLE IF EXISTS `historialcompra`;

CREATE TABLE `historialcompra` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` int(11) NOT NULL,
  `Frecuencia` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Empresa` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_historialcompra_empresa` (`Empresa`),
  KEY `FK_historialcompra_categoria` (`Categoria`),
  CONSTRAINT `FK_historialcompra_categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_historialcompra_empresa` FOREIGN KEY (`Empresa`) REFERENCES `empresa` (`Nit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `historialcompra` */

/*Table structure for table `intencioncompra` */

DROP TABLE IF EXISTS `intencioncompra`;

CREATE TABLE `intencioncompra` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` int(11) NOT NULL,
  `Invima` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Empresa` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_intencioncompra_empresa` (`Empresa`),
  KEY `FK_intencioncompra_categoria` (`Categoria`),
  CONSTRAINT `FK_intencioncompra_categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_intencioncompra_empresa` FOREIGN KEY (`Empresa`) REFERENCES `empresa` (`Nit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `intencioncompra` */

/*Table structure for table `negocio` */

DROP TABLE IF EXISTS `negocio`;

CREATE TABLE `negocio` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` int(11) NOT NULL,
  `Pesos` int(11) NOT NULL,
  `Ejecucion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Cita` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_negocio_cita` (`Cita`),
  KEY `FK_negocio_categoria` (`Categoria`),
  CONSTRAINT `FK_negocio_categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_negocio_cita` FOREIGN KEY (`Cita`) REFERENCES `cita` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `negocio` */

/*Table structure for table `padrino` */

DROP TABLE IF EXISTS `padrino`;

CREATE TABLE `padrino` (
  `Documento` bigint(20) NOT NULL,
  `Nombre` varchar(150) COLLATE utf32_spanish2_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Correo` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  PRIMARY KEY (`Documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `padrino` */

insert  into `padrino`(Documento,Nombre,Telefono,Correo) values (123,'Diego',8123455,'correo@prueba.com');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Categoria` int(11) NOT NULL,
  `FichaTecnica` text COLLATE utf8_spanish2_ci NOT NULL,
  `Unidad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `CantidadMensual` int(11) NOT NULL,
  `PrecioUnidad` int(11) NOT NULL,
  `Invima` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Empresa` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_productos_empresa` (`Empresa`),
  KEY `FK_productos_categoria` (`Categoria`),
  CONSTRAINT `FK_productos_categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_productos_empresa` FOREIGN KEY (`Empresa`) REFERENCES `empresa` (`Nit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `productos` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Clave` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` varbinary(1) NOT NULL,
  PRIMARY KEY (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `usuarios` */

insert  into `usuarios`(Id_Usuario,Nombre,Usuario,Clave,Estado) values (1,'Prueba','admin','202cb962ac59075b964b07152d234b70','A');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
