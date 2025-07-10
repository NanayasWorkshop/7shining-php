<nav id="navbar">
    <div class="nav-container">
        <div class="logo">
            <a href="<?= $this->url() ?>" class="logo-link">
                <img src="<?= $this->img('logo.svg') ?>" 
                     alt="7Shining Logo" 
                     class="logo-image"
                     loading="eager">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="<?= $this->url() ?>">Home</a></li>
            <li><a href="<?= $this->url('about') ?>">Über uns</a></li>
            <li><a href="<?= $this->url('packages') ?>">Depots</a></li>
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