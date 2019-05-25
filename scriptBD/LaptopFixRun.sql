/**
 * Author:  tprog
 * Created: 20/05/2019
 */

CREATE DATABASE laptopfixrun;
USE laptopfixrun;

--Tabla para los tipos de usuario
CREATE TABLE TYPE_USER(
    idTypeUser int(1) NOT NULL PRIMARY KEY,
    typeUser varchar(50)
);

INSERT INTO TYPE_USER VALUES(1, 'LF');
INSERT INTO TYPE_USER VALUES(2, 'Customer');

--Tabla de información del usuario para accesar a la aplicación
CREATE TABLE USER(
    email varchar(120) NOT NULL PRIMARY KEY,
    password varchar(32),
    status int(1),
    idTypeUser int(1),
    FOREIGN KEY(idTypeUser) REFERENCES TYPE_USER(idTypeUser) ON DELETE RESTRICT ON UPDATE CASCADE
);

INSERT INTO USER VALUES('laptopfix@gmail.com',md5('123456'),1,1);

--Tabla del cliente para guardar su información
CREATE TABLE CUSTOMER(
    idCus int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameCus varchar(150),
    numberCus varchar(10),
    email varchar(120),
    FOREIGN KEY(email) REFERENCES USER(email) ON DELETE CASCADE ON UPDATE CASCADE
);

--Tabla para guardar las citas que agende el cliente
CREATE TABLE DATE_CUSTOMER(
    idDate int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idCus int,
    dateCus date,
    hourCus time,
    residenceCus text,
    descProblem text,
    FOREIGN KEY(idCus) REFERENCES CUSTOMER(idCus)
);

--Tabla para guardar los comentarios que hagan los clientes
CREATE TABLE COMMENT(
    idComment int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comment text,
    score int(1),
    dateComment date,
    idCus int,
    FOREIGN KEY(idCus) REFERENCES CUSTOMER(idCus)
);