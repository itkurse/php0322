<?php
// Dieses Script wandelt eingegebene m in inch oder ft um. 

// wurde der Button gedrückt?
if(isset($_GET['bt_submit']))
{
    $m = $_GET['m'];
    $zielEinheit = $_GET['umrechenmethode'];

    $resultat = 0;
    if($zielEinheit == 'in'){
        $resultat = $m * 39.3701;
    } elseif($zielEinheit == 'ft'){
        $resultat = $m * 3.28084;
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
</head>
<body>
    
<h1>Umrechnung</h1>
<p>Wandelt die eingegebenen Meter in inches oder ft um.</p>

<form action="index.php" method="GET">
    <label>m:</label><br>
    <input type="text" name="m"><br>

    <input type="radio" name="umrechenmethode" value="in">
    <label>inches</label><br>

    <input type="radio" name="umrechenmethode" value="ft">
    <label>feet</label><br>

    <button name="bt_submit">Umrechnen</button>
</form>
<?php
if(isset($resultat)){
    echo '<input type="text" readonly value="Ergebnis: '.$resultat.'">';
}
?>

</body>
</html>