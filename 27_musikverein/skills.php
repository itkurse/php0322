<?php
// Hier sind alle Includes, die DB-Conn, sowie das Erzeugen der Service-Objekte enthalten
require_once 'utils/maininclude.inc.php';

// Lade alle Skills
$skills = $skillService->getSkills();

$errors = [];

// Prüfe ob der Button zum Hinzufügen eines neuen Skill gedrückt wurde
if(isset($_POST['bt_add_skill']))
{
    // Formulardaten einlesen
    $name = trim($_POST['skill_name']);

    // Formularvalidierung
    if($name == NULL || strlen($name) == 0)
    {
        $errors[] = 'Name der Fähigkeit eingeben!';
    }

    // Prüfen ob es Fehler bei der Formularvalidierung gab
    if(count($errors) == 0)
    {
        // ... versuchen die neue Fähigkeit in die Datenbank zu speichern 
        $skillId = $skillService->createSkill($name);

        // Weiterleitung um von der POST Request --> GET-Request
        header('Location: ./skills.php?new_skill_id=' . $skillId);
        return; 
    }
}

if(isset($_POST['bt_delete_skill']))
{
    $skillId = $_POST['skill_id'];
    $skillService->deleteSkill($skillId);

    header('Location: ./skills.php?delete_skill_id='.$skillId);
    return; 
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Skills</title>
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

    <h1>Skills</h1>
    <?php
    // Inkludieren wir die Ausgabe der Fehlermeldungen
    include 'utils/errormessages.inc.php';
    ?>
    <h2>Neue Fähigkeit eintragen</h2>
    <form action="skills.php" method="POST">
        <label>Name der Fähigkeit:</label><br>
        <input type="text" name="skill_name"><br>
        <button name="bt_add_skill">Fähigkeit speichern</button>
    </form>

    <h2>Alle Fähigkeiten</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Löschen</th>
                <th>Bearbeiten</th>
            </tr>
        </thead>
        <tbody>
        <?php
        for($i = 0; $i < count($skills); $i++)
        {
            $skill = $skills[$i];
            echo '<tr>';
            echo '<td>'. htmlspecialchars($skill->id) . '</td>';
            echo '<td>'. htmlspecialchars($skill->name) . '</td>';
            echo '<td>';
            echo '<form action="skills.php" method="POST">';
            echo '<input type="hidden" name="skill_id" value="'.$skill->id.'">';
            echo '<button name="bt_delete_skill">Löschen</button>';
            echo '</form>';
            echo '</td>';

            // Link zur Bearbeiten-Seite
            echo '<td>';
            echo '<a href="skill.php?skill_id=' . $skill->id . '">Bearbeiten</a>';
            echo '</td>';

            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

</main>

</body>
</html>