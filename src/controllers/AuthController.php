<?php
namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function login()
    {
        // Überprüfe, ob das Formular abgesendet wurde
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Benutzereingaben holen
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Versuche, den Benutzer zu authentifizieren
            $user = User::authenticate($username, $password);

            if ($user) {
                // Wenn erfolgreich, Sitzung starten und Benutzer weiterleiten
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: dashboard.php');  // Weiterleitung nach erfolgreichem Login
                exit();
            } else {
                // Fehler, wenn Benutzername oder Passwort falsch sind
                $error_message = "Falscher Benutzername oder Passwort.";
                include '../src/views/login.php';  // Fehlermeldung anzeigen
            }
        } else {
            // Zeige das Login-Formular an, wenn keine POST-Daten vorhanden sind
            include '../src/views/login.php';
        }
    }

    public function logout()
    {
        session_start();
        session_unset();  // Löscht alle Session-Variablen
        session_destroy();  // Zerstört die Session
        header('Location: login.php');  // Weiterleitung nach Logout
        exit();
    }
}
