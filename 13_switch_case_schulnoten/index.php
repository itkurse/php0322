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
    // wurde das Formular abgesendet?
    if (isset($_POST['bt_convert'])) {
        // Die Eingabe aus dem Textfeld in einer Variable speichern
        $ziffer = $_POST['note'];

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
    ?>
    <!--  -->
</body>

</html>