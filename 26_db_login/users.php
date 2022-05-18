<?php
session_start();
require_once 'db/dbconnection.inc.php';
require_once 'model/models.inc.php';
require_once 'service/userservice.inc.php';

// DB-Connection
$conn = db_connection();
// Objekt der Klasse UserService erzeugen
$userService = new UserService($conn);
// Wer sind wir? Welche User-ID habe ich gerade?
$userId = $userService->getCurrentUserId();
// Für den aktuellen User die Informationan als Objekt der Klasse User laden
$user = $userService->getUserById($userId);
// Ist $user ein Admin?
if($user->is_admin === FALSE){
    // Wenn NICHT Admin: Weiterleitung zum Dashboard
    header('Location: ./dashboard.php?noadmin');
    return;
}
// Hole alle User aus der Datenbank
$users = $userService->getUsers();
print_r($users);


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

    <h1>Users</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Email</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mit einer Schleife über alle Einträge im $users Array iterieren
            for($i = 0; $i < count($users); $i++)
            {
                $u = $users[$i];
                echo '<tr>';
                echo '<td>' . htmlspecialchars($u->id) . '</td>';
                echo '<td>' . htmlspecialchars($u->firstname) . '</td>';
                echo '<td>' . htmlspecialchars($u->lastname) . '</td>';
                echo '<td>' . htmlspecialchars($u->email) . '</td>';
                echo '<td>' . htmlspecialchars($u->is_admin) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>


</main>
    
</body>
</html>