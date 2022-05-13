<?php

/*
Nach dem Anlegen der DB-Tabellen wird für jede Tabelle eine 
Klasse erzeugt. 
Tabellennamen --> Klassenname

Aus jeder Spalte der Tabelle wird eine Eigenschaft der Klasse. 

Idee: Abbilden der DB-Tabelle als PHP-Klasse. 
*/

class Kontaktanfrage
{
    public int $id;
    public string $vorname;
    public string $nachname;
    public string $email;
    public string $nachricht;

    public function __construct(int $id, string $vorname, string $nachname, 
                                string $email, string $nachricht)
    {
        $this->id = $id;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->email = $email;
        $this->nachricht = $nachricht; 
    }
}

?>