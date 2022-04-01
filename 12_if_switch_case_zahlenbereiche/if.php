<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

<h1>Beispiel Zahlenbereiche mit if</h1>
<?php

// Variable deklarieren
$zahl;
// Variable initialisieren
// initialisieren bedeutet der Variable erstmalig mit dem 
// Zuweisungsoperator einen Wert zuweisen
$zahl = -8;

echo "<p>Die Zahl ist $zahl.</p>";

if($zahl > 0 && $zahl <= 5)
{
    echo '<p>Die Zahl ist 1, 2, 3, 4, oder 5.</p>';
} 
elseif($zahl >= 6 && $zahl <= 10)
{
    echo '<p>Die Zahl ist 6, 7, 8, 9, oder 10.</p>';
    // ist es genau die Zahl 10?
    if($zahl == 10)
    {
        echo '<p>Jackpot!</p>';
    }
} 
elseif($zahl == 0)
{
    echo '<p>Die Zahl darf nicht 0 sein.</p>';
} 
else 
{
    echo '<p>Die Zahl ist zu groß oder zu klein.</p>';
}

// elseif($zahl < 0 || $zahl > 10)
// {

// }
    
?>

</body>
</html>