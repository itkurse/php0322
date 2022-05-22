<?php
class EventService
{
    private PDO $conn;
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    // Lädt alle EventTypes aus der Datenbank
    // Gibt ein Array von Objekten der Klasse EventType zurück
    public function getEventTypes() : array 
    {
        $ps = $this->conn->prepare('
            SELECT * 
            FROM event_type
        ');
        $ps->execute();

        $eventTypes = [];
        while($row = $ps->fetch())
        {
            $eventTypes[] = new EventType($row['id'], $row['name']);
        }
        return $eventTypes; 
    }
}
?>