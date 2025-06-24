<?php

namespace Models;

use Core\Model;

class LegalModel extends Model
{
    protected $dataFile = 'legal_content.php';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Get AGB content
     */
    public function getAGB()
    {
        return $this->data['agb'] ?? [];
    }
    
    /**
     * Get Privacy Policy content
     */
    public function getPrivacyPolicy()
    {
        return $this->data['datenschutz'] ?? [];
    }
    
    /**
     * Get Impressum content
     */
    public function getImpressum()
    {
        return $this->data['impressum'] ?? [];
    }
    
    /**
     * Get legal summary
     */
    public function getLegalSummary()
    {
        return $this->data['summary'] ?? [];
    }
    
    /**
     * Get navigation for a specific legal page
     */
    public function getNavigation($pageType)
    {
        $pageData = $this->data[$pageType] ?? [];
        return $pageData['navigation'] ?? [];
    }
    
    /**
     * Get sections for a specific legal page
     */
    public function getSections($pageType)
    {
        $pageData = $this->data[$pageType] ?? [];
        return $pageData['sections'] ?? [];
    }
    
    /**
     * Get specific section by ID
     */
    public function getSection($pageType, $sectionId)
    {
        $sections = $this->getSections($pageType);
        
        foreach ($sections as $section) {
            if ($section['id'] === $sectionId) {
                return $section;
            }
        }
        
        return null;
    }
    
    /**
     * Get PDF downloads for AGB
     */
    public function getPdfDownloads()
    {
        $agbData = $this->getAGB();
        return $agbData['pdf_downloads'] ?? [];
    }
    
    /**
     * Search legal content
     */
    public function search($searchTerm, $pageType = 'all')
    {
        $results = [];
        $searchTerm = strtolower($searchTerm);
        
        $pagesToSearch = [];
        if ($pageType === 'all') {
            $pagesToSearch = ['agb', 'datenschutz', 'impressum'];
        } else {
            $pagesToSearch = [$pageType];
        }
        
        foreach ($pagesToSearch as $page) {
            $sections = $this->getSections($page);
            
            foreach ($sections as $section) {
                $sectionText = strtolower($section['title']);
                $contentText = '';
                
                if (isset($section['content'])) {
                    $contentText = strtolower(implode(' ', $section['content']));
                }
                
                if (strpos($sectionText, $searchTerm) !== false || 
                    strpos($contentText, $searchTerm) !== false) {
                    
                    $results[] = [
                        'page' => $page,
                        'section_id' => $section['id'],
                        'title' => $section['title'],
                        'excerpt' => $this->createExcerpt($section, $searchTerm)
                    ];
                }
            }
        }
        
        return $results;
    }
    
    /**
     * Create excerpt with highlighted search term
     */
    private function createExcerpt($section, $searchTerm)
    {
        if (!isset($section['content']) || empty($section['content'])) {
            return '';
        }
        
        $content = implode(' ', $section['content']);
        $content = strip_tags($content);
        
        $pos = stripos($content, $searchTerm);
        if ($pos === false) {
            return substr($content, 0, 200) . '...';
        }
        
        $start = max(0, $pos - 100);
        $excerpt = substr($content, $start, 200);
        
        if ($start > 0) {
            $excerpt = '...' . $excerpt;
        }
        
        if (strlen($content) > $start + 200) {
            $excerpt .= '...';
        }
        
        return $excerpt;
    }
    
    /**
     * Get contact information
     */
    public function getContactInfo()
    {
        return [
            'company' => '7Shining',
            'address' => '[Adresse]<br>St. Gallen, Schweiz',
            'email' => 'info@7shining.com',
            'support_email' => 'support@7shining.com',
            'depot_email' => 'depot@7shining.com',
            'privacy_email' => 'datenschutz@7shining.com',
            'withdrawal_email' => 'widerruf@7shining.com',
            'phone' => '[Telefonnummer]',
            'business_hours' => 'Mo-Fr 09:00-17:00 Uhr'
        ];
    }
    
    /**
     * Track legal page views (for analytics)
     */
    public function trackPageView($pageType, $sectionId = null)
    {
        $logData = [
            'page_type' => $pageType,
            'section_id' => $sectionId,
            'timestamp' => date('Y-m-d H:i:s'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
        ];
        
        error_log("Legal page view tracked: " . json_encode($logData));
        
        return true;
    }
}