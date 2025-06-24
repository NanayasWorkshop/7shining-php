<?php
// Define constants for root deployment
define('ROOT_PATH', __DIR__);
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', __DIR__);

// BASE_URL für Hostpoint
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
define('BASE_URL', $protocol . '://' . $host);

// Load configuration
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

// Get the current URI - simplified for root deployment
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

try {
    // Route the request
    $router->route($uri);
} catch (Exception $e) {
    // Handle errors
    http_response_code(404);
    echo '<!DOCTYPE html><html><head><title>404 - Seite nicht gefunden</title></head>';
    echo '<body><h1>404 - Seite nicht gefunden</h1>';
    echo '<p>Die angeforderte Seite konnte nicht gefunden werden.</p>';
    echo '<a href="' . BASE_URL . '/">Zurück zur Startseite</a></body></html>';
}
?>