DROP DATABASE IF EXISTS connexion;
CREATE DATABASE connexion;

CREATE USER IF NOT EXISTS lili@localhost IDENTIFIED BY 'bellasea9';

GRANT ALL ON connexion.* TO lili@localhost;
DROP TABLE IF EXISTS adherents;
CREATE TABLE adherents (  
    id INT PRIMARY KEY AUTO_INCREMENT,
    identifiant VARCHAR(255) UNIQUE,
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    date_adhesion DATE DEFAULT(current_date)
);

INSERT INTO adherents(identifiant, password) VALUES ('Julio', '$2y$10$GoxMbrB7NQ.bK2ICbSG.ze.Y.JL2z/gdfCr67wdb2pwXxcfjISg4y'); -- bellasea8