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

/*
Zwischentabellen bei n:m Beziehungen die keine weiteren Informationen
enthalten (außer die Verknüpfung der beidem Tabellen) müssen nicht
als PHP-Klasse angelegt werden. 
z. B. user_skill, participation
*/

class EventType 
{
    public int $id;
    public string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

class Event 
{
    public int $id;
    public string $title;
    public DateTime $date_and_time;
    public int $eventtype_id;
    public string $img_filename;

    public function __construct(int $id, string $title, 
                                DateTime $date_and_time, int $eventtype_id,
                                string $img_filename)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date_and_time = $date_and_time;
        $this->eventtype_id = $eventtype_id;
        $this->img_filename = $img_filename;
    }
}

?>