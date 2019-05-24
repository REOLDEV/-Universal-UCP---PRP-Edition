<?php
//Bitte den MySQL Server angeben
$mysql_server = "127.0.0.1";
$mysql_benutzername = "root";
$mysql_passwort = "";
$mysql_datenbank = "";

//Hier wird die Datenbankverbindung hergestellt und getestet
$db = mysqli_connect($mysql_server, $mysql_benutzername, $mysql_passwort, $mysql_datenbank);
if (!$db) {
    echo "<b>Fehler: konnte nicht mit MySQL verbinden.</b>" . PHP_EOL;
    echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>