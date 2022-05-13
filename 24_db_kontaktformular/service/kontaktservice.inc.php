<?php

// Die Programmlogik kann in "Service"-Klassen zusammengefasst werden

class KontaktService
{
    // Aus der index.php (z. B.) die DB-Connection in diese
    // Klasse hereinbekommen
    // --> Dem Objekt der Klasse KontaktService die DB-Connection hinterlegen
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn; 
    }

    /*
    + createKontaktanfrage(vorname:string, nachname:string, email:string, 
                            nachricht:string) : int 
    + getKontaktanfragen() : array 
    + getKontaktanfrageById(id:int) : Kontaktanfrage|bool
    + updateKontaktanfrage(kontaktanfrage:Kontaktanfrage) : void 
    + deleteKontaktanfrage(id:int) : void 
    */

    // Schreibt eine Kontaktanfrage in die Datenbank 
    // gibt die ID der eingefügten Kontaktanfrage zurück
    public function createKontaktanfrage(string $vorname, string $nachname,
                                        string $email, string $nachricht) : int 
    {
        // Datenbankzugriffe erfolgen mit Hilfe von "Prepared Statements"

        // 1) Prepared Statement erzeugen
        $ps = $this->conn->prepare('
                INSERT INTO kontaktanfrage 
                (vorname, nachname, email, nachricht) 
                VALUES 
                (:vorname, :nachname, :email, :nachricht) 
        ');

        // :vorname, :nachname, ... --> Named Parameter
        // dient der Vorbeugung von SQL-Injections 

        // 2) Named Parameter durch die eigentlichen Werte zu ersetzen
        // ersetze :vorname mit dem Wert der Variable $vorname 
        $ps->bindValue('vorname', $vorname);
        $ps->bindValue('nachname', $nachname);
        $ps->bindValue('email', $email);
        $ps->bindValue('nachricht', $nachricht);

        // 3) Das fertige SQL-Statement an die Datenbank senden und ausführen lassen
        $ps->execute();

        // 4) Welche ID hat der neue Datensatz bekommen? 
        $id = $this->conn->lastInsertId();

        return $id; 
    }
}

?>