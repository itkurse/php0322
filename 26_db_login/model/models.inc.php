<?php

/*
Model-Klassen: Nachdem die DB-Connection angelegt wurde, 
können die Model-Klassen geschrieben werden. 

Aus jeder Datenbank-Tabelle wird eine Klasse.
Aus jeder Spalte der Tabelle wird eine Eigenschaft der Klasse. 

--> Zweck: Abbilung der Datenbank-Daten in der PHP-Anwendung
*/

class User 
{
    // Eigenschaften
    public int $id;
    public string $email;
    public string $password;
    public string $firstname;
    public string $lastname;
    public bool $is_admin;

    // Konstruktor
    // wird beim Erzeugen eines Objekts der Klasse aufgerufen
    public function __construct(int $id, string $email, 
                                string $password, string $firstname,
                                string $lastname, bool $is_admin)
    {
        // kopiere die Infos der Übergabeparameter auf die Eigenschaften
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->is_admin = $is_admin;
    }
}

?>