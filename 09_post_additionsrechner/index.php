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

<h1>Additionsrechner</h1>

<?php
// erhalte ich hier ein abgeschicktes Formular?
if(isset($_POST['bt_calculate']))
{
    // beide Zahlen in zwei Variablen einlesen
    $a = $_POST['z1'];
    $b = $_POST['z2'];

    // Ergebnis berechnen
    $ergebnis = $a + $b;

    // Ausgabe vom Ergebnis
    echo "<p>$a + $b = $ergebnis</p>";
}
?>

<form action="index.php" method="POST">
    <label for="z1"><br>
    <input type="text" name="z1"><br>
    <label for="z2"><br>
    <input type="text" name="z2"><br>
    <button name="bt_calculate">Addieren</button>
</form>
    
</body>
</html>