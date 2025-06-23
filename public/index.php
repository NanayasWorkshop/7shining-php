<?php
// Start session
session_start();

// Define constants
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', __DIR__);
define('BASE_URL', 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST']);

// Autoload classes
spl_autoload_register(function ($class) {
    $file = APP_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Load configuration
require_once APP_PATH . '/Config/app.php';
require_once APP_PATH . '/Config/routes.php';

// Initialize router
$router = new Core\Router();

// Get the current URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove base path if app is in subdirectory
$basePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', PUBLIC_PATH);
if ($basePath && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// Clean the URI
$uri = trim($uri, '/');

try {
    // Route the request
    $router->route($uri);
} catch (Exception $e) {
    // Handle errors
    http_response_code(404);
    $errorController = new Controllers\ErrorController();
    $errorController->notFound();
}