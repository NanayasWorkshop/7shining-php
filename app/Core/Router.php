<?php

namespace Core;

class Router
{
    private $routes = [];
    
    public function __construct()
    {
        global $routes;
        $this->routes = $routes ?? [];
    }
    
    public function route($uri)
    {
        // Default route
        if ($uri === '' || $uri === '/') {
            $uri = 'home';
        }
        
        // Check for exact match first
        if (isset($this->routes[$uri])) {
            try {
                $this->dispatch($this->routes[$uri]);
                return;
            } catch (\Exception $e) {
                // Controller/method not found, show 404
                $this->show404();
                return;
            }
        }
        
        // Check for pattern matches
        foreach ($this->routes as $pattern => $target) {
            if ($this->matchPattern($pattern, $uri)) {
                try {
                    $this->dispatch($target, $this->extractParams($pattern, $uri));
                    return;
                } catch (\Exception $e) {
                    // Controller/method not found, show 404
                    $this->show404();
                    return;
                }
            }
        }
        
        // No route found - show 404
        $this->show404();
    }
    
    private function matchPattern($pattern, $uri)
    {
        // Convert route pattern to regex
        $pattern = preg_replace('/\{[^}]+\}/', '([^/]+)', $pattern);
        $pattern = '#^' . $pattern . '$#';
        
        return preg_match($pattern, $uri);
    }
    
    private function extractParams($pattern, $uri)
    {
        $params = [];
        
        // Extract parameter names from pattern
        preg_match_all('/\{([^}]+)\}/', $pattern, $paramNames);
        
        // Extract values from URI
        $pattern = preg_replace('/\{[^}]+\}/', '([^/]+)', $pattern);
        $pattern = '#^' . $pattern . '$#';
        
        if (preg_match($pattern, $uri, $matches)) {
            array_shift($matches); // Remove full match
            
            // Combine parameter names with values
            if (!empty($paramNames[1])) {
                $params = array_combine($paramNames[1], $matches);
            }
        }
        
        return $params;
    }
    
    private function dispatch($target, $params = [])
    {
        if (is_string($target)) {
            // Parse controller@method format
            if (strpos($target, '@') !== false) {
                list($controller, $method) = explode('@', $target);
            } else {
                $controller = $target;
                $method = 'index';
            }
        } elseif (is_array($target)) {
            $controller = $target['controller'] ?? 'Home';
            $method = $target['method'] ?? 'index';
        } else {
            throw new \Exception("Invalid route target");
        }
        
        // Build controller class name
        $controllerClass = 'Controllers\\' . ucfirst($controller) . 'Controller';
        
        // Check if controller exists
        if (!class_exists($controllerClass)) {
            throw new \Exception("Controller not found: " . $controllerClass);
        }
        
        // Instantiate controller
        $controllerInstance = new $controllerClass();
        
        // Check if method exists
        if (!method_exists($controllerInstance, $method)) {
            throw new \Exception("Method not found: " . $method);
        }
        
        // Call the controller method with parameters
        call_user_func_array([$controllerInstance, $method], $params);
    }
    
    /**
     * Show 404 error page using the ErrorController
     */
    private function show404()
    {
        try {
            // Try to load ErrorController
            $errorController = new \Controllers\ErrorController();
            $errorController->notFound();
        } catch (\Exception $e) {
            // If ErrorController fails, show basic 404
            $this->showBasic404();
        }
    }
    
    /**
     * Show basic 404 if ErrorController is not available
     */
    private function showBasic404()
    {
        http_response_code(404);
        
        $siteName = defined('SITE_NAME') ? SITE_NAME : '7Shining';
        $baseUrl = defined('BASE_URL') ? BASE_URL : '';
        
        echo '<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Seite nicht gefunden - ' . htmlspecialchars($siteName) . '</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; background: #f4f4f4; }
        .error-container { max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; font-size: 48px; margin-bottom: 20px; }
        p { color: #666; font-size: 18px; margin-bottom: 30px; }
        .btn { display: inline-block; padding: 12px 24px; background: #007cba; color: white; text-decoration: none; border-radius: 4px; }
        .btn:hover { background: #005a87; }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <h2>Seite nicht gefunden</h2>
        <p>Die angeforderte Seite konnte nicht gefunden werden.</p>
        <a href="' . $baseUrl . '/" class="btn">Zurück zur Startseite</a>
    </div>
</body>
</html>';
    }
}