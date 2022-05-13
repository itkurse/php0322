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


    // Sucht einen User anhand der Email in der Datenbank
    // Wenn gefunden, gibt ein Objekt der Klasse User zurück
    // wenn nicht gefunden, gibt die Funktion false zurück 
    public function getUserByEmail(string $email) : User | bool 
    {
        $ps = $this->conn->prepare('
            SELECT * 
            FROM users 
            WHERE email = :email 
        ');
        $ps->bindValue('email', $email);
        $ps->execute();

        // Ergebnis auslesen
        while($row = $ps->fetch())
        {
            // Aus dem Datensatz in $row ein Objekt der Klasse User erzeugen
            $u = new User($row['id'], $row['email'], $row['password'], $row['firstname'],
                            $row['lastname'], $row['is_admin']);

            // Objekt zurückgeben
            return $u; 
        }
        return FALSE; 
    }


    // Loggt den User ein wenn die Kombination aus $email und $passwort
    // korrekt ist. Setzt die $_SESSION-Variable 'logged_in_user_id' bei Erfolg. 
    // Gibt TRUE zurück wenn Login erfolgreich, ansonsten FALSE
    public function login(string $email, string $password) : bool 
    {
        // 1) Suche User mit der E-Mail Adresse
        $user = $this->getUserByEmail($email);

        // 2) Wurde ein User gefunden?
        if($user !== FALSE)
        {
            // 3) Stimmt das Passwort? 
            if(password_verify($password, $user->password))
            {
                // Email + Passwort Kombi OK! 
                // --> Login durchführen
                // ID des nun angemeldeten User in die Session speichern
                // ... damit wissen wir, wer angemeldet ist
                $_SESSION['logged_in_user_id'] = $user->id; 

                return TRUE; 
            }
        }

        // ... wenn bisher nicht alles funktionierte, FALSE zurückgeben
        return FALSE; 
    }


    // Meldet den aktuell angemeldeten User ab 
    public function logout(){
        $_SESSION['logged_in_user_id'] = 0;

        // Lösche die komplette Session inklusive aller Variablen des Users in $_SESSION
        session_destroy();
    }


    // Gibt die ID des angemeldeten User zurück
    public function getCurrentUserId(){
        return $_SESSION['logged_in_user_id'];
    }

}


?>