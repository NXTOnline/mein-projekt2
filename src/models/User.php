<?php
namespace App\Models;

use App\Utils\Database;

class User
{
    public static function authenticate($username, $password)
    {
        // Verbindung zur Datenbank
        $pdo = Database::connect();

        // SQL-Abfrage, um den Benutzer anhand des Benutzernamens zu finden
        $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Hole den Benutzer aus der Datenbank
        $user = $stmt->fetch();

        // Überprüfe, ob der Benutzer existiert und das Passwort korrekt ist
        if ($user && password_verify($password, $user['password'])) {
            return $user;  // Rückgabe des Benutzers
        }

        return false;  // Benutzername oder Passwort ist falsch
    }
}
