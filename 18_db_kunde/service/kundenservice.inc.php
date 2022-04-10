<?php
class KundenService
{
    // Eigenschaften
    private PDO $conn;

    // Konstruktor --> initialisieren der Eigenschaften
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    // Methoden (Tätigkeiten der Klasse)
    public function insertKunde(Kunde $kunde)
    {
        $ps = $this->conn->prepare(
            'INSERT INTO kunde 
            (name, adresse) 
            VALUES 
            (:name, :adresse) ');
        // Named Parameter :name und :adresse ersetzen
        $ps->bindValue('name', $kunde->name);
        $ps->bindValue('adresse', $kunde->adresse);
        // Statement an die Datenbank senden
        $ps->execute();
        // ID des neuen Kunden herausfinden (kundennummer)
        $id = $this->conn->lastInsertId();

        // ID zurückgeben
        return $id;
    }
}

?>