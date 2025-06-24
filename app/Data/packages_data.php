<?php

return [
    'hero' => [
        'title' => 'Gold-Depot Pakete',
        'description' => 'Entdecke unsere transparenten Sparpläne für physische Goldbarren. Quartalsweise Lieferung, faire Preise, vollständig versichert.',
        'stats' => [
            [
                'number' => '1000+',
                'label' => 'Zufriedene Mitglieder'
            ],
            [
                'number' => '99%',
                'label' => 'Kundenzufriedenheit'
            ],
            [
                'number' => '100%',
                'label' => 'Versicherte Lieferung'
            ]
        ]
    ],
    
    'packages' => [
        [
            'id' => 'standard',
            'name' => 'Standard',
            'description' => 'Perfekt für den Einstieg in die Goldanlage',
            'price' => 'CHF 40-100',
            'period' => '/Monat',
            'is_premium' => false,
            'badge' => null,
            'features' => [
                'Monatliche Sparrate: CHF 40-100',
                'Quartalsweise Goldbarren-Lieferung',
                '1g Goldbarren (Standard-Größe)',
                'Vollständig versicherte Lieferung',
                'Tagespreis-Abrechnung',
                'Online-Depot-Verwaltung',
                'E-Mail Support'
            ],
            'details' => [
                'Jahresabo: CHF 29 (jährlich)',
                'Versand: Trägt das Mitglied',
                'Mindestlaufzeit: Keine'
            ],
            'button_text' => 'Paket wählen',
            'external_url' => 'https://7shining.ch/home/addproduct/10000'
        ],
        [
            'id' => 'premium',
            'name' => 'Premium',
            'description' => 'Erweiterte Services und Flexibilität',
            'price' => 'CHF 40-200',
            'period' => '/Monat',
            'is_premium' => true,
            'badge' => 'Beliebt',
            'features' => [
                'Monatliche Sparrate: CHF 40-200',
                'Quartalsweise Goldbarren-Lieferung',
                '1g Goldbarren + erweiterte Services',
                'Vollständig versicherte Lieferung',
                'Tagespreis-Abrechnung',
                'Prioritäts-Support',
                'Detaillierte Marktanalysen',
                'Flexible Sparraten-Anpassung'
            ],
            'details' => [
                'Jahresabo: CHF 29 (jährlich)',
                'Versand: Trägt das Mitglied',
                'Mindestlaufzeit: Keine'
            ],
            'button_text' => 'Paket wählen',
            'external_url' => 'https://7shining.ch/home/addproduct/30000'
        ],
        [
            'id' => 'vip',
            'name' => 'VIP',
            'description' => 'Maximale Flexibilität und persönliche Betreuung',
            'price' => 'Ab CHF 40',
            'period' => 'unbegrenzt',
            'is_premium' => false,
            'badge' => null,
            'features' => [
                'Monatliche Sparrate: Ab CHF 40 (unbegrenzt)',
                'Quartalsweise Goldbarren-Lieferung',
                'Frei wählbare Barrengrößen',
                'Persönlicher Betreuer',
                'Vollständig versicherte Lieferung',
                'Tagespreis-Abrechnung',
                '24/7 Premium-Support',
                'Exklusive Markteinblicke',
                'Individuelle Beratung'
            ],
            'details' => [
                'Jahresabo: CHF 29 (jährlich)',
                'Versand: Trägt das Mitglied',
                'Mindestlaufzeit: Keine'
            ],
            'button_text' => 'Paket wählen',
            'external_url' => 'https://7shining.ch/home/addproduct/40000'
        ]
    ],
    
    'process' => [
        'title' => 'So funktioniert dein Gold-Depot',
        'steps' => [
            [
                'icon' => '📝',
                'number' => '1',
                'title' => 'Anmeldung',
                'description' => 'Wähle dein Paket und melde dich mit dem Jahresabo von CHF 29 an'
            ],
            [
                'icon' => '💰',
                'number' => '2',
                'title' => 'Monatlich sparen',
                'description' => 'Zahle deine gewählte Sparrate monatlich in dein persönliches Depot ein'
            ],
            [
                'icon' => '🏅',
                'number' => '3',
                'title' => 'Quartalslieferung',
                'description' => 'Erhalte alle 3 Monate deine Goldbarren vollständig versichert nach Hause'
            ],
            [
                'icon' => '📊',
                'number' => '4',
                'title' => 'Portfolio aufbauen',
                'description' => 'Baue kontinuierlich dein physisches Gold-Portfolio mit fairen Tagespreisen auf'
            ]
        ]
    ],
    
    'transparency' => [
        'title' => '100% Transparenz',
        'description' => 'Bei 7Shining gibt es keine versteckten Kosten oder Überraschungen. Alle Gebühren sind klar ersichtlich und fair kalkuliert.',
        'points' => [
            [
                'title' => 'Faire Preisgestaltung',
                'description' => 'Goldbarren werden nach dem aktuellen Tagespreis abgerechnet - keine veralteten Kurse oder Aufschläge.'
            ],
            [
                'title' => 'Vollständig versichert',
                'description' => 'Alle Lieferungen sind zu 100% versichert. Sollte etwas passieren, bist du vollständig abgesichert.'
            ],
            [
                'title' => 'Schweizer Qualität',
                'description' => 'Zertifizierte Goldbarren aus vertrauenswürdigen Quellen mit höchsten Qualitätsstandards.'
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
                'question' => 'Was ist das Jahresabo von CHF 29?',
                'answer' => 'Das Jahresabo von CHF 29 ist deine jährliche Mitgliedschaft bei 7Shining, die dir Zugang zu unserem Gold-Depot-System und allen Services ermöglicht. Dies ist eine jährlich wiederkehrende Gebühr für die Nutzung unserer Plattform.'
            ],
            [
                'question' => 'Kann ich mein Paket später ändern?',
                'answer' => 'Ja, Paket-Wechsel sind grundsätzlich möglich. <strong>Bedenke jedoch:</strong> Das VIP-Paket bietet von Anfang an die maximale Flexibilität und exklusive Vorteile, die später nicht mehr verfügbar sein könnten. Wer klein startet, verpasst oft die besten Marktchancen und den persönlichen Betreuungsservice. Ein späterer Upgrade bedeutet auch, dass du wertvolle Zeit ohne die Premium-Features verbracht hast. <em>Optimal startest du gleich mit dem Paket, das deinen langfristigen Zielen entspricht.</em>'
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
                'answer' => 'Nein, es gibt keine Mindestlaufzeit. Du kannst mit 30 Tagen Frist kündigen. Das Jahresabo läuft jedoch für das gebuchte Jahr.'
            ]
        ]
    ]
];