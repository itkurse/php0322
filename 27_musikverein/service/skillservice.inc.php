<?php

/*
Fähigkeiten des SkillService:
+ createSkill(name:string) : int 
+ getSkillByName(name:string) : Skill | bool 
+ getSkillById(id:int) : Skill | bool 
+ getSkills() : array 
+ deleteSkill(id:int) : void 
+ updateSkill(skill:Skill) : void 
*/

class SkillService 
{
    private PDO $conn; 

    // Beim Erzeugen eines Objekts der Klasse SkillService muss eine PDO-Connection
    // angegeben werden (diese Connection wird im Objekt gespeichert)
    public function __construct(PDO $conn)
    {
        $this->conn = $conn; 
    }

    // Speichert einen neuen Skill in der Datenbank
    // Übergeben als Parameter wird der Name des neuen Skill
    // Zurückgegeben wird die von der Datenbank generierte ID des neuen Skill 
    public function createSkill(string $name) : int 
    {
        // Erstelle ein Prepared Statement
        $ps = $this->conn->prepare('
            INSERT INTO skill 
            (name) 
            VALUES 
            (:name)
        ');
        // Ersetze die Named Parameter mit dem eigentlichen einzufügenden Wert
        $ps->bindValue('name', $name);
        // senden wir das SQL-Statement an die Datenbank
        $ps->execute();
        // Wie ist die ID des neu generierten Datensatzes?
        $id = $this->conn->lastInsertId();
        // ID zurückgeben
        return $id; 
    }


    // Liest alle Skills aus der Datenbank aus
    // Gibt ein Array von Objekten der Klasse Skill zurück 
    public function getSkills() : array 
    {
        $ps = $this->conn->prepare('
            SELECT * 
            FROM skill 
        ');
        $ps->execute();

        // Das Ergebnis der Datenbankabfrage auslesen
        $skills = [];

        // Iteriere über jeden gefunden Datensatz
        while($row = $ps->fetch())
        {
            // aus jedem gefundenen Datensatz wird ein Objekt der Klasse Skill erzeugt
            $s = new Skill($row['id'], $row['name']);
            $skills[] = $s; 
        }

        return $skills; 
    }


    // Löscht einen Skill mit der angegebenen ID aus der Datenbank
    public function deleteSkill(int $id)
    {
        $ps = $this->conn->prepare('
            DELETE FROM skill 
            WHERE id = :id 
        ');
        $ps->bindValue('id', $id);
        $ps->execute();
    }


    // Aktualisiert einen Skill in der Datenbank
    // Übergeben wird ein Objekt das Klasse Skill das die neuen Daten enthält
    public function updateSkill(Skill $skill)
    {
        $ps = $this->conn->prepare('
            UPDATE skill 
            SET name = :name 
            WHERE id = :id 
        ');
        $ps->bindValue('name', $skill->name);
        $ps->bindValue('id', $skill->id);
        $ps->execute();
    }


    public function getSkillById(int $id) : Skill | bool 
    {
        $ps = $this->conn->prepare('
            SELECT * 
            FROM skill 
            WHERE id = :id 
        ');
        $ps->bindValue('id', $id);
        $ps->execute();

        while($row = $ps->fetch())
        {
            $skill = new Skill($row['id'], $row['name']);
            return $skill; 
        }
        return FALSE; 
    }
}

?>