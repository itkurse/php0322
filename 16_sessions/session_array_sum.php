<?php
session_start();
//session_destroy();

// wenn es in der Session noch KEINE Variable gibt die alle 
// bisher eingegebenen Zahlen speichert, dann lege die Variable an
if (!isset($_SESSION['numbers'])) {
    // lege in der Session die Variable als Array an
    $_SESSION['numbers'] = [];
}


if (isset($_POST['bt_add_number'])) {
    // Zahl, die vom User eingegeben wurde, in eine Variable einlesen
    $number = $_POST['number'];

    // In allen Fällen, egal ob es das Array zuvor schon gab oder es gerade erst 
    // angelegt wurde, die vom User eingegebene Zahl $number in das Array einfügen. 
    // $arr[] = wert;
    $_SESSION['numbers'][] = $number;

    // Redirect: Seite neu laden POST --> GET
    header('Location: session_array_sum.php');
    return;
}

?>
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
    <h1>Berechnet die Summe der Zahlen in der Liste</h1>
    <p>Die Liste wird in einer Session-Variable gespeichert.</p>

    <h2>Weitere Zahl hinzufügen</h2>
    <form action="session_array_sum.php" method="POST">
        <label>Zahl:</label><br>
        <input type="text" name="number"><br>
        <button name="bt_add_number">Zahl hinzufügen</button>
    </form>

    <h2>Alle bisher gespeicherten Zahlen</h2>
    <?php
    // Über das Array iterieren
    for($i = 0; $i < count($_SESSION['numbers']); $i++)
    {
        // hole das jeweilige Element aus dem Array --> variable, array, index
        // variable = array[index]
        $number = $_SESSION['numbers'][$i];
        
        echo htmlspecialchars($number);
        if($i != count($_SESSION['numbers']) - 1)
        {
            echo ', ';
        }
        
    }
    ?>

    <h2>Die Summe aller gespeicherten Zahlen</h2>
    <?php
    $summe = 0;
    for($i = 0; $i < count($_SESSION['numbers']); $i++)
    {
        $number = $_SESSION['numbers'][$i];
        $summe += $number;
    }
    echo 'Summe der Zahlen: ' . htmlspecialchars($summe);
    ?>

</body>

</html>