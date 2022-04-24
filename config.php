<?php

$config = [];

// -- Base configuration ------------------------------------------------------
$config['BRAND_NAME'] = 'Open-Dereferrer.com';
$config['META_TITLE'] = 'Open-Dereferrer.com | The Open-Source Deferrer';
$config['META_DESCRIPTION'] = $config['BRAND_NAME'] . '. The open-source, ad-free dereferring and anonymizing service';
$config['META_KEYWORDS'] = 'dereferrer, anonymize, ad-free, free, open-source';

// -- URL configuration -------------------------------------------------------
$config['USE_SSL'] = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off';
$config['SITE_TLD'] = 'open-dereferrer.com';
$config['SITE_URL'] = 'http' . ($config['USE_SSL'] ? 's' : '') . '://' . $config['SITE_TLD'];

// https://nosplash.open-dereferrer.com, leave empty to disable the option to skip the splash page
$config['NOSPLASH_SUBDOMAIN'] = 'nosplash';

// -- Misc configuration ------------------------------------------------------
$config['REDIRECT_DELAY'] = 3; // in seconds
$config['DONATE_URL'] = 'https://www.paypal.com/donate?hosted_button_id=J2DP7SL45X5PY';
$config['GITHUB_URL'] = 'https://github.com/SteffenLoges/open-dereferrer';
$config['GOOGLE_ANALYTICS_TRACKING_ID'] = 'G-80K90W6L0R';

$mainCSSFile = '/assets/css/main.min.css';
$config['MAIN_CSS_FILE'] = $mainCSSFile . '?ft=' . filemtime(ROOT_DIR . $mainCSSFile);

$mainJSFile = '/assets/js/main.js';
$config['MAIN_JS_FILE'] = $mainJSFile . '?ft=' . filemtime(ROOT_DIR . $mainJSFile);