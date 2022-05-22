<?php
require_once 'utils/maininclude.inc.php';

// Lade alle User als Array von Objekten der Klasse User
$users = $userService->getUsers();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mitglieder</title>
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

    <h1>Mitglieder</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Fähigkeiten</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($users as $user)
        {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($user->id) . '</td>';
            echo '<td>' . htmlspecialchars($user->firstname) . '</td>';
            echo '<td>' . htmlspecialchars($user->lastname) . '</td>';
            echo '<td>' . htmlspecialchars($user->email) . '</td>';
            echo '<td>' . htmlspecialchars($user->is_admin) . '</td>';

            // Ausgabe der Fähigkeiten
            echo '<td>';

            // für jeden User die Fähigkeiten aus der Datenbank holen
            $skills = $skillService->getSkillsByUserId($user->id);
            foreach($skills as $skill)
            {
                echo $skill->name;
                echo ', ';
            }

            echo '</td>';

            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

</main>

</body>
</html>