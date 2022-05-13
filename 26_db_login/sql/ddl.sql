-- DDL: Data Definition Language (SQL CREATE TABLE statements, ...)
-- dient der Defintion Tabellenstruktur

-- Datentypen (MySQL / MariaDB)
-- INT: Ganze Zahl
-- DECIMAL(Gesamtstellen, Nachkommastellen): Kommazahl
-- VARCHAR(max. Länge): VARCHAR(20) Text mit max. 20 Zeichen
-- TEXT: Text mit max. ca 65000 Zeichen
-- TINYINT(1): wird als boolean verwendet --> 0/1
-- DATE: für Datum ohne Zeit- und Zeitzonenangabe
-- DATETIME: für Datum+Zeit ohne Zeitzonenangebe
-- TIMESTAMP: für Datum+Zeit MIT Zeitzohenangabe

-- AUTO_INCREMENT: DB vergibt in dieser Spalte aufsteigende Zahlen

CREATE TABLE users 
(
    id INT AUTO_INCREMENT, 
    email VARCHAR(320) NOT NULL, 
    password VARCHAR(100) NOT NULL, 
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    is_admin TINYINT(1) NOT NULL,
    PRIMARY KEY (id), 
    UNIQUE KEY (email)
);