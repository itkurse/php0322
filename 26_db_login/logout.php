<?php
session_start();
require_once 'db/dbconnection.inc.php';
require_once 'model/models.inc.php';
require_once 'service/userservice.inc.php';

// Datenbanverbindung
$conn = db_connection();

if(isset($_POST['bt_logout']))
{
    /*
    Wir möchten die Funktion logout() in der Klasser UserService aufrufen. 
    Um eine Funktion in einer Klasse aufrufen zu können wird ein Objekt der Klasse benötigt.

    Erstellen eines neuen Objekts: new Klassenname()
    */
    $userService = new UserService($conn);

    // für das Objekt die Funktion logout() aufrufen
    $userService->logout();

    // Weiterleitung zum Login
    header('Location: ./login.php');
    return;
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <script src='main.js'></script>
</head>
<body>
    
<main class="center-wrapper">

    <?php 
    // Header mit Navigation einbinden
    include 'utils/nav.inc.php'; 
    ?>

    <h1>Logout</h1>

    <form action="logout.php" method="POST">
        <button name="bt_logout">Logout</button>
    </form>

</main>

</body>
</html>