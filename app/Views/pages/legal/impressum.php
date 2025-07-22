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
                                <h3><?= $section['info_box']['title'] ?></h3>
                                <p><?= $section['info_box']['content'] ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- Contact Grid -->
                        <?php if (isset($section['contact_grid'])): ?>
                            <div class="contact-grid">
                                <?php foreach ($section['contact_grid'] as $contact): ?>
                                    <div class="contact-item">
                                        <h4><?= $this->escape($contact['title']) ?></h4>
                                        <p><?= $contact['content'] ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Board Grid -->
                        <?php if (isset($section['board_grid'])): ?>
                            <div class="board-grid">
                                <?php foreach ($section['board_grid'] as $member): ?>
                                    <div class="board-member">
                                        <h4><?= $this->escape($member['title']) ?></h4>
                                        <p><?= $this->escape($member['name']) ?><br>
                                        <em><?= $this->escape($member['description']) ?></em></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>