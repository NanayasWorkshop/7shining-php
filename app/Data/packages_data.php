<?php

return [
    'hero' => [
        'title' => 'Depots',
        'subtitle' => 'Echte Werte. Klare Struktur.',
        'description' => 'Entdecke unsere transparenten Sparpläne mit physischer Auslieferung – individuell wählbar nach deinem Tempo und Budget. Mit quartalsweiser Lieferung, fairen Konditionen und vollständig versichertem Versand.',
        'stats' => [
            [
                'number' => '✓',
                'label' => 'Persönlich & flexibel'
            ],
            [
                'number' => '✓',
                'label' => 'Transparent & nachvollziehbar'
            ],
            [
                'number' => '✓',
                'label' => '100 % versicherte Zustellung'
            ]
        ]
    ],
    
    'packages' => [
        [
            'id' => 'standard',
            'name' => 'Standard',
            'description' => 'Perfekt für den Einstieg in die Goldanlage',
            'price' => '149,- CHF',
            'period' => 'einmalig',
            'is_premium' => false,
            'badge' => null,
            'features' => [
                'Eröffnung Spardepot',
                'Monatliche Sparrate: CHF 40',
                'Online-Depot-Verwaltung',
                '1g Goldbarren',
                'Quartalsweise Goldbarren-Lieferung',
                'Tagespreis-Abrechnung',
                'Versicherte Lieferung'
            ],
            'details' => [
                'Mindestlaufzeit: Keine'
            ],
            'button_text' => 'Mitglied',
            'external_url' => 'https://7shining.ch/home/addproduct/10000',
            'secondary_button_text' => 'Aktives Mitglied',
            'secondary_url' => 'https://new.7shining.com/mitglied-werden'
        ],
        [
            'id' => 'premium',
            'name' => 'Premium',
            'description' => 'Erweiterte Services und Flexibilität',
            'price' => '299,- CHF',
            'period' => 'einmalig',
            'is_premium' => true,
            'badge' => '',
            'features' => [
                'Eröffnung Spardepot',
                'Monatliche Sparrate: CHF 40,- bis 150,-',
                'Online-Depot-Verwaltung',
                '1g Goldbarren',
                'Quartalsweise Goldbarren-Lieferung',
                'Tagespreis-Abrechnung',
                'Versicherte Lieferung'
            ],
            'details' => [
                'Mindestlaufzeit: Keine'
            ],
            'button_text' => 'Mitglied',
            'external_url' => 'https://7shining.ch/home/addproduct/30000',
            'secondary_button_text' => 'Aktives Mitglied',
            'secondary_url' => 'https://new.7shining.com/mitglied-werden'
        ],
        [
            'id' => 'vip',
            'name' => 'VIP',
            'description' => 'Maximale Flexibilität und persönliche Betreuung',
            'price' => '599,- CHF',
            'period' => 'einmalig',
            'is_premium' => false,
            'badge' => null,
            'features' => [
                'Eröffnung Spardepot',
                'Monatliche Sparrate: CHF 40,- bis unbegrenzt',
                'Online-Depot-Verwaltung',
                'Flexible Wahl der Barrengrößen',
                'Anpassung der Goldbarren-Größe jederzeit möglich',
                'Quartalsweise Goldbarren-Lieferung',
                'Tagespreis-Abrechnung',
                'Versicherte Lieferung'
            ],
            'details' => [
                'Mindestlaufzeit: Keine'
            ],
            'button_text' => 'Mitglied',
            'external_url' => 'https://7shining.ch/home/addproduct/40000',
            'secondary_button_text' => 'Aktives Mitglied',
            'secondary_url' => 'https://new.7shining.com/mitglied-werden'
        ]
    ],
    
    'process' => [
        'title' => 'So funktioniert dein Gold-Depot',
        'steps' => [
            [
                'icon' => '📝',
                'number' => '1',
                'title' => 'Depot wählen',
                'description' => 'Wähle dein Depot – als Mitglied oder aktives Mitglied – und starte direkt'
            ],
            [
                'icon' => '💰',
                'number' => '2',
                'title' => 'Monatlich sparen',
                'description' => 'Zahle deine monatliche Sparrate bequem per Dauerauftrag – passend zu deinem gewählten Depot.'
            ],
            [
                'icon' => '🏅',
                'number' => '3',
                'title' => 'Quartalslieferung',
                'description' => 'Erhalte deine Goldbarren alle 3 Monate vollständig versichert direkt nach Hause.'
            ],
            [
                'icon' => '📊',
                'number' => '4',
                'title' => 'Individuell anpassen',
                'description' => 'Je nach Depot kannst du die Grösse deiner Goldbarren individuell anpassen.'
            ]
        ]
    ],
    
    'transparency' => [
        'title' => '',
        'description' => '',
        'points' => [
            [
                'title' => '📈 Echter Wert – fair berechnet',
                'description' => 'Deine Goldbarren werden zum tagesaktuellen Marktpreis abgerechnet – transparent und ohne künstliche Aufschläge. Du erhältst, was deinem Depot entspricht.'
            ],
            [
                'title' => '🔒 Vollständig versichert',
                'description' => 'Jede Lieferung ist zu 100 % versichert. Für dich bedeutet das: maximale Sicherheit – auch auf dem Versandweg.'
            ],
            [
                'title' => '🇨🇭 Schweizer Qualität',
                'description' => 'Unsere Goldbarren stammen aus zertifizierten, vertrauenswürdigen Quellen und erfüllen höchste Standards in Reinheit und Herkunft.'
            ],
            [
                'title' => '🌟 100 % Klarheit',
                'description' => 'Bei 7Shining legen wir Wert auf Offenheit und Vertrauen. Alles, was du bekommst, ist nachvollziehbar, geprüft und echt – ohne Spielraum für Zweifel.'
            ]
        ],
        'badge' => [
            'icon' => '🛡️',
            'text' => 'Vertrauen<br>& Sicherheit'
        ]
    ],
    
    'faq' => [
        'title' => 'Häufige Fragen',
        'items' => [
            [
                'question' => 'Was ist die einmalige Startgebühr?',
                'answer' => 'Die einmalige Startgebühr ist deine Gebühr für die Eröffnung des Gold-Depots bei 7Shining. Diese wird nur einmal beim Start deines gewählten Modells fällig und ermöglicht dir den Zugang zu unserem Gold-Depot-System und allen Services.'
            ],
            [
                'question' => 'Wie wird der Goldpreis berechnet?',
                'answer' => 'Alle Goldbarren werden nach dem aktuellen Tagespreis zum Zeitpunkt der Rechnungslegung berechnet. So erhältst du immer faire Marktpreise ohne Aufschläge auf veraltete Kurse.'
            ],
            [
                'question' => 'Wie sicher ist die Lieferung?',
                'answer' => 'Alle Lieferungen erfolgen vollständig versichert. Bei Verlust oder Beschädigung während des Transports bist du durch unsere Versicherung abgedeckt.'
            ],
            [
                'question' => 'Was passiert mit überschüssigen Beträgen?',
                'answer' => 'Beträge, die nicht für einen ganzen Goldbarren reichen, werden automatisch für die nächste Quartalslieferung gutgeschrieben. Kein Geld geht verloren.'
            ],
            [
                'question' => 'Gibt es eine Mindestlaufzeit?',
                'answer' => 'Nein, es gibt keine Mindestlaufzeit. Du kannst mit 30 Tagen Frist kündigen.'
            ]
        ]
    ]
];