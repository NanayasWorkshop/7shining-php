<?php

namespace Controllers;

use Core\Controller;
use Models\TestimonialModel;

class HomeController extends Controller
{
    private $testimonialModel;
    
    public function __construct()
    {
        parent::__construct();
        $this->testimonialModel = new TestimonialModel();
    }
    
    public function index()
    {
        // Get testimonials for home page
        $testimonials = $this->testimonialModel->all();
        
        // Page-specific meta data
        $data = [
            'title' => 'Mehr als ein Verein',
            'description' => 'Ein Ort, an dem du wachsen darfst – mit deinen Werten, deinem Potenzial, deinen Visionen. Menschen die sich gegenseitig fördern, unterstützen und inspirieren.',
            'keywords' => '7Shining, Verein, Gemeinschaft, Wachstum, Gold, Depot, Schweiz',
            'testimonials' => $testimonials,
            'additionalStyles' => [], // No additional CSS needed for home
            'additionalScripts' => [] // No additional JS needed for home
        ];
        
        $this->view('home.index', $data);
    }
}