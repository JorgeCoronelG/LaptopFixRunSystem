/**
 * Author:  Jorge Coronel González
 * Created: 20/05/2019
 */

CREATE DATABASE LAPTOPFIXRUN;
USE LAPTOPFIXRUN;

--Tabla para los tipos de usuario
CREATE TABLE TYPE_USER(
    idTypeUser int(1) NOT NULL PRIMARY KEY,
    typeUser varchar(50)
);

INSERT INTO TYPE_USER VALUES(1, 'LF');
INSERT INTO TYPE_USER VALUES(2, 'Customer');
INSERT INTO TYPE_USER VALUES(3, 'Técnico');

--Tabla de información del usuario para accesar a la aplicación
CREATE TABLE USER(
    email varchar(120) NOT NULL PRIMARY KEY,
    password varchar(32),
    status int(1),
    idTypeUser int(1),
    FOREIGN KEY(idTypeUser) REFERENCES TYPE_USER(idTypeUser)
);

INSERT INTO USER VALUES('contacto@laptopfix.com.mx',md5('laptopfix'),1,1);

CREATE TABLE TECHNICAL(
    idTech VARCHAR(50) NOT NULL PRIMARY KEY,
    nameTech VARCHAR(150),
    addTech VARCHAR(256),
    phoneTech VARCHAR(10),
    email VARCHAR(120),
    ifeTech text,
    comAddTech text,
    FOREIGN KEY(email) REFERENCES USER(email)
);

CREATE TABLE PAYMENT(
    idTech VARCHAR(50),
    payment DEC(10,2),
    FOREIGN KEY(idTech) REFERENCES TECHNICAL(idTech)
);

--Tabla del cliente para guardar su información
CREATE TABLE CUSTOMER(
    idCus VARCHAR(50) NOT NULL PRIMARY KEY,
    nameCus varchar(150),
    phoneCus varchar(10),
    email varchar(120),
    FOREIGN KEY(email) REFERENCES USER(email)
);

--Tabla para guardar las citas que agende el cliente para ir a LAPTOPFIX
CREATE TABLE DATE_LF(
    idDateLF int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idCus varchar(50),
    dateCus date,
    hourCus time,
    descProblem text,
    FOREIGN KEY(idCus) REFERENCES CUSTOMER(idCus)
);

--Tabla para guardar las citas a domicilio que agende el cliente
CREATE TABLE DATE_H(
    idDateH INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idCus VARCHAR(50),
    date VARCHAR(10),
    hour VARCHAR(5),
    address TEXT,
    descProblem TEXT,
    service int(1),
    status int(1)
    FOREIGN KEY(idCus) REFERENCES CUSTOMER(idCus)
);

--Tabla para guardar los comentarios que hagan los clientes
CREATE TABLE COMMENT(
    idComment int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comment text,
    score int(1),
    dateComment datetime,
    idCus varchar(50),
    idTech varchar(50),
    FOREIGN KEY(idCus) REFERENCES CUSTOMER(idCus),
    FOREIGN KEY(idTech) REFERENCES TECHNICAL(idTech)
);