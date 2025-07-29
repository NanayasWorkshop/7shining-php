<?php

return [
    'categories' => [
        [
            'id' => 'all',
            'name' => 'Alle Fragen',
            'active' => true
        ],
        [
            'id' => 'membership',
            'name' => 'Mitgliedschaft',
            'active' => false
        ],
        [
            'id' => 'packages',
            'name' => 'Depot-Pakete',
            'active' => false
        ],
        [
            'id' => 'payment',
            'name' => 'Zahlung & Kosten',
            'active' => false
        ],
        [
            'id' => 'delivery',
            'name' => 'Lieferung & Versand',
            'active' => false
        ],
        [
            'id' => 'technical',
            'name' => 'Technisches',
            'active' => false
        ],
        [
            'id' => 'legal',
            'name' => 'Rechtliches',
            'active' => false
        ]
    ],
    
    'faq_items' => [
        // Mitgliedschaft - Original FAQs
        [
            'id' => 'what-is-7shining',
            'category' => 'membership',
            'question' => 'Was ist 7Shining?',
            'answer' => '7Shining ist ein eingetragener Verein mit dem Ziel, die Entstehung von Geld, die zukünftige Weiterentwicklung und den Schutz von Geld und Vermögenswerten zu erforschen. Menschen auf ihrem persönlichen, spirituellen und finanziellen Weg zu begleiten und zu stärken. Wir verbinden Gemeinschaft, Inspiration und individuelle Entfaltung mit einem einzigartigen Werte- und Punktesystem.',
            'popular' => true
        ],
        [
            'id' => 'religious-requirement',
            'category' => 'membership',
            'question' => 'Muss ich religiös oder spirituell sein um dabei zu sein?',
            'answer' => 'Nein. Wir stehen für Offenheit und Vielfalt im Glauben. Ob du religiös, spirituell oder einfach nur interessiert am persönlichen Wachstum mit universellen Werten bist – du bist willkommen, so lange du unsere Grundwerte unterstützen kannst und willst.',
            'popular' => true
        ],
        [
            'id' => 'membership-costs',
            'category' => 'membership',
            'question' => 'Was kostet die Mitgliedschaft?',
            'answer' => 'Die Mitgliedschaft ist generell für jeden ohne Jahresbeitrag möglich. Die aktive Mitgliedschaft ist für einen jährlichen Mitgliedsbeitrag von CHF 29,- möglich und beinhaltet zusätzliche Leistungen wie den Zugang zum Punktesystem – Details findest du unter „Mitglied werden".',
            'popular' => true
        ],
        [
            'id' => 'points-system',
            'category' => 'membership',
            'question' => 'Was ist das Punktesystem?',
            'answer' => 'Aktive Mitglieder sammeln Punkte durch Empfehlungen, persönliche Aktivitäten und kontinuierliche Teilnahme. Diese Punkte werden in Form von Prämien oder finanziellen Vorteilen belohnt. Mehr dazu findest du in unserem Vergütungsplan.',
            'popular' => true
        ],
        [
            'id' => 'passive-support',
            'category' => 'membership',
            'question' => 'Kann ich einfach nur unterstützen, ohne aktiv zu werden?',
            'answer' => 'Ja natürlich. Als Mitglied darfst du unsere Einkaufsvorteile nutzen, aber auch gern jederzeit mit freiwilligen Spenden oder Gönnerbeträgen, oder nur ideell unsere Vision unterstützen und wirst über unsere Aktivitäten informiert – ganz ohne Verpflichtungen.',
            'popular' => false
        ],
        [
            'id' => 'personal-mentoring',
            'category' => 'membership',
            'question' => 'Gibt es persönliche Betreuung oder Schulungen?',
            'answer' => 'Ja. Wir bieten für aktive Mitglieder regelmäßige Schulungen, Austauschformate und auf Wunsch auch persönliches Mentoring. Unsere Gemeinschaft lebt von gegenseitiger Unterstützung und Wissensteilung.',
            'popular' => false
        ],
        [
            'id' => 'how-to-become-member',
            'category' => 'membership',
            'question' => 'Wie werde ich Mitglied?',
            'answer' => 'Du hast zwei Möglichkeiten, Teil von 7Shining zu werden: <strong>Gold-Depot kaufen</strong> – Lege den Grundstein für deine finanzielle Zukunft mit einem persönlichen Edelmetall-Depot (mit quartalsweiser Auslieferung). <strong>Aktives Mitglied werden</strong> – Bringe dich mit deinem Wissen, Herz und Engagement in unsere Gemeinschaft ein und gestalte 7Shining aktiv mit. Wähle deinen Weg – oder kombiniere beides. Denn dein Licht gehört in die Welt.',
            'popular' => true
        ],
        
        // Depot-Pakete
        [
            'id' => 'available-packages',
            'category' => 'packages',
            'question' => 'Welche Depots gibt es?',
            'answer' => 'Wir bieten drei Depots an:<br><strong>Standard:</strong><br><strong>Premium:</strong><br><strong>VIP</strong><br><br><a href="https://new.7shining.com/packages" target="_blank">Zu den Depots</a>',
            'popular' => true
        ],
        [
            'id' => 'gold-price-calculation',
            'category' => 'packages',
            'question' => 'Wie wird der Goldpreis berechnet?',
            'answer' => 'Die Goldbarren werden nach dem aktuellen Tagespreis zum Zeitpunkt der Rechnungslegung berechnet. So erhalten Sie immer faire Marktpreise ohne Aufschläge auf veraltete Kurse.',
            'popular' => true
        ],
        [
            'id' => 'package-switching',
            'category' => 'packages',
            'question' => 'Kann ich mein Paket später wechseln?',
            'answer' => 'Ja, Sie können jederzeit zwischen den Paketen wechseln. Kontaktieren Sie einfach unseren Support für die Umstellung. Ein Upgrade ist sofort möglich, bei einem Downgrade gilt die Änderung ab dem nächsten Abrechnungszeitraum.',
            'popular' => false
        ],
        [
            'id' => 'excess-amounts',
            'category' => 'packages',
            'question' => 'Was passiert mit überschüssigen Beträgen?',
            'answer' => 'Überschüssige Beträge, die nicht für einen ganzen Goldbarren reichen, werden automatisch für die nächste Quartalslieferung gutgeschrieben. So geht kein Geld verloren und Sie bauen kontinuierlich Ihr Gold-Depot auf.',
            'popular' => false
        ],
        
        // Zahlung & Kosten
        [
            'id' => 'costs-breakdown',
            'category' => 'payment',
            'question' => 'Welche Kosten entstehen?',
            'answer' => 'Die Kosten sind vollständig transparent.<br>Einmalige Startgebühr: CHF 149.- bis CHF 599.- je nach Depot.<br>Monatliche Sparrate je nach gewähltem Depot.<br>Versandkosten trägt das Mitglied.<br>Aktive Mitgliedschaft CHF 29.- jährlich.<br>Keine versteckten Gebühren oder Überraschungen',
            'popular' => true
        ],
        [
            'id' => 'payment-methods',
            'category' => 'payment',
            'question' => 'Welche Zahlungsmethoden werden akzeptiert?',
            'answer' => 'Wir akzeptieren die jeweils angegebenen Zahlungsmethoden.<br>Alle Zahlungen müssen zwingend Gebührenfrei auf unserem Konto eingehen.',
            'popular' => false
        ],
        [
            'id' => 'non-payment-consequences',
            'category' => 'payment',
            'question' => 'Was passiert bei Nichtzahlung?',
            'answer' => 'Wird die monatliche Mindest- Sparrate von CHF 40.- zwei Monate in Folge nicht bezahlt, wird das Depot automatisch aufgelöst. Ein eventuell vorhandenes Restguthaben wird auf schriftliche Anfrage an depot@7shining.com ausbezahlt.<br>Bitte beachte, dass die einmaligen Start Gebühren Standart CHF 149.-, Premium CHF 299.-, VIP CHF 599.- werden nicht zurück erstattet werden!',
            'popular' => false
        ],
        [
            'id' => 'savings-rate-changes',
            'category' => 'payment',
            'question' => 'Kann ich meine Sparrate ändern?',
            'answer' => 'Generell Ja.<br>Dies ist aber nur im Rahmen ihres gewählten Depots möglich.<br>Deswegen empfehlen wir generell das VIP-Depot, weil sie nur damit absolute Flexibilität geniessen.',
            'popular' => false
        ],
        
        // Lieferung & Versand
        [
            'id' => 'delivery-frequency',
            'category' => 'delivery',
            'question' => 'Wie oft erhalte ich Goldbarren?',
            'answer' => 'Die Auslieferung erfolgt Quartalsweise (alle 3 Monate). Sollten Sie auf grössere Goldbarren sparen, und die getätigten Einzahlungen des Quartals nicht für den gewählten Goldbarren ausreichen, verschiebt sich die Auslieferung dementsprechend um ein oder auch mehrere Quartale.<br>Sollte sich in ihrem Depot ein Rest Guthaben nach der Goldauslieferung befinden, welches nicht mehr für einen vollen Goldbarren ausreichend ist, wird dieses Restguthaben mit der nächsten Lieferung gutgeschrieben.',
            'popular' => true
        ],
        [
            'id' => 'delivery-security',
            'category' => 'delivery',
            'question' => 'Wie sicher ist die Lieferung?',
            'answer' => 'Alle Lieferungen erfolgen vollständig versichert direkt zu Dir nach Hause. Das Risiko während des Transports liegt beim Mitglied, ist aber durch die Versicherung abgedeckt. Bei Verlust oder Beschädigung wickeln Sie den Schaden direkt mit der Transportversicherung ab.',
            'popular' => true
        ],
        [
            'id' => 'international-delivery',
            'category' => 'delivery',
            'question' => 'Kann ich international bestellen?',
            'answer' => 'Wir liefern in der Schweiz und Liechtenstein, sowie in alle Länder der Europäischen Union. Weitere Kontinente und Länder sind in Vorbereitung. Du erkennst im Bestellvorgang welche zusätzlichen Länder bereits beliefert werden können.',
            'popular' => false
        ],
        
        // Technisches
        [
            'id' => 'member-area-functionality',
            'category' => 'technical',
            'question' => 'Wie funktioniert der Mitgliederbereich?',
            'answer' => 'Nach der Anmeldung erhalten Sie Zugang zu Ihrem persönlichen Mitgliederbereich. Dort können Sie Ihre Daten verwalten, Depot-Einstellungen ändern, Abrechnungen einsehen und den Support kontaktieren. Vergessen Sie nicht, Ihre Daten aktuell zu halten!',
            'popular' => false
        ],
        [
            'id' => 'password-reset',
            'category' => 'technical',
            'question' => 'Was mache ich, wenn ich mein Passwort vergessen habe?',
            'answer' => 'Nutzen Sie die "Passwort vergessen" Funktion auf der Login-Seite. Sie erhalten dann eine E-Mail mit einem Link zum Zurücksetzen Ihres Passworts. Falls das nicht funktioniert, kontaktieren Sie unseren Support.',
            'popular' => false
        ],
        [
            'id' => 'support-contact',
            'category' => 'technical',
            'question' => 'Wie erreiche ich den Support?',
            'answer' => 'Unser Support ist für Dich unter der Mailadresse support@7shining.com erreichbar',
            'popular' => true
        ],
        
        // Rechtliches
        [
            'id' => 'withdrawal-rights',
            'category' => 'legal',
            'question' => 'Kann ich meinen Vertrag widerrufen?',
            'answer' => 'Ja, Du hast ein 14-tägiges Widerrufsrecht ab Vertragsabschluss. Der Widerruf muss schriftlich per E-Mail an widerruf@7shining.com erfolgen. Bei bereits gelieferten Goldbarren müssen diese versichert und in einwandfreiem Zustand zurückgesendet werden.',
            'popular' => false
        ],
        [
            'id' => 'bank-status',
            'category' => 'legal',
            'question' => 'Ist 7Shining eine Bank oder Finanzdienstleister?',
            'answer' => 'Nein, 7Shining ist ein Verein und betreibt keine Bankgeschäfte, Finanzberatung oder Versicherungsvermittlung. Wir unterliegen nicht der Aufsicht der FINMA, Bafin oder FMA.',
            'popular' => false
        ],
        [
            'id' => 'termination',
            'category' => 'legal',
            'question' => 'Wie kann ich kündigen?',
            'answer' => 'Eine ordentliche Kündigung ist jederzeit möglich. Sende Deine Kündigung schriftlich an kontakt@7shining.com. Es gibt keine Mindestlaufzeit für Depots. Bitte beachte, dass die einmaligen Start Gebühren Standart CHF 149.-, Premium CHF 299.-, VIP CHF 599.- nicht zurückerstattet werden!',
            'popular' => false
        ],
        [
            'id' => 'value-guarantees',
            'category' => 'legal',
            'question' => 'Erhalte ich eine Garantie auf Wertsteigerungen?',
            'answer' => 'Nein, 7Shining gibt keine Garantien für Wertsteigerungen bei Goldbarren. Edelmetalle unterliegen natürlichen Marktschwankungen. Gold wird traditionell als Wertaufbewahrungsmittel betrachtet, aber der Preis kann steigen oder fallen.',
            'popular' => false
        ]
    ]
];