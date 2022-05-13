<?php

class Rechteck
{
    // Eigenschaften der Klasse
    public float $a;
    public float $b;

    // Konstruktor (initialisiert die Eigenschaften mit Werten)
    public function __construct(float $a, float $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    // Methoden der Klasse Rechteck
    // wenn man eine Funktion innerhalb einer Klasse definiert
    // nennt man sie Methode
    
    public function getUmfang() : float {
        return 2 * $this->a + 2 * $this->b;
    }

    public function getFlaeche() : float {
        return $this->a * $this->b;
    }

    public function getDiagonale() : float {
        return sqrt(pow($this->a, 2) + pow($this->b, 2));
    }

}

?>