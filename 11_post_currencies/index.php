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

<h1>Währungsrechner</h1>
<h2>Euro in Dollar</h2>
<?php
// Umrechnung von EUR in USD
// wurde der Button bt_eur_to_usd gedrückt?
if(isset($_POST['bt_eur_to_usd']))
{
    // Welcher Euro-Betrag wurde eingegeben?
    $euro = $_POST['betrag'];

    // Umrechnen in Dollar
    $dollar = $euro * 1.11;

    // Ausgabe
    echo "<p class='result'>$euro € sind $dollar $.</p>";
}
?>
<form action="index.php" method="POST">
    <label>Euro:</label><br>
    <input type="text" name="betrag"><br>
    <button name="bt_eur_to_usd">In Dollar umrechnen</button>
</form>

<h2>Dollar in Euro</h2>
<?php
if(isset($_POST['bt_usd_to_eur']))
{
    $dollar = $_POST['betrag'];
    $euro = $dollar * 0.9;
    echo "<p class='result'>$dollar $ sind $euro €.</p>";
}
?>
<form action="index.php" method="POST">
    <label>Dollar:</label><br>
    <input type="text" name="betrag"><br>
    <button name="bt_usd_to_eur">In Euro umrechnen</button>
</form>


</body>
</html>