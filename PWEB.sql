
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

DELIMITER $$
	CREATE PROCEDURE select_persona(id BIGINT)
    BEGIN
		SELECT idpersona,papellido,sapellido,nombre,fecha,genero,numbol,calle,numerocasaext,numerocasaint,colonia,alcaldia,entife,cp,
            tel,cel,correo,ocupacion,curp,escuela,promedio FROM persona WHERE idpersona=id AND STATUS != 0;
	END; $$
DELIMITER ;

DELIMITER $$z
	CREATE PROCEDURE insert_persona(nombre varchar(30),papellido varchar(30),sapellido varchar(30),
    fecha varchar(15),genero varchar(30),curp varchar(30),numbol varchar(30),alcaldia varchar(30),
    colonia varchar(30),cp varchar(30),calle varchar(30),numerocasaext varchar(30),numerocasaint varchar(30),
    tel varchar(30),correo varchar(30),escuela varchar(40), entife varchar(30),promedio varchar(30))
    BEGIN
		DECLARE existe_persona INT;
        DECLARE id INT;
       
		SET existe_persona = ( SELECT COUNT(*) FROM persona WHERE correo = correob);   
        IF existe_persona = 0 THEN
			INSERT INTO persona(nombre,papellido.sapellido,fecha, genero, curp, numbol,alcaldia,colonia,
            cp,calle,numerocasaext,numerocasaint,tel,correo,escuela,entife,promedio)
            
            VALUES(nombre,papellido.sapellido,fecha, genero, curp, numbol,alcaldia,colonia,
            cp,calle,numerocasaext,numerocasaint,tel,correo,escuela,entife,promedio);
			SET id = LAST_INSERT_ID();
            ELSE 
				SET id=0;        
        END IF;
        SELECT id; 
    END; $$
DELIMITER ;

DELIMITER $$
	CREATE PROCEDURE update_persona(id BIGINT(20),nombre varchar(30),papellido varchar(30),sapellido varchar(30),
    fecha varchar(15),genero varchar(30),curp varchar(30),numbol varchar(30),alcaldia varchar(30),
    colonia varchar(30),cp varchar(30),calle varchar(30),numerocasaext varchar(30),numerocasaint varchar(30),
    tel varchar(30),correo varchar(30),escuela varchar(40), entife varchar(30),promedio varchar(30) )
    BEGIN
		DECLARE existe_persona INT;
        DECLARE existe_email INT;
        DECLARE idp INT;
       
		SET existe_persona = ( SELECT COUNT(*) FROM persona WHERE idpersona = id);   
        IF existe_persona > 0 THEN
			SET existe_email = ( SELECT COUNT(*) FROM persona WHERE correo = correob AND idpersona != id);
            IF existe_email = 0 THEN 
				UPDATE persona SET nombre=nombreb, papellido=papellidob, sapellido=sapellidob, fecha=fechab,
                genero=generob, curp=curpb, numbol=numbolb, alcaldia=alcaldiab, colonia=coloniab, cp=cpb, calle=calleb,
                numerocasaext=numerocasaextb, numerocasaint=numerocasaintb, tel=telb, correo=correob, 
                escuela=escuelab, entife=entifeb, promedio=promediob  WHERE idpersona = id;
				SET idp = id;
            ELSE
				SET idp = 0;
            END IF;
			
            ELSE 
				SET idp=0;        
        END IF;
        SELECT idp; 
    END; $$
DELIMITER ;

DELIMITER $$
	CREATE PROCEDURE delete_persona(personaid BIGINT(20))
    BEGIN
		DECLARE existe_persona INT;
        DECLARE id INT;
       
		SET existe_persona = ( SELECT COUNT(*) FROM persona WHERE idpersona = personaid);   
        IF existe_persona > 0 THEN
			DELETE FROM persona where idpersona = personaid;
            SET id = 1;
		ELSE
				SET id = 0;
            END IF;	     
        SELECT id; 
    END; $$
DELIMITER ;










