<?php

require_once __DIR__ . '/vendor/autoload.php';

use Acnth\SistemaDeGestionDeTareas\Infrastructure\Database\Database;

try {
    $db = Database::getConnection();
    echo "✅ Conexión exitosa";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
