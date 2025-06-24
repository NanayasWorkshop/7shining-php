<?php

namespace Controllers;

use Core\Controller;

class ErrorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Handle 404 Not Found errors
     */
    public function notFound()
    {
        // Set proper HTTP status code
        http_response_code(404);
        
        // Page-specific meta data
        $data = [
            'title' => 'Seite nicht gefunden',
            'description' => 'Die angeforderte Seite konnte nicht gefunden werden. Entdecken Sie unsere anderen Angebote oder kehren Sie zur Startseite zurück.',
            'keywords' => '404, Seite nicht gefunden, 7Shining',
            'ogType' => 'website',
            'additionalStyles' => ['pages/404.css'],
            'additionalScripts' => ['pages/404.js']
        ];
        
        $this->view('errors.404', $data);
    }
    
    /**
     * Handle general server errors (500, etc.)
     */
    public function serverError($code = 500)
    {
        http_response_code($code);
        
        $data = [
            'title' => 'Server Fehler',
            'description' => 'Ein unerwarteter Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.',
            'keywords' => 'Server Fehler, 7Shining',
            'error_code' => $code,
            'additionalStyles' => ['pages/404.css'],
            'additionalScripts' => ['pages/404.js']
        ];
        
        // Use same template but with different content
        $this->view('errors.404', $data);
    }
    
    /**
     * Handle forbidden access (403)
     */
    public function forbidden()
    {
        http_response_code(403);
        
        $data = [
            'title' => 'Zugriff verweigert',
            'description' => 'Sie haben keine Berechtigung, diese Seite aufzurufen.',
            'keywords' => 'Zugriff verweigert, 7Shining',
            'error_code' => 403,
            'additionalStyles' => ['pages/404.css'],
            'additionalScripts' => ['pages/404.js']
        ];
        
        $this->view('errors.404', $data);
    }
}