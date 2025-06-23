<?php
// Set default meta values
$metaTitle = $title ?? DEFAULT_META['title'];
$metaDescription = $description ?? DEFAULT_META['description'];
$metaKeywords = $keywords ?? DEFAULT_META['keywords'];
$metaAuthor = $author ?? DEFAULT_META['author'];
$ogImage = $ogImage ?? DEFAULT_META['og_image'];
$ogType = $ogType ?? DEFAULT_META['og_type'];

// Build full title
if (isset($title) && $title !== SITE_NAME) {
    $fullTitle = $title . ' - ' . SITE_NAME;
} else {
    $fullTitle = SITE_NAME;
}
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $this->escape($fullTitle) ?></title>

<!-- SEO Meta Tags -->
<meta name="description" content="<?= $this->escape($metaDescription) ?>">
<meta name="keywords" content="<?= $this->escape($metaKeywords) ?>">
<meta name="author" content="<?= $this->escape($metaAuthor) ?>">
<meta name="robots" content="index, follow">
<meta name="language" content="de">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="<?= $this->escape($fullTitle) ?>">
<meta property="og:description" content="<?= $this->escape($metaDescription) ?>">
<meta property="og:image" content="<?= $ogImage ?>">
<meta property="og:url" content="<?= $currentUrl ?>">
<meta property="og:type" content="<?= $ogType ?>">
<meta property="og:site_name" content="<?= SITE_NAME ?>">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= $this->escape($fullTitle) ?>">
<meta name="twitter:description" content="<?= $this->escape($metaDescription) ?>">
<meta name="twitter:image" content="<?= $ogImage ?>">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="<?= $this->url('favicon.ico') ?>">
<link rel="apple-touch-icon" href="<?= $this->url('apple-touch-icon.png') ?>">

<!-- Stylesheets -->
<link rel="stylesheet" href="<?= $this->css('styles.css') ?>">
<?php if (isset($additionalStyles)): ?>
    <?php foreach ($additionalStyles as $style): ?>
        <link rel="stylesheet" href="<?= $this->css($style) ?>">
    <?php endforeach; ?>
<?php endif; ?>

<!-- Canonical URL -->
<link rel="canonical" href="<?= $currentUrl ?>">

<!-- Security Headers -->
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<meta http-equiv="X-Frame-Options" content="DENY">
<meta http-equiv="X-XSS-Protection" content="1; mode=block">