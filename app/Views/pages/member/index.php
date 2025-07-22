<!-- Hero Section -->

<section class="membership-hero">

    <div class="container">

        <div class="hero-content">

            <h1><?= $hero['title'] ?></h1>

            <p><?= $this->escape($hero['description']) ?></p>

            

            <div class="hero-visual">

                <div class="community-circle">

                    <div class="circle-content">

                        <div class="circle-icon"><?= $hero['community_circle']['icon'] ?></div>

                        <div class="circle-text"><?= $hero['community_circle']['text'] ?></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- Membership Options -->

<section class="membership-options">

    <div class="container">

        <h2><?= $membership_options['title'] ?></h2>

        <p class="section-subtitle"><?= $this->escape($membership_options['subtitle']) ?></p>

        

        <div class="membership-grid">

            <?php foreach ($membership_options['options'] as $option): ?>

                <div class="membership-card <?= $option['id'] ?><?= $option['is_featured'] ? ' featured' : '' ?>">

                    <?php if ($option['badge']): ?>

                        <div class="card-badge"><?= $this->escape($option['badge']) ?></div>

                    <?php endif; ?>

                    

                    <div class="card-header">

                        <div class="membership-icon"><?= $option['icon'] ?></div>

                        <h3><?= $this->escape($option['title']) ?></h3>

                        <p class="membership-description"><?= $this->escape($option['description']) ?></p>

                    </div>

                    

                    <div class="membership-benefits">

                        <ul>

                            <?php foreach ($option['benefits'] as $benefit): ?>

                                <li>✓ <?= $this->escape($benefit) ?></li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                    

                    <div class="membership-cta">

                        <?php if ($option['button']['action'] === 'link'): ?>

                            <a href="<?= $this->url($option['button']['url']) ?>" class="membership-button <?= $option['button']['type'] ?>">

                                <?= $option['button']['text'] ?>

                            </a>

                        <?php elseif ($option['button']['action'] === 'scroll'): ?>

                            <button id="activeMembershipBtn" class="membership-button <?= $option['button']['type'] ?>">

                                <?= $option['button']['text'] ?>

                            </button>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>



<!-- Active Member Benefits -->

<section class="active-benefits">

    <div class="container">

        <div class="benefits-content">

            <div class="benefits-text">

                <h2><?= $active_benefits['title'] ?></h2>

                <p><?= $this->escape($active_benefits['description']) ?></p>

                

                <div class="benefits-grid">

                    <?php foreach ($active_benefits['benefits'] as $benefit): ?>

                        <div class="benefit-item">

                            <div class="benefit-icon"><?= $benefit['icon'] ?></div>

                            <h4><?= $this->escape($benefit['title']) ?></h4>

                            <p><?= $this->escape($benefit['description']) ?></p>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

            

            <div class="benefits-visual">

                <div class="growth-diagram">

                    <?php foreach ($active_benefits['growth_steps'] as $step): ?>

                        <div class="growth-step" style="--delay: <?= $step['delay'] ?>">

                            <div class="step-dot"><?= $step['number'] ?></div>

                            <span><?= $this->escape($step['text']) ?></span>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- Community Spirit -->

<section class="community-spirit">

    <div class="container">

        <div class="spirit-content">

            <h2><?= $community_spirit['title'] ?></h2>

            <p class="spirit-quote"><?= $community_spirit['quote'] ?></p>

            

            <div class="spirit-values">

                <?php foreach ($community_spirit['values'] as $value): ?>

                    <div class="value-circle">

                        <div class="value-icon"><?= $value['icon'] ?></div>

                        <h4><?= $this->escape($value['title']) ?></h4>

                        <p><?= $this->escape($value['description']) ?></p>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</section>



<!-- Registration Section with Collapsible iFrame -->

<section class="registration-cta" id="registration-form">

    <div class="container">

        <div class="cta-content">

            <h2><?= $registration['title'] ?></h2>

            <p><?= $this->escape($registration['description']) ?></p>

            <p class="cta-highlight"><?= $registration['highlight'] ?></p>

            

            <!-- Toggle Button for Registration Form -->

            <div class="registration-toggle">

                <button id="toggleRegistrationBtn" class="toggle-button">

                    <span class="toggle-icon"><?= $registration['toggle_button']['icon_closed'] ?></span>

                    <span class="toggle-text"><?= $registration['toggle_button']['text_closed'] ?></span>

                </button>

            </div>

            

            <!-- Collapsible Erfolgsassistent iFrame Integration -->

            <div class="registration-form-container" id="registrationFormContainer">

                <div style="width:<?= $registration['iframe_container']['width'] ?>;height:<?= $registration['iframe_container']['height'] ?>;" 

                     id="<?= $registration['iframe_container']['id'] ?>"></div>

            </div>

            

        </div>

    </div>

</section>