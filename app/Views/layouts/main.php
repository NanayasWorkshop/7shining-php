<!DOCTYPE html>
<html lang="de">
<head>
    <?php $this->partial('meta', $data ?? []); ?>
</head>
<body>
    <?php $this->partial('header'); ?>
    
    <main>
        <?php echo $content; ?>
    </main>
    
    <?php $this->partial('footer'); ?>
    
    <!-- Core JavaScript files (must load first) -->
    <script src="<?= $this->js('core/utils.js') ?>"></script>
    <script src="<?= $this->js('core/dom.js') ?>"></script>
    <script src="<?= $this->js('core/api.js') ?>"></script>
    
    <!-- Component JavaScript files -->
    <script src="<?= $this->js('components/navigation.js') ?>"></script>
    <script src="<?= $this->js('components/forms.js') ?>"></script>
    <script src="<?= $this->js('components/animations.js') ?>"></script>
    
    <!-- Main application script -->
    <script src="<?= $this->js('script.js') ?>"></script>
    
    <!-- Partner Tracking -->
    <script>var partnerScriptURL = "<?= PARTNER_SCRIPT_URL ?>";</script>
    <script src="<?= ERFOLGSASSISTENT_JS ?>" type="text/javascript"></script>
    
    <!-- Page-specific scripts (load last) -->
    <?php if (isset($additionalScripts)): ?>
        <?php foreach ($additionalScripts as $script): ?>
            <script src="<?= $this->js($script) ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>