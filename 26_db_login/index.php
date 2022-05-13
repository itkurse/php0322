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

if(isset($_POST['bt_submit']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $is_admin = FALSE;
    if(isset($_POST['is_admin'])){
        $is_admin = TRUE; 
    }

    // to do Formularvalidierung ... 
    if($firstname == NULL || strlen($firstname) == 0)
    {
        $errors[] = 'Vorname eingeben!';
    }
    if($lastname == NULL || strlen($lastname) == 0)
    {
        $errors[] = 'Nachname eingeben!';
    }

    if($email == NULL || filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE)
    {
        $errors[] = 'Email ungültig!';
    } 
    elseif($userService->getUserByEmail($email) !== FALSE){
        $errors[] = 'Benutzer mit Email existiert bereits';
    }


    if($password == NULL || strlen($password) < 6)
    {
        $errors[] = 'Passwort benötigt mind. 6 Zeichen!';
    }

    // User nur anlegen wenn es KEINE Fehler gibt
    if(count($errors) == 0)
    {
        $id = $userService->createUser($email, $password, $firstname,
            $lastname, $is_admin);

        echo "<p>User mit ID $id angelegt!</p>";
    }
    
}

//$id = $userService->createUser('jemand@email.com', '123456', 'Jemand', 'Anderer', true);

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

    <h1>Registrierung</h1>
    <?php
    // Ausgabe der Fehlermeldungen inkludieren
    include 'utils/errormessages.inc.php';
    ?>
    <form action="index.php" method="POST">
        <label>Vorname</label><br>
        <input type="text" name="firstname" value="<?php if(isset($firstname)) {echo htmlspecialchars($firstname); } ?>"><br>

        <label>Nachname</label><br>
        <input type="text" name="lastname" value="<?php if(isset($lastname)) {echo htmlspecialchars($lastname); } ?>"><br>

        <label>Email</label><br>
        <input type="text" name="email"  value="<?php if(isset($email)) {echo htmlspecialchars($email); } ?>"><br>

        <label>Passwort</label><br>
        <input type="password" name="password" value="<?php if(isset($password)) {echo htmlspecialchars($password); } ?>"><br>

        <input type="checkbox" name="is_admin" <?php if(isset($is_admin) && $is_admin) { echo 'checked';} ?>>
        <label>Admin?</label><br>

        <button name="bt_submit">Registrieren</button>
    </form>
</main>

</body>
</html>