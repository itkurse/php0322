<?php
session_start();
require_once 'db/dbconnection.inc.php';
require_once 'model/models.inc.php';
require_once 'service/userservice.inc.php';

// Erstellen der Datenbankverbindung (Aufbau)
$conn = db_connection();

// Erzeugen ein Objekt der Klasse UserService
$userService = new UserService($conn);

$errors = [];

if(isset($_POST['bt_login']))
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if($email == NULL || strlen($email) == 0){
        $errors[] = 'E-Mail eingeben!';
    }
    if($password == NULL || strlen($password) == 0){
        $errors[] = 'Passwort eingeben!';
    }

    if(count($errors) == 0){
        // Login probieren ... 
        $loginSuccess = $userService->login($email, $password);

        if($loginSuccess == TRUE){
            // Weiterleitung zum Dashboard
            header('Location: ./dashboard.php');
            return;
        } else {
            $errors[] = 'Email / Passwort ungültig!';
        }
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
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <script src='main.js'></script>
</head>
<body>
    
<main class="center-wrapper">

    <?php 
    // Header mit Navigation einbinden
    include 'utils/nav.inc.php'; 
    ?>

    <h1>Login</h1>

    <?php
    // Ausgabe der Fehlermeldungen inkludieren
    include 'utils/errormessages.inc.php';
    ?>

    <form action="login.php" method="POST">
        <label>Email</label><br>
        <input type="text" name="email"  value="<?php if(isset($email)) {echo htmlspecialchars($email); } ?>"><br>

        <label>Passwort</label><br>
        <input type="password" name="password"><br>

        <button name="bt_login">Login</button>
    </form>

</main>

</body>
</html>