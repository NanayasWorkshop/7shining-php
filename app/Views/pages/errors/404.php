<?php
// Set default error messages based on error code
$errorCode = $error_code ?? 404;
$errorMessages = [
    404 => [
        'title' => 'Oops! Sackgasse gefunden',
        'description' => 'Hey, die Seite gibt es leider noch nicht oder wurde in der Zwischenzeit verschoben. Aber keine Sorge - wir arbeiten täglich daran, unsere Website zu erweitern!',
        'animation' => ['4', '0', '4']
    ],
    403 => [
        'title' => 'Zugriff nicht erlaubt',
        'description' => 'Diese Seite ist nicht öffentlich zugänglich. Melden Sie sich an oder kontaktieren Sie uns für weitere Informationen.',
        'animation' => ['4', '0', '3']
    ],
    500 => [
        'title' => 'Technischer Fehler',
        'description' => 'Entschuldigung! Ein technischer Fehler ist aufgetreten. Unser Team wurde benachrichtigt und arbeitet bereits an einer Lösung.',
        'animation' => ['5', '0', '0']
    ]
];

$errorInfo = $errorMessages[$errorCode] ?? $errorMessages[404];
?>

<!-- 404 Hero Section -->
<section class="error-hero">
    <div class="container">
        <div class="error-content">
            <div class="error-animation">
                <?php foreach ($errorInfo['animation'] as $digit): ?>
                    <span class="error-number"><?= $digit ?></span>
                <?php endforeach; ?>
            </div>
            
            <h1><?= $this->escape($errorInfo['title']) ?></h1>
            <p><?= $this->escape($errorInfo['description']) ?></p>
            
            <div class="error-suggestions">
                <h3>🤔 Was könntest du stattdessen tun?</h3>
                <div class="suggestions-grid">
                    <div class="suggestion-item">
                        <span class="suggestion-icon">🏠</span>
                        <h4>Zurück zur Startseite</h4>
                        <p>Entdecke unsere Vision und finde heraus, was 7Shining so besonders macht.</p>
                        <a href="<?= $this->url() ?>" class="suggestion-link">Zur Startseite</a>
                    </div>
                    
                    <div class="suggestion-item">
                        <span class="suggestion-icon">📦</span>
                        <h4>Depot-Pakete ansehen</h4>
                        <p>Schau dir unsere transparenten Gold-Sparpläne an und finde das passende Paket.</p>
                        <a href="<?= $this->url('packages') ?>" class="suggestion-link">Pakete entdecken</a>
                    </div>
                    
                    <div class="suggestion-item">
                        <span class="suggestion-icon">🤝</span>
                        <h4>Mitglied werden</h4>
                        <p>Werde Teil unserer Gemeinschaft und starte deine Reise mit 7Shining.</p>
                        <a href="<?= $this->url('mitglied-werden') ?>" class="suggestion-link">Jetzt anmelden</a>
                    </div>
                </div>
            </div>

            <div class="back-actions">
                <button onclick="goBack()" class="secondary-button">
                    ← Zurück zur vorherigen Seite
                </button>
                <a href="<?= $this->url() ?>" class="cta-button">
                    🏠 Zur Startseite
                </a>
            </div>

            <div class="fun-fact">
                <h4>💡 Wusstest du schon?</h4>
                <p id="funFactText">Gold wird seit über 4000 Jahren als Wertaufbewahrungsmittel verwendet!</p>
                <button onclick="newFunFact()" class="fun-fact-btn">Neuer Fakt</button>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements for Visual Interest -->
    <div class="floating-elements">
        <div class="float-element" style="--delay: 0s; --duration: 4s;">💎</div>
        <div class="float-element" style="--delay: 1s; --duration: 5s;">🌟</div>
        <div class="float-element" style="--delay: 2s; --duration: 3s;">✨</div>
        <div class="float-element" style="--delay: 0.5s; --duration: 6s;">🔍</div>
        <div class="float-element" style="--delay: 3s; --duration: 4s;">💫</div>
    </div>
</section>