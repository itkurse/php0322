<?php
// Bei einem Formular mit Datei-Upload muss der "enctype" gesetzt werden
// mit enctype="multipart/form-data"

require_once 'utils/maininclude.inc.php';

$eventTypes = $eventService->getEventTypes();

$errors = [];

if(isset($_POST['bt_create_event']))
{
    $title = trim($_POST['title']);
    $dateAndTime = trim($_POST['date_and_time']);
    $eventTypeId = $_POST['eventtype_id'];

    $eventDate = DateTime::createFromFormat('Y.m.d H:i', $dateAndTime);

    // Die hochgeladene Datei soll im uploads-Ordner gespeichert werden
    $filename = $_FILES['imagefile']['name'];
    $uploaddir = 'uploads\\';
    // wo soll die hochgeladene Datei hingespeichert werden?
    $uploadpath = $uploaddir . $filename;

    // verschiebt die hochgeladene Datei vom temporären Upload-Ordner in 
    // unseren Upload-Ordner
    if(move_uploaded_file($_FILES['imagefile']['tmp_name'], $uploadpath))
    {

    } else {
        $errors[] = 'Upload fehlgeschlagen. Keine Datei?'; 
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Veranstaltungen</title>
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

    <h1>Veranstaltungen</h1>
    <?php
    // Ausgabe der Fehlermeldungen
    include 'utils/errormessages.inc.php';
    ?>
    <h2>Veranstaltung anlegen</h2>
    <form action="events.php" method="POST" enctype="multipart/form-data">
        <label>Name</label><br>
        <input type="text" name="title"><br>

        <label>Zeitpunkt (TT.MM.JJJJ HH:MM)</label><br>
        <input type="text" name="date_and_time"><br>

        <label>Vernstaltungstyp</label><br>
        
        <p>
        <select name="eventtype_id">
            <?php 
            // für jeden EventType eine SELECT-Option generieren
            foreach($eventTypes as $eventType)
            {
                echo '<option value="'.$eventType->id.'">' . htmlspecialchars($eventType->name) . '</option>';
            }
            ?>
        </select>
        </p>

        <p>
        <label>Bild upload:</label>
        <input type="file" name="imagefile"><br>
        </p>

        <button name="bt_create_event">Veranstaltung anlegen</button>

    </form>

</main>

</body>
</html>