<?php

/*
Berechnet die Summe aller geraden Zahlen im Array
*/

$numbers = [3, 9, 2, 4, 5];

// Erstelle die Variable summe und setze den Wert der Variable auf 0
// Schaue jede Zahl im Array an, für jede Zahl:
// - prüfe ob die Zahl durch 2 ohne Rest teilbar ist
// -- wenn ja: rechne die Zahl zu summe dazu 
// -- wenn nein: nichts, fortfahren
// Gebe die ermittelte Summe aus. 



// Erstelle die Variable summe und setze den Wert der Variable auf 0
$summe = 0;
// Schaue jede Zahl im Array an, für jede Zahl:
for($i = 0; $i < count($numbers); $i++)
{
    $zahl = $numbers[$i];
    // - prüfe ob die Zahl durch 2 ohne Rest teilbar ist
    if($zahl % 2 == 0)
    {
        // -- wenn ja: rechne die Zahl zu summe dazu 
        $summe = $summe + $zahl;
    }
    // -- wenn nein: nichts, fortfahren
}

// Gebe die ermittelte Summe aus. 
echo '<p>Summe: '.$summe.'</p>'

?>