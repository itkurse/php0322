<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
</head>

<body>

    <h1>Euro in Münzen umrechnen</h1>

    <?php
    $errors = [];
    if (isset($_POST['bt_calculate'])) {
        // Den eingegebenen Euro-Betrag einlesen
        // trim: löscht alle Leerzeichen am Anfang und am Ende des Strings
        $betrag = trim($_POST['betrag']);

        // Formularvalidierung
        // ist das Textfeld "betrag" leer?
        if (strlen($betrag) == 0) {
            $errors[] = 'Einen Betrag eingeben!';
        }
        // enthält die Variable keine Zahl?
        if (!is_numeric($betrag)) {
            $errors[] = 'Nur Zahlen eingeben!';
        }
        // ist die Zahl negativ?
        if ($betrag < 0) {
            $errors[] = 'Nur positive Zahlen eingeben!';
        }

        // Nur wenn es keine Fehler gab, dann die eigentliche Berechnung durchführen
        if (count($errors) == 0) {
            // Betrag in Cent umwandeln
            $betrag *= 100; // bsp: 2.75 --> 275

            $anz200 = 0;
            $anz100 = 0;
            $anz50 = 0;
            $anz20 = 0;
            $anz10 = 0;
            $anz5 = 0;
            $anz1 = 0;

            // Betrag so lange in Münzen aufteilen bis der Restbetrag 0 ist
            while ($betrag > 0) {
                // Wie oft kann ich den Betrag durch 200 teilen?
                $anz = (int)($betrag / 200.0);
                // Kann ich öfter als 0x die 2 Euro Münze verwenden?
                if ($anz > 0) {
                    $anz200 += $anz;
                    $betrag -= $anz * 200;
                }
                // 100 Cent
                $anz = (int)($betrag / 100.0);
                if ($anz > 0) {
                    $anz100 += $anz;
                    $betrag -= $anz * 100;
                }
                // 50 Cent
                $anz = (int)($betrag / 50.0);
                if ($anz > 0) {
                    $anz50 += $anz;
                    $betrag -= $anz * 50;
                }
                // 20 Cent
                $anz = (int)($betrag / 20.0);
                if ($anz > 0) {
                    $anz20 += $anz;
                    $betrag -= $anz * 20;
                }
                // 10 Cent
                $anz = (int)($betrag / 10.0);
                if ($anz > 0) {
                    $anz10 += $anz;
                    $betrag -= $anz * 10;
                }
                // 5 Cent
                $anz = (int)($betrag / 5.0);
                if ($anz > 0) {
                    $anz5 += $anz;
                    $betrag -= $anz * 5;
                }
                // 100 Cent
                $anz = (int)($betrag / 1.0);
                if ($anz > 0) {
                    $anz1 += $anz;
                    $betrag -= $anz * 1;
                }
                break;
            }

            // Ausgabe vom Ergebnis
            echo "<div class='result'>
            <p>$anz200 x 2 €</p>
            <p>$anz100 x 1 €</p>
            <p>$anz50 x 50 Cent</p>
            <p>$anz20 x 20 Cent</p>
            <p>$anz10 x 10 Cent</p>
            <p>$anz5 x 5 Cent</p>
            <p>$anz1 x 1 Cent</p>
        </div>";
        }
    }


    // Gibt es Fehlermeldungen?
    if (count($errors) > 0) {
        echo '<div class="errors">';
        echo '<ul>';
        // mit einer Schleife über alle Fehlermeldungen iterieren
        for ($i = 0; $i < count($errors); $i++) {
            echo '<li>' . htmlspecialchars($errors[$i]) . '</li>';
        }

        echo '</ul>';
        echo '</div>';
    }

    ?>

    <form action="index.php" method="POST">
        <label for="betrag">Betrag in Euro (z. B. 2.75):</label><br />
        <input type="text" id="betrag" name="betrag"><br>
        <button name="bt_calculate">Euro in Münzen umrechnen</button>
    </form>

</body>

</html>