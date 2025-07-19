<!-- Hero Section -->
<section class="packages-hero">
    <div class="container">
        <div class="hero-content">
            <h1><?= $this->escape($hero['title']) ?></h1>
            <p><?= $this->escape($hero['description']) ?></p>
            
            <div class="hero-stats">
                <?php foreach ($hero['stats'] as $stat): ?>
                    <div class="stat">
                        <span class="stat-number"><?= $this->escape($stat['number']) ?></span>
                        <span class="stat-label"><?= $this->escape($stat['label']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Packages Section -->
<section class="packages">
    <div class="container">
        <h2>Wähle dein Depot-Modell</h2>
        <p class="packages-subtitle">Alle Modelle beinhalten eine quartalsweise Lieferung physischer Goldbarren, transparente Preisgestaltung und vollständige Versicherung.</p>
        
        <div class="packages-grid">
            <?php foreach ($packages as $package): ?>
                <div class="package-card<?= $package['is_premium'] ? ' premium' : '' ?>">
                    <?php if ($package['badge']): ?>
                        <div class="package-badge"><?= $this->escape($package['badge']) ?></div>
                    <?php endif; ?>
                    
                    <div class="package-header">
                        <h3><?= $this->escape($package['name']) ?></h3>
                        <p class="package-description"><?= $this->escape($package['description']) ?></p>
                    </div>
                    
                    <div class="package-features">
                        <ul>
                            <?php foreach ($package['features'] as $feature): ?>
                                <li>✓ <?= $this->escape($feature) ?></li>
                            <?php endforeach; ?>
                            <?php foreach ($package['details'] as $detail): ?>
                                <li>✓ <?= $this->escape($detail) ?></li>
                            <?php endforeach; ?>
                            <li>✓ <?= $this->escape($package['price']) ?> <?= $this->escape($package['period']) ?></li>
                        </ul>
                    </div>
                    
                    <a href="<?= $this->escape($package['external_url']) ?>" class="package-button">
                        <?= $this->escape($package['button_text']) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process">
    <div class="container">
        <h2><?= $this->escape($process['title']) ?></h2>
        <div class="process-steps">
            <?php foreach ($process['steps'] as $step): ?>
                <div class="process-step">
                    <div class="step-icon"><?= $step['icon'] ?></div>
                    <h3><?= $this->escape($step['number']) ?>. <?= $this->escape($step['title']) ?></h3>
                    <p><?= $this->escape($step['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Transparency Section -->
<section class="transparency">
    <div class="container">
        <div class="transparency-content">
            <div class="transparency-text">
                <h2><?= $this->escape($transparency['title']) ?></h2>
                <p><?= $this->escape($transparency['description']) ?></p>
                
                <div class="transparency-points">
                    <?php foreach ($transparency['points'] as $point): ?>
                        <div class="point">
                            <h4><?= $this->escape($point['title']) ?></h4>
                            <p><?= $this->escape($point['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="transparency-visual">
                <div class="trust-badge">
                    <div class="badge-content">
                        <div class="badge-icon"><?= $transparency['badge']['icon'] ?></div>
                        <div class="badge-text"><?= $transparency['badge']['text'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq">
    <div class="container">
        <h2><?= $this->escape($faq['title']) ?></h2>
        <div class="faq-grid">
            <?php foreach ($faq['items'] as $item): ?>
                <div class="faq-item">
                    <h4><?= $this->escape($item['question']) ?></h4>
                    <p><?= $item['answer'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Bereit für dein Gold-Depot?</h2>
            <p>Starte noch heute mit dem Aufbau deines physischen Gold-Portfolios. Wähle das Modell, das zu deinen Zielen passt.</p>
            <div class="cta-buttons">
                <a href="<?= $this->url('mitglied-werden') ?>" class="cta-button">Jetzt anmelden</a>
                <a href="<?= $this->url('faq') ?>" class="secondary-button">Weitere Fragen</a>
            </div>
        </div>
    </div>
</section>