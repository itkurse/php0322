<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>

    <h1>Beispiel Zahlenbereiche mit switch-case</h1>
    <?php

    $zahl = $_GET['zahl'];

    switch ($zahl) {
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
            echo '<p>Die Zahl ist 1, 2, 3, 4, oder 5.</p>';
            break; // break beendet das switch-case
        case 6:
        case 7:
        case 8:
        case 9:
            echo '<p>Die Zahl ist 6, 7, 8, 9, oder 10.</p>';
            break;
        case 10:
            echo '<p>Die Zahl ist 6, 7, 8, 9, oder 10.</p>';
            echo '<p>Jackpot!</p>';
            break;
        case 0:
            echo '<p>Die Zahl darf nicht 0 sein.</p>';
            break;
        default: // default: wenn bisher kein case zugetroffen hat
            echo '<p>Die Zahl ist zu groß oder zu klein.</p>';
            break;
    }
    // PHP Intelephense

    ?>


</body>

</html>