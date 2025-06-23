<?php

// Define all application routes
$routes = [
    // Main pages
    'home'                  => 'Home@index',
    ''                      => 'Home@index',
    'about'                 => 'About@index',
    'packages'              => 'Packages@index',
    'mitglied-werden'       => 'Member@index',
    'faq'                   => 'Faq@index',
    'news'                  => 'News@index',
    'contact'               => 'Contact@index',
    
    // Legal pages
    'agb'                   => 'Legal@agb',
    'datenschutz'           => 'Legal@datenschutz',
    'impressum'             => 'Legal@impressum',
    
    // News articles (dynamic)
    'news/{slug}'           => 'News@article',
    
    // Form submissions
    'contact/submit'        => 'Contact@submit',
    'newsletter/subscribe'  => 'Contact@newsletter',
    
    // Clean partner URLs
    'packages/{hex}'        => 'Packages@partner',
    'join/{hex}'            => 'Member@partner',
    'gold/{hex}'            => 'Packages@partner',
    
    // Admin/API routes (for future use)
    'api/news'              => 'Api\\News@index',
    'api/faq'               => 'Api\\Faq@index',
    
    // 404 handling (this should be last)
    '404'                   => 'Error@notFound'
];