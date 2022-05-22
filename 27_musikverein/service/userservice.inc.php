<?php
class UserService 
{
    private PDO $conn;
    public function __construct(PDO $conn)
    {
        $this->conn = $conn; 
    }


    // Erstellt einen neuen User in der Datenbank
    // Gibt die ID des Users zurück
    public function createUser(string $firstname, string $lastname, 
                                string $email, string $password, 
                                DateTime $birthdate, bool $is_admin) : int 
    {
        $ps = $this->conn->prepare('
            INSERT INTO user 
            (firstname, lastname, email, password, is_admin, birthdate) 
            VALUES 
            (:firstname, :lastname, :email, :password, :is_admin, :birthdate)
        ');
        $ps->bindValue('firstname', $firstname);
        $ps->bindValue('lastname', $lastname);
        $ps->bindValue('email', $email);

        // Password nur als HASH in die Datenbank speichern!
        $ps->bindValue('password', password_hash($password, PASSWORD_DEFAULT));

        $ps->bindValue('is_admin', $is_admin);

        // birthdate muss im Format, das für die DB verständlich ist, übertragen werden
        $ps->bindValue('birthdate', $birthdate->format('Y-m-d'));

        $ps->execute();

        return $this->conn->lastInsertId();
    }


    // Liest alle User aus der Datenbank aus und gibt sie als Array der Klasse 
    // User zurück 
    public function getUsers() : array 
    {
        $ps = $this->conn->prepare('
            SELECT * 
            FROM user 
        ');
        $ps->execute();

        // Array definieren in dem alle gefundenen User als Objekt der Klasse User
        // gespeichert werden
        $users = []; 

        // Schleife in der wir über jeden gefundenen Datensatz iterieren
        while($row = $ps->fetch())
        {
            $birthdate = DateTime::createFromFormat('Y-m-d', $row['birthdate']);
            // aus einem Datensatz ein Objekt erzeugen
            $users[] = new User($row['id'], $row['firstname'], $row['lastname'],
                                $row['email'], $row['password'], $birthdate, 
                                $row['is_admin']);
        }
        return $users; 
    }
}
?>