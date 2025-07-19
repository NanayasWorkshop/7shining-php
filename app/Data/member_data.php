<?php

return [
    'hero' => [
        'title' => 'Mitglied bei 7Shining',
        'description' => 'Du möchtest Teil einer lebendigen Gemeinschaft werden, die persönliches Wachstum, spirituelle Entwicklung und finanzielle Freiheit verbindet? Dann bist du bei 7Shining genau richtig.',
        'community_circle' => [
            'icon' => '✨',
            'text' => 'Dein Licht<br>gehört in<br>die Welt'
        ]
    ],
    
    'membership_options' => [
        'title' => '🌟 Deine Möglichkeiten',
        'subtitle' => 'Bei uns kannst du zwischen zwei Mitgliedschaftsformen wählen – je nachdem, wie aktiv du dich einbringen möchtest:',
        'options' => [
            [
                'id' => 'standard',
                'title' => 'Mitgliedschaft',
                'icon' => '🟡',
                'description' => 'Ideal für alle, die uns im Hintergrund begleiten und mittragen möchten.',
                'is_featured' => false,
                'badge' => null,
                'benefits' => [
                    'Durch unsere große Gemeinschaft hervorragende Einkaufsvorteile nutzen',
                    'Du unterstützt den Verein ideell und trägst unsere Vision mit',
                    'Du bleibst über unsere Angebote, Veranstaltungen und Entwicklungen informiert',
                    'Kein Aufwand, aber viel Wirkung: Du stärkst unsere Basis – und das zählt'
                ],
                'button' => [
                    'text' => '📦 Zu den Depots',
                    'type' => 'standard-btn',
                    'action' => 'link',
                    'url' => 'packages'
                ]
            ],
            [
                'id' => 'active',
                'title' => 'Aktive Mitgliedschaft',
                'icon' => '🟡',
                'description' => 'Ideal für alle, die ihren inneren Weg mit unternehmerischem Handeln verbinden möchten.',
                'is_featured' => true,
                'badge' => 'Empfohlen',
                'benefits' => [
                    'Du willst selbst gestalten, andere inspirieren und mit uns wachsen?',
                    'Aktive Mitglieder vermitteln unsere Programme',
                    'Erhalten Zugang zu unserem Punktesystem',
                    'Profitieren von exklusiven Schulungen und Provisionen',
                    'Du bist Teil eines engagierten Netzwerks, das sich gegenseitig fördert und trägt'
                ],
                'button' => [
                    'text' => '📝 Jetzt anmelden',
                    'type' => 'secondary-btn',
                    'action' => 'scroll',
                    'target' => 'registration-form'
                ]
            ]
        ]
    ],
    
    'active_benefits' => [
        'title' => '💎 Deine Vorteile als aktives Mitglied',
        'description' => 'Als aktives Mitglied erhältst du nicht nur Zugang zu unserem vollständigen Programm, sondern wirst Teil einer Bewegung, die das Leben von Menschen positiv verändert.',
        'benefits' => [
            [
                'icon' => '🎯',
                'title' => 'Zugang zu inspirierenden Events, Workshops und Materialien',
                'description' => 'Exklusive Veranstaltungen, Materialien und Weiterbildungen für deine persönliche Entwicklung'
            ],
            [
                'icon' => '🤝',
                'title' => 'Mitglied in einer starken, werteorientierten Community',
                'description' => 'Teil einer Gemeinschaft von Gleichgesinnten, die gemeinsam wachsen und sich unterstützen'
            ],
            [
                'icon' => '💰',
                'title' => 'Möglichkeit zur Mitgestaltung – persönlich wie auch finanziell',
                'description' => 'Aktive Rolle in der Vereinsgestaltung und finanzielle Vorteile durch Empfehlungen'
            ],
            [
                'icon' => '🌱',
                'title' => 'Spirituelle und praktische Begleitung auf deinem Weg',
                'description' => 'Ganzheitliche Unterstützung für deine persönliche und spirituelle Entwicklung'
            ]
        ],
        'growth_steps' => [
            [
                'number' => '1',
                'text' => 'Persönliches Wachstum',
                'delay' => '0.2s'
            ],
            [
                'number' => '2',
                'text' => 'Spirituelle Entwicklung',
                'delay' => '0.4s'
            ],
            [
                'number' => '3',
                'text' => 'Finanzielle Freiheit',
                'delay' => '0.6s'
            ],
            [
                'number' => '4',
                'text' => 'Gemeinschaftserfolg',
                'delay' => '0.8s'
            ]
        ]
    ],
    
    'community_spirit' => [
        'title' => '✨ Gemeinsam zum Strahlen bringen',
        'quote' => '"Dein Licht gehört in die Welt – und wir bringen es gemeinsam zum Strahlen."',
        'values' => [
            [
                'icon' => '❤️',
                'title' => 'Herzensverbindung',
                'description' => 'Echte, tiefe Verbindungen zu Gleichgesinnten'
            ],
            [
                'icon' => '🌟',
                'title' => 'Potenzial entfalten',
                'description' => 'Dein goldenes Potenzial vollständig ausschöpfen'
            ],
            [
                'icon' => '🚀',
                'title' => 'Gemeinsam wachsen',
                'description' => 'Zusammen Träume verwirklichen und Ziele erreichen'
            ]
        ]
    ],
    
    'registration' => [
        'title' => '📬 Jetzt Mitglied werden',
        'description' => 'Die Registrierung ist ganz einfach – und ganz gleich ob als Mitglied oder als aktives Mitglied ein Schritt der dein Leben bereichern wird.',
        'highlight' => 'Werde Teil von 7Shining. Denn dein Licht gehört in die Welt – und wir bringen es gemeinsam zum Strahlen.',
        'toggle_button' => [
            'icon_closed' => '▼',
            'icon_open' => '▲',
            'text_closed' => 'Anmeldeformular öffnen',
            'text_open' => 'Anmeldeformular schließen'
        ],
        'iframe_container' => [
            'width' => '100%',
            'height' => '1900px',
            'id' => 'wboRegistrationContainer'
        ],
        'note' => ''
    ]
];