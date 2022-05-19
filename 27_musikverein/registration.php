<?php
require_once 'utils/maininclude.inc.php';

// Lade alle Skills ($skills enthält ein Array von Objekten der Klasse Skill)
$skills = $skillService->getSkills();

$errors = []; 

if(isset($_POST['bt_create_user']))
{
    // Bei Checkboxen den Fall abdecken, dass gar nichts ausgewählt wurde!
    $skill_ids = [];
    if(isset($_POST['skill_ids'])){
        $skill_ids = $_POST['skill_ids'];
    }
    
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $birthdate = trim($_POST['birthdate']);

    // $birthdate umwandeln von String --> DateTime 
    $birthdateAsDateTime = DateTime::createFromFormat('d.m.Y', $birthdate);
    // Ließ sich das Geburtsdatum in einen DateTime umwandeln? Wenn nein --> Fehlermeldung
    if($birthdateAsDateTime === FALSE){
        $errors[] = 'Geburtsdatum im korrekten Format angeben!';
    }

    // todo: Rest der Formularvalidierung... 

    if(count($errors) == 0)
    {
        // dann Registrierung durchführen 
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registrierung</title>
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
    // Ausgabe der Fehlermeldungen
    include 'utils/errormessages.inc.php';
    ?>
    <form action="registration.php" method="POST">
        <label>Vorname:</label><br>
        <input type="text" name="firstname"><br>

        <label>Nachname:</label><br>
        <input type="text" name="lastname"><br>

        <label>Email:</label><br>
        <input type="text" name="email"><br>

        <label>Passwort:</label><br>
        <input type="password" name="password"><br>

        <label>Geburtsdatum (TT.MM.JJJJ):</label><br>
        <input type="text" name="birthdate"><br>

        <p>Fähigkeiten (Skills):</p>
        <?php
        foreach($skills as $skill)
        {
            echo '<input type="checkbox" name="skill_ids[]" value="' . $skill->id .'">';
            echo '<label>'.htmlspecialchars($skill->name).'</label><br>';
        }
        ?>

        <button name="bt_create_user">Registrieren</button>
    </form>

</main>

</body>
</html>