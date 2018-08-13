<?php
// view renderer
$container['renderer'] = require __DIR__ . '/config/dependencies/twig.php';

// corephp-log
$container['logger'] = require __DIR__ . '/config/dependencies/logger.php';

// Propel
$container['database'] = require __DIR__ . '/config/dependencies/eloquent.php';

// Handler for Not found page
$container['notFoundHandler'] = require __DIR__ . '/config/dependencies/error-404.php';

// Top level error handler
$container['errorHandler'] = require __DIR__ . '/config/dependencies/error-500.php';