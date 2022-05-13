<?php

$password = '123456';

$hash = password_hash($password, PASSWORD_DEFAULT);

echo "<p>Passwort (Klartext): $password</p>";
echo "<p>Passwort (Hash): $hash</p>";

$password = '1234567';
// Vergleich
if(password_verify($password, $hash))
{
    echo "<p>$password ist OK!</p>";
} else {
    echo "<p>$password ist NICHT OK!</p>";
}

?>