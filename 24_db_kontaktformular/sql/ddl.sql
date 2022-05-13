-- DDL: Data Definition Language (CREATE TABLE statements ...) 
-- AUTO_INCREMENT: DB vergibt Wert aufsteigend

CREATE TABLE kontaktanfrage
(
    id INT AUTO_INCREMENT,
    vorname VARCHAR(300) NOT NULL,
    nachname VARCHAR(300) NOT NULL,
    email VARCHAR(320) NOT NULL,
    nachricht TEXT NOT NULL,
    PRIMARY KEY(id)
);