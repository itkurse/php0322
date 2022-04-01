<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<h1>Einfacher Rechner</h1>
<?php 
    // Zwischen dem öffnenden und dem schließenden PHP-Tag wird
    // sämtlicher Text als PHP-Code interpretiert. 
    $a = 5;
    $b = 3;
    // 5 + 3 = 8
    echo $a . " + " . $b . " = " . ($a + $b) . "<br>";
    echo "$a - $b = " . ($a - $b) . "<br>";
    echo '<p>' . $a . ' * ' . $b . ' = ' . ($a * $b) . '</p>';
    echo '<p>' . $a . ' / ' . $b . ' = ' . number_format($a / $b, 2, ',') . '</p>';
?>
</body>
</html>