<?php
require_once 'model/kunde.inc.php';
require_once 'db/dbconnection.inc.php';
require_once 'service/kundenservice.inc.php';


// Datenbankverbindung in der Variable $conn speichern
$conn = db_connection();

// Objekt der Klasse KundenService instanziieren
$kundenService = new KundenService($conn);

// Objekt der Klasse Kunde erzeugen
$k1 = new Kunde(0, 'Hansi', 'Hauptstrasse 7');

// Kunde in DB einfügen, und die erzeugte Kundennummer erhalten
$kundennummer = $kundenService->insertKunde($k1);

echo $kundennummer;

?>