<?php
// Ausgabe der Fehlermeldungen!
if(count($errors) > 0)
{
    echo '<ul>';
    // für jede Fehlermeldung einen Listeneintrag (Bulletpoint) generieren
    for($i = 0; $i < count($errors); $i++)
    {
        $msg = $errors[$i];
        echo '<li>' . htmlspecialchars($msg) . '</li>';
    }
    echo '</ul>';
}
?>