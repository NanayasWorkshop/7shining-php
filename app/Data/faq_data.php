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
            'answer' => 'Wir bieten drei Depots an:<br><br><strong>Standard</strong><br><strong>Premium</strong><br><strong>VIP</strong><br><br><a href="https://new.7shining.com/packages" target="_blank">Zu den Depots</a>',
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
            'question' => 'Kann ich mein Depot später wechseln?',
            'answer' => 'Nein, darum solltest du vor dem Kauf gut abwägen. Wir empfehlen dir VIP – hier bist du am flexibelsten. Wenn du später ein anderes Depot haben möchtest, kannst du jederzeit ein zusätzliches Depot starten und beide gleichzeitig zahlen. Natürlich kannst du auch das Depot welches du nicht mehr willst einfach beenden, indem du nichts mehr zahlst.',
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
            'answer' => 'Die Kosten sind vollständig transparent.<br>Einmalige Startgebühr: CHF 149.- bis CHF 599.- je nach Depot.<br>Monatliche Sparrate je nach gewähltem Depot.<br>Versandkosten trägt das Mitglied.<br>Aktive Mitgliedschaft CHF 29.- jährlich.<br>Keine versteckten Gebühren oder Überraschungen.',
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
            'answer' => 'Wird die monatliche Mindest-Zahlung von CHF 40.- zwei Monate in Folge nicht bezahlt, wird das Depot automatisch aufgelöst. Ein eventuell vorhandenes Restguthaben wird auf schriftlichen Antrag an <a href="mailto:depot@7shining.com">depot@7shining.com</a> ausbezahlt. Aber bitte beachte, dass die einmaligen Startgebühren für Standard CHF 149.-, Premium CHF 299.-, VIP CHF 599.- nicht bei Kündigung oder Auflösung zurückerstattet werden kann! Wir bitten um Dein Verständnis.',
            'popular' => false
        ],
        [
            'id' => 'savings-rate-changes',
            'category' => 'payment',
            'question' => 'Kann ich die Höhe meiner monatlichen Zahlungen ändern?',
            'answer' => 'Generell Ja.<br>Dies ist aber nur im Rahmen ihres gewählten Depots möglich.<br>Deswegen empfehlen wir generell das VIP-Depot, weil sie nur damit absolute Flexibilität geniessen.',
            'popular' => false
        ],
        
        // Lieferung & Versand
        [
            'id' => 'delivery-frequency',
            'category' => 'delivery',
            'question' => 'Wie oft erhalte ich meine Goldbarren?',
            'answer' => 'Die Auslieferung erfolgt quartalsweise, also alle 3 Monate. Reichen deine Einzahlungen im laufenden Quartal nicht aus, um den gewünschten Goldbarren vollständig zu erwerben, verschiebt sich die Auslieferung entsprechend – gegebenenfalls um ein odermehrere Quartale. Ein verbleibendes Restguthaben in Deinem Depot, das nicht für einen vollständigen Barren ausreicht, wird automatisch auf die nächste Lieferung angerechnet.',
            'popular' => true
        ],
        [
            'id' => 'delivery-security',
            'category' => 'delivery',
            'question' => 'Wie sicher ist die Lieferung?',
            'answer' => 'Alle Lieferungen erfolgen speziell und vollständig versichert direkt zu dir nach Hause.',
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
            'question' => 'Wie funktioniert der interne Mitgliederbereich?',
            'answer' => 'Nach Anmeldung erhältst du Zugang zu deinem persönlichen Mitgliederbereich. Dort kannst du Daten verwalten, Einstellungen ändern, Abrechnungen einsehen und vieles mehr. Vergiss nicht deine Daten wie z.B. Adresse, Telefonnummern, e-Mailadressen immer aktuell zu halten!',
            'popular' => false
        ],
[
            'id' => 'password-reset',
            'category' => 'technical',
            'question' => 'Passwort vom internen Mitgliederbereich vergessen?',
            'answer' => 'Nutze die „Passwort vergessen" Funktion auf der Login-Seite. Du erhältst dann eine E-Mail mit einem Link zum Zurücksetzen deines Passworts. Falls das nicht funktionieren sollte, kontaktiere uns über <a href="mailto:support@7shining.com">support@7shining.com</a>',
            'popular' => false
        ],
        [
            'id' => 'support-contact',
            'category' => 'technical',
            'question' => 'Wie erreiche ich den Support?',
            'answer' => 'Unser Support ist für Dich unter der Mailadresse <a href="mailto:support@7shining.com">support@7shining.com</a> erreichbar.',
            'popular' => true
        ],
        
        // Rechtliches
        [
            'id' => 'withdrawal-rights',
            'category' => 'legal',
            'question' => 'Kann ich widerrufen?',
            'answer' => 'Ja du hast ein 14-tägiges Widerrufsrecht ab Kauf. Der Widerruf muss schriftlich per E-Mail an <a href="mailto:widerruf@7shining.com">widerruf@7shining.com</a> erfolgen. Du solltest einen Widerruf bestenfalls vor der Lieferung deiner gekauften Barren einreichen, da bereits gelieferte Goldbarren auf Kosten des Mitglieds versichert und in einwandfreiem Zustand zurückgesendet werden müssen.',
            'popular' => false
        ],
        [
            'id' => 'bank-status',
            'category' => 'legal',
            'question' => 'Ist 7Shining eine Bank oder Finanzdienstleister?',
            'answer' => 'Nein, 7Shining betreibt keinerlei Bank- oder Kreditgeschäfte, Finanzberatungen, Versicherungsvermittlungen oder Börsenhandel.',
            'popular' => false
        ],
        [
            'id' => 'termination',
            'category' => 'legal',
            'question' => 'Wie kann ich kündigen?',
            'answer' => 'Eine Kündigung ist jederzeit möglich. Sende dazu einfach eine schriftliche Mitteilung an <a href="mailto:support@7shining.com">support@7shining.com</a><br><br>Grundsätzlich besteht keine Mindestlaufzeit. Sollte über einen Zeitraum von zwei Monaten keine Zahlung eingehen, wird dein Depot gemäss unseren AGB auch ohne ausdrückliche Kündigung automatisch aufgelöst.<br><br>Bitte beachte, dass die einmaligen Startgebühren – Standard CHF 149.-, Premium CHF 299.-, VIP CHF 599.- - bei einer Kündigung oder automatischen Auflösung nicht rückerstattet werden können. Wir danken dir für dein Verständnis.',
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