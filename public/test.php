<?php
require_once '../src/utils/Database.php'; // Direktes Laden der Datei

use App\Utils\Database;

try {
    $pdo = Database::connect();
    echo "Verbindung erfolgreich!";
} catch (Exception $e) {
    echo "Fehler bei der Verbindung: " . $e->getMessage();
}
