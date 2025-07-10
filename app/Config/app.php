<?php



// Application configuration

define('SITE_NAME', '7Shining');

define('SITE_DESCRIPTION', 'Mehr als ein Verein - eine Bewegung fÃ¼r Wachstum und Werte');

define('SITE_KEYWORDS', '7Shining, Verein, Gold, Depot, Sparplan, Schweiz, St. Gallen');

define('SITE_AUTHOR', '7Shining');



// Environment für Production ändern
define('ENVIRONMENT', 'production'); // statt 'development'
define('DEBUG_MODE', false); // für Production


// Default meta data

define('DEFAULT_META', [

    'title' => SITE_NAME,

    'description' => SITE_DESCRIPTION,

    'keywords' => SITE_KEYWORDS,

    'author' => SITE_AUTHOR,

    'og_image' => BASE_URL . '/images/og-image.jpg',

    'og_type' => 'website'

]);



// Partner tracking settings

define('PARTNER_SCRIPT_URL', 'https://7shining.ch/home');

define('ERFOLGSASSISTENT_JS', 'https://7shining.ch/wbo/WBO/JS/partner.js');



// Contact settings

define('CONTACT_EMAIL', 'info@7shining.com');

define('SUPPORT_EMAIL', 'support@7shining.com');

define('DEPOT_EMAIL', 'depot@7shining.com');



// Pagination settings

define('DEFAULT_PAGE_SIZE', 10);

define('NEWS_PAGE_SIZE', 6);

define('FAQ_PAGE_SIZE', 20);



// Security settings

define('CSRF_PROTECTION', true);

define('SESSION_TIMEOUT', 7200); // 2 hours



// Cache settings (for future use)

define('CACHE_ENABLED', false);

define('CACHE_DURATION', 3600); // 1 hour



// Error reporting

if (DEBUG_MODE) {

    error_reporting(E_ALL);

    ini_set('display_errors', 1);

} else {

    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    ini_set('display_errors', 0);

}



// Set timezone

date_default_timezone_set('Europe/Zurich');



// Session configuration - MOVED BEFORE session_start()

if (!session_id()) {

    ini_set('session.cookie_httponly', 1);

    ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));

    ini_set('session.use_strict_mode', 1);

}