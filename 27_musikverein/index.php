<?php
session_start();
require_once 'db/dbconnection.inc.php';

// DB-Verbindung aufbauen und in der Variable $conn speichern
$conn = db_connection();

echo 'ois passt';

?>