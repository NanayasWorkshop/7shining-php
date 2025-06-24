<?php

namespace Controllers;

use Core\Controller;
use Models\FaqModel;

class FaqController extends Controller
{
    private $faqModel;
    
    public function __construct()
    {
        parent::__construct();
        $this->faqModel = new FaqModel();
    }
    
    public function index()
    {
        // Get all FAQ data
        $faqData = $this->faqModel->all();
        
        // Page-specific meta data
        $data = [
            'title' => 'FAQ - Häufige Fragen',
            'description' => 'Hier findest du Antworten auf die am häufigsten gestellten Fragen zu 7Shining, unseren Depot-Paketen und der Mitgliedschaft.',
            'keywords' => '7Shining, FAQ, Fragen, Antworten, Hilfe, Support, Depot-Pakete, Mitgliedschaft, Gold, Schweiz',
            'ogType' => 'website',
            'additionalStyles' => ['faq.css'], // faq.css is already loaded via main styles
            'additionalScripts' => ['pages/faq.js'], // faq.js is already loaded
            
            // FAQ page data
            'categories' => $faqData['categories'],
            'faq_items' => $faqData['faq_items'],
            'search_enabled' => true
        ];
        
        $this->view('faq.index', $data);
    }
    
    /**
     * Search FAQ items (AJAX endpoint)
     */
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['error' => 'Method not allowed'], 405);
            return;
        }
        
        $searchTerm = $this->input('search', '');
        $category = $this->input('category', 'all');
        
        $results = $this->faqModel->search($searchTerm, $category);
        
        $this->json([
            'success' => true,
            'results' => $results,
            'total' => count($results)
        ]);
    }
    
    /**
     * Get FAQ items by category (AJAX endpoint)
     */
    public function getByCategory($category = 'all')
    {
        $faqItems = $this->faqModel->getByCategory($category);
        
        $this->json([
            'success' => true,
            'items' => $faqItems,
            'category' => $category,
            'total' => count($faqItems)
        ]);
    }
    
    /**
     * Get popular FAQ items
     */
    public function getPopular($limit = 5)
    {
        $popularItems = $this->faqModel->getPopular($limit);
        
        $this->json([
            'success' => true,
            'items' => $popularItems
        ]);
    }
    
    /**
     * Track FAQ item views (for analytics)
     */
    public function trackView()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['error' => 'Method not allowed'], 405);
            return;
        }
        
        $faqId = $this->input('faq_id');
        $category = $this->input('category');
        
        // Log FAQ view for analytics
        $this->faqModel->trackView($faqId, $category);
        
        $this->json(['success' => true]);
    }
}