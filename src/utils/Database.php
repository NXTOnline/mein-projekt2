<?php
namespace App\Utils;

use PDO;

class Database
{
    public static function connect()
    {
        // Konfigurationsdaten aus der config.php laden
        $config = require '../config/config.php';  // Vergewissere dich, dass der Pfad korrekt ist

        // Verbindung zur Datenbank herstellen
        $dsn = 'mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'];
        $username = $config['db_user'];
        $password = $config['db_pass'];

        try {
            // Mit PDO verbinden
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            die('Verbindung fehlgeschlagen: ' . $e->getMessage());
        }
    }
}
