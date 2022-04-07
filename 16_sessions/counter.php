<?php
// Starten der Session muss immer ganz am Anfang der Datei stehen!
// Sendet neuen Besuchern ein Cookie mit der zufällig generierten Session-ID
// ... oder sie setzt eine bestehende Session fort wenn der User bereits eine SessionID gesendet hat
session_start();

// gibt es in dieser Session schon die Variable "counter"?
// --> wenn ja: dann erhöhen wir den Counter
// --> wenn nein: neue Variable in der Session anlegen mit dem Startwert 1

if(isset($_SESSION['counter']))
{
    $_SESSION['counter'] = $_SESSION['counter'] + 1;
} 
else 
{
    $_SESSION['counter'] = 1;
}


// Soll der Counter zurückgesetzt werden?
if(isset($_POST['bt_reset_counter']))
{
    // Den counter auf 0 setzen
    $_SESSION['counter'] = 0;

    // Seite neu laden: POST --> GET
    header('Location: counter.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
</head>
<body>
<h1>Counter: Zählen wie oft die Seite besucht wurde</h1>
<p>In einer Session-Variable wird gespeichert wie oft dieser User bereits die Seite besucht hat.</p>

<p>Du hast diese Seite bereits <?php echo $_SESSION['counter']; ?> x aufgerufen.</p>

<form action="counter.php" method="POST">
    <button name="bt_reset_counter">Counter zurücksetzen</button>
</form>

</body>
</html>