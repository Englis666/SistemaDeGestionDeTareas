<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Router;

// Registra los errores en logs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_log("🔥 Iniciando aplicación...");

// Maneja la solicitud
Router::handleRequest();
