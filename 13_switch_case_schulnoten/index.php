<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>

    <form action="index.php" method="POST">
        <label for="note">Schulnote (Ziffer):</label><br>
        <input type="text" name="note" id="note"><br>
        <button name="bt_convert">Ziffer in Text umwandeln</button>
    </form>

    <?php

    // leeres Array (Liste) für Fehlermeldungen definieren
    $errors = [];

    // wurde das Formular abgesendet?
    if (isset($_POST['bt_convert'])) {
        // Die Eingabe aus dem Textfeld in einer Variable speichern
        // <script>alert('Angriff!');</script>
        $ziffer = htmlspecialchars($_POST['note']);

        // Formularvalidierung
        // ist das Textfeld leer?
        if(strlen($ziffer) == 0){
            // fügt einen neuen Eintrag im Array $errors hinzu
            $errors[] = "Eine Ziffer eingeben!";

        } elseif(!is_numeric($ziffer)){
            $errors[] = "Nur Zahlen eingeben!";
        }

        // wenn es keine Fehlermeldungen gibt, dann switch-case durchführen ... 
        if(count($errors) == 0)
        {
            switch ($ziffer) {
                case 1:
                    echo "<p>$ziffer ist Sehr Gut.</p>";
                    break;
                case 2:
                    echo "<p>$ziffer ist Gut.</p>";
                    break;
                case 3:
                    echo "<p>$ziffer ist Befriedigend.</p>";
                    break;
                case 4:
                    echo "<p>$ziffer ist Genügend.</p>";
                    break;
                case 5:
                    echo "<p>$ziffer ist Nicht Genügend.</p>";
                    break;
                default:
                    echo "<p>$ziffer ist eine ungültige Eingabe!</p>";
            }
        }
        
    }

    // Gibt es Fehlermeldungen?
    if(count($errors) > 0)
    {
        echo '<div class="errors">';
        echo '<ul>';
        // für jede Fehlermeldung ein <li></li> erzeugen und die Meldung reinschreiben
        for($i = 0; $i < count($errors); $i++)
        {
            echo '<li>' . $errors[$i] . '</li>';
        }

        echo '</ul>';
        echo '</div>';
    }

    ?>
    <!--  -->
</body>

</html>