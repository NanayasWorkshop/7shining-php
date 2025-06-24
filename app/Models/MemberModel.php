<?php

namespace Models;

use Core\Model;

class MemberModel extends Model
{
    protected $dataFile = 'member_data.php';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Get membership options
     */
    public function getMembershipOptions()
    {
        return $this->data['membership_options'] ?? [];
    }
    
    /**
     * Get specific membership option by ID
     */
    public function getMembershipOption($id)
    {
        $options = $this->getMembershipOptions();
        
        if (isset($options['options'])) {
            foreach ($options['options'] as $option) {
                if ($option['id'] === $id) {
                    return $option;
                }
            }
        }
        
        return null;
    }
    
    /**
     * Get featured membership option
     */
    public function getFeaturedMembership()
    {
        $options = $this->getMembershipOptions();
        
        if (isset($options['options'])) {
            foreach ($options['options'] as $option) {
                if ($option['is_featured']) {
                    return $option;
                }
            }
        }
        
        return null;
    }
    
    /**
     * Get active benefits data
     */
    public function getActiveBenefits()
    {
        return $this->data['active_benefits'] ?? [];
    }
    
    /**
     * Get community spirit data
     */
    public function getCommunitySpirit()
    {
        return $this->data['community_spirit'] ?? [];
    }
    
    /**
     * Get registration form data
     */
    public function getRegistrationData()
    {
        return $this->data['registration'] ?? [];
    }
    
    /**
     * Get hero section data
     */
    public function getHeroData()
    {
        return $this->data['hero'] ?? [];
    }
    
    /**
     * Get membership statistics (placeholder for future implementation)
     */
    public function getStats()
    {
        // This could be connected to a real database in the future
        return [
            'total_members' => 1000,
            'active_members' => 250,
            'satisfaction_rate' => 99,
            'community_events' => 24,
            'success_stories' => 150
        ];
    }
    
    /**
     * Log membership interest (for analytics)
     */
    public function logMembershipInterest($membershipType, $partnerRef = null)
    {
        $logData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'membership_type' => $membershipType,
            'partner_ref' => $partnerRef,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
        ];
        
        // In a real application, this would save to a database or analytics service
        error_log("Membership interest: " . json_encode($logData));
        
        return true;
    }
    
    /**
     * Check if user came from partner link
     */
    public function hasPartnerRef()
    {
        return isset($_SESSION['partner_id']) && !empty($_SESSION['partner_id']);
    }
    
    /**
     * Get partner reference ID
     */
    public function getPartnerRef()
    {
        return $_SESSION['partner_id'] ?? null;
    }
    
    /**
     * Get personalized content based on partner
     */
    public function getPersonalizedContent($partnerId = null)
    {
        $content = $this->all();
        
        // If partner ID exists, could customize content
        if ($partnerId) {
            // Example: Add partner-specific benefits or messaging
            $content['hero']['description'] .= ' Über unseren Partner erhalten Sie exklusiven Zugang.';
        }
        
        return $content;
    }
    
    /**
     * Get conversion tracking data
     */
    public function getConversionData()
    {
        return [
            'page_views' => $this->getPageViews(),
            'form_opens' => $this->getFormOpens(),
            'registrations' => $this->getRegistrations(),
            'conversion_rate' => $this->calculateConversionRate()
        ];
    }
    
    /**
     * Private helper methods for analytics (placeholder implementations)
     */
    private function getPageViews()
    {
        // Placeholder - would connect to analytics service
        return rand(1000, 5000);
    }
    
    private function getFormOpens()
    {
        // Placeholder - would track form interactions
        return rand(100, 500);
    }
    
    private function getRegistrations()
    {
        // Placeholder - would track actual registrations
        return rand(10, 50);
    }
    
    private function calculateConversionRate()
    {
        $views = $this->getPageViews();
        $registrations = $this->getRegistrations();
        
        return $views > 0 ? round(($registrations / $views) * 100, 2) : 0;
    }
}