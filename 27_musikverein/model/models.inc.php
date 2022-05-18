<?php
// models.inc.php

// --> für jede Tabelle der Datenbank eine PHP-Klasse schreiben

class Skill 
{
    // Eigenschaften
    public int $id;
    public string $name;

    // Konstruktor, der die Eigenschaften beim Erzeugen eines
    // Objekts initialisiert
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name; 
    }
}

class User 
{
    public int $id;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public DateTime $birthdate;
    public bool $is_admin;

    public function __construct(int $id, string $firstname, string $lastname,
                                string $email, string $password, DateTime $birthdate,
                                bool $is_admin)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->birthdate = $birthdate;
        $this->is_admin = $is_admin;
    }
}

class UserSkill 
{
    
}

?>