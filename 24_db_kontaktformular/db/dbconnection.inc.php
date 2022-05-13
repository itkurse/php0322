<?php

function db_connection() : PDO 
{
    try 
    {
        // try: Hier schreiben was möglicherweise einen Fehler
        // auslösen könnte (z. B. kein Internet, falsches Passwort...)

        $host = '127.0.0.1';
        $dbName = 'kontaktformular120522';
        $user = 'root';
        $password = '';

        // Datenbankverbindung aufbauen
        $connection = new PDO("mysql:dbname=$dbName; host=$host", $user, $password);
        // Alle Fehlermeldungen bei der Datenbank anzeigen
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Datenbankverbindung zurückgeben
        return $connection;
    } catch(PDOException $e)
    {
        // catch-Block
        // catch() <-- in den runden Klammern wird der Fehlertyp angegeben auf
        // den wir hier im catch reagieren möchten
        // catch-Block wird nur ausgeführt wenn im try-Block ein Fehler geschah

        // Beende das Script und gebe die Fehlermeldung aus
        exit($e->getMessage());
    }
}
?>