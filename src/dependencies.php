<?php
// view renderer
$container['renderer'] = require_once __DIR__ . '/config/dependencies/renderer.php';

// corephp-log
$container['logger'] = require_once __DIR__ . '/config/dependencies/logger.php';

// Propel
$container['database'] = require_once __DIR__ . '/config/dependencies/database.php';

// Handler for Not found page
$container['notFoundHandler'] = require_once __DIR__ . '/config/dependencies/error-404.php';