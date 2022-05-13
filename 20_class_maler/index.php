<?php

class Wand 
{
    // 2 Eigenschaften 
    public float $a; 
    public float $b;

    // Konstruktor (initialisiert die Eigenschaften)
    // wird beim Erzeugen eines neuen Objekts aufgerufen
    public function __construct(float $a, float $b)
    {
        // weise die Übergabeparameter den Eigenschaften zu
        $this->a = $a;
        $this->b = $b;
    }

    public function getFlaeche() : float {
        $flaeche = $this->a * $this->b;
        // Das Ergebnis zurückgeben

        // return: beendet die Funktion
        // return $flaeche: beende die Funktion und gebe die Fläche zurück
        //                  (kopiere den Wert der Variable $flaeche und gebe zurück)
        return $flaeche;
    }
}

// Objekt erzeugen
$w1 = new Wand(4.3, 5.0);

echo '<p>Wand 1: a='.$w1->a.' b='.$w1->b.' Fläche='.$w1->getFlaeche().'</p>';

// lege 3 Objekte an und speichere diese im Array
$waende = [
    new Wand(5, 2),
    new Wand(10, 2.5),
    new Wand(2, 2)
];

// Die Summe der Fläche aller Wände im Array?
$summe = 0;
for($i = 0; $i < count($waende); $i++)
{
    // jede Wand aus dem Array holen
    $wand = $waende[$i];

    $flaeche = $wand->getFlaeche();

    $summe = $summe + $flaeche;
}

echo '<p>Summe der Fläche aller Wände: '.$summe.' m2</p>';

// Pro m2 Wand werden 0,2 l Wandfarbe benötigt. 
// Ein Farbkübel enthält 20 Liter.
// Wie viele Farbkübel muss der Maler für die Wände mitnehmen? 


function berechneAnzahlFarbkuebel(float $flaeche) : int 
{
    $farbeProM2 = 0.2;
    $kuebelLiter = 20;

    $anzKuebel = $flaeche * $farbeProM2 / $kuebelLiter;

    // Ergebnis aufrufen
    $anzKuebel = ceil($anzKuebel);

    return $anzKuebel;
}

$berechneteAnzKuebel = berechneAnzahlFarbkuebel($summe);

echo '<p>Benötigte Anzahl an Farbkübeln: '.$berechneteAnzKuebel.'</p></p>';

?>