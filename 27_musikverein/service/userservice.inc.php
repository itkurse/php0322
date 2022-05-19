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
}
?>