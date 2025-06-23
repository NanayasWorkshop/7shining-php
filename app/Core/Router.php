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
            $this->dispatch($this->routes[$uri]);
            return;
        }
        
        // Check for pattern matches
        foreach ($this->routes as $pattern => $target) {
            if ($this->matchPattern($pattern, $uri)) {
                $this->dispatch($target, $this->extractParams($pattern, $uri));
                return;
            }
        }
        
        // No route found
        throw new \Exception("Route not found: " . $uri);
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
}