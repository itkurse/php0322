<?php
/*
Array ist ein Datentyp für eine Variable.
In einem Array können, in einer Variable, null bis beliebig viele Werte gespeichert werden.
Ein Array erlaubt doppelte Einträge: ["Hansi", "Susi", "Rudi", "Susi"]

Bei einem Array können jederzeit Elemente hinzugefügt oder gelöscht werden.

Was muss ich beim Erstellen eines neuen Arrays wissen?
name: wie nenne ich die Variable mit dem Array?
type: Datentyp der Variable --> steht fest: Array
initValues: welche Startwerte soll mein Array enthalten?

Code: $name = [initValues];

In einem Array hat jeder Eintrag (Element) einen eindeutigen Index.
Es gibt numerische und textuelle Indizes. 
Das erste Element im Array hat den Index 0. Das Zweite den Index 1, ... 
--> Arrays sind Zero-Based!

*/

// Leeres Array (Array hat 0 Elemente)
$a = [];

// Array mit Startwerten
$numbers = [1, 3, 4, 5];
$fruits = ['Apples', 'Oranges', 'Grapes', 'Pears'];


// Einfache Ausgabe eines Arrays
echo 'Ausgabe des Arrays mit print_r(): <br>';
print_r($numbers);
echo '<br>';
print_r($fruits);
echo '<br><br>';


// count(): Wie viele Elemte sind im Array? --> Länge eines Arrays
echo 'Anzahl der Elemente im $fruits-Array: ' . count($fruits) . '<br><br>';


// Ein neues Element am Ende des Arrays einfügen
// $arr[] = wert;
echo 'Einfügen von Mangos im Array: <br>';
$fruits[] = 'Mangos';
print_r($fruits);
echo '<br><br>';


// array_splice(): Wert an einem bestimmten Index einfügen
// array_splice($arr, index, 0, insertVal);
echo 'Einfügen von Strawberry am Index 2:<br>';
array_splice($fruits, 2, 0, 'Strawberry');
print_r($fruits);
echo '<br><br>';


// array_splice(): Wert an einem bestimmten Index löschen
// array_splice($arr, index, 1);
echo 'Lösche Element mit Index 2:<br>';
array_splice($fruits, 2, 1);
print_r($fruits);
echo '<br><br>';


// sort($arr): Array nach Werten aufsteigend sortieren
echo 'Sortiere Array aufsteigend:<br>';
sort($fruits);
print_r($fruits);
echo '<br><br>';


// rsort($arr): Array nach Werten absteigend sortieren
echo 'Sortiere Array absteigend:<br>';
rsort($fruits);
printArray($fruits);


// Ein Element an einem bestimmten Index ersetzen (replace des Wertes)
// $arr[index] = wert
echo 'Ersetze Element am Index 0:<br>';
$fruits[0] = 'Bananas';
printArray($fruits);


// Einen Wert aus dem Array holen... was muss ich mir dazu überlegen?
// array: wie heißt die Array-Variable auf die ich zugreifen möchte?
// index: welchen Index hat das gesuchte Element im array?
// variable: auf welche Variable soll das (gefundene) Element gespeichert werden?
// Code: variable = array[index];
echo 'Hole das Element am Index 1 aus dem Array und speichere es in der Variable $fruit <br>';
$fruit = $fruits[1];
echo $fruit;
echo '<br><br>';


// Über ein Array iterieren 
// --> jedes Element im Array der Reihe nach betrachten und damit etwas tun

// laufvariable $i: Integer-Variable, steuert die Schleife
// start: Integer-Startwert der Laufvariable am Anfang der Schleife (Index 0)
// finish: Integer-Wert der Laufvariable am Ende der Schleife (Länge des Arrays)
// change: Int-Wert der zur Laufvariable nach jedem Schleifendurchgang addiert wird (1)
// loopbody: Code der wiederholt ausgeführt wird (Zugriff auf das Array-Element am Index $i)

echo 'Iteration des Arrays:<br>';
for($i = 0; $i < count($fruits); $i++)
{
    $fruit = $fruits[$i];
    echo $fruit . ' ';
}



function printArray($arr)
{
    print_r($arr);
    echo '<br><br>';
}

?>