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
            'additionalStyles' => ['about.css'], // No additional CSS needed
            'additionalScripts' => [], // No additional JS needed
                  
            'values' => [
                [
                    'icon' => '🤝',
                    'title' => 'Gemeinschaft',
                    'description' => 'Wir glauben an die Kraft der Gemeinschaft. Zusammen erreichen wir mehr. Jedes Mitglied ist ein wichtiger Teil unserer Familie.'
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
            
            'team' => [
                [
                    'name' => 'Michael Plic',
                    'position' => 'Präsident',
                    'avatar' => '👨‍💼',
                    'description' => 'Als Präsident von 7Shining leitet Michael mit Leidenschaft und Vision unseren Verein. Seine Erfahrung und sein Engagement für echte Werte prägen unsere Gemeinschaft nachhaltig.'
                ],
                [
                    'name' => 'Tomas Flitar',
                    'position' => 'Vice Präsident',
                    'avatar' => '👨‍💼',
                    'description' => 'Tomas unterstützt als Vice Präsident die strategische Ausrichtung von 7Shining. Mit seinem analytischen Denken und seiner Begeisterung für Innovation treibt er unsere Entwicklung voran.'
                ],
                [
                    'name' => 'Rene Thieme',
                    'position' => 'Einkauf und Logistik',
                    'avatar' => '📦',
                    'description' => 'Rene sorgt dafür, dass unsere Gold-Depot-Programme reibungslos funktionieren. Seine Expertise in Einkauf und Logistik gewährleistet, dass unsere Mitglieder ihre Goldbarren termingerecht und sicher erhalten.'
                ],
                [
                    'name' => 'Karina Plic',
                    'position' => 'Marketing und Social Media',
                    'avatar' => '📱',
                    'description' => 'Karina bringt unsere Vision in die digitale Welt. Mit ihrer Kreativität und ihrem Gespür für authentische Kommunikation macht sie 7Shining für unsere Community erlebbar.'
                ],
                [
                    'name' => 'Daniela Wirz',
                    'position' => 'Buchhaltung und Kassier',
                    'avatar' => '📊',
                    'description' => 'Daniela behält als Kassier den Überblick über unsere Finanzen. Mit ihrer Genauigkeit und Transparenz sorgt sie dafür, dass jeder Rappen bei 7Shining verantwortungsvoll verwaltet wird.'
                ]
            ],
            
            'reasons' => [
                [
                    'title' => '🇨🇭 Schweizer Qualität',
                    'description' => ''
                ],
                [
                    'title' => '📊 Transparente Prozesse',
                    'description' => ''
                ],
                [
                    'title' => '🏅 Bewährtes Konzept',
                    'description' => ''
                ],
                [
                    'title' => '🎯 Ganzheitlicher Ansatz',
                    'description' => ''
                ],
            ]
        ];
        
        $this->view('about.index', $data);
    }
}