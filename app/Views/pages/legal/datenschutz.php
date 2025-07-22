<!-- Hero Section -->
<section class="legal-hero">
    <div class="container">
        <h1><?= $this->escape($legal_content['title']) ?></h1>
        <p><?= $this->escape($legal_content['subtitle']) ?></p>
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

                        <!-- Contact Info -->
                        <?php if (isset($section['contact_info'])): ?>
                            <div class="contact-info">
                                <?php if (isset($section['contact_info']['name'])): ?>
                                    <p><strong><?= $this->escape($section['contact_info']['name']) ?></strong><br>
                                    <?= $section['contact_info']['address'] ?><br>
                                    E-Mail: <?= $this->escape($section['contact_info']['email']) ?></p>
                                <?php else: ?>
                                    <p>E-Mail: <?= $this->escape($section['contact_info']['email']) ?><br>
                                    Telefon: <?= $this->escape($section['contact_info']['phone']) ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Additional Content -->
                        <?php if (isset($section['additional_content'])): ?>
                            <?php foreach ($section['additional_content'] as $additionalContent): ?>
                                <?= $additionalContent ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>