<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="hero-content">
            <h1>Über 7Shining</h1>
            <p>Entdecke die Geschichte, Vision und Werte hinter unserer Bewegung für persönliches Wachstum und finanzielle Stabilität.</p>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="vision-mission">
    <div class="container">
        <div class="content-grid">
            <div class="vision-card">
                <div class="icon">🌟</div>
                <h2>Unsere Vision</h2>
                <p>Eine Welt, in der jeder Mensch sein goldenes Potenzial entfalten kann – eine Gemeinschaft, die auf Vertrauen, Wachstum und gegenseitiger Unterstützung basiert.</p>
            </div>
            
            <div class="mission-card">
                <div class="icon">🎯</div>
                <h2>Unsere Mission</h2>
                <p>Wir schaffen eine Plattform für persönliche und finanzielle Entwicklung, die Menschen dabei hilft, ihre Ziele zu erreichen und dabei eine starke Gemeinschaft aufzubauen.</p>
            </div>
        </div>
    </div>
</section>

<!-- Story Section -->
<section class="our-story">
    <div class="container">
        <div class="story-content">
            <div class="story-text">
                <h2>Unsere Geschichte</h2>
                <p>7Shining wurde aus der Überzeugung heraus gegründet, dass in jedem Menschen etwas Goldenes schlummert – ein ungenutztes Potenzial, das darauf wartet, entdeckt und zum Strahlen gebracht zu werden.</p>
                
                <p>Was als kleine Idee begann, hat sich zu einer Bewegung entwickelt, die Menschen aus verschiedenen Lebensbereichen zusammenbringt. Unser Fokus liegt nicht nur auf finanzieller Stabilität durch kluge Investitionen, sondern vor allem auf dem Aufbau einer Gemeinschaft, die sich gegenseitig stärkt und inspiriert.</p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="our-values">
    <div class="container">
        <h2>Unsere Werte</h2>
        <div class="values-grid">
            <?php if (!empty($values)): ?>
                <?php foreach ($values as $value): ?>
                    <div class="value-card">
                        <div class="value-icon"><?= $value['icon'] ?></div>
                        <h3><?= $this->escape($value['title']) ?></h3>
                        <p><?= $this->escape($value['description']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-choose-us">
    <div class="container">
        <h2>Warum 7Shining?</h2>
        <div class="reasons-grid">
            <?php if (!empty($reasons)): ?>
                <?php foreach ($reasons as $reason): ?>
                    <div class="reason">
                        <h3><?= $reason['title'] ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section (Reuse from Home) -->
<?php if (!empty($testimonials)): ?>
<section class="testimonials">
    <div class="container">
        <h2>Was unsere Mitglieder sagen</h2>
        <div class="testimonials-grid">
            <?php foreach ($testimonials as $index => $testimonial): ?>
                <?php if ($index < 3): ?>
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"<?= $this->escape($testimonial['quote']) ?>"</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar"><?= $this->escape($testimonial['avatar_initials']) ?></div>
                            <div class="author-info">
                                <h4><?= $this->escape($testimonial['name']) ?></h4>
                                <span>Mitglied seit <?= $this->escape($testimonial['membership_since']) ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="about-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Bereit, Teil unserer Gemeinschaft zu werden?</h2>
            <p>Entdecke dein goldenes Potenzial und werde Teil einer Bewegung, die dein Leben positiv verändern kann.</p>
            <div class="cta-buttons">
                <a href="<?= $this->url('packages') ?>" class="cta-button">Depot-Modelle ansehen</a>
                <a href="<?= $this->url('contact') ?>" class="secondary-button">Kostenlose Beratung</a>
            </div>
        </div>
    </div>
</section>