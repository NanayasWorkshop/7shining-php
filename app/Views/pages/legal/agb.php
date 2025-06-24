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

                        <!-- Info Box -->
                        <?php if (isset($section['info_box'])): ?>
                            <div class="info-box">
                                <h4><?= $section['info_box']['title'] ?></h4>
                                <p><?= $section['info_box']['content'] ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- Warning Box -->
                        <?php if (isset($section['warning_box'])): ?>
                            <div class="warning-box">
                                <h4><?= $section['warning_box']['title'] ?></h4>
                                <p><?= $section['warning_box']['content'] ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- Payment Info -->
                        <?php if (isset($section['payment_info'])): ?>
                            <div class="payment-info">
                                <h4><?= $section['payment_info']['title'] ?></h4>
                                <ul>
                                    <?php foreach ($section['payment_info']['methods'] as $method): ?>
                                        <li><?= $this->escape($method) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endforeach; ?>

                <!-- PDF Downloads -->
                <?php if (isset($legal_content['pdf_downloads'])): ?>
                    <div class="pdf-downloads">
                        <h3>📄 Vollständige Geschäftsbedingungen</h3>
                        <p>Für die rechtsgültigen und vollständigen Geschäftsbedingungen laden Sie bitte die entsprechenden PDF-Dokumente herunter:</p>
                        
                        <div class="download-buttons">
                            <?php foreach ($legal_content['pdf_downloads'] as $pdf): ?>
                                <a href="<?= $this->url('legal/download/' . $pdf['id']) ?>" class="download-button" target="_blank">
                                    <span class="download-icon"><?= $pdf['icon'] ?></span>
                                    <div class="download-text">
                                        <strong><?= $this->escape($pdf['title']) ?></strong>
                                        <span><?= $this->escape($pdf['description']) ?></span>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>