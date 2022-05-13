<?php
require_once 'db/dbconnection.inc.php';
require_once 'models/models.inc.php';
require_once 'service/kontaktservice.inc.php';

// Aufbau der DB-Verbindung --> Aufruf der db_connection() Funktion
$conn = db_connection();

// Objekt der Klasse KontaktService
$kontaktService = new KontaktService($conn);

$errors = [];

if(isset($_POST['bt_submit']))
{
    $vorname = trim($_POST['vorname']);
    $nachname = trim($_POST['nachname']);
    $email = trim($_POST['email']);
    $nachricht = trim($_POST['nachricht']);

    if($vorname == NULL || strlen($vorname) == 0){
        $errors[] = 'Vorname eingeben!';
    }
    if($nachname == NULL || strlen($nachname) == 0){
        $errors[] = 'Nachname eingeben!';
    }
    if($email == NULL || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email ungültig!';
    }
    if($nachricht == NULL || strlen($nachricht) == 0){
        $errors[] = 'Nachricht eingeben!';
    }

    if(count($errors) == 0){
        // wenn wir keine Validierungsfehler haben ... 
        // ... dann die Kontkaktanfrage speichern
        $id = $kontaktService->createKontaktanfrage($vorname, $nachname, 
                                                $email, $nachricht);

        // POST Request --> GET Request
        // --> Weiterleitung
        header('Location: ./index.php');
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1>Kontaktformular</h1>
    <?php
    if(count($errors) > 0){
        echo '<ul class="errors">';
        for($i = 0; $i < count($errors); $i++){
            $msg = $errors[$i];
            echo '<li>'.htmlspecialchars($msg).'</li>';
        }
        echo '</ul>';
    }

    ?>

    <form action="index.php" method="POST">
        <label>Vorname:</label><br>
        <input type="text" name="vorname"><br>

        <label>Nachname</label><br>
        <input type="text" name="nachname"><br>

        <label>Email:</label><br>
        <input type="text" name="email"><br>

        <label>Ihre Kontaktanfrage:</label><br>
        <textarea name="nachricht" rows="3"></textarea><br>

        <button name="bt_submit">Nachricht versenden</button>
    </form>

</body>
</html>