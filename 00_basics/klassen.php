<?php
/*
Klassen werden geschrieben um eigene Datentypen zu definieren
Klassen bündeln Daten, und fügen diesen Daten Tätigkeiten (Methoden) hinzu. 

Klassen repräsentieren etwas, z. B. einen Kunden, ein Produkt, Währung, Fahrzeug, ...
Beim Erstellen von Klassen werden Informationen in logische Einheiten gruppiert
--> Kundennummer, Name, Adresse, werden in der Klasse "Kunde" zusammengefasst
--> Artikelnummer, Name, Preis, werden in der Klasse "Produkt" zusammengefasst

Klassen und Objekte sind Themen der Objektorientierten Programmierung (OOP)
Konzepte der Objektorientierung:
- Kapselung (encapsulation): public oder private
- Vererbung, Abteilung (inheritance): Eine Klasse erweitert eine andere Klasse
- Polymorphie, Vielseitigkeit (polymorphism)

OOP: Wir definieren eine Struktur (genannt Klasse)
und dann verwenden wir diese Klasse um Objekte zu instanziieren. 

Was muss ich mir bei einer Klasse überlegen?
Name: Wie nenne ich meine Klasse, was möchte ich modellieren? --> Großbuchstaben
Eigenschaften: welche Informationen (Variablen) möchte ich speichern?
Konstruktor: Startwerte der Eigenschaften initialisieren
Tätigkeiten: über welche Tätigkeiten (Methoden) soll jedes Objekt der Klasse verfügen?

*/

// Name: Kunde
class Kunde 
{
    // 3 Eigenschaften
    public int $kundennummer;
    public string $name;
    public string $adresse;

    // Konstruktor: wird beim Erzeugen jedes neuen Objekts aufgerufen
    public function __construct(int $kundennummer, string $name, string $adresse)
    {
        // die Parameter auf die Eigenschaften kopieren
        $this->kundennummer = $kundennummer;
        $this->name = $name;
        $this->adresse = $adresse;
    }
}

// erzeugt ein neues Objekt der Klasse Kunde
$hansi = new Kunde(5, 'Hansi', 'Hauptstrasse 6');
$susi = new Kunde(10, 'Susi', 'Hauptstrasse 7');

echo $hansi->kundennummer . ' ' . $hansi->name . ' ' . $hansi->adresse . '<br>';
echo $susi->kundennummer . ' ' . $susi->name . ' ' . $susi->adresse . '<br>';

class Produkt
{
    // public: Sichtbarkeit (Encapsulation, Kapselung), public: von überall sichtbar
    // datentyp der Variable (hier z. B. int)
    // variablenname
    public int $artikelnummer;
    public string $name;
    public float $preis;
}

?>
