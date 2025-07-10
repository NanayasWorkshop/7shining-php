<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h4>7Shining</h4>
                <p>Mehr als ein Verein - eine Bewegung für Wachstum und Werte.</p>
            </div>
            <div class="footer-section">
                <h4>Links</h4>
                <ul>
                    <li><a href="<?= $this->url() ?>">Home</a></li>
                    <li><a href="<?= $this->url('about') ?>">Über uns</a></li>
                    <li><a href="<?= $this->url('packages') ?>">Depot-Modelle</a></li>
                    <li><a href="<?= $this->url('mitglied-werden') ?>">Mitglied werden</a></li>
                    <li><a href="<?= $this->url('faq') ?>">FAQ</a></li>
                    <li><a href="<?= $this->url('news') ?>">News</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Rechtliches</h4>
                <ul>
                    <li><a href="<?= $this->url('agb') ?>">AGB</a></li>
                    <li><a href="<?= $this->url('datenschutz') ?>">Datenschutz</a></li>
                    <li><a href="<?= $this->url('impressum') ?>">Impressum</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> 7Shining. Alle Rechte vorbehalten.</p>
        </div>
    </div>
</footer>