<?php
/**
 * Global settings for project configuration
 *
 * PHP Version 7.1
 *
 * @category  Settings
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */

return [
    'settings' => [
        // set to false in production
        'displayErrorDetails' => getenv('ERROR_DETAILS') == strtolower('true'),

        // Allow the web server to send the content-length header
        'addContentLengthHeader' => false,

        // Allow to access to the rotes before resolve middlewares
        'determineRouteBeforeAppMiddleware' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/views',
        ],

        // twig view settings
        'twig' => [
            'cache' => __DIR__ . '/views/cache',
            'auto_reload' => true
        ],

        // Monolog settings
        'logger' => [
            'name' => getenv('APPNAME'),
            'level' => Monolog\Logger::DEBUG,
            // 'path' => __DIR__ . '/../logs/logs.log'
            'path' => 'php://stdout'
        ]
    ]
];
