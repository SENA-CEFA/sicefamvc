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

/*Table structure for table `acciones` */

DROP TABLE IF EXISTS `acciones`;

CREATE TABLE `acciones` (
  `anesId` int(11) NOT NULL,
  `anesNombre` varchar(50) NOT NULL,
  `anesDescripcion` varchar(250) NOT NULL,
  `anesEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`anesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `acciones` */

/*Table structure for table `aplicativos` */

DROP TABLE IF EXISTS `aplicativos`;

CREATE TABLE `aplicativos` (
  `avosId` int(11) NOT NULL,
  `avosNombre` varchar(50) NOT NULL,
  `avosRuta` varchar(50) NOT NULL,
  `avosEstado` varchar(50) NOT NULL,
  `avosIdBodega` int(11) NOT NULL,
  PRIMARY KEY (`avosId`),
  KEY `FK_aplicativos_bodegas` (`avosIdBodega`),
  CONSTRAINT `FK_aplicativos_bodegas` FOREIGN KEY (`avosIdBodega`) REFERENCES `bodegas` (`bgasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aplicativos` */

/*Table structure for table `aprendices` */

DROP TABLE IF EXISTS `aprendices`;

CREATE TABLE `aprendices` (
  `acesIdvinculacion` int(11) NOT NULL,
  `acesIdFicha` int(11) NOT NULL,
  `acesAcudiente` varchar(50) NOT NULL,
  `acesTelefonoAcudiente` varchar(20) NOT NULL,
  PRIMARY KEY (`acesIdvinculacion`),
  KEY `FK_aprendices_titulacion` (`acesIdFicha`),
  CONSTRAINT `FK_aprendices_titulacion` FOREIGN KEY (`acesIdFicha`) REFERENCES `titulaciones` (`tnesFicha`),
  CONSTRAINT `FK_aprendices_vinculaciones` FOREIGN KEY (`acesIdvinculacion`) REFERENCES `vinculaciones` (`vnesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aprendices` */

/*Table structure for table `areaproductivas` */

DROP TABLE IF EXISTS `areaproductivas`;

CREATE TABLE `areaproductivas` (
  `avasId` int(11) NOT NULL,
  `avasNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`avasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `areaproductivas` */

/*Table structure for table `bien` */

DROP TABLE IF EXISTS `bien`;

CREATE TABLE `bien` (
  `bienId` int(11) NOT NULL,
  `bienNombre` varchar(50) NOT NULL,
  `bienIdClase` int(11) NOT NULL,
  PRIMARY KEY (`bienId`),
  KEY `FK_bien_clases` (`bienIdClase`),
  CONSTRAINT `FK_bien_clases` FOREIGN KEY (`bienIdClase`) REFERENCES `clases` (`caseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bien` */

/*Table structure for table `bodegas` */

DROP TABLE IF EXISTS `bodegas`;

CREATE TABLE `bodegas` (
  `bgasId` int(11) NOT NULL,
  `bgasIdAplicativo` int(11) NOT NULL,
  `bgasIdResponsable` int(11) NOT NULL,
  `bgasNombre` varchar(50) NOT NULL,
  `bgasIdUnidProd` int(11) NOT NULL,
  PRIMARY KEY (`bgasId`),
  KEY `FK_bodegas_unidadproductivas` (`bgasIdUnidProd`),
  CONSTRAINT `FK_bodegas_unidadproductivas` FOREIGN KEY (`bgasIdUnidProd`) REFERENCES `unidadesproductivas` (`uvasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bodegas` */

/*Table structure for table `bodegasproductivas` */

DROP TABLE IF EXISTS `bodegasproductivas`;

CREATE TABLE `bodegasproductivas` (
  `bvasId` int(11) NOT NULL,
  `bvasIdBodega` int(11) NOT NULL,
  `bvasIdProducto` int(11) NOT NULL,
  `bvasCantidad` int(11) NOT NULL,
  `bvasValor` int(11) NOT NULL,
  `bvasStock` float NOT NULL,
  `bvasCantidadRestante` int(11) NOT NULL,
  `bvasUnidadRestante` varchar(50) NOT NULL,
  `bvasLote` int(11) NOT NULL,
  `bvasEstado` varchar(50) NOT NULL,
  `bvasIdUnidProd` int(11) NOT NULL,
  PRIMARY KEY (`bvasId`),
  KEY `FK_bodegasproductivas_bodegas` (`bvasIdBodega`),
  KEY `FK_bodegasproductivas_lotes` (`bvasLote`),
  CONSTRAINT `FK_bodegasproductivas_bodegas` FOREIGN KEY (`bvasIdBodega`) REFERENCES `bodegas` (`bgasId`),
  CONSTRAINT `FK_bodegasproductivas_lotes` FOREIGN KEY (`bvasLote`) REFERENCES `lotes` (`itesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bodegasproductivas` */

/*Table structure for table `calificadores` */

DROP TABLE IF EXISTS `calificadores`;

CREATE TABLE `calificadores` (
  `cresId` int(11) NOT NULL,
  `cresNombre` varchar(250) NOT NULL,
  PRIMARY KEY (`cresId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `calificadores` */

/*Table structure for table `caracteristicas` */

DROP TABLE IF EXISTS `caracteristicas`;

CREATE TABLE `caracteristicas` (
  `ccasId` int(11) NOT NULL,
  `ccasIdProducto` int(11) NOT NULL,
  `ccasIdValor` int(11) NOT NULL,
  PRIMARY KEY (`ccasId`),
  KEY `FK_caracteristicas_productos` (`ccasIdProducto`),
  KEY `FK_caracteristicas_valor` (`ccasIdValor`),
  CONSTRAINT `FK_caracteristicas_productos` FOREIGN KEY (`ccasIdProducto`) REFERENCES `productos` (`ptosId`),
  CONSTRAINT `FK_caracteristicas_valor` FOREIGN KEY (`ccasIdValor`) REFERENCES `valorcalificadores` (`vresId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `caracteristicas` */

/*Table structure for table `caracteristicasbien` */

DROP TABLE IF EXISTS `caracteristicasbien`;

CREATE TABLE `caracteristicasbien` (
  `cienId` int(11) NOT NULL,
  `cienIdBien` int(11) NOT NULL,
  `cienIdValores` int(11) NOT NULL,
  PRIMARY KEY (`cienId`),
  KEY `FK_caracteristicasbien_bien` (`cienIdBien`),
  KEY `FK_caracteristicasbien_caracteristicas` (`cienIdValores`),
  CONSTRAINT `FK_caracteristicasbien_bien` FOREIGN KEY (`cienIdBien`) REFERENCES `bien` (`bienId`),
  CONSTRAINT `FK_caracteristicasbien_caracteristicas` FOREIGN KEY (`cienIdValores`) REFERENCES `valorcalificadores` (`vresId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `caracteristicasbien` */

/*Table structure for table `celos` */

DROP TABLE IF EXISTS `celos`;

CREATE TABLE `celos` (
  `closId` int(100) NOT NULL,
  `closIdRegiAnim` int(100) NOT NULL,
  `closFechaCelo` date NOT NULL,
  `closCondicionCorporal` varchar(100) NOT NULL,
  `closEdadCelo` int(100) NOT NULL,
  `closObservacion` varchar(100) NOT NULL,
  `closPrimeriza` varchar(100) NOT NULL,
  PRIMARY KEY (`closId`),
  KEY `FK_celos_registroanim` (`closIdRegiAnim`),
  CONSTRAINT `FK_celos_registroanim` FOREIGN KEY (`closIdRegiAnim`) REFERENCES `registroanimales` (`rlesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `celos` */

/*Table structure for table `clases` */

DROP TABLE IF EXISTS `clases`;

CREATE TABLE `clases` (
  `caseId` int(9) NOT NULL,
  `caseNombre` varchar(50) NOT NULL,
  `caseIdFamilia` int(11) NOT NULL,
  PRIMARY KEY (`caseId`),
  KEY `FK_clases_familias` (`caseIdFamilia`),
  CONSTRAINT `FK_clases_familias` FOREIGN KEY (`caseIdFamilia`) REFERENCES `familias` (`fliaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `clases` */

/*Table structure for table `consloteave` */

DROP TABLE IF EXISTS `consloteave`;

CREATE TABLE `consloteave` (
  `caveId` int(11) NOT NULL,
  `caveIdConsumo` int(11) NOT NULL,
  `caveIdLoteAve` int(11) NOT NULL,
  PRIMARY KEY (`caveId`),
  KEY `FK_consloteave_llllll` (`caveIdLoteAve`),
  KEY `FK_consloteave_consumo` (`caveIdConsumo`),
  CONSTRAINT `FK_consloteave_consumo` FOREIGN KEY (`caveIdConsumo`) REFERENCES `consumo` (`cumoId`),
  CONSTRAINT `FK_consloteave_llllll` FOREIGN KEY (`caveIdLoteAve`) REFERENCES `loteave` (`laveId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `consloteave` */

/*Table structure for table `consumo` */

DROP TABLE IF EXISTS `consumo`;

CREATE TABLE `consumo` (
  `cumoId` int(11) NOT NULL,
  `cumoIdBodeProd` int(11) NOT NULL,
  `cumoCantidad` int(11) NOT NULL,
  `cumoValor` int(11) NOT NULL,
  `cumoCantidadRestante` int(11) NOT NULL,
  `cumoUnidadRestante` int(11) NOT NULL,
  `cumoIdEjecProy` int(11) NOT NULL,
  PRIMARY KEY (`cumoId`),
  KEY `FK_consumo_bodegasproductivas` (`cumoIdBodeProd`),
  KEY `FK_consumo_ejecutarporyecto` (`cumoIdEjecProy`),
  CONSTRAINT `FK_consumo_bodegasproductivas` FOREIGN KEY (`cumoIdBodeProd`) REFERENCES `bodegasproductivas` (`bvasId`),
  CONSTRAINT `FK_consumo_ejecutarporyecto` FOREIGN KEY (`cumoIdEjecProy`) REFERENCES `ejecutarproyectos` (`etosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `consumo` */

/*Table structure for table `consumoporcinos` */

DROP TABLE IF EXISTS `consumoporcinos`;

CREATE TABLE `consumoporcinos` (
  `cnosId` int(100) NOT NULL,
  `cnosTipoConsumo` varchar(100) NOT NULL,
  `cnosIdRegiAnim` int(100) NOT NULL,
  `cnosFecha` date NOT NULL,
  `cnosIdResponsable` int(100) NOT NULL,
  `cnosIdEtapa` int(100) NOT NULL,
  `cnosIdTipoTrat` int(100) NOT NULL,
  PRIMARY KEY (`cnosId`),
  KEY `FK_consumoporcinos_etapas` (`cnosIdEtapa`),
  KEY `FK_consumoporcinos_tipotratamiento` (`cnosIdTipoTrat`),
  CONSTRAINT `FK_consumoporcinos_etapas` FOREIGN KEY (`cnosIdEtapa`) REFERENCES `etapas` (`epasId`),
  CONSTRAINT `FK_consumoporcinos_tipotratamiento` FOREIGN KEY (`cnosIdTipoTrat`) REFERENCES `tipotratamientos` (`ttosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `consumoporcinos` */

/*Table structure for table `contratistas` */

DROP TABLE IF EXISTS `contratistas`;

CREATE TABLE `contratistas` (
  `ctasIdVinculacion` int(11) NOT NULL,
  `ctasObjeto` varchar(250) NOT NULL,
  `ctasFechFinCont` date NOT NULL,
  `ctasFechFinReal` date NOT NULL,
  `ctasCesion` varchar(250) NOT NULL,
  `ctasFechaCesion` date NOT NULL,
  `ctasValoTotaCont` int(11) NOT NULL,
  `ctasIdTipoCont` int(11) NOT NULL,
  `ctasNumeHoraCont` int(11) NOT NULL,
  `ctasNumeroPoliza` varchar(250) NOT NULL,
  `ctasAseguradora` varchar(250) NOT NULL,
  `ctasFechExpePoli` date NOT NULL,
  `ctasFEchAproPoli` date NOT NULL,
  `ctasFechInicVigePoli` date NOT NULL,
  `ctasFechaFinVigePoli` date NOT NULL,
  `ctasNIIF` varchar(250) NOT NULL,
  `ctasCDP` varchar(250) NOT NULL,
  `ctasFechaCDP` date NOT NULL,
  PRIMARY KEY (`ctasIdVinculacion`),
  KEY `FK_contratistas_tipocontratista` (`ctasIdTipoCont`),
  CONSTRAINT `FK_contratistas_empleados` FOREIGN KEY (`ctasIdVinculacion`) REFERENCES `empleados` (`edosIdVinculacion`),
  CONSTRAINT `FK_contratistas_tipocontratista` FOREIGN KEY (`ctasIdTipoCont`) REFERENCES `tipocontratista` (`ttasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `contratistas` */

/*Table structure for table `corrales` */

DROP TABLE IF EXISTS `corrales`;

CREATE TABLE `corrales` (
  `clesId` int(100) NOT NULL,
  `clesNombreCorral` varchar(100) NOT NULL,
  `clesUbicacion` varchar(100) NOT NULL,
  `clesDescripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`clesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `corrales` */

/*Table structure for table `datopersonales` */

DROP TABLE IF EXISTS `datopersonales`;

CREATE TABLE `datopersonales` (
  `dlesId` int(11) NOT NULL AUTO_INCREMENT,
  `dlesDocumento` bigint(2) NOT NULL,
  `dlesTipoIdentificacion` varchar(100) NOT NULL,
  `dlesFechExpeDocu` date NOT NULL,
  `dlesMuniExpeDocu` varchar(100) NOT NULL,
  `dlesNombre` varchar(50) NOT NULL,
  `dlesPrimerApellido` varchar(50) NOT NULL,
  `dlesSegundoApellido` varchar(50) NOT NULL,
  `dlesFechaNacimiento` date NOT NULL,
  `dlesMunicipioNacimiento` varchar(100) NOT NULL,
  `dlesTipoSangre` varchar(50) NOT NULL,
  `dlesGenero` varchar(50) NOT NULL,
  `dlesEps` varchar(50) NOT NULL,
  `dlesEstadoCivil` varchar(50) NOT NULL,
  `dlesLibretaMilitar` varchar(20) NOT NULL,
  `dlesEstrato` int(2) NOT NULL,
  `dlesDireccion` varchar(50) NOT NULL,
  `dlesMunicipioDireccion` varchar(250) NOT NULL,
  `dlesTelefono1` varchar(20) NOT NULL,
  `dlesTelefono2` varchar(20) NOT NULL,
  `dlesTelefono3` varchar(20) NOT NULL,
  `dlesCorreoMiSena` varchar(250) NOT NULL,
  `dlesCorreoInstitucional` varchar(250) NOT NULL,
  `dlesCorreoAlternativo` varchar(250) NOT NULL,
  `dlesSitioWeb` varchar(250) NOT NULL,
  PRIMARY KEY (`dlesId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `datopersonales` */

insert  into `datopersonales`(dlesId,dlesDocumento,dlesTipoIdentificacion,dlesFechExpeDocu,dlesMuniExpeDocu,dlesNombre,dlesPrimerApellido,dlesSegundoApellido,dlesFechaNacimiento,dlesMunicipioNacimiento,dlesTipoSangre,dlesGenero,dlesEps,dlesEstadoCivil,dlesLibretaMilitar,dlesEstrato,dlesDireccion,dlesMunicipioDireccion,dlesTelefono1,dlesTelefono2,dlesTelefono3,dlesCorreoMiSena,dlesCorreoInstitucional,dlesCorreoAlternativo,dlesSitioWeb) values (1,1075277438,'Tarjeta de Identidad','2014-04-17','CA','Arley ','TR','Ibarra','2014-04-10','Neiva','O+','Femenino','Comfamiliar','Soltero','132345',3,'cr27 -12-087','neiva','3232332','8723232','8723232','misena@hotmail.com','institucional@hotmail.com','alternativo@hotmail.com','www.elgallinero.com'),(2,1,'Cedula de Extranjeria','2014-04-17','c','fernanda','tr','fe','2014-04-17','Neiva','O+','Masculino','Comfamiliar','Casado','132345',3,'cr27 12 087','neiva','3232332','8723232','8723232','misena@hotmail.com','misena@hotmail.com','alternativo@hotmail.com','www.elgallinero.com'),(6,1234567895,'fer','2014-04-17','campo','yilber','','','0000-00-00','','','','','','',0,'','','','','','','','','');

/*Table structure for table `descartes` */

DROP TABLE IF EXISTS `descartes`;

CREATE TABLE `descartes` (
  `dtesId` int(100) NOT NULL,
  `dtesIdRegiAnim` int(100) NOT NULL,
  `dtesFecha` date NOT NULL,
  `dtesObservacion` varchar(100) NOT NULL,
  `dtesMotiRemo` int(100) NOT NULL,
  `dtesIdEtapa` int(100) NOT NULL,
  PRIMARY KEY (`dtesId`),
  KEY `FK_descartes_etapas` (`dtesIdEtapa`),
  KEY `FK_descartes_motivoremo` (`dtesMotiRemo`),
  CONSTRAINT `FK_descartes_etapas` FOREIGN KEY (`dtesIdEtapa`) REFERENCES `etapas` (`epasId`),
  CONSTRAINT `FK_descartes_motivoremo` FOREIGN KEY (`dtesMotiRemo`) REFERENCES `motivoremociones` (`mnesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `descartes` */

/*Table structure for table `detallemovimiento` */

DROP TABLE IF EXISTS `detallemovimiento`;

CREATE TABLE `detallemovimiento` (
  `dntoIdLote` int(11) NOT NULL AUTO_INCREMENT,
  `dntoIdMovimiento` int(11) NOT NULL,
  `dntoIdProducto` int(11) NOT NULL,
  `dntoCantidad` int(11) NOT NULL,
  `dntoValor` int(11) NOT NULL,
  PRIMARY KEY (`dntoIdLote`),
  KEY `FK_detallemovimiento_movimientos` (`dntoIdMovimiento`),
  CONSTRAINT `FK_detallemovimiento_lotes` FOREIGN KEY (`dntoIdLote`) REFERENCES `lotes` (`itesId`),
  CONSTRAINT `FK_detallemovimiento_movimientos` FOREIGN KEY (`dntoIdMovimiento`) REFERENCES `movimientos` (`mtosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detallemovimiento` */

/*Table structure for table `ejecutarproyectos` */

DROP TABLE IF EXISTS `ejecutarproyectos`;

CREATE TABLE `ejecutarproyectos` (
  `etosId` int(11) NOT NULL,
  `etosIdProyForm` int(11) NOT NULL,
  `etosIdTitulacion` int(11) NOT NULL,
  PRIMARY KEY (`etosId`),
  KEY `FK_ejecutarproyectos_proyecto` (`etosIdProyForm`),
  KEY `FK_ejecutarproyectos_titulaciones` (`etosIdTitulacion`),
  CONSTRAINT `FK_ejecutarproyectos_proyecto` FOREIGN KEY (`etosIdProyForm`) REFERENCES `proyectoformativos` (`pvosId`),
  CONSTRAINT `FK_ejecutarproyectos_titulaciones` FOREIGN KEY (`etosIdTitulacion`) REFERENCES `titulaciones` (`tnesFicha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ejecutarproyectos` */

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `edosIdVinculacion` int(11) NOT NULL,
  `edosNumeroContrato` varchar(250) DEFAULT NULL,
  `FechaContrato` date DEFAULT NULL,
  `edosTarjetaProfesional` varchar(250) DEFAULT NULL,
  `edosFechExpeTarj` date DEFAULT NULL,
  `edosFondoPension` varchar(250) DEFAULT NULL,
  `edosAsignacionMensual` varchar(250) DEFAULT NULL,
  `edosIdTipoEmpl` int(11) DEFAULT NULL,
  `edosInstructor` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`edosIdVinculacion`),
  KEY `FK_empleados_tipoempleado` (`edosIdTipoEmpl`),
  CONSTRAINT `FK_empleados_tipoempleado` FOREIGN KEY (`edosIdTipoEmpl`) REFERENCES `tipoempleados` (`ttosId`),
  CONSTRAINT `FK_empleados_vinvculacion` FOREIGN KEY (`edosIdVinculacion`) REFERENCES `vinculaciones` (`vnesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `empleados` */

/*Table structure for table `etapas` */

DROP TABLE IF EXISTS `etapas`;

CREATE TABLE `etapas` (
  `epasId` int(100) NOT NULL,
  `epasNombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`epasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `etapas` */

/*Table structure for table `familias` */

DROP TABLE IF EXISTS `familias`;

CREATE TABLE `familias` (
  `fliaId` int(11) NOT NULL,
  `fliaNombre` varchar(50) NOT NULL,
  `fliaIdSegmento` int(11) NOT NULL,
  PRIMARY KEY (`fliaId`),
  KEY `FK_familias_segmento` (`fliaIdSegmento`),
  CONSTRAINT `FK_familias_segmento` FOREIGN KEY (`fliaIdSegmento`) REFERENCES `segmentos` (`stosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `familias` */

/*Table structure for table `fincas` */

DROP TABLE IF EXISTS `fincas`;

CREATE TABLE `fincas` (
  `fcasId` int(11) NOT NULL,
  `fcasNombre` varchar(250) NOT NULL,
  `fcasVereda` varchar(250) NOT NULL,
  `fcasExtension` varchar(250) NOT NULL,
  `fcasDescripcion` varchar(250) NOT NULL,
  `fcasPropiedadFinca` varchar(250) NOT NULL,
  `fcasDireccion` varchar(250) NOT NULL,
  `fcasTelefono` int(11) NOT NULL,
  `fcasAdministradorFinca` varchar(250) NOT NULL,
  `fcasArriendatarioFinca` varchar(250) NOT NULL,
  `fcasIdCodigoMunicipio` int(11) NOT NULL,
  PRIMARY KEY (`fcasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fincas` */

/*Table structure for table `formulacion` */

DROP TABLE IF EXISTS `formulacion`;

CREATE TABLE `formulacion` (
  `fionId` int(11) NOT NULL,
  `fionNombre` varchar(50) NOT NULL,
  `fionResponsable` varchar(50) NOT NULL,
  `fionFecha` date NOT NULL,
  `fionIdTransformacion` int(11) NOT NULL,
  PRIMARY KEY (`fionId`),
  KEY `FK_formulacion_transformacion` (`fionIdTransformacion`),
  CONSTRAINT `FK_formulacion_transformacion` FOREIGN KEY (`fionIdTransformacion`) REFERENCES `transformacion` (`tionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `formulacion` */

/*Table structure for table `formularios` */

DROP TABLE IF EXISTS `formularios`;

CREATE TABLE `formularios` (
  `fiosId` int(11) NOT NULL,
  `fiosNombre` varchar(50) NOT NULL,
  `fiosEstado` varchar(50) NOT NULL,
  `fiosRuta` varchar(250) NOT NULL,
  `fiosDescripcion` varchar(250) NOT NULL,
  `fiosIdModulo` int(11) NOT NULL,
  PRIMARY KEY (`fiosId`),
  KEY `FK_formularios_modulos` (`fiosIdModulo`),
  CONSTRAINT `FK_formularios_modulos` FOREIGN KEY (`fiosIdModulo`) REFERENCES `modulos` (`mlosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `formularios` */

/*Table structure for table `funcionarios` */

DROP TABLE IF EXISTS `funcionarios`;

CREATE TABLE `funcionarios` (
  `fiosIdVinculacion` int(11) NOT NULL,
  `fiosTipoFuncionario` int(11) NOT NULL,
  `fiosFunciones` varchar(250) NOT NULL,
  PRIMARY KEY (`fiosIdVinculacion`),
  KEY `FK_funcionarios_tupofuncionario` (`fiosTipoFuncionario`),
  CONSTRAINT `FK_funcionarios_empleados` FOREIGN KEY (`fiosIdVinculacion`) REFERENCES `empleados` (`edosIdVinculacion`),
  CONSTRAINT `FK_funcionarios_tupofuncionario` FOREIGN KEY (`fiosTipoFuncionario`) REFERENCES `tipofuncionarios` (`tiosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `funcionarios` */

/*Table structure for table `galponfisico` */

DROP TABLE IF EXISTS `galponfisico`;

CREATE TABLE `galponfisico` (
  `gicoId` int(11) NOT NULL,
  `gicoIdFinca` int(11) NOT NULL,
  `gicoNombre` varchar(50) NOT NULL,
  `gicoDescripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`gicoId`),
  KEY `FK_galponfisico_zxczxc` (`gicoIdFinca`),
  CONSTRAINT `FK_galponfisico_zxczxc` FOREIGN KEY (`gicoIdFinca`) REFERENCES `fincas` (`fcasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `galponfisico` */

/*Table structure for table `ingredientes` */

DROP TABLE IF EXISTS `ingredientes`;

CREATE TABLE `ingredientes` (
  `itesIdTransformacion` int(11) NOT NULL,
  `itesIdConsumo` int(11) NOT NULL,
  KEY `FK_ingredientes_consumos` (`itesIdConsumo`),
  KEY `FK_ingredientes_transformacion` (`itesIdTransformacion`),
  CONSTRAINT `FK_ingredientes_consumos` FOREIGN KEY (`itesIdConsumo`) REFERENCES `consumo` (`cumoId`),
  CONSTRAINT `FK_ingredientes_transformacion` FOREIGN KEY (`itesIdTransformacion`) REFERENCES `transformacion` (`tionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ingredientes` */

/*Table structure for table `jornales` */

DROP TABLE IF EXISTS `jornales`;

CREATE TABLE `jornales` (
  `jlesId` int(11) NOT NULL,
  `jlesTipo` varchar(250) NOT NULL,
  `jlesCantidad` int(11) NOT NULL,
  `jlesValor` int(11) NOT NULL,
  `jlesIdProdUnid` int(11) NOT NULL,
  `jlesObservacion` varchar(250) NOT NULL,
  PRIMARY KEY (`jlesId`),
  KEY `FK_jornales_produccionunidades` (`jlesIdProdUnid`),
  CONSTRAINT `FK_jornales_produccionunidades` FOREIGN KEY (`jlesIdProdUnid`) REFERENCES `produccionunidades` (`pdesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `jornales` */

/*Table structure for table `kardes` */

DROP TABLE IF EXISTS `kardes`;

CREATE TABLE `kardes` (
  `kdesId` int(11) NOT NULL,
  `kdesIdBodegas` int(11) NOT NULL,
  `kdesIdOperaciones` int(11) NOT NULL,
  `kdesIdProducto` int(11) NOT NULL,
  `kdesFecha` date NOT NULL,
  `kdesCantidadEntrada` int(11) NOT NULL,
  `kdesValorEntrada` int(11) NOT NULL,
  `kdesCantidadSalida` int(11) NOT NULL,
  `kdesValorSalida` int(11) NOT NULL,
  `kdesCantidadSaldo` int(11) NOT NULL,
  `kdesValorSaldo` int(11) NOT NULL,
  PRIMARY KEY (`kdesId`),
  KEY `FK_kardes_productos` (`kdesIdProducto`),
  KEY `FK_kardes_operaciones` (`kdesIdOperaciones`),
  KEY `FK_kardes_bodegas` (`kdesIdBodegas`),
  CONSTRAINT `FK_kardes_bodegas` FOREIGN KEY (`kdesIdBodegas`) REFERENCES `bodegas` (`bgasId`),
  CONSTRAINT `FK_kardes_operaciones` FOREIGN KEY (`kdesIdOperaciones`) REFERENCES `operaciones` (`onesId`),
  CONSTRAINT `FK_kardes_productos` FOREIGN KEY (`kdesIdProducto`) REFERENCES `productos` (`ptosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kardes` */

/*Table structure for table `loteave` */

DROP TABLE IF EXISTS `loteave`;

CREATE TABLE `loteave` (
  `laveId` int(11) NOT NULL,
  `laveIdTipoAve` int(11) NOT NULL,
  `laveIdGalponFisico` int(11) NOT NULL,
  `laveCantidadInicial` int(11) NOT NULL,
  `laveCantidadActual` int(11) NOT NULL,
  `laveResponsable` varchar(50) NOT NULL,
  PRIMARY KEY (`laveId`),
  KEY `FK_loteave_asdasdasd` (`laveIdTipoAve`),
  KEY `FK_loteave_vbvbvbvb` (`laveIdGalponFisico`),
  CONSTRAINT `FK_loteave_asdasdasd` FOREIGN KEY (`laveIdTipoAve`) REFERENCES `tipoave` (`taveId`),
  CONSTRAINT `FK_loteave_vbvbvbvb` FOREIGN KEY (`laveIdGalponFisico`) REFERENCES `galponfisico` (`gicoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `loteave` */

/*Table structure for table `lotes` */

DROP TABLE IF EXISTS `lotes`;

CREATE TABLE `lotes` (
  `itesId` int(11) NOT NULL,
  `itesFechaProduccion` date NOT NULL,
  `itesFechaVencimiento` date NOT NULL,
  `itesNumeProdLote` int(11) NOT NULL,
  PRIMARY KEY (`itesId`),
  CONSTRAINT `FK_lotes_produccionunidades` FOREIGN KEY (`itesId`) REFERENCES `produccionunidades` (`pdesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lotes` */

/*Table structure for table `modulos` */

DROP TABLE IF EXISTS `modulos`;

CREATE TABLE `modulos` (
  `mlosId` int(11) NOT NULL,
  `mlosNombre` varchar(50) NOT NULL,
  `mlosIdAplicativo` int(11) NOT NULL,
  `mlosDescripcion` varchar(250) NOT NULL,
  `mlosEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`mlosId`),
  KEY `FK_modulos_aplicativos` (`mlosIdAplicativo`),
  CONSTRAINT `FK_modulos_aplicativos` FOREIGN KEY (`mlosIdAplicativo`) REFERENCES `aplicativos` (`avosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `modulos` */

/*Table structure for table `motas` */

DROP TABLE IF EXISTS `motas`;

CREATE TABLE `motas` (
  `mtasId` int(100) NOT NULL,
  `mtasIdRegiAnim` int(100) NOT NULL,
  `mtasIdenMachUno` varchar(100) NOT NULL,
  `mtasFechMontUno` date NOT NULL,
  `mtasHoraUno` time NOT NULL,
  `mtasIdenMachDos` varchar(100) NOT NULL,
  `mtasFechMontDos` date NOT NULL,
  `mtasHoraDos` time NOT NULL,
  `mtasIdenMachTres` varchar(100) NOT NULL,
  `mtasFechMontTres` date NOT NULL,
  `mtasHoraTres` time NOT NULL,
  `mtasPreÃ±ez` varchar(100) NOT NULL,
  `mtasFechaParto` date NOT NULL,
  `mtasPeso` varchar(100) NOT NULL,
  `mtasEdad` int(100) NOT NULL,
  `mtasObservacion` varchar(100) NOT NULL,
  PRIMARY KEY (`mtasId`),
  KEY `FK_montas_registroanim` (`mtasIdRegiAnim`),
  CONSTRAINT `FK_montas_registroanim` FOREIGN KEY (`mtasIdRegiAnim`) REFERENCES `registroanimales` (`rlesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `motas` */

/*Table structure for table `motivoremociones` */

DROP TABLE IF EXISTS `motivoremociones`;

CREATE TABLE `motivoremociones` (
  `mnesId` int(100) NOT NULL,
  `mmesNombre` varchar(100) NOT NULL,
  PRIMARY KEY (`mnesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `motivoremociones` */

/*Table structure for table `movimientos` */

DROP TABLE IF EXISTS `movimientos`;

CREATE TABLE `movimientos` (
  `mtosId` int(11) NOT NULL AUTO_INCREMENT,
  `mtosIdBodeEntr` int(11) NOT NULL,
  `mtosIdBodeReci` int(11) NOT NULL,
  `mtosIdCliente` int(11) NOT NULL,
  `mtosIdProveedor` int(11) NOT NULL,
  `mtosFecha` date NOT NULL,
  `mtosObservaciones` varchar(250) NOT NULL,
  `mtosEstado` varchar(50) NOT NULL,
  `mtosNumeroComprobante` int(11) NOT NULL,
  `mtosTotal` int(11) NOT NULL,
  PRIMARY KEY (`mtosId`),
  CONSTRAINT `FK_movimientos_responsables` FOREIGN KEY (`mtosId`) REFERENCES `responsabilidadmovimientos` (`rtosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `movimientos` */

/*Table structure for table `muerte` */

DROP TABLE IF EXISTS `muerte`;

CREATE TABLE `muerte` (
  `mrteId` int(11) NOT NULL,
  `mrteMotiMuerEspe` varchar(250) NOT NULL,
  `mrteReferenciaEspecialista` varchar(250) NOT NULL,
  `mrteEspecialistaACargo` varchar(250) NOT NULL,
  `mrteObservacionTurno` varchar(250) NOT NULL,
  `mrteEncaMuerTurn` varchar(250) NOT NULL,
  `mrteCantidad` int(11) NOT NULL,
  `mrteFechaHora` datetime NOT NULL,
  `mrteIdTipoAve` int(11) DEFAULT NULL,
  PRIMARY KEY (`mrteId`),
  KEY `FK_muerte_tipoavess` (`mrteIdTipoAve`),
  CONSTRAINT `FK_muerte_tipoavess` FOREIGN KEY (`mrteIdTipoAve`) REFERENCES `tipoave` (`taveId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `muerte` */

insert  into `muerte`(mrteId,mrteMotiMuerEspe,mrteReferenciaEspecialista,mrteEspecialistaACargo,mrteObservacionTurno,mrteEncaMuerTurn,mrteCantidad,mrteFechaHora,mrteIdTipoAve) values (21,'Sida','1075277438','Arley Ninco',' Mala alimentacion ','Fernanda Rivera',21,'2014-04-18 00:00:00',NULL);

/*Table structure for table `operaciones` */

DROP TABLE IF EXISTS `operaciones`;

CREATE TABLE `operaciones` (
  `onesId` int(11) NOT NULL,
  `onesNombre` varchar(250) NOT NULL,
  PRIMARY KEY (`onesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `operaciones` */

/*Table structure for table `otrosgastos` */

DROP TABLE IF EXISTS `otrosgastos`;

CREATE TABLE `otrosgastos` (
  `otosId` int(11) NOT NULL,
  `otosIdTipoOtro` int(11) NOT NULL,
  `otosValor` int(11) NOT NULL,
  `otosFecha` date NOT NULL,
  `otosIdUnidProd` int(11) NOT NULL,
  `otosCantidad` int(11) NOT NULL,
  PRIMARY KEY (`otosId`),
  KEY `FK_otrosgastos_unidadproductiva` (`otosIdUnidProd`),
  KEY `FK_otrosgastos_tipos` (`otosIdTipoOtro`),
  CONSTRAINT `FK_otrosgastos_tipos` FOREIGN KEY (`otosIdTipoOtro`) REFERENCES `tiposotros` (`trosId`),
  CONSTRAINT `FK_otrosgastos_unidadproductiva` FOREIGN KEY (`otosIdUnidProd`) REFERENCES `unidadesproductivas` (`uvasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `otrosgastos` */

/*Table structure for table `partos` */

DROP TABLE IF EXISTS `partos`;

CREATE TABLE `partos` (
  `ptosId` int(100) NOT NULL,
  `ptosIdRegiAnim` int(100) NOT NULL,
  `ptosFechaParto` date NOT NULL,
  `ptosNumeroCamada` varchar(100) NOT NULL,
  `ptosNumeroVivo` varchar(100) NOT NULL,
  `ptosNumeroMuerto` varchar(100) NOT NULL,
  `ptosNumeroMomia` varchar(100) NOT NULL,
  `ptosNumeroTotal` varchar(100) NOT NULL,
  `ptosPesoCamada` varchar(100) NOT NULL,
  `ptosPesoPromedio` varchar(100) NOT NULL,
  `ptosCantidadMacho` int(100) NOT NULL,
  `ptosCantidadHembra` int(100) NOT NULL,
  `ptosObservacion` varchar(100) NOT NULL,
  `ptosIdResponsable` int(100) NOT NULL,
  PRIMARY KEY (`ptosId`),
  KEY `FK_partos_registran` (`ptosIdRegiAnim`),
  CONSTRAINT `FK_partos_registran` FOREIGN KEY (`ptosIdRegiAnim`) REFERENCES `registroanimales` (`rlesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `partos` */

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `psosId` int(11) NOT NULL,
  `psosIdRol` int(11) NOT NULL,
  `psosIdFormulario` int(11) NOT NULL,
  `psosIdAccion` int(11) NOT NULL,
  PRIMARY KEY (`psosId`),
  KEY `FK_permisos_rolesusuarios` (`psosIdRol`),
  KEY `FK_permisos_acciones` (`psosIdAccion`),
  KEY `FK_permisos_formularios` (`psosIdFormulario`),
  CONSTRAINT `FK_permisos_acciones` FOREIGN KEY (`psosIdAccion`) REFERENCES `acciones` (`anesId`),
  CONSTRAINT `FK_permisos_formularios` FOREIGN KEY (`psosIdFormulario`) REFERENCES `formularios` (`fiosId`),
  CONSTRAINT `FK_permisos_rolesusuarios` FOREIGN KEY (`psosIdRol`) REFERENCES `rolesusuarios` (`riosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `permisos` */

/*Table structure for table `posicionanimales` */

DROP TABLE IF EXISTS `posicionanimales`;

CREATE TABLE `posicionanimales` (
  `plesId` int(100) NOT NULL,
  `plesFechaIngreso` date NOT NULL,
  `plesFechaSalida` date NOT NULL,
  `plesIdRegiAnim` int(100) NOT NULL,
  `plesIdCorral` int(100) NOT NULL,
  `plesEstado` varchar(100) NOT NULL,
  PRIMARY KEY (`plesId`),
  KEY `FK_posicionanimales_registro` (`plesIdRegiAnim`),
  KEY `FK_posicionanimales_corrales` (`plesIdCorral`),
  CONSTRAINT `FK_posicionanimales_corrales` FOREIGN KEY (`plesIdCorral`) REFERENCES `corrales` (`clesId`),
  CONSTRAINT `FK_posicionanimales_registro` FOREIGN KEY (`plesIdRegiAnim`) REFERENCES `registroanimales` (`rlesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `posicionanimales` */

/*Table structure for table `produccionporcinos` */

DROP TABLE IF EXISTS `produccionporcinos`;

CREATE TABLE `produccionporcinos` (
  `pnosIdProdUnid` int(100) NOT NULL,
  `pnosIdRegiAnim` int(100) NOT NULL,
  KEY `FK_produccionporcinos_registro` (`pnosIdRegiAnim`),
  CONSTRAINT `FK_produccionporcinos_registro` FOREIGN KEY (`pnosIdRegiAnim`) REFERENCES `registroanimales` (`rlesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `produccionporcinos` */

/*Table structure for table `produccionunidades` */

DROP TABLE IF EXISTS `produccionunidades`;

CREATE TABLE `produccionunidades` (
  `pdesId` int(11) NOT NULL,
  `pdesIdBodeProd` int(11) NOT NULL,
  `pdesIdProducto` int(11) NOT NULL,
  `pdesFecha` date NOT NULL,
  `pdesCantidad` int(11) NOT NULL,
  `pdesValor` int(11) NOT NULL,
  `pdesIdEjecProy` int(11) NOT NULL,
  PRIMARY KEY (`pdesId`),
  KEY `FK_produccionunidades_bodegasproductivas` (`pdesIdBodeProd`),
  KEY `FK_produccionunidades_ejecutarproyectos` (`pdesIdEjecProy`),
  CONSTRAINT `FK_produccionunidades_bodegasproductivas` FOREIGN KEY (`pdesIdBodeProd`) REFERENCES `bodegasproductivas` (`bvasId`),
  CONSTRAINT `FK_produccionunidades_ejecutarproyectos` FOREIGN KEY (`pdesIdEjecProy`) REFERENCES `ejecutarproyectos` (`etosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `produccionunidades` */

/*Table structure for table `productoconsumos` */

DROP TABLE IF EXISTS `productoconsumos`;

CREATE TABLE `productoconsumos` (
  `pmosIdConsuPorc` int(100) NOT NULL,
  `pmosIdConsumo` int(100) NOT NULL,
  KEY `FK_productoconsumos_consumosporcinos` (`pmosIdConsuPorc`),
  CONSTRAINT `FK_productoconsumos_consumosporcinos` FOREIGN KEY (`pmosIdConsuPorc`) REFERENCES `consumoporcinos` (`cnosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `productoconsumos` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `ptosId` int(11) NOT NULL,
  `ptosNombre` varchar(50) NOT NULL,
  `ptosIdBien` int(11) NOT NULL,
  `ptosIdPresentacion` int(11) NOT NULL,
  `ptosNumeRegiNaci` int(11) NOT NULL,
  `ptosObservaciones` varchar(250) NOT NULL,
  `ptosUnidadMedidas` varchar(50) NOT NULL,
  PRIMARY KEY (`ptosId`),
  KEY `FK_productos_bien` (`ptosIdBien`),
  CONSTRAINT `FK_productos_bien` FOREIGN KEY (`ptosIdBien`) REFERENCES `bien` (`bienId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `productos` */

/*Table structure for table `productostransformacion` */

DROP TABLE IF EXISTS `productostransformacion`;

CREATE TABLE `productostransformacion` (
  `pionIdProduccion` int(11) NOT NULL,
  `pionIdTransformacion` int(11) NOT NULL,
  KEY `FK_productostransformacion_transformacion` (`pionIdTransformacion`),
  KEY `FK_productostransformacion_produccion` (`pionIdProduccion`),
  CONSTRAINT `FK_productostransformacion_produccion` FOREIGN KEY (`pionIdProduccion`) REFERENCES `produccionunidades` (`pdesId`),
  CONSTRAINT `FK_productostransformacion_transformacion` FOREIGN KEY (`pionIdTransformacion`) REFERENCES `transformacion` (`tionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `productostransformacion` */

/*Table structure for table `produnidloteave` */

DROP TABLE IF EXISTS `produnidloteave`;

CREATE TABLE `produnidloteave` (
  `paveId` int(11) NOT NULL,
  `paveIdProduccionUnidades` int(11) NOT NULL,
  `paveIdLoteAve` int(11) NOT NULL,
  PRIMARY KEY (`paveId`),
  KEY `FK_produnidloteave_vvvvv` (`paveIdLoteAve`),
  KEY `FK_produnidloteave_producionunidades` (`paveIdProduccionUnidades`),
  CONSTRAINT `FK_produnidloteave_producionunidades` FOREIGN KEY (`paveIdProduccionUnidades`) REFERENCES `produccionunidades` (`pdesId`),
  CONSTRAINT `FK_produnidloteave_vvvvv` FOREIGN KEY (`paveIdLoteAve`) REFERENCES `loteave` (`laveId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `produnidloteave` */

/*Table structure for table `programas` */

DROP TABLE IF EXISTS `programas`;

CREATE TABLE `programas` (
  `pmasId` int(11) NOT NULL AUTO_INCREMENT,
  `pmasNombre` varchar(50) NOT NULL,
  `pmasTipoPrograma` varchar(50) NOT NULL,
  PRIMARY KEY (`pmasId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `programas` */

insert  into `programas`(pmasId,pmasNombre,pmasTipoPrograma) values (1,'ADSI','Titulada'),(2,'ADSI','Titulada');

/*Table structure for table `proyectoformativos` */

DROP TABLE IF EXISTS `proyectoformativos`;

CREATE TABLE `proyectoformativos` (
  `pvosId` int(11) NOT NULL,
  `pvosNombre` varchar(50) NOT NULL,
  `pvosLider` varchar(50) NOT NULL,
  `pvosDescipcion` varchar(250) NOT NULL,
  PRIMARY KEY (`pvosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `proyectoformativos` */

/*Table structure for table `registroanimales` */

DROP TABLE IF EXISTS `registroanimales`;

CREATE TABLE `registroanimales` (
  `rlesId` int(100) NOT NULL,
  `rlesIdentificacionanimal` varchar(100) NOT NULL,
  `rlesIdentificacionNacional` varchar(100) NOT NULL,
  `rlesFechaIngreso` date NOT NULL,
  `rlesProcedencia` varchar(100) NOT NULL,
  `rlesIdentificacionMadre` varchar(100) NOT NULL,
  `rlesCondicionCorporal` varchar(500) NOT NULL,
  `rlesNumeroCamad` varchar(100) NOT NULL,
  `rlesGenero` text NOT NULL,
  `rlesRaza` text NOT NULL,
  `rlesObservacion` varchar(500) CHARACTER SET ucs2 COLLATE ucs2_spanish_ci NOT NULL,
  `rlesEstadoAnimal` varchar(100) NOT NULL,
  `rlesPesoInicial` varchar(100) NOT NULL,
  `rlesPesoFinal` varchar(100) NOT NULL,
  PRIMARY KEY (`rlesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `registroanimales` */

/*Table structure for table `responsabilidades` */

DROP TABLE IF EXISTS `responsabilidades`;

CREATE TABLE `responsabilidades` (
  `rdesId` int(11) NOT NULL,
  `rdesNombre` varchar(50) NOT NULL,
  `rdesDescripcion` varchar(250) NOT NULL,
  `rdesIdBodega` int(11) NOT NULL,
  `rdesIdFormulario` int(11) NOT NULL,
  PRIMARY KEY (`rdesId`),
  KEY `FK_responsabilidades_bodegas` (`rdesIdBodega`),
  CONSTRAINT `FK_responsabilidades_bodegas` FOREIGN KEY (`rdesIdBodega`) REFERENCES `bodegas` (`bgasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `responsabilidades` */

/*Table structure for table `responsabilidadmovimientos` */

DROP TABLE IF EXISTS `responsabilidadmovimientos`;

CREATE TABLE `responsabilidadmovimientos` (
  `rtosId` int(11) NOT NULL,
  `rtosIdUsuaSoli` int(11) NOT NULL,
  `rtosFechaSolicita` date NOT NULL,
  `rtosIdUsuaAuto` int(11) NOT NULL,
  `rtosFechaAutoriza` date NOT NULL,
  `rtosIdUsuaDesp` int(11) NOT NULL,
  `rtosFechaDespacho` date NOT NULL,
  `rtosIdUsuaReci` int(11) NOT NULL,
  `rtosFechaRecibe` date NOT NULL,
  PRIMARY KEY (`rtosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `responsabilidadmovimientos` */

/*Table structure for table `responsabilidadroles` */

DROP TABLE IF EXISTS `responsabilidadroles`;

CREATE TABLE `responsabilidadroles` (
  `rlesIdResponsabilidad` int(11) NOT NULL,
  `rlesIdRol` int(11) NOT NULL,
  KEY `FK_responsabilidadroles_responsabilidades` (`rlesIdResponsabilidad`),
  KEY `FK_responsabilidadroles_rolesusuarios` (`rlesIdRol`),
  CONSTRAINT `FK_responsabilidadroles_responsabilidades` FOREIGN KEY (`rlesIdResponsabilidad`) REFERENCES `responsabilidades` (`rdesId`),
  CONSTRAINT `FK_responsabilidadroles_rolesusuarios` FOREIGN KEY (`rlesIdRol`) REFERENCES `rolesusuarios` (`riosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `responsabilidadroles` */

/*Table structure for table `rolesusuarios` */

DROP TABLE IF EXISTS `rolesusuarios`;

CREATE TABLE `rolesusuarios` (
  `riosId` int(11) NOT NULL,
  `riosNombre` varchar(50) NOT NULL,
  `riosDescripcion` varchar(250) NOT NULL,
  `riosEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`riosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `rolesusuarios` */

/*Table structure for table `segmentos` */

DROP TABLE IF EXISTS `segmentos`;

CREATE TABLE `segmentos` (
  `stosId` int(11) NOT NULL,
  `stosNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`stosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `segmentos` */

/*Table structure for table `seguimientos` */

DROP TABLE IF EXISTS `seguimientos`;

CREATE TABLE `seguimientos` (
  `stosId` int(100) NOT NULL,
  `stosIdRegiAnim` int(100) NOT NULL,
  `stosFecha` date NOT NULL,
  `stosPeso` varchar(100) NOT NULL,
  `stosEdad` int(100) NOT NULL,
  `stosDiasPermanencia` varchar(100) NOT NULL,
  `stosObservacion` varchar(100) NOT NULL,
  `stosEstado` varchar(100) NOT NULL,
  `stosIdEtapa` int(100) NOT NULL,
  `stosIdResponsable` int(100) NOT NULL,
  PRIMARY KEY (`stosId`),
  KEY `FK_seguimientos_etapas` (`stosIdEtapa`),
  KEY `FK_seguimientos_registroanimales` (`stosIdRegiAnim`),
  CONSTRAINT `FK_seguimientos_etapas` FOREIGN KEY (`stosIdEtapa`) REFERENCES `etapas` (`epasId`),
  CONSTRAINT `FK_seguimientos_registroanimales` FOREIGN KEY (`stosIdRegiAnim`) REFERENCES `registroanimales` (`rlesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `seguimientos` */

/*Table structure for table `subproductos` */

DROP TABLE IF EXISTS `subproductos`;

CREATE TABLE `subproductos` (
  `stosId` int(11) NOT NULL,
  `stosIdtransformacion` int(11) NOT NULL,
  `stosIdProdUnid` int(11) NOT NULL,
  PRIMARY KEY (`stosId`),
  KEY `FK_subproductos_produccionunidades` (`stosIdProdUnid`),
  KEY `FK_subproductos_transformacion` (`stosIdtransformacion`),
  CONSTRAINT `FK_subproductos_produccionunidades` FOREIGN KEY (`stosIdProdUnid`) REFERENCES `produccionunidades` (`pdesId`),
  CONSTRAINT `FK_subproductos_transformacion` FOREIGN KEY (`stosIdtransformacion`) REFERENCES `transformacion` (`tionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `subproductos` */

/*Table structure for table `tipoave` */

DROP TABLE IF EXISTS `tipoave`;

CREATE TABLE `tipoave` (
  `taveId` int(11) NOT NULL,
  `taveNombre` varchar(250) NOT NULL,
  `taveDescripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`taveId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tipoave` */

/*Table structure for table `tipocontratista` */

DROP TABLE IF EXISTS `tipocontratista`;

CREATE TABLE `tipocontratista` (
  `ttasId` int(11) NOT NULL AUTO_INCREMENT,
  `ttasNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`ttasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipocontratista` */

/*Table structure for table `tipoempleados` */

DROP TABLE IF EXISTS `tipoempleados`;

CREATE TABLE `tipoempleados` (
  `ttosId` int(11) NOT NULL AUTO_INCREMENT,
  `ttosNombre` varchar(250) NOT NULL,
  PRIMARY KEY (`ttosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipoempleados` */

/*Table structure for table `tipofuncionarios` */

DROP TABLE IF EXISTS `tipofuncionarios`;

CREATE TABLE `tipofuncionarios` (
  `tiosId` int(11) NOT NULL AUTO_INCREMENT,
  `tiosNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`tiosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tipofuncionarios` */

/*Table structure for table `tiposotros` */

DROP TABLE IF EXISTS `tiposotros`;

CREATE TABLE `tiposotros` (
  `trosId` int(11) NOT NULL,
  `trosNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`trosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tiposotros` */

/*Table structure for table `tipotratamientos` */

DROP TABLE IF EXISTS `tipotratamientos`;

CREATE TABLE `tipotratamientos` (
  `ttosId` int(100) NOT NULL,
  `ttosNombre` varchar(100) NOT NULL,
  PRIMARY KEY (`ttosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tipotratamientos` */

/*Table structure for table `tipovinculaciones` */

DROP TABLE IF EXISTS `tipovinculaciones`;

CREATE TABLE `tipovinculaciones` (
  `tvesId` int(11) NOT NULL AUTO_INCREMENT,
  `tvesNombre` varchar(250) NOT NULL,
  PRIMARY KEY (`tvesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipovinculaciones` */

/*Table structure for table `titulaciones` */

DROP TABLE IF EXISTS `titulaciones`;

CREATE TABLE `titulaciones` (
  `tnesFicha` int(11) NOT NULL,
  `tnesFechaInicio` date NOT NULL,
  `tnesFechaFin` date NOT NULL,
  `tnesVersion` varchar(50) NOT NULL,
  `tnesEstado` varchar(50) NOT NULL,
  `tnesIdPrograma` int(11) NOT NULL,
  PRIMARY KEY (`tnesFicha`),
  KEY `FK_titulaciones_programa` (`tnesIdPrograma`),
  CONSTRAINT `FK_titulaciones_programa` FOREIGN KEY (`tnesIdPrograma`) REFERENCES `programas` (`pmasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `titulaciones` */

/*Table structure for table `transformacion` */

DROP TABLE IF EXISTS `transformacion`;

CREATE TABLE `transformacion` (
  `tionId` int(11) NOT NULL,
  `tionLote` int(11) NOT NULL,
  `tionResponsable` varchar(50) NOT NULL,
  `tionFechaElaboracion` date NOT NULL,
  `tionFechaVencimiento` date NOT NULL,
  `tionFechaProduccion` date NOT NULL,
  `tionObservacion` varchar(250) NOT NULL,
  `tionEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`tionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transformacion` */

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `trimestres` */

insert  into `trimestres`(tresId,tresNombre,tresAnual,tresFechaInicio,tresFechaFin,tresEstado) values (1,'Primer Trimestre de 2015',2015,'2015-01-19','2015-04-04','A'),(2,'Segundo Trimestre de 2015',2015,'2015-04-05','2015-06-24','A'),(3,'Tercer Trimestre de 2015',2015,'2015-06-25','2015-09-27','A'),(4,'Cuarto Trimestre de 2015',2015,'2015-09-28','2015-12-19','A'),(5,'Primer Trimestre de 2016',2016,'2016-01-18','2016-04-01','A'),(6,'Segundo Trimestre de 2016',2016,'2016-04-04','2016-06-24','I');

/*Table structure for table `unidadesproductivas` */

DROP TABLE IF EXISTS `unidadesproductivas`;

CREATE TABLE `unidadesproductivas` (
  `uvasId` int(11) NOT NULL,
  `uvasIdAreaProd` int(11) NOT NULL,
  `uvasNombre` varchar(50) NOT NULL,
  PRIMARY KEY (`uvasId`),
  KEY `FK_unidadesproductivas_areasproductivas` (`uvasIdAreaProd`),
  CONSTRAINT `FK_unidadesproductivas_areasproductivas` FOREIGN KEY (`uvasIdAreaProd`) REFERENCES `areaproductivas` (`avasId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `unidadesproductivas` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `uiosId` int(11) NOT NULL,
  `uiosIdVinculaciones` int(11) NOT NULL,
  `uiosNombreUsuario` varchar(250) NOT NULL,
  `uiosPassword` varchar(250) NOT NULL,
  `uiosIdRol` int(11) NOT NULL,
  `uiosEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`uiosId`),
  KEY `FK_usuarios_usuariosroles` (`uiosIdRol`),
  KEY `FK_usuarios_datospersonales` (`uiosIdVinculaciones`),
  CONSTRAINT `FK_usuarios_datospersonales` FOREIGN KEY (`uiosIdVinculaciones`) REFERENCES `datopersonales` (`dlesId`),
  CONSTRAINT `FK_usuarios_usuariosroles` FOREIGN KEY (`uiosIdRol`) REFERENCES `rolesusuarios` (`riosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

/*Table structure for table `valorcalificadores` */

DROP TABLE IF EXISTS `valorcalificadores`;

CREATE TABLE `valorcalificadores` (
  `vresId` int(11) NOT NULL,
  `vresIdCalificador` int(11) NOT NULL,
  `vresNombre` varchar(250) NOT NULL,
  PRIMARY KEY (`vresId`),
  KEY `FK_valorcalificadores_calificadores` (`vresIdCalificador`),
  CONSTRAINT `FK_valorcalificadores_calificadores` FOREIGN KEY (`vresIdCalificador`) REFERENCES `calificadores` (`cresId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `valorcalificadores` */

/*Table structure for table `valorestipulados` */

DROP TABLE IF EXISTS `valorestipulados`;

CREATE TABLE `valorestipulados` (
  `vdosId` int(11) NOT NULL,
  `vdosValorEstipulado` int(11) NOT NULL,
  `vdosAnoVigencia` int(11) NOT NULL,
  `vdosIdProducto` int(11) NOT NULL,
  PRIMARY KEY (`vdosId`),
  KEY `FK_valorestipulados_producto` (`vdosIdProducto`),
  CONSTRAINT `FK_valorestipulados_producto` FOREIGN KEY (`vdosIdProducto`) REFERENCES `productos` (`ptosId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `valorestipulados` */

/*Table structure for table `vinculaciones` */

DROP TABLE IF EXISTS `vinculaciones`;

CREATE TABLE `vinculaciones` (
  `vnesId` int(11) NOT NULL AUTO_INCREMENT,
  `vnesIdDatoPers` int(11) NOT NULL,
  `vnesIdTipoVinc` int(11) NOT NULL,
  `vnesEstado` varchar(20) NOT NULL,
  `vnesUid` varchar(20) NOT NULL,
  PRIMARY KEY (`vnesId`),
  KEY `FK_vinculaciones_datospersonale` (`vnesIdDatoPers`),
  KEY `FK_vinculaciones_typovinculacion` (`vnesIdTipoVinc`),
  CONSTRAINT `FK_vinculaciones_datospersonale` FOREIGN KEY (`vnesIdDatoPers`) REFERENCES `datopersonales` (`dlesId`),
  CONSTRAINT `FK_vinculaciones_typovinculacion` FOREIGN KEY (`vnesIdTipoVinc`) REFERENCES `tipovinculaciones` (`tvesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `vinculaciones` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
