
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP DATABASE IF EXISTS `form`;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`form` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `form`;

/*Table structure for table `inscripcion` */

DROP TABLE IF EXISTS `persona`;


CREATE TABLE `persona` (
  `idpersona` BIGINT(20) NOT NULL AUTO_INCREMENT, 

  /*Identidad*/
  `nombre` varchar(30) NOT NULL,
  `papellido` varchar(30) NOT NULL, 
  `sapellido` varchar(30) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `genero` varchar(30) NOT NULL, 
  `curp` varchar(30) NOT NULL, 
  `numbol` varchar(30) NOT NULL, 

  /*Contacto*/
  `alcaldia` varchar(30) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `cp` varchar(30) NOT NULL, 
  `calle` varchar(30) NOT NULL,
  `numerocasaext` varchar(30) NOT NULL, 
  `numerocasaint` varchar(30) NOT NULL, 
  `tel` varchar(30) NOT NULL, 
  `correo` varchar(30) NOT NULL,

  /*Procedencia*/
  `escuela` varchar(40) NOT NULL,
  `entife` varchar(30) NOT NULL, 
  `promedio` varchar(30) NOT NULL, 
  
  PRIMARY KEY (`idpersona`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `persona`
  ADD UNIQUE KEY `numbol` (`numbol`);




















