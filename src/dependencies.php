<?php

// Dependencie modules

$container['renderer']           = require __DIR__ . '/config/dependencies/twig.php';
$container['logger']             = require __DIR__ . '/config/dependencies/logger.php';
$container['database']           = require __DIR__ . '/config/dependencies/eloquent.php';
$container['redis']              = require __DIR__ . '/config/dependencies/redis.php';

// Error handlers

$container['notFoundHandler']    = require __DIR__ . '/config/dependencies/error-404.php';
$container['errorHandler']       = require __DIR__ . '/config/dependencies/error-500.php';