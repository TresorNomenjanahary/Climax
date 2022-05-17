CREATE DATABASE Climax;
USE Climax;

CREATE TABLE Admin(
    idAdmin SMALLINT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(10) NOT NULL,
    prenom VARCHAR(10) NOT NULL,
    email VARCHAR(20) NOT NULL,
    mdp VARCHAR(20) NOT NULL
);

CREATE TABLE Region(
    idRegion SMALLINT PRIMARY KEY NOT NULL,
    nom VARCHAR(13) NOT NULL
);

CREATE TABLE Article(
    idArticle SMALLINT PRIMARY KEY NOt NULL,
    intitule VARCHAR(85) NOT NULL,
    description TEXT NOT NULL,
    
);

INSERT INTO Admin VALUES(1,'Jean','Batiste','jean@gmail.com',SHA1('12345678'));
INSERT INTO Admin VALUES(2,'mika','Delanney','mika@gmail.com',SHA1('12345678'));

INSERT INTO Region VALUES(1,'');
INSERT INTO Region VALUES(2,'');
INSERT INTO Region VALUES(3,'');

INSERT INTO Article VALUES(3,'');
INSERT INTO Article VALUES(3,'');