<?php

namespace Core;

class View
{
    private $viewsPath;
    private $layoutsPath;
    private $partialsPath;
    
    public function __construct()
    {
        $this->viewsPath = APP_PATH . '/Views/pages';
        $this->layoutsPath = APP_PATH . '/Views/layouts';
        $this->partialsPath = APP_PATH . '/Views/partials';
    }
    
    /**
     * Render a view with layout
     */
    public function render($viewName, $data = [], $layout = 'main')
    {
        // Extract data for use in views
        if (!empty($data)) {
            extract($data, EXTR_SKIP);
        }
        
        // Add global data
        $siteName = SITE_NAME;
        $baseUrl = BASE_URL;
        $currentUrl = $this->getCurrentUrl();
        
        // Start output buffering for content
        ob_start();
        
        // Include the view file
        $viewFile = $this->viewsPath . '/' . str_replace('.', '/', $viewName) . '.php';
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            throw new \Exception("View not found: $viewName");
        }
        
        // Get the view content
        $content = ob_get_clean();
        
        // If no layout requested, just output content
        if ($layout === false || $layout === null) {
            echo $content;
            return;
        }
        
        // Load the layout
        $layoutFile = $this->layoutsPath . '/' . $layout . '.php';
        if (file_exists($layoutFile)) {
            include $layoutFile;
        } else {
            throw new \Exception("Layout not found: $layout");
        }
    }
    
    /**
     * Include a partial view
     */
    public function partial($partialName, $data = [])
    {
        if (!empty($data)) {
            extract($data, EXTR_SKIP);
        }
        
        $partialFile = $this->partialsPath . '/' . $partialName . '.php';
        if (file_exists($partialFile)) {
            include $partialFile;
        } else {
            throw new \Exception("Partial not found: $partialName");
        }
    }
    
    /**
     * Escape HTML output
     */
    public function escape($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
    
    /**
     * Generate URL
     */
    public function url($path = '')
    {
        return BASE_URL . '/' . ltrim($path, '/');
    }
    
    /**
     * Get current URL
     */
    private function getCurrentUrl()
    {
        return BASE_URL . $_SERVER['REQUEST_URI'];
    }
    
    /**
     * Include CSS file
     */
    public function css($file)
    {
        return BASE_URL . '/css/' . $file;
    }
    
    /**
     * Include JS file
     */
    public function js($file)
    {
        return BASE_URL . '/js/' . $file;
    }
    
    /**
     * Include image
     */
    public function img($file)
    {
        return BASE_URL . '/images/' . $file;
    }
}