<?php

if (version_compare(PHP_VERSION, '8.0.0', '<')) {
    die('This script requires PHP 8.0.0 or higher.');
}

define('ROOT_DIR', __DIR__);

require __DIR__ . '/libs/OpenDereferrer.class.php';

OpenDereferrer::init(); 