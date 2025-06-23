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
    
    <!-- Scripts -->
    <script src="<?= $this->js('script.js') ?>"></script>
    
    <!-- Partner Tracking -->
    <script>var partnerScriptURL = "<?= PARTNER_SCRIPT_URL ?>";</script>
    <script src="<?= ERFOLGSASSISTENT_JS ?>" type="text/javascript"></script>
    
    <?php if (isset($additionalScripts)): ?>
        <?php foreach ($additionalScripts as $script): ?>
            <script src="<?= $this->js($script) ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>