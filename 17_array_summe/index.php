<?php
// Berechne die Summe aller Zahlen eines Arrays

$zahlen = [9, 7, 53, 2];


// Erstelle eine Integer-Variable für die Summe
// setze die Summe auf 0
$summe = 0;

// Schaue dir jede Zahl, von links nach rechts der Reihe nach an
for($i = 0; $i < count($zahlen); $i++)
{
    $zahl = $zahlen[$i];

    // rechne die Zahl zur Summe dazu
    $summe = $summe + $zahl;
}

// Nachdem du es für die letzte (für alle) Zahlen gemacht hast, schaue
// auf die Summe für das Ergebnis.
echo 'Summe der Zahlen: ' . $summe;


?>