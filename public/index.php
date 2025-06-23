<?php
// Define constants first
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', __DIR__);

// Fix BASE_URL to include the full path
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$scriptName = $_SERVER['SCRIPT_NAME'];
$basePath = str_replace('/index.php', '', $scriptName);
define('BASE_URL', $protocol . '://' . $host . $basePath);

// Load configuration (which includes session config)
require_once APP_PATH . '/Config/app.php';

// Start session AFTER configuration
session_start();

// Autoload classes
spl_autoload_register(function ($class) {
    $file = APP_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Load routes
require_once APP_PATH . '/Config/routes.php';

// Initialize router
$router = new Core\Router();

// Get the current URI and clean it properly
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove the base path (e.g., /7shining-php/public)
if ($basePath && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// Clean the URI
$uri = trim($uri, '/');

try {
    // Route the request
    $router->route($uri);
} catch (Exception $e) {
    // Handle errors - show simple 404 for now
    http_response_code(404);
    echo '<!DOCTYPE html><html><head><title>404 - Seite nicht gefunden</title></head>';
    echo '<body><h1>404 - Seite nicht gefunden</h1>';
    echo '<p>Die angeforderte Seite konnte nicht gefunden werden.</p>';
    echo '<p>Debug info: URI = ' . htmlspecialchars($uri) . ', Error: ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<a href="' . BASE_URL . '/">Zurück zur Startseite</a></body></html>';
}