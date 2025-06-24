<?php

namespace Models;

use Core\Model;

class FaqModel extends Model
{
    protected $dataFile = 'faq_data.php';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Get FAQ items by category
     */
    public function getByCategory($category = 'all')
    {
        if ($category === 'all') {
            return $this->data['faq_items'] ?? [];
        }
        
        $faqItems = $this->data['faq_items'] ?? [];
        
        return array_filter($faqItems, function($item) use ($category) {
            return $item['category'] === $category;
        });
    }
    
    /**
     * Search FAQ items
     */
    public function search($searchTerm, $category = 'all')
    {
        $faqItems = $this->getByCategory($category);
        
        if (empty($searchTerm)) {
            return $faqItems;
        }
        
        $searchTerm = strtolower($searchTerm);
        
        return array_filter($faqItems, function($item) use ($searchTerm) {
            $question = strtolower($item['question']);
            $answer = strtolower($item['answer']);
            
            return strpos($question, $searchTerm) !== false || 
                   strpos($answer, $searchTerm) !== false;
        });
    }
    
    /**
     * Get categories
     */
    public function getCategories()
    {
        return $this->data['categories'] ?? [];
    }
    
    /**
     * Get popular FAQ items (most commonly accessed)
     */
    public function getPopular($limit = 5)
    {
        $faqItems = $this->data['faq_items'] ?? [];
        
        // Filter for items marked as popular or commonly asked
        $popularItems = array_filter($faqItems, function($item) {
            return isset($item['popular']) && $item['popular'] === true;
        });
        
        // If no popular items marked, return first few items
        if (empty($popularItems)) {
            return array_slice($faqItems, 0, $limit);
        }
        
        return array_slice($popularItems, 0, $limit);
    }
    
    /**
     * Get FAQ item by ID
     */
    public function getById($id)
    {
        $faqItems = $this->data['faq_items'] ?? [];
        
        foreach ($faqItems as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        
        return null;
    }
    
    /**
     * Track FAQ item view (for analytics)
     */
    public function trackView($faqId, $category = null)
    {
        // In a real application, this would log to database or analytics service
        $logData = [
            'faq_id' => $faqId,
            'category' => $category,
            'timestamp' => date('Y-m-d H:i:s'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
        ];
        
        error_log("FAQ view tracked: " . json_encode($logData));
        
        return true;
    }
    
    /**
     * Get FAQ statistics
     */
    public function getStats()
    {
        $faqItems = $this->data['faq_items'] ?? [];
        $categories = $this->data['categories'] ?? [];
        
        $stats = [
            'total_questions' => count($faqItems),
            'total_categories' => count($categories),
            'popular_questions' => count($this->getPopular()),
        ];
        
        // Count items per category
        foreach ($categories as $category) {
            $categoryItems = $this->getByCategory($category['id']);
            $stats['category_counts'][$category['id']] = count($categoryItems);
        }
        
        return $stats;
    }
}