<?php

define('DEPENDENCIESDIR', __DIR__ . '/config/dependencies');

$files = scandir(DEPENDENCIESDIR);

foreach($files as $file) {
    if (preg_match('/\.php$/', $file) && is_file(DEPENDENCIESDIR . "/{$file}")) {
        $dependencieName = str_replace(".php", "", $file);
        $container[$dependencieName] = require DEPENDENCIESDIR . "/{$file}";
    }
}
