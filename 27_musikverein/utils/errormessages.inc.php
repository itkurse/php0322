<?php
    // Ausgabe der Fehlermeldungen
    if(count($errors) > 0)
    {
        echo '<ul class="errors">';

        // in der HTML-Liste für jede Fehlermeldung einen Listeneintrag ausgeben
        foreach($errors as $e)
        {
            echo '<li>' . htmlspecialchars($e) . '</li>';
        }

        echo '</ul>';
    }
?>