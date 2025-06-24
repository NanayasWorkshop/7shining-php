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
        // Mitgliedschaft
        [
            'id' => 'what-is-7shining',
            'category' => 'membership',
            'question' => 'Was ist 7Shining genau?',
            'answer' => '7Shining ist ein Schweizer Verein, der sich der Förderung von Gemeinschaft, persönlichem Wachstum und finanzieller Bildung verschrieben hat. Wir bieten unseren Mitgliedern verschiedene Programme zur persönlichen und finanziellen Entwicklung, einschließlich Depot-Paketen für Goldbarren-Sparpläne.',
            'popular' => true
        ],
        [
            'id' => 'how-to-become-member',
            'category' => 'membership',
            'question' => 'Wie werde ich Mitglied bei 7Shining?',
            'answer' => 'Die Anmeldung erfolgt ganz einfach über unser Online-Portal. Nach der Registrierung und Zahlung der einmaligen Startgebühr von CHF 29 erhalten Sie Zugang zu Ihrem persönlichen Mitgliederbereich und können Ihr gewünschtes Depot-Paket auswählen.',
            'popular' => true
        ],
        [
            'id' => 'membership-types',
            'category' => 'membership',
            'question' => 'Was ist der Unterschied zwischen normaler und aktiver Mitgliedschaft?',
            'answer' => 'Normale Mitglieder nutzen unsere Depot-Programme für ihre persönlichen Sparziele. Aktive Mitglieder können zusätzlich andere Menschen für 7Shining gewinnen und erhalten dafür Provisionen gemäß unserem Marketingplan. Aktive Mitglieder zahlen einen jährlichen Mitgliedsbeitrag von CHF 29.',
            'popular' => false
        ],
        
        // Depot-Pakete
        [
            'id' => 'available-packages',
            'category' => 'packages',
            'question' => 'Welche Depot-Pakete gibt es?',
            'answer' => 'Wir bieten drei Depot-Pakete an: <strong>Standard:</strong> CHF 40-100 monatlich, 1g Goldbarren | <strong>Premium:</strong> CHF 40-200 monatlich, 1g Goldbarren + erweiterte Services | <strong>VIP:</strong> Ab CHF 40 unbegrenzt, frei wählbare Barrengrößen + persönlicher Betreuer',
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
            'answer' => 'Die Kosten sind vollständig transparent: Einmalige Startgebühr: CHF 29 | Monatliche Sparrate: Je nach gewähltem Paket | Versandkosten: Trägt das Mitglied | Aktive Mitgliedschaft: CHF 29 jährlich. Keine versteckten Gebühren oder Überraschungen!',
            'popular' => true
        ],
        [
            'id' => 'payment-methods',
            'category' => 'payment',
            'question' => 'Welche Zahlungsmethoden werden akzeptiert?',
            'answer' => 'Wir akzeptieren folgende Zahlungsmethoden: Banküberweisung (empfohlen), Dauerauftrag, SEPA-Lastschrift (wo verfügbar). Alle Zahlungen müssen gebührenfrei auf unserem Konto eingehen.',
            'popular' => false
        ],
        [
            'id' => 'non-payment-consequences',
            'category' => 'payment',
            'question' => 'Was passiert bei Nichtzahlung?',
            'answer' => 'Wird die monatliche Sparrate zwei Monate in Folge nicht bezahlt, wird das Depot automatisch aufgelöst. Ein eventuell vorhandenes Restguthaben wird auf schriftliche Anfrage an depot@7shining.com ausbezahlt.',
            'popular' => false
        ],
        [
            'id' => 'savings-rate-changes',
            'category' => 'payment',
            'question' => 'Kann ich meine Sparrate ändern?',
            'answer' => 'Ja, Sie können Ihre monatliche Sparrate jederzeit im Rahmen Ihres gewählten Pakets anpassen. Änderungen gelten ab dem nächsten Abrechnungsmonat. Bei größeren Änderungen können Sie auch zu einem anderen Paket wechseln.',
            'popular' => false
        ],
        
        // Lieferung & Versand
        [
            'id' => 'delivery-frequency',
            'category' => 'delivery',
            'question' => 'Wie oft erhalte ich Goldbarren?',
            'answer' => 'Die Auslieferung erfolgt quartalsweise (alle 3 Monate). Die gesparten Beträge werden gesammelt und entsprechend dem Tagespreis in Goldbarren umgewandelt. Überschüsse werden für die nächste Lieferung gutgeschrieben.',
            'popular' => true
        ],
        [
            'id' => 'delivery-security',
            'category' => 'delivery',
            'question' => 'Wie sicher ist die Lieferung?',
            'answer' => 'Alle Lieferungen erfolgen vollständig versichert direkt zu Ihrer Adresse. Das Risiko während des Transports liegt beim Mitglied, ist aber durch die Versicherung abgedeckt. Bei Verlust oder Beschädigung wickeln Sie den Schaden direkt mit der Transportversicherung ab.',
            'popular' => true
        ],
        [
            'id' => 'international-delivery',
            'category' => 'delivery',
            'question' => 'Kann ich international liefern lassen?',
            'answer' => 'Ja, wir liefern international. Bei internationalen Lieferungen trägt das Mitglied etwaige Einfuhrzölle, Steuern oder Gebühren selbst. Bitte informieren Sie sich über die Einfuhrbestimmungen in Ihrem Land.',
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
            'answer' => 'Unser Support ist für Sie da: <strong>E-Mail:</strong> support@7shining.com | <strong>Depot-Fragen:</strong> depot@7shining.com | <strong>Geschäftszeiten:</strong> Mo-Fr 09:00-17:00 Uhr. Wir antworten in der Regel innerhalb von 24 Stunden.',
            'popular' => true
        ],
        
        // Rechtliches
        [
            'id' => 'withdrawal-rights',
            'category' => 'legal',
            'question' => 'Kann ich meinen Vertrag widerrufen?',
            'answer' => 'Ja, Sie haben ein 14-tägiges Widerrufsrecht ab Vertragsabschluss. Der Widerruf muss schriftlich per E-Mail an widerruf@7shining.com erfolgen. Bei bereits gelieferten Goldbarren müssen diese in einwandfreiem Zustand zurückgesendet werden.',
            'popular' => false
        ],
        [
            'id' => 'bank-status',
            'category' => 'legal',
            'question' => 'Ist 7Shining eine Bank oder Finanzdienstleister?',
            'answer' => 'Nein, 7Shining ist ein Verein und betreibt keine Bankgeschäfte, Finanzberatung oder Versicherungsvermittlung. Wir unterliegen nicht der Aufsicht der FINMA, Bafin oder FMA. Unsere Depot-Dienstleistungen sind private Vermittlungstätigkeiten.',
            'popular' => false
        ],
        [
            'id' => 'termination',
            'category' => 'legal',
            'question' => 'Wie kann ich kündigen?',
            'answer' => 'Eine ordentliche Kündigung ist mit 30 Tagen Frist möglich. Senden Sie Ihre Kündigung schriftlich an info@7shining.com. Es gibt keine Mindestlaufzeit für Depot-Pakete.',
            'popular' => false
        ],
        [
            'id' => 'value-guarantees',
            'category' => 'membership',
            'question' => 'Erhalte ich eine Garantie auf Wertsteigerungen?',
            'answer' => 'Nein, 7Shining gibt keine Garantien für Wertsteigerungen oder -verluste von Goldbarren. Edelmetall-Investments unterliegen natürlichen Marktschwankungen. Gold wird traditionell als Wertaufbewahrungsmittel betrachtet, aber der Wert kann steigen oder fallen.',
            'popular' => false
        ]
    ]
];