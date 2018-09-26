<?php

define('ROUTESDIR', __DIR__ . '/config/routes');

$files = scandir(ROUTESDIR);

foreach($files as $file) {
    if (preg_match('/\.php$/', $file) && is_file(ROUTESDIR . "/{$file}")) {
        require ROUTESDIR . "/{$file}";
    }
}