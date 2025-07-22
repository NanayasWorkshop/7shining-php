<!-- Hero Section -->
<section class="legal-hero">
    <div class="container">
        <h1><?= $this->escape($legal_content['title']) ?></h1>
        <?php if (!empty($legal_content['subtitle'])): ?>
            <p><?= $this->escape($legal_content['subtitle']) ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- Content Section -->
<section class="legal-content">
    <div class="container">
        <div class="content-wrapper">
            <div class="content-nav">
                <h3>Inhaltsverzeichnis</h3>
                <ul>
                    <?php foreach ($legal_content['navigation'] as $nav): ?>
                        <li><a href="#<?= $this->escape($nav['id']) ?>"><?= $this->escape($nav['title']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="content-main">
                <?php foreach ($legal_content['sections'] as $section): ?>
                    <section id="<?= $this->escape($section['id']) ?>">
                        <h2><?= $this->escape($section['title']) ?></h2>
                        
                        <?php foreach ($section['content'] as $content): ?>
                            <?= $content ?>
                        <?php endforeach; ?>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>