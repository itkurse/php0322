<?php
require_once 'db/dbconnection.inc.php';
require_once 'model/models.inc.php';
require_once 'service/userservice.inc.php';

// Erstellen der Datenbankverbindung (Aufbau)
$conn = db_connection();

// Erzeugen ein Objekt der Klasse UserService
$userService = new UserService($conn);

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

    $id = $userService->createUser($email, $password, $firstname,
                                    $lastname, $is_admin);

    echo "<p>User mit ID $id angelegt!</p>";
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
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>

<h1>Registrierung</h1>

<form action="index.php" method="POST">
    <label>Vorname</label><br>
    <input type="text" name="firstname"><br>

    <label>Nachname</label><br>
    <input type="text" name="lastname"><br>

    <label>Email</label><br>
    <input type="text" name="email"><br>

    <label>Passwort</label><br>
    <input type="text" name="password"><br>

    <input type="checkbox" name="is_admin">
    <label>Admin?</label><br>

    <button name="bt_submit">Registrieren</button>
</form>

</body>
</html>