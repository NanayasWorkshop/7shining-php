<?php

namespace Controllers;

use Core\Controller;
use Models\MemberModel;

class MemberController extends Controller
{
    private $memberModel;
    
    public function __construct()
    {
        parent::__construct();
        $this->memberModel = new MemberModel();
    }
    
    public function index()
    {
        // Get all member data
        $memberData = $this->memberModel->all();
        
        // Page-specific meta data
        $data = [
            'title' => 'Mitglied werden',
            'description' => 'Werde Teil einer lebendigen Gemeinschaft, die persönliches Wachstum, spirituelle Entwicklung und finanzielle Freiheit verbindet. Jetzt bei 7Shining anmelden.',
            'keywords' => '7Shining, Mitglied werden, Gemeinschaft, persönliches Wachstum, spirituelle Entwicklung, finanzielle Freiheit, Verein, Schweiz',
            'ogType' => 'website',
            'additionalStyles' => ['member.css'], // member.css is already loaded via main styles.css
            'additionalScripts' => [], // member.js is already loaded
            
            // Member page data
            'hero' => $memberData['hero'],
            'membership_options' => $memberData['membership_options'],
            'active_benefits' => $memberData['active_benefits'],
            'community_spirit' => $memberData['community_spirit'],
            'registration' => $memberData['registration']
        ];
        
        $this->view('member.index', $data);
    }
    
    /**
     * Handle partner URLs (for clean partner links)
     */
    public function partner($hex = null)
    {
        if (!$hex) {
            // Redirect to main member page if no partner code
            $this->redirect('mitglied-werden');
            return;
        }
        
        // Store partner ID in session for tracking
        $_SESSION['partner_id'] = $hex;
        
        // Get member data
        $memberData = $this->memberModel->all();
        
        // Page-specific meta data with partner tracking
        $data = [
            'title' => 'Mitglied werden - Exklusiver Partner-Zugang',
            'description' => 'Werde Teil einer lebendigen Gemeinschaft, die persönliches Wachstum, spirituelle Entwicklung und finanzielle Freiheit verbindet. Exklusiver Partner-Zugang.',
            'keywords' => '7Shining, Mitglied werden, Partner, Gemeinschaft, persönliches Wachstum, spirituelle Entwicklung',
            'ogType' => 'website',
            'additionalStyles' => [],
            'additionalScripts' => [],
            
            // Member page data
            'hero' => $memberData['hero'],
            'membership_options' => $this->addPartnerTracking($memberData['membership_options'], $hex),
            'active_benefits' => $memberData['active_benefits'],
            'community_spirit' => $memberData['community_spirit'],
            'registration' => $memberData['registration'],
            'partner_id' => $hex
        ];
        
        $this->view('member.index', $data);
    }
    
    /**
     * Add partner tracking to membership options
     */
    private function addPartnerTracking($membershipOptions, $partnerId)
    {
        foreach ($membershipOptions['options'] as &$option) {
            // Add partner ID to package URLs
            if ($option['button']['action'] === 'link' && $option['button']['url'] === 'packages') {
                $option['button']['url'] = 'packages/' . $partnerId;
            }
        }
        
        return $membershipOptions;
    }
    
    /**
     * Handle registration form submission (if needed for AJAX)
     */
    public function register()
    {
        // This could handle AJAX form submissions
        // For now, the Erfolgsassistent handles the actual registration
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['error' => 'Method not allowed'], 405);
            return;
        }
        
        // Basic CSRF protection
        if (!$this->validateCsrf()) {
            $this->json(['error' => 'Invalid CSRF token'], 403);
            return;
        }
        
        // Log registration attempt
        $membershipType = $this->input('membership_type', 'standard');
        $partnerRef = $this->input('partner_ref', null);
        
        // Log for analytics
        error_log("Member registration attempt: " . json_encode([
            'membership_type' => $membershipType,
            'partner_ref' => $partnerRef,
            'timestamp' => date('Y-m-d H:i:s'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ]));
        
        // Return success response
        $this->json([
            'success' => true,
            'message' => 'Registrierung eingeleitet',
            'redirect' => $this->url('packages')
        ]);
    }
    
    /**
     * Get membership statistics (for future use)
     */
    public function getStats()
    {
        // This could return membership statistics
        $stats = $this->memberModel->getStats();
        
        $this->json([
            'total_members' => $stats['total_members'] ?? 1000,
            'active_members' => $stats['active_members'] ?? 250,
            'satisfaction_rate' => $stats['satisfaction_rate'] ?? 99
        ]);
    }
}