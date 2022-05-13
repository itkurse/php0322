<?php

class Pyramid 
{
    public float $a;
    public float $h;

    public function __construct(float $a, float $h)
    {
        $this->a = $a;
        $this->h = $h;
    }

    public function getVolume() : float 
    {
        return 1.0 / 3.0 * (pow($this->a, 2) * $this->h);
    }

    public function getSurfaceArea() : float 
    {
        return pow($this->a, 2) + $this->a * sqrt(4*pow($this->h, 2) + pow($this->a, 2));
    }

}


$pyramiden = [
    new Pyramid(4, 10),
    new Pyramid(1, 10),
    new Pyramid(2, 10)
];

for($i = 0; $i < count($pyramiden); $i++){
    $py = $pyramiden[$i];

    echo '<p>Pyramide: a='.$py->a.' h='.$py->h.' 
        V='.number_format($py->getVolume(), 2).' O=
        '.number_format($py->getSurfaceArea(), 2).'</p>';
}

?>