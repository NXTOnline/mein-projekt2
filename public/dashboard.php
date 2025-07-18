<?php
session_start();

// Überprüfe, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');  // Weiterleitung, wenn der Benutzer nicht eingeloggt ist
    exit();
}

echo "Willkommen, " . $_SESSION['username'] . "!";  // Zeige den Benutzernamen an
?>
