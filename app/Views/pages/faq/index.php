<!-- Hero Section -->
<section class="faq-hero">
    <div class="container">
        <div class="hero-content">
            <h1>Häufige Fragen</h1>
            <p>Hier findest du Antworten auf die am häufigsten gestellten Fragen zu 7Shining, unseren Depot-Paketen und der Mitgliedschaft.</p>
            
            <div class="search-box">
                <input type="text" id="faq-search" placeholder="Suche nach einem Thema oder Stichwort...">
                <div class="search-icon">🔍</div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Categories -->
<section class="faq-categories">
    <div class="container">
        <h2>Kategorien</h2>
        <div class="category-tabs">
            <?php foreach ($categories as $category): ?>
                <button class="tab-button <?= $category['active'] ? 'active' : '' ?>" data-category="<?= $this->escape($category['id']) ?>">
                    <?= $this->escape($category['name']) ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Content -->
<section class="faq-content">
    <div class="container">
        <div class="faq-list">
            <?php foreach ($faq_items as $item): ?>
                <div class="faq-item" data-category="<?= $this->escape($item['category']) ?>">
                    <div class="faq-question">
                        <h3><?= $this->escape($item['question']) ?></h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?= $item['answer'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- No Results Message -->
        <div id="no-results" class="no-results" style="display: none;">
            <h3>Keine Ergebnisse gefunden</h3>
            <p>Ihre Suche ergab keine Treffer. Versuchen Sie es mit anderen Stichwörtern oder kontaktieren Sie unseren Support.</p>
            <a href="<?= $this->url('contact') ?>" class="cta-button">Support kontaktieren</a>
        </div>
    </div>
</section>

<!-- Still have questions? -->
<section class="faq-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Frage nicht gefunden?</h2>
            <p>Unser Support-Team hilft Ihnen gerne weiter. Kontaktieren Sie uns für eine persönliche Beratung.</p>
            <div class="cta-buttons">
                <a href="<?= $this->url('contact') ?>" class="cta-button">Kontakt aufnehmen</a>
                <a href="mailto:support@7shining.com" class="secondary-button">E-Mail schreiben</a>
            </div>
        </div>
    </div>
</section>