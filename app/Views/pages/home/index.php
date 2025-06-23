<!-- Hero Section -->
<section id="home" class="hero">
    <div class="hero-content">
        <h1>Mehr als ein Verein.<br>Es ist eine Bewegung.</h1>
        <p>Ein Ort, an dem du wachsen darfst – mit deinen Werten, deinem Potenzial, deinen Visionen. Menschen die sich gegenseitig fördern, unterstützen und inspirieren.</p>
        <a href="<?= $this->url('about') ?>" class="cta-button">Mehr erfahren</a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>Warum 7Shining?</h2>
                <p>Wir glauben, dass in jedem Menschen etwas goldenes schlummert – bereit, entdeckt, gestärkt und zum Strahlen gebracht zu werden.</p>
                <p>Wir bringen Menschen zusammen, die nicht nur auf der Suche nach finanzieller Freiheit sind, sondern auch nach Sinn, Tiefe, Gemeinschaft und persönlicher Erfüllung.</p>
                
                <div class="values">
                    <div class="value-item">
                        <h3>Gemeinschaft</h3>
                        <p>Ein Ort der gegenseitigen Förderung und Inspiration</p>
                    </div>
                    <div class="value-item">
                        <h3>Wachstum</h3>
                        <p>Persönliche und finanzielle Entwicklung im Einklang</p>
                    </div>
                    <div class="value-item">
                        <h3>Stabilität</h3>
                        <p>Solide Werte und nachhaltige Konzepte</p>
                    </div>
                </div>
                
                <div class="about-cta">
                    <a href="<?= $this->url('about') ?>" class="secondary-button">Mehr über uns erfahren →</a>
                </div>
            </div>
            <div class="about-image">
                <div class="image-placeholder">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Mention -->
<section class="products-mention">
    <div class="container">
        <div class="products-content">
            <h2>Unsere Angebote</h2>
            <p>Neben der Vereinsmitgliedschaft bieten wir auch spezielle Programme für diejenigen, die ihr Portfolio diversifizieren möchten.</p>
            
            <div class="depot-info">
                <div class="depot-text">
                    <h3>Gold-Depot Programme</h3>
                    <p>Unser einzigartiges Konzept kombiniert regelmäßiges Sparen mit physischen Goldbarren-Lieferungen. Zahle monatlich in dein persönliches Depot ein und erhalte quartalsweise echte Goldbarren direkt nach Hause geliefert.</p>
                    <p>Alle Lieferungen sind vollständig versichert und werden nach dem aktuellen Tagespreis abgerechnet - für maximale Transparenz und faire Preise.</p>
                </div>
                
                <div class="depot-features">
                    <div class="feature-card">
                        <div class="feature-icon">🏅</div>
                        <h4>Schweizer Qualität</h4>
                        <p>Zertifizierte Goldbarren, sichere Lagerung und vollständig versicherte Lieferung direkt zu dir nach Hause.</p>
                    </div>
                </div>
            </div>
            
            <div class="products-buttons">
                <a href="<?= $this->url('packages') ?>" class="cta-button">Depot-Pakete ansehen</a>
                <a href="<?= $this->url('contact') ?>" class="secondary-button">Kostenlose Beratung</a>
            </div>
        </div>
    </div>
</section>

<!-- How it Works -->
<section id="how-it-works" class="how-it-works">
    <div class="container">
        <h2>So funktioniert's</h2>
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Anmeldung</h3>
                <p>Werde Teil unserer Gemeinschaft durch eine einfache Online-Anmeldung</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Kennenlernen</h3>
                <p>Tausche dich mit Gleichgesinnten aus und finde deinen Weg</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Wachsen</h3>
                <p>Entwickle dich persönlich und finanziell in einer unterstützenden Umgebung</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section id="testimonials" class="testimonials">
    <div class="container">
        <h2>Was unsere Mitglieder sagen</h2>
        <div class="testimonials-grid">
            <?php if (!empty($testimonials)): ?>
                <?php foreach ($testimonials as $index => $testimonial): ?>
                    <?php if ($testimonial['featured'] && $index < 3): ?>
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
            <?php else: ?>
                <!-- Fallback if no testimonials -->
                <div class="testimonial">
                    <div class="testimonial-content">
                        <p>"Eine Gemeinschaft, die wirklich zusammenhält und sich gegenseitig unterstützt."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">MS</div>
                        <div class="author-info">
                            <h4>Maria S.</h4>
                            <span>Mitglied seit 2025</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h2>Werde Teil von 7Shining</h2>
                <p>Bereit für den nächsten Schritt? Starte deine Reise mit uns und entdecke dein goldenes Potenzial in einer Gemeinschaft, die dich unterstützt und inspiriert.</p>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">📧</div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p><?= CONTACT_EMAIL ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="join-action">
                <a href="<?= $this->url('mitglied-werden') ?>" class="cta-button">Werde Teil von 7Shining</a>
            </div>
        </div>
    </div>
</section>