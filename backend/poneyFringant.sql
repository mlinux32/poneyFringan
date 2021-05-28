CREATE DATABASE poneyFringant;
USE poneyFringant;

CREATE USER 'lulu'@'localhost' IDENTIFIED BY 'lulu';
GRANT ALL ON poneyFringant.* TO 'lulu'@'localhost';
CREATE USER 'jojo'@'localhost' IDENTIFIED BY 'jojo15';
GRANT USAGE ON poneyFringant.* TO 'jojo'@'localhost';
CREATE USER 'pioupiou.j'@'localhost' IDENTIFIED BY 'piou';
GRANT USAGE ON poneyFringant.* TO 'pioupiou.j'@'localhost';

CREATE TABLE `Adherents` (
    `adherent_id` INT NOT NULL AUTO_INCREMENT,
    `prenom` VARCHAR(30) NOT NULL,
    `nom` VARCHAR(30) NOT NULL,
    `pseudo` VARCHAR(50)  NOT NULL,
    `email` VARCHAR(50)  NOT NULL,
    `numero` VARCHAR(100) NOT NULL,
    `adresse` VARCHAR(255) NOT NULL,
    `code_postal` INT(10) NOT NULL,
    `ville` VARCHAR(100) NOT NULL,
    `date_adhesion` DATE DEFAULT CURRENT_DATE,
    PRIMARY KEY (`adherent_id`),
    UNIQUE KEY `pseudo` (`pseudo`),
    UNIQUE KEY `email` (`email`),
    UNIQUE KEY `numero` (`numero`)
) ENGINE=InnoDB;

CREATE TABLE `Profils` (
    `profil_id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titre` VARCHAR(30) NOT NULL,
    `photo` VARCHAR(30) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `adherent_id` INT(10) NOT NULL ,
    CONSTRAINT `contrainte_cle_etrangere_adherent_id` FOREIGN KEY (`adherent_id`) REFERENCES `Adherents` (`adherent_id`)
) ENGINE=InnoDB;

CREATE TABLE `InteretAdherent` (
    `centreInteret_id` INT(10) NOT NULL AUTO_INCREMENT,
    `adherent_id` INT(10) DEFAULT NULL,
    PRIMARY KEY (`centreInteret_id`),
    CONSTRAINT `contrainte_cle_etrangere_adherent_id` FOREIGN KEY (`adherent_id`) REFERENCES `Adherents` (`adherent_id`)
) ENGINE=InnoDB;

CREATE TABLE `Interets` (
    `CentreInteret_id` INT(10) NOT NULL AUTO_INCREMENT,
    `nom`VARCHAR(100) NOT NULL,
    PRIMARY KEY (`CentreInteret_id`),
    CONSTRAINT `contrainte_cle_etrangere_CentreInteret_id` FOREIGN KEY (`CentreInteret_id`) REFERENCES `InteretAdherent` (`CentreInteret_id`)
) ENGINE=InnoDB;

INSERT INTO Adherents(prenom, nom, pseudo, email, numero, adresse, code_postal, ville, date_adhesion) 
VALUES ('Jojo', 'Lasticau', 'jojol', 'jojo.lasticau@gmail.fr', 'adh-2045-0170', '237 Rue des Magots', '08329', 'Tilcau', '2011-01-11');
INSERT INTO Adherents(prenom, nom, pseudo, email, numero, adresse, code_postal, ville, date_adhesion) 
VALUES ('Pioupiou', 'Jaunisse', 'pijau', 'pioupiou.j@gmx.fr', 'adh-2045-0059', '1 Squale dur', '68399', 'Reqinout', '2020-12-25');

INSERT INTO Profils(titre, photo, description, adherent_id) VALUES ('', '', '', '');
INSERT INTO Profils(titre, photo, description, adherent_id) VALUES ('', '', '', '');

INSERT INTO InteretAdherent (centreInteret_id, adherent_id) VALUES ('', '');
INSERT INTO InteretAdherent (centreInteret_id, adherent_id) VALUES ('', '');

INSERT INTO Interets (nom)VALUES ('sport'),('musique'),('jeux vidéos'),('lecture'),('informatique'), ('sorties'),('cuisine'),('aviation'),('mécanique'),('licornes'),
('joaillerie'),('agriculture'),('cinéma'),('politique'),('couture'), ('animaux'),('science'),('histoire'),('svt'),('physique-chimie'),('taxidermie'),('philatélie');
