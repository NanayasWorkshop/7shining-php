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
                                <li><?= $this->escape($feature) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <?php if (!empty($package['details'])): ?>
                        <div class="package-details">
                            <?php foreach ($package['details'] as $detail): ?>
                                <p><?= $detail ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="package-buttons">
                        <?php 
                        $memberUrl = (strpos($package['button_member_url'], 'http') === 0) 
                            ? $package['button_member_url'] 
                            : $this->url($package['button_member_url']); 
                        $activeUrl = (strpos($package['button_active_url'], 'http') === 0) 
                            ? $package['button_active_url'] 
                            : $this->url($package['button_active_url']); 
                        ?>
                        <a href="<?= $this->escape($memberUrl) ?>" class="package-button member-button">
                            <?= $this->escape($package['button_member_text']) ?>
                        </a>
                        <a href="<?= $this->escape($activeUrl) ?>" class="package-button active-button">
                            <?= $this->escape($package['button_active_text']) ?>
                        </a>
                    </div>
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