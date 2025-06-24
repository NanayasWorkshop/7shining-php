<?php

namespace Controllers;

use Core\Controller;
use Models\PackageModel;

class PackagesController extends Controller
{
    private $packageModel;
    
    public function __construct()
    {
        parent::__construct();
        $this->packageModel = new PackageModel();
    }
    
    public function index()
    {
        // Get all package data
        $packageData = $this->packageModel->all();
        
        // Page-specific meta data
        $data = [
            'title' => 'Gold-Depot Pakete',
            'description' => 'Entdecke unsere transparenten Sparpläne für physische Goldbarren. Quartalsweise Lieferung, faire Preise, vollständig versichert.',
            'keywords' => '7Shining, Gold, Depot, Pakete, Goldbarren, Sparplan, Schweiz, versichert, Tagespreis',
            'ogType' => 'website',
            'additionalStyles' => ['packages.css'], // packages.css is already loaded via main styles.css
            'additionalScripts' => [], // packages.js is already loaded
            
            // Package page data
            'hero' => $packageData['hero'],
            'packages' => $packageData['packages'],
            'process' => $packageData['process'],
            'transparency' => $packageData['transparency'],
            'faq' => $packageData['faq']
        ];
        
        $this->view('packages.index', $data);
    }
    
    /**
     * Handle partner URLs (for clean partner links)
     */
    public function partner($hex = null)
    {
        if (!$hex) {
            // Redirect to main packages page if no partner code
            $this->redirect('packages');
            return;
        }
        
        // Store partner ID in session for tracking
        $_SESSION['partner_id'] = $hex;
        
        // Get package data
        $packageData = $this->packageModel->all();
        
        // Page-specific meta data with partner tracking
        $data = [
            'title' => 'Gold-Depot Pakete - Exklusiver Partner-Zugang',
            'description' => 'Entdecke unsere transparenten Sparpläne für physische Goldbarren. Quartalsweise Lieferung, faire Preise, vollständig versichert.',
            'keywords' => '7Shining, Gold, Depot, Pakete, Goldbarren, Sparplan, Partner, Schweiz',
            'ogType' => 'website',
            'additionalStyles' => [],
            'additionalScripts' => [],
            
            // Package page data
            'hero' => $packageData['hero'],
            'packages' => $this->addPartnerTracking($packageData['packages'], $hex),
            'process' => $packageData['process'],
            'transparency' => $packageData['transparency'],
            'faq' => $packageData['faq'],
            'partner_id' => $hex
        ];
        
        $this->view('packages.index', $data);
    }
    
    /**
     * Add partner tracking to package URLs
     */
    private function addPartnerTracking($packages, $partnerId)
    {
        foreach ($packages as &$package) {
            // Add partner ID to external URLs
            if (isset($package['external_url'])) {
                $url = parse_url($package['external_url']);
                $query = isset($url['query']) ? $url['query'] : '';
                parse_str($query, $params);
                
                // Add partner ID if not already present
                if (!isset($params['partnerid'])) {
                    $params['partnerid'] = $partnerId;
                }
                
                // Rebuild URL
                $newQuery = http_build_query($params);
                $package['external_url'] = $url['scheme'] . '://' . $url['host'] . $url['path'] . '?' . $newQuery;
            }
        }
        
        return $packages;
    }
}