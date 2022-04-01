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

<?php
// 8 + 4 = 12
// 8 - 4 = 4
// 8 * 4 = 32
// 8 / 4 = 2
// index.php?z1=5&z2=3

// GET-Parameter "z1" soll auf die Variable $a gespeichert werden
$a = $_GET['z1'];

// GET-Parameter "z2" soll auf die Variable $b gespeichert werden
$b = $_GET['z2'];

echo "<p>$a + $b = " . ($a + $b) . "</p>";
echo "<p>$a - $b = " . ($a - $b) . "</p>";
echo "<p>$a * $b = " . ($a * $b) . "</p>";
echo "<p>$a / $b = " . ($a / $b) . "</p>";


?>
    
</body>
</html>