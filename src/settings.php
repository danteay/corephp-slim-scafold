<?php
return [
    'settings' => [
        'displayErrorDetails' => getenv('ERROR_DETAILS') == strtolower('true'), // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'determineRouteBeforeAppMiddleware' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/views',
        ],

        'twig' => [
            'cache' => __DIR__ . '/views/cache',
            'auto_reload' => true
        ],

        // Monolog settings
        'logger' => [
            'name' => getenv('APPNAME'),
            'logfile' => __DIR__ . '/../logs/logs.log'
        ]
    ]
];
