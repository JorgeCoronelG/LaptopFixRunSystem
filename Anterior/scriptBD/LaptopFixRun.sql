/**
 * Author:  Jorge Coronel González
 * Created: 20/05/2019
 */

CREATE DATABASE LAPTOPFIXRUN;
USE LAPTOPFIXRUN;

--Tabla para los tipos de usuario
CREATE TABLE TYPE_USER(
    idTypeUser INT(1) NOT NULL PRIMARY KEY,
    typeUser VARCHAR(50)
);

INSERT INTO TYPE_USER VALUES(1, 'LF');
INSERT INTO TYPE_USER VALUES(2, 'Customer');
INSERT INTO TYPE_USER VALUES(3, 'Técnico');

--Tabla de información del usuario para accesar a la aplicación
CREATE TABLE USER(
    email VARCHAR(120) NOT NULL PRIMARY KEY,
    password VARCHAR(32),
    status INT(1),
    idTypeUser INT(1),
    FOREIGN KEY(idTypeUser) REFERENCES TYPE_USER(idTypeUser) ON DELETE SET NULL ON UPDATE CASCADE
);

INSERT INTO USER VALUES('contacto@laptopfix.com.mx',md5('laptopfix'),1,1);

CREATE TABLE TECHNICAL(
    idTech VARCHAR(50) NOT NULL PRIMARY KEY,
    nameTech VARCHAR(150),
    addTech VARCHAR(256),
    phoneTech VARCHAR(10),
    email VARCHAR(120),
    ifeTech TEXT,
    comAddTech TEXT,
    FOREIGN KEY(email) REFERENCES USER(email) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE PAYMENT(
    idTech VARCHAR(50),
    payment DEC(10,2),
    FOREIGN KEY(idTech) REFERENCES TECHNICAL(idTech) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE BASE_SERVICE(
    baseService DEC(6,2)
);

INSERT INTO BASE_SERVICE VALUES(300);

--Tabla del cliente para guardar su información
CREATE TABLE CUSTOMER(
    idCus VARCHAR(50) NOT NULL PRIMARY KEY,
    nameCus VARCHAR(150),
    phoneCus VARCHAR(10),
    email VARCHAR(120),
    FOREIGN KEY(email) REFERENCES USER(email) ON DELETE CASCADE ON UPDATE CASCADE
);

--Tabla para guardar las citas que agende el cliente para ir a LAPTOPFIX
CREATE TABLE DATE_LF(
    idDateLF INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idCus VARCHAR(50),
    dateCus DATE,
    hourCus TIME,
    descProblem TEXT,
    FOREIGN KEY(idCus) REFERENCES CUSTOMER(idCus) ON DELETE CASCADE ON UPDATE CASCADE
);

--Tabla para guardar las citas a domicilio que agende el cliente
CREATE TABLE DATE_H(
    idDateH INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idCus VARCHAR(50),
    date VARCHAR(10),
    hour VARCHAR(5),
    address TEXT,
    descProblem TEXT,
    service INT(1),
    status INT(1)
    FOREIGN KEY(idCus) REFERENCES CUSTOMER(idCus) ON DELETE CASCADE ON UPDATE CASCADE
);

--Tabla para guardar los comentarios que hagan los clientes
CREATE TABLE COMMENT(
    idComment INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comment TEXT,
    score INT(1),
    dateComment DATE,
    idCus VARCHAR(50),
    idTech VARCHAR(50),
    FOREIGN KEY(idCus) REFERENCES CUSTOMER(idCus) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(idTech) REFERENCES TECHNICAL(idTech) ON DELETE CASCADE ON UPDATE CASCADE
);