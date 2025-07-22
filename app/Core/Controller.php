<?php

namespace Core;

class Controller
{
    protected $view;
    
    public function __construct()
    {
        $this->view = new View();
    }
    
    /**
     * Load a view
     */
    protected function view($viewName, $data = [], $layout = 'main')
    {
        $this->view->render($viewName, $data, $layout);
    }
    
    /**
     * Redirect to another URL
     */
    protected function redirect($url, $statusCode = 302)
    {
        // Handle relative URLs
        if (!preg_match('/^https?:\/\//', $url)) {
            $url = BASE_URL . '/' . ltrim($url, '/');
        }
        
        header("Location: $url", true, $statusCode);
        exit;
    }
    
    /**
     * Return JSON response
     */
    protected function json($data, $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    /**
     * Get POST data
     */
    protected function input($key = null, $default = null)
    {
        if ($key === null) {
            return $_POST;
        }
        
        return $_POST[$key] ?? $default;
    }
    
    /**
     * Get GET data
     */
    protected function query($key = null, $default = null)
    {
        if ($key === null) {
            return $_GET;
        }
        
        return $_GET[$key] ?? $default;
    }
    
    /**
     * Validate CSRF token
     */
    protected function validateCsrf($token = null)
    {
        $token = $token ?? $this->input('_token');
        return isset($_SESSION['_token']) && hash_equals($_SESSION['_token'], $token);
    }
    
    /**
     * Generate CSRF token
     */
    protected function generateCsrfToken()
    {
        if (!isset($_SESSION['_token'])) {
            $_SESSION['_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_token'];
    }
}