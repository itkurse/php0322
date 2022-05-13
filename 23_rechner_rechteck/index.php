<?php
require_once 'models/models.inc.php';

/**
Eingegeben werden a, b
User-Auswahl was berechnet werden soll:
- Umfang
- Fläche 
- Diagonale


... für Rechteck eine Klasse erzeugen
 */

// leeres Array für mögliche Fehlermeldungen anlegen
$errors = [];

if(isset($_GET['bt_submit']))
{
    $a = trim($_GET['a']);
    $b = trim($_GET['b']);

    if(isset($_GET['rechenmethode'])){
        $rechenmethode = trim($_GET['rechenmethode']);
    } else {
        $errors[] = 'Bitte Rechenmethode wählen!';
    }

    // to do: Formularvalidierung
    if($a == NULL || strlen($a) == 0){
        $errors[] = 'Seite a muss eingegeben werden!';
    } elseif(is_numeric($a) == FALSE){
        $errors[] = 'Seite a ist keine Zahl!';
    }

    if($b == NULL || strlen($b) == 0){
        $errors[] = 'Seite b muss eingegeben werden!';
    } elseif(is_numeric($b) == FALSE){
        $errors[] = 'Seite b ist keine Zahl!';
    }

    // Die eigentliche Tätigkeit soll nur durchgeführt werden
    // wenn es keine Fehler gibt
    if(count($errors) == 0)
    {
        $rechteck = new Rechteck($a, $b);
    
        // Rechteck: a=5, b=7: Umfang=24
        // Rechteck: a=5, b=7: Fläche=xx
        // Rechteck: a=5, b=7: Diagonale=xx
    
        $ausgabeText = 'Rechteck: a=' . $rechteck->a . ', b=' . $rechteck->b . ': ';
    
        if($rechenmethode == 'umfang'){
            $ausgabeText .= 'Umfang=' . $rechteck->getUmfang();
        } elseif($rechenmethode == 'flaeche'){
            $ausgabeText .= 'Fläche=' . $rechteck->getFlaeche();
        } elseif($rechenmethode == 'diagonale'){
            $ausgabeText .= 'Diagonale='.$rechteck->getDiagonale();
        }
    }

    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Rechteck-Profi</h1>

<?php

// Ausgabe der Fehlermeldung
if(count($errors) > 0)
{
    echo '<ul class="errors">';
    
    // für jede Fehlermeldung einen Listen-Eintrag generieren
    foreach($errors as $e){
        echo '<li>'.htmlspecialchars($e).'</li>';
    }

    echo '</ul>';
}


// Gibt es es die Variable $ausgabeText?
// --> diese wird nur gesetzt wenn der Button gedrückt wurde
if(isset($ausgabeText)){
    echo '<p class="result">'.$ausgabeText.'</p>';
}
?>

<form action="index.php" method="GET">
    <label>a:</label><br>
    <input type="text" name="a"><br>

    <label>b:</label><br>
    <input type="text" name="b"><br>

    <input type="radio" name="rechenmethode" value="umfang">
    <label>Umfang</label><br>
    <input type="radio" name="rechenmethode" value="flaeche">
    <label>Fläche</label><br>
    <input type="radio" name="rechenmethode" value="diagonale">
    <label>Diagonale</label><br>

    <button name="bt_submit">Berechnen</button>
</form>

    
</body>
</html>