<?php
require_once '../vendor/autoload.php';  // Autoloader einbinden

use App\Controllers\AuthController;  // Die Klasse richtig importieren

$controller = new AuthController();
$controller->login();
