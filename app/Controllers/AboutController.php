<?php

namespace Controllers;

use Core\Controller;
use Models\TestimonialModel;

class AboutController extends Controller
{
    private $testimonialModel;
    
    public function __construct()
    {
        parent::__construct();
        $this->testimonialModel = new TestimonialModel();
    }
    
    public function index()
    {
        // Get some testimonials for the about page
        $testimonials = $this->testimonialModel->getRandom(3);
        
        // Page-specific meta data
        $data = [
            'title' => 'Über uns',
            'description' => 'Entdecke die Geschichte, Vision und Werte hinter unserer Bewegung für persönliches Wachstum und finanzielle Stabilität bei 7Shining.',
            'keywords' => '7Shining, Über uns, Geschichte, Vision, Mission, Werte, Team, Schweiz, St. Gallen, Verein',
            'ogType' => 'website',
            'testimonials' => $testimonials,
            'additionalStyles' => ['about.css'],
            'additionalScripts' => [],
            
            'values' => [
                [
                    'icon' => '🤝',
                    'title' => 'Gemeinschaft',
                    'description' => 'Wir glauben an die Kraft der Gemeinschaft. Zusammen erreichen wir mehr als alleine. Jedes Mitglied ist ein wichtiger Teil unserer Familie.'
                ],
                [
                    'icon' => '📈',
                    'title' => 'Wachstum',
                    'description' => 'Persönliche und finanzielle Entwicklung gehen Hand in Hand. Wir unterstützen jeden dabei, sein volles Potenzial zu entfalten.'
                ],
                [
                    'icon' => '🔒',
                    'title' => 'Transparenz',
                    'description' => 'Ehrlichkeit und Offenheit sind die Grundpfeiler unserer Arbeit. Keine versteckten Kosten, keine falschen Versprechungen.'
                ],
                [
                    'icon' => '💎',
                    'title' => 'Qualität',
                    'description' => 'Wir streben nach Exzellenz in allem was wir tun – von unseren Produkten bis hin zu unserem Service.'
                ],
                [
                    'icon' => '🌱',
                    'title' => 'Nachhaltigkeit',
                    'description' => 'Langfristige Stabilität steht vor kurzfristigen Gewinnen. Wir bauen auf solide Grundlagen für die Zukunft.'
                ],
                [
                    'icon' => '❤️',
                    'title' => 'Respekt',
                    'description' => 'Jeder Mensch verdient Respekt und Wertschätzung. Wir begegnen allen mit Offenheit und Verständnis.'
                ]
            ],
            
            'reasons' => [
                [
                    'title' => '🇨🇭 Schweizer Qualität'
                ],
                [
                    'title' => '📊 Transparente Prozesse'
                ],
                [
                    'title' => '🏅 Bewährtes Konzept'
                ],
                [
                    'title' => '🎯 Ganzheitlicher Ansatz'
                ],
                [
                    'title' => '🔐 Sicherheit First'
                ],
                [
                    'title' => '💬 Persönlicher Support'
                ]
            ]
        ];
        
        $this->view('about.index', $data);
    }
}