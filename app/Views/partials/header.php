<nav id="navbar">
    <div class="nav-container">
        <div class="logo">
            <a href="<?= $this->url() ?>" style="color: inherit; text-decoration: none;">7Shining</a>
        </div>
        <ul class="nav-links">
            <li><a href="<?= $this->url() ?>">Home</a></li>
            <li><a href="<?= $this->url('about') ?>">Über uns</a></li>
            <li><a href="<?= $this->url('packages') ?>">Pakete</a></li>
            <li><a href="<?= $this->url('mitglied-werden') ?>">Mitglied werden</a></li>
            <li><a href="<?= $this->url('faq') ?>">FAQ</a></li>
            <li><a href="<?= $this->url('news') ?>">News</a></li>
        </ul>
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>