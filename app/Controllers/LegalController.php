<?php

namespace Controllers;

use Core\Controller;
use Models\LegalModel;

class LegalController extends Controller
{
    private $legalModel;
    
    public function __construct()
    {
        parent::__construct();
        $this->legalModel = new LegalModel();
    }
    
    /**
     * AGB (Terms of Service) page
     */
    public function agb()
    {
        $agbContent = $this->legalModel->getAGB();
        
        $data = [
            'title' => 'Allgemeine Geschäftsbedingungen',
            'description' => 'Rechtliche Grundlagen für die Mitgliedschaft und Nutzung unserer Dienstleistungen bei 7Shining.',
            'keywords' => 'AGB, Geschäftsbedingungen, Rechtliches, 7Shining, Schweiz, Verein, Depot, Gold',
            'ogType' => 'website',
            'additionalStyles' => ['legal.css'],
            'additionalScripts' => [],
            
            // AGB content
            'legal_content' => $agbContent,
            'page_type' => 'agb',
            'last_updated' => 'Mai 2025'
        ];
        
        $this->view('legal.agb', $data);
    }
    
    /**
     * Datenschutzerklärung (Privacy Policy) page
     */
    public function datenschutz()
    {
        $privacyContent = $this->legalModel->getPrivacyPolicy();
        
        $data = [
            'title' => 'Datenschutzerklärung',
            'description' => 'Ihre Privatsphäre ist uns wichtig. Hier erfahren Sie, wie wir Ihre Daten schützen und verwenden.',
            'keywords' => 'Datenschutz, Datenschutzerklärung, Privatsphäre, DSGVO, 7Shining, Schweiz',
            'ogType' => 'website',
            'additionalStyles' => ['legal.css'],
            'additionalScripts' => [],
            
            // Privacy policy content
            'legal_content' => $privacyContent,
            'page_type' => 'datenschutz',
            'last_updated' => 'Mai 2025'
        ];
        
        $this->view('legal.datenschutz', $data);
    }
    
    /**
     * Impressum (Legal Notice) page
     */
    public function impressum()
    {
        $impressumContent = $this->legalModel->getImpressum();
        
        $data = [
            'title' => 'Impressum',
            'description' => 'Rechtliche Informationen und Angaben gemäß den gesetzlichen Bestimmungen über 7Shining.',
            'keywords' => 'Impressum, Kontakt, Rechtliches, 7Shining, Schweiz, Verein, St. Gallen',
            'ogType' => 'website',
            'additionalStyles' => ['legal.css'],
            'additionalScripts' => [],
            
            // Impressum content
            'legal_content' => $impressumContent,
            'page_type' => 'impressum',
            'last_updated' => 'Mai 2025'
        ];
        
        $this->view('legal.impressum', $data);
    }
    
    /**
     * Download PDF documents
     */
    public function downloadPdf($document)
    {
        $allowedDocuments = ['7shining-agb', '7shining-agb-aktive-mitglieder', 'datenschutz', 'impressum'];
        
        if (!in_array($document, $allowedDocuments)) {
            // Show 404 page
            $errorController = new \Controllers\ErrorController();
            $errorController->notFound();
            return;
        }
        
        // Build the PDF path
        $pdfPath = $_SERVER['DOCUMENT_ROOT'] . '/7shining-php/public/pdf/' . $document . '.pdf';
        
        if (!file_exists($pdfPath)) {
            // Show 404 page
            $errorController = new \Controllers\ErrorController();
            $errorController->notFound();
            return;
        }
        
        // Set headers for PDF download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $document . '.pdf"');
        header('Content-Length: ' . filesize($pdfPath));
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');
        
        // Clear any output buffer
        if (ob_get_level()) {
            ob_end_clean();
        }
        
        // Output the PDF file
        readfile($pdfPath);
        exit;
    }
    
    /**
     * Get legal summary (for API or AJAX calls)
     */
    public function getSummary()
    {
        $summary = $this->legalModel->getLegalSummary();
        
        $this->json([
            'success' => true,
            'summary' => $summary
        ]);
    }
}