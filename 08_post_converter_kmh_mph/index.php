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

<h1>km/h -> mph</h1>

<?php
// Wurde das Formular abgeschickt?
// --> wurde der Button bt_convert übertragen?
if(isset($_POST['bt_convert']))
{
    // Formular wurde abgeschickt und jetzt können die Daten eingelesen werden
    // einlesen was der User eingegeben hat:
    $kmh_input = $_POST['kmh'];

    // Umrechnung der eingegebenen km/h in mph
    $mph = $kmh_input * 0.62137;

    // Ausgabe
    echo "<p>$kmh_input km/h sind $mph mph.</p>";
}
?>


<!-- 1.: wohin sollen die Daten gesendet werden? (an welche Datei?) -->
<!-- 2.: mit welcher HTTP Request-Method (GET oder POST) sollen die Daten gesendet werden? -->
<form action="index.php" method="POST">
    <label for="kmh">km/h</label><br>
    <!-- Nur inputs mit name-Attribut werden an den Server gesendet!  -->
    <input type="text" id="kmh" name="kmh"><br>
    <button name="bt_convert">Umrechnen in mph</button>
</form>

</body>
</html>