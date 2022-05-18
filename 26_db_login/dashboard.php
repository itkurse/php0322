<?php
session_start();
require_once 'db/dbconnection.inc.php';
require_once 'model/models.inc.php';
require_once 'service/userservice.inc.php';

$conn = db_connection();
$userService = new UserService($conn);

// Dashboard darf nur von angemeldeten Benutzern aufgerufen werden!
// --> Weiterleitung zum Login falls Benutzer NICHT angemeldet ist
if($userService->isLoggedIn() === FALSE)
{
    header('Location: ./login.php');
    return; 
}

// Die aktuelle User-ID in eine Variable speichern
$userId = $userService->getCurrentUserId();

$user = $userService->getUserById($userId);

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

    <h1>Dashboard</h1>
    <p>
        Hallo User mit der ID <?php echo $userId; ?>!
    </p>

    <p>Herzlich willkommen 
        <?php 
        echo $user->firstname; 
        echo ' ';
        echo $user->lastname;
        
        ?>!
    </p>

    <p>
        <a href="users.php">Alle User tabellarisch darstellen</a>
    </p>
    

</main>
    
</body>
</html>