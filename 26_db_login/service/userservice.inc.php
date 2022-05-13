<?php
// Service enthält Programmlogik, aber KEINE Ausgabe an den User
// und auch keine direkte Eingabe vom User
class UserService
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn; 
    }

    /*
    Fähigkeiten der Klasse UserService:

    + createUser(email:string, password:string, firstname:string, lastname:string,
                is_admin:bool) : int 
    + getUserByEmail(email:string) : User|bool 
    + deleteUser(id:int) : void 
    + updateUser(user:User) : void 

    */

    // Erstellt einen neuen User in der Datenbank
    // und gibt die ID des erstellten User zurück 
    public function createUser(string $email, string $password, string $firstname,
                                string $lastname, bool $is_admin) : int 
    {
        // Passwort niemals im Klartext in der DB speichern! 
        // immer nur als Hashwert!
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Zugriff auf DB immer Prepared Statements!
        $ps = $this->conn->prepare(
            'INSERT INTO users 
            (email, password, firstname, lastname, is_admin) 
            VALUES 
            (:email, :password, :firstname, :lastname, :is_admin)'
        );

        // Platzhalter, zB: :email, :password, ... 
        // Platzhalter (Named Parameter) mit den eigentlichen Werten ersetzen 
        // z. B. Ersetze :email mit dem Wert der Variable $email
        $ps->bindValue('email', $email);
        $ps->bindValue('password', $password);
        $ps->bindValue('firstname', $firstname);
        $ps->bindValue('lastname', $lastname);
        $ps->bindValue('is_admin', $is_admin);

        // Sende den nun fertigen SQL-Befehl an die Datenbank
        $ps->execute();

        // Welche ID wurde von der Datenbank generiert?
        $id = $this->conn->lastInsertId();

        return $id; 
    }

}


?>