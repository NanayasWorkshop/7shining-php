<?php

namespace Models;

use Core\Model;

class TestimonialModel extends Model
{
    protected $dataFile = 'testimonials_data.php';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Get testimonials for home page (limit 3)
     */
    public function getForHomePage($limit = 3)
    {
        return array_slice($this->all(), 0, $limit);
    }
    
    /**
     * Get random testimonials
     */
    public function getRandom($count = 3)
    {
        $testimonials = $this->all();
        shuffle($testimonials);
        return array_slice($testimonials, 0, $count);
    }
}