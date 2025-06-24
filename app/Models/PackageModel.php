<?php

namespace Models;

use Core\Model;

class PackageModel extends Model
{
    protected $dataFile = 'packages_data.php';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Get package by ID
     */
    public function getPackage($id)
    {
        $packages = $this->data['packages'] ?? [];
        
        foreach ($packages as $package) {
            if ($package['id'] === $id) {
                return $package;
            }
        }
        
        return null;
    }
    
    /**
     * Get all packages
     */
    public function getPackages()
    {
        return $this->data['packages'] ?? [];
    }
    
    /**
     * Get premium packages only
     */
    public function getPremiumPackages()
    {
        $packages = $this->getPackages();
        
        return array_filter($packages, function($package) {
            return $package['is_premium'] === true;
        });
    }
    
    /**
     * Get packages by price range
     */
    public function getPackagesByPriceRange($minPrice = null, $maxPrice = null)
    {
        // This could be extended to filter by actual price ranges
        // For now, return all packages since pricing is flexible
        return $this->getPackages();
    }
}