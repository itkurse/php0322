<?php
class Kunde
{
    public int $kundennummer;
    public string $name;
    public string $adresse;

    public function __construct(int $kundennummer, string $name, string $adresse)
    {
        $this->kundennummer = $kundennummer;
        $this->name = $name;
        $this->adresse = $adresse;
    }
}
?>