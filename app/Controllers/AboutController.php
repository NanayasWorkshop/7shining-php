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
            
            // About page specific data
            'stats' => [
                'members' => '1000+',
                'experience' => '5+',
                'satisfaction' => '99%',
                'support' => '24/7'
            ],
            
            'timeline' => [
                [
                    'year' => '2020',
                    'event' => 'Gründung von 7Shining als Verein in St. Gallen'
                ],
                [
                    'year' => '2021', 
                    'event' => 'Erste 100 Mitglieder erreicht'
                ],
                [
                    'year' => '2022',
                    'event' => 'Launch der Depot-Programme'
                ],
                [
                    'year' => '2023',
                    'event' => 'Expansion in deutschsprachige Länder'
                ],
                [
                    'year' => '2024',
                    'event' => 'Über 1000 zufriedene Mitglieder'
                ],
                [
                    'year' => '2025',
                    'event' => 'Neue Website und erweiterte Services'
                ]
            ],
            
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
            
            'team' => [
                [
                    'name' => '[Name des Gründers]',
                    'position' => 'Gründer & Präsident',
                    'avatar' => '👨‍💼',
                    'description' => 'Mit über 15 Jahren Erfahrung in der Finanzbranche hat er 7Shining gegründet, um Menschen eine Alternative zu traditionellen Anlageformen zu bieten.'
                ],
                [
                    'name' => '[Name der Geschäftsführerin]',
                    'position' => 'Geschäftsführung',
                    'avatar' => '👩‍💼',
                    'description' => 'Verantwortlich für die operative Leitung und die Weiterentwicklung unserer Dienstleistungen. Ihre Leidenschaft gilt der Mitgliederbetreuung.'
                ],
                [
                    'name' => '[Name des Technikchefs]',
                    'position' => 'Head of Technology',
                    'avatar' => '👨‍💻',
                    'description' => 'Sorgt dafür, dass unsere Plattform sicher, zuverlässig und benutzerfreundlich bleibt. Innovation und Sicherheit stehen im Mittelpunkt seiner Arbeit.'
                ],
                [
                    'name' => '[Name der Kundenbetreuerin]',
                    'position' => 'Customer Success',
                    'avatar' => '👩‍🎓',
                    'description' => 'Unsere Expertin für Mitgliederzufriedenheit. Sie sorgt dafür, dass jedes Mitglied die bestmögliche Erfahrung mit 7Shining macht.'
                ]
            ],
            
            'reasons' => [
                [
                    'title' => '🇨🇭 Schweizer Qualität',
                    'description' => 'Gegründet und ansässig in der Schweiz, stehen wir für Zuverlässigkeit, Präzision und höchste Standards.'
                ],
                [
                    'title' => '📊 Transparente Prozesse',
                    'description' => 'Alle Kosten, Abläufe und Bedingungen sind klar ersichtlich. Keine Überraschungen, keine versteckten Gebühren.'
                ],
                [
                    'title' => '🏅 Bewährtes Konzept',
                    'description' => 'Über 5 Jahre Erfahrung und mehr als 1000 zufriedene Mitglieder sprechen für sich.'
                ],
                [
                    'title' => '🎯 Ganzheitlicher Ansatz',
                    'description' => 'Nicht nur finanzielle, sondern auch persönliche Entwicklung stehen im Zentrum unserer Arbeit.'
                ],
                [
                    'title' => '🔐 Sicherheit First',
                    'description' => 'Ihre Daten und Investments sind bei uns in sicheren Händen. Vollständig versicherte Lieferungen.'
                ],
                [
                    'title' => '💬 Persönlicher Support',
                    'description' => 'Unser Team ist immer für Sie da. Echte Menschen, die sich um Ihre Anliegen kümmern.'
                ]
            ]
        ];
        
        $this->view('about.index', $data);
    }
}